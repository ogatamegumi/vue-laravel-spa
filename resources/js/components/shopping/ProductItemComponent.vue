<template>
  <div class="container my-5">
    <div class="row g-4 align-items-center">
      <!-- 左：商品画像 -->
      <div class="col-md-6 text-center">
        <img
          :src="product.image || '/images/cat.jpg'"
          class="img-fluid rounded shadow"
          style="width: 400px; height: 300px; object-fit: cover;"
          alt="商品画像"
        />
      </div>

      <!-- 右：商品情報 -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">{{ product.name }}</h2>
        <p class="text-muted mb-4">{{ product.description }}</p>

        <h3 class="text-danger fw-bold mb-4">
          {{ product.price }} 円
        </h3>

        <!-- オプション -->
        <div v-if="product.options" class="mb-4">
          <div class="mb-2">
            <strong class="me-2">カラー:</strong>
            <span class="badge bg-secondary me-1" v-for="(c, i) in product.options.color" :key="i">
              {{ c }}
            </span>
          </div>
          <div>
            <strong class="me-2">サイズ:</strong>
            <span class="badge bg-light text-dark border me-1" v-for="(s, i) in product.options.size" :key="i">
              {{ s }}
            </span>
          </div>
        </div>

        <!-- ボタン -->
        <!-- <div class="d-flex gap-3">
          <button class="btn btn-outline-secondary" @click="$router.back()">
            ← 戻る
          </button>
          <button class="btn btn-primary">
            🛒 カートに追加
          </button>
        </div> -->
      </div>
    </div>
  </div>
</template>


<script>
export default {
    props: {
        productId: String
    },
    data: function() {
        return {
            product: {}
        }
    },
    methods: {
        getProduct() {
            axios.get('/api/product/' + this.productId)
                .then((res) => {
                    this.product = res.data;
                });
        }
    },
    mounted() {
        this.getProduct();
    }
}
</script>
