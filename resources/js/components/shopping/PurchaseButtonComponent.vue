<template>
    <div>
        <button class="btn btn-primary" @click="$emit('purchase')">
            🛒カートに入れる
        </button>
        <button v-if="purchased" class="btn btn-primary" @click="$emit('go-to-cart')">
            カートを見る
        </button>
    </div>
</template>

<script>

export default {
    name: "PurchaseButton",
    props: {
        purchased: {
            type: Boolean,
            required: true
        }
    },
    emits: ['purchase', 'go-to-cart']
};
</script>
