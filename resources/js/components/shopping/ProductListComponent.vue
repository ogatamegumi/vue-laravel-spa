<template>
    <div class="container">
        <h3>商品の配列を受け取り、１つずつ描画するコンポーネント</h3>
        <div class="container mt-4">
            <div class="row">
                <div
                    class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4"
                    v-for="(product, index) in products"
                    :key="index"
                >
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ product.name }}</h5>
                            <p class="card-text">{{ product.description }}</p>
                            <p class="fw-bold text-primary">
                                {{ product.price }}円
                            </p>

                            <div class="mt-auto">
                                <small class="text-muted">
                                    {{ product.options.color.join(' / ') }} <br>
                                    {{ product.options.size.join(' / ') }}</small
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductListComponent",
    data: function () {
        return {
            products: [],
        };
    },
    methods: {
        getProducts() {
            axios.get("/api/shopping").then((res) => {
                this.products = res.data;
            });
            console.log(this.data);
        },
    },
    mounted() {
        this.getProducts();
    },
};
</script>
