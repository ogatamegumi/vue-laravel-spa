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
        <div v-if="product.options">
            <ProductOptions
                :options="product.options"
                v-model="selectedOptions"
            />
        </div>
        <div class="mt-3">
            <strong>選択内容:</strong>
            <p>カラー: {{ selectedOptions.color || '-' }}</p>
            <p>サイズ: {{ selectedOptions.size || '-' }}</p>
            <p>数量: {{ selectedOptions.quantity }}</p>
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
import ProductOptions from './ProductOptionsComponent.vue';

export default {
    props: {
        productId: String
    },
    data: function() {
        return {
            product: {},
            selectedOptions: { color: '', size: '' }
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
    },
    components: {
        ProductOptions
    },
}
</script>
