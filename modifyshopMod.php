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
        <h1>選擇版型 (可以拖曳欄位更改版型)</h1>
        <div class="layouts">
          <div
            v-for="(layout, index) in layouts"
            :key="index"
            class="layout"
            :class="{active: selectedLayout === index}"
            @click="selectedLayout = index"
          >
            <div
              v-for="(key, keyIndex) in layout"
              :key="key"
              :data-index="index"
              :data-key="keyIndex"
            >
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

        <div class="layout">
          <div
            v-for="key in layouts[selectedLayout]"
            :key="key"
            v-html="preview(key)"
          ></div>
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
            msg: 'null',
            pages: {
                選擇版型: 0,
                填寫資料: 1,
                預覽: 2,
                確定送出: 3,
            },
            page: 1,
            layouts: [],
            layoutData: {
                name: "商品名稱",
                image: "圖片",
                udesc: "商品簡介",
                price: "費用: 0000",
                link: "相關連結",
                date: "發佈日期",
            },
            <?php
              include('link.php');
              $id = $_GET['id'];
              $sql = "select * from product where id=$id";
              $query = $db->query($sql)->fetch();

              $img = file_get_contents($query['image']);
            ?>
            payload: {
                name: "<?php echo $query['name'] ?>",
                image: "<?php echo $img?>",
                udesc: "<?php echo $query['udesc'] ?>",
                price: "<?php echo $query['price'] ?>",
                link: "<?php echo $query['link'] ?>",
                date: "<?php echo $query['date'] ?>",
                template_index: "<?php echo $query['template_index'] ?>",
            },
            selectedLayout: <?php echo $query['template_index']?>,
            templateAry: '',
            productAry: '',
        };
    },
    mounted() {
        this.setlayouts();
        this.setTemplate();
        this.setProduct();
    },
    methods: {
        setlayouts() {
            $.post(
                "api.php?do=getValue",
                (res) => {
                    for (let i = 0; i < res.length; i++) {
                        this.layouts.push([]);
                        for (let j = 1; j < 7; j++) {
                            this.layouts[i].push(res[i][j]);
                        }
                    }
                },
                "json"
            );
        },
        setTemplate() {
            $.post('api.php?do=getTemplate', (res) => {
                this.templateAry = res;
            }, 'json');
        },
        setProduct() {
            $.post('api.php?do=getProduct', (res) => {
                this.productAry = res;
            }, 'json')
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
                return `費用: ${this.payload[key].toString().padStart(4, '0')}`;
            }
            return this.payload[key];
        },

        onSubmit() {
            if (confirm("確定送出嗎?")) {
              $.post(
                    "api.php?do=insert",
                    {
                        id:<?php echo $query['id'] ?>,
                        data: JSON.stringify(this.payload),
                    },
                    (res) => {
                        document.write(res);
                    }
                );
            }
        },
    },
});

app.mount("#app");
    </script>
  </body>
</html>
