const app = Vue.createApp({
    data() {
        return {
            msg: 'null',
            color: [],
            pages: {
                選擇版型: 0,
                填寫資料: 1,
                預覽: 2,
                確定送出: 3,
            },
            page: 0,
            layouts: [],
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
                backgroundColor: '',
                template_index: 0,
            },
            dragIndex: "",
            dragKey: "",
        };
    },
    mounted() {
        this.setlayouts();
    },
    methods: {
        setlayouts() {
            $.post(
                "api.php?do=getValue",
                (res) => {
                    console.log(res);
                    res.forEach(element => {
                        this.layouts.push(JSON.parse(element[1]));
                        this.color.push(element[2]);
                    });
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
            this.dragKey = e.target.dataset.key;
        },
        onDrop(e) {
            const dropkey = e.target.dataset.key;
            [
                this.layouts[0][this.dragKey],
                this.layouts[0][dropkey],
            ] = [
                    this.layouts[0][dropkey],
                    this.layouts[0][this.dragKey],
                ];
        },

        onUpload(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    this.payload.image = reader.result;
                };
            }
        },
        preview(key) {
            if (key === "image") {
                return `<img src="${this.payload[key]}" alt="image">`;
            } else if (key === "price") {
                return `費用: ${this.payload[key].padStart(4, '0')
                    } `;
            }
            return this.payload[key];
        },
        insertTemplate() {
            $.post(
                'api.php?do=insertTemplate',
                {
                    template: JSON.stringify(this.layouts[0]),
                    color: this.payload.backgroundColor,
                },
                (res) => {
                    // console.log(res);
                    document.write(res);
                }
            )
        },
        onSubmit() {
            if (confirm("確定送出嗎?")) {
                // let form = this.$refs.insertForm;
                // form.submit();
                $.post(
                    "api.php?do=insert",
                    { data: this.payload }
                    ,
                    (res) => {
                        document.write(res);
                    }
                );
            }
        },
    },
});

app.mount("#app");