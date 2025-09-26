<template>
  <div class="container my-5">
    <div class="row g-4 align-items-center">
      <div class="col-md-6 text-center">
        <img
          :src="product.image || '/images/cat.jpg'"
          class="img-fluid rounded shadow"
          style="width: 400px; height: 300px; object-fit: cover;"
          alt="商品画像"
        />
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">{{ product.name }}</h2>
        <p class="text-muted mb-4">{{ product.description }}</p>

        <h3 class="text-danger fw-bold mb-4">
          {{ product.price }} 円
        </h3>

        <div v-if="product.options">
            <ProductOptions
                :options="product.options"
                v-model="selectedOptions"
            />
        </div>
        <CartPreview :selected-options="selectedOptions" />

         <div class="d-flex gap-3">
          <!--<button class="btn btn-outline-secondary" @click="$router.back()">
            ← 戻る
          </button>-->
          <PurchaseButton v-if="product.id" :product-id="product.id" :selected-options="selectedOptions" />
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import ProductOptions from './ProductOptionsComponent.vue';
import PurchaseButton from './PurchaseButtonComponent.vue';
import CartPreview from './CartPreviewComponent.vue';

export default {
    props: {
        productId: Number,
        requires: true,
    },
    data: function() {
        return {
            product: {},
            selectedOptions: { color: '', size: '', quantity: 1 }
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
        ProductOptions,
        PurchaseButton,
        CartPreview,
    },
}
</script>
