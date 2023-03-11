const app = Vue.createApp({
  data() {
    return {
      pages: {
        選擇版型: 0,
        填寫資料: 1,
        預覽: 2,
        確定送出: 3,
      },
      page: 0,
      layouts_id: [],
      layouts: [],
      layouts_background: [],
      insertTemplateBackground: [],
      layoutData: {
        name: "商品名稱",
        image: "圖片",
        udesc: "商品簡介",
        price: "費用: 0000",
        link: "相關連結",
        date: "發佈日期",
      },
      payload: {
        name: "",
        image: "",
        udesc: "",
        price: "",
        link: "",
        date: "",
        template_id: "",
      },
      selectlayoutIndex: 0,
      dragIndex: "",
      dragKey: "",
      file: "",
    };
  },
  mounted() {
    this.setlayouts();
  },
  methods: {
    setlayouts() {
      $.get(
        "api.php?do=setTemplate",
        (res) => {
          this.layouts_id = res.map((x) => x["id"]);
          this.layouts = res.map((x) => JSON.parse(x["layout"]));
          this.layouts_background = res.map((x) => x["color"]);
          // console.log(this.layouts);
          // for (let i = 0; i < res.length; i++) {
          //     this.layouts.push([]);
          //     for (let j = 1; j < 7; j++) {
          //         this.layouts[i].push(res[i][j]);
          //     }
          // }
        },
        "json"
      );
    },
    onDragstart(e) {
      this.dragIndex = e.target.dataset.index;
      this.dragKey = e.target.dataset.key;
    },
    onDrop(e) {
      const dropIndex = e.target.dataset.index;
      const dropkey = e.target.dataset.key;

      if (this.dragIndex === dropIndex) {
        [
          this.layouts[this.dragIndex][this.dragKey],
          this.layouts[dropIndex][dropkey],
        ] = [
          this.layouts[dropIndex][dropkey],
          this.layouts[this.dragIndex][this.dragKey],
        ];
      }
    },

    onUpload(e) {
      const file = e.target.files[0];
      this.file = file;

      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
        this.payload.image = reader.result;
      };
    },
    preview(key) {
      if (key === "image") {
        return `<img src="${this.payload[key]}" alt="image">`;
      } else if (key === "price") {
        return `費用: ${this.payload[key].padStart(4, "0")} `;
      }
      return this.payload[key];
    },
    insertTemplate() {
      color = this.insertTemplateBackground;
      layout = this.layouts[this.selectlayoutIndex];
      fetch("api.php?do=insertTemplate", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ template: layout, color: color }),
      }).then(() => {
        alert("新增成功");
        location.href = "index.php";
      });
      // $.post(
      //     'api.php?do=insertTemplate',
      //     {
      //         template: JSON.stringify(this.layouts[0]),
      //         color: this.payload.backgroundColor,
      //     },
      //     (res) => {
      //         // console.log(res);
      //         document.write(res);
      //     }
    },

    modifyTemplate(id, layout, color) {
      fetch("api.php?do=modifyTemplate", {
        method: "POST",
        // headers: {
        //   "Content-Type": "application/json",
        // },
        body: JSON.stringify({ id: id, template: layout, color: color }),
      });
    },

    destroyTemplate(layouts_id) {
      url = "api.php?do=destroyTemplate&id=" + layouts_id;
      location.href = url;
    },

    onSubmit() {
      if (confirm("確定送出嗎?")) {
        this.payload.image = this.file;
        this.payload.template_id = this.selectlayoutIndex;

        const formData = new FormData();

        for (let key in this.payload) {
          // console.log(key, this.payload[key]);
          formData.append(key, this.payload[key]);
        }
        console.log(formData);
        fetch("api.php?do=productMod", {
          method: "POST",
          body: formData,
        }).then(() => {
          alert("新增成功");
          location.href = "index.php";
        });

        // $.post("api.php?do=insert", { data: this.payload }, (res) => {
        //   document.write(res);
        // });
      }
    },
  },
});

app.mount("#app");
