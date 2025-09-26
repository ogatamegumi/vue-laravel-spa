<template>
    <button class="btn btn-primary" @click="purchase">
        <!--このボタンをクリックしたら、PurchaseController@storeを呼び出す-->
        <!--このボタンは、ProductListコンポーネント内に配置する-->
        🛒購入
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
    methods: {
        async purchase() {
            await axios.post("/api/purchases", {
                product_id: this.productId,
                quantity: 1,
            });
        },
    },
};
</script>
