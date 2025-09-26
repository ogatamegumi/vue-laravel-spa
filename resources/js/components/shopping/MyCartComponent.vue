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
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in purchases" :key="item.id">
          <td>{{ item.product.name }}</td>
          <td>{{ item.options.color }}</td>
          <td>{{ item.options.size }}</td>
          <td>{{ item.quantity }}</td>
          <button class="btn" @click="deleteItem(item.id)">×</button>
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
        deleteItem(id) {
            axios.delete('/api/purchase/' + id)
                .then(() => {
                    this.getPurchase();
                });
        }
    },
    mounted() {
        this.getPurchase();
    }
}
</script>
