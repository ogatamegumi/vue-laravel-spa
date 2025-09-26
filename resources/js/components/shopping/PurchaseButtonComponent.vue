<template>
    <button class="btn btn-primary" @click="purchase">
        <!--このボタンをクリックしたら、PurchaseController@storeを呼び出す-->
        <!--このボタンは、ProductListコンポーネント内に配置する-->
        🛒購入
    </button>
    <button v-if="purchased" class="btn btn-primary" @click="goToCart">
        カートを見る
    </button>
</template>

<script>
import axios from 'axios';

export default {
    name: "PurchaseButton",
    props: {
        productId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            purchased: false
        };
    },
    methods: {
        async purchase() {
            await axios.post("/api/purchase", {
                product_id: this.productId,
                quantity: 1,
            });
            this.purchased = true;
        },
        goToCart() {
            this.$router.push({ name: 'cart' });
        }
    },
};
</script>
