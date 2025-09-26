<template>
  <div>
    <h2>カート</h2>
    <table class="table">
      <thead>
        <tr>
          <th>商品</th>
          <th>色</th>
          <th>サイズ</th>
          <th>数量</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in purchases" :key="item.id">
          <td>{{ item.product.name }}</td>
          <td>{{ item.options ? item.options.color : '' }}</td> <!--後で戻す-->
          <td>{{ item.options ? item.options.size : '' }}</td>
          <td>{{ item.quantity }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    props: {
        purchaseId: String,
    },
    data: function() {
        return {
            purchases: [],
        };
    },
    methods: {
        getPurchase() {
            axios.get('/api/purchase/')
                .then((res) => {
                    this.purchases = res.data;
                });
        },
    },
    mounted() {
        this.getPurchase();
    }
}
</script>
