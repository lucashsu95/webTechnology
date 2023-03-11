<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>新增商品</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.47/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
  <?php
      include 'link.php';
      $sql = 'select * from product where id=' . $_GET['id'];
      $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
      // var_dump($query);
  ?>
    <button onclick="history.go(-1)">上一頁</button>

    <div id="app" v-cloak>
      <div id="pages">
        <button
          v-for="(value, key) in pages"
          :key="value"
          class="btn"
          :class="{active: page === value}"
          @click="page = value"
        >
          {{ key }}
        </button>
      </div>
      <!-- 選擇版型 Start -->

      <div v-show="page === 0" class="page">
        <h1>選擇版型</h1>

        <div class="layouts">
          <div
            v-for="(layout, index) in layouts"
            :key="index"
            class="layout"
            :class="{active: selectlayoutIndex === index}"
            :style="{background: layouts_background[index]}"
            @click="selectlayoutIndex = index"
          >
            <div v-for="(key, keyIndex) in layout" :class="key" :key="key">
              {{ layoutData[key] }}
            </div>
          </div>
        </div>
      </div>
      <!-- 選擇版型 End -->

      <!-- 填寫資料 Start -->

      <div v-show="page === 1" class="page">
        <h1>填寫資料</h1>
        <div>
          <label>商品名稱</label>
          <input type="text" name="name" v-model="payload.name" />
        </div>
        <div>
          <label>圖片</label>
          <input type="file" name="image" id="image" @change="onUpload" />
        </div>
        <div>
          <label>商品簡介</label>
          <textarea name="udesc" v-model="payload.udesc"></textarea>
        </div>
        <div>
          <label>費用</label>
          <input type="text" name="price" v-model="payload.price" />
        </div>
        <div>
          <label>相關連結</label>
          <input type="text" name="link" v-model="payload.link" />
        </div>
        <div>
          <label>發佈日期</label>
          <input type="date" name="date" v-model="payload.date" />
        </div>
      </div>

      <!-- 填寫資料 End -->
      <!-- 預覽 Start -->

      <div v-show="page === 2" class="page">
        <h1>預覽</h1>

        <div class="layouts">
          <div class="layout" :style="{background: layouts_background[selectlayoutIndex]}">
            <div
              v-for="key in layouts[selectlayoutIndex]"
              :key="key"
              
              v-html="preview(key)"
            ></div>
          </div>
        </div>
      </div>
      <!-- 預覽 End -->

      <div v-show="page === 3" class="page">
        <h1>確定更改</h1>
        <button class="btn" @click="onSubmit">更改</button>
      </div>
    </div>

    <script>
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
            layoutData: {
              name: "商品名稱",
              image: "圖片",
              udesc: "商品簡介",
              price: "費用: 0000",
              link: "相關連結",
              date: "發佈日期",
            },

            payload: {
              name: "<?php echo $query['name']?>",
              image: "<?php echo $query['image']?>",
              udesc: "<?php echo $query['udesc']?>",
              price: "<?php echo $query['price']?>",
              link: "<?php echo $query['link']?>",
              date: "<?php echo $query['date']?>",
              template_id: "<?php echo $query['template_id']?>",
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

                this.selectlayoutIndex = this.layouts_id.indexOf(this.payload.template_id);
              },
              "json"
            );
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
            color = this.payload.background;
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

          },

          modifyTemplate(id, layout, color) {
            fetch("api.php?do=modifyTemplate", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
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
              formData.append('id', <?php echo $query['id']?>);

               fetch("api.php?do=productMod", {
                method: "POST",
                body: formData,
              }).then(() => {
                alert("修改成功");
                location.href = "index.php";
              });

              // $.post(
              //     "api.php?do=insert",
              //     { data: this.payload }
              //     ,
              //     (res) => {
              //         document.write(res);
              //     }
              // );
            }
          },
        },
      });

      app.mount("#app");
    </script>
  </body>
</html>
