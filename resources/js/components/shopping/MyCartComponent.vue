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
          <th>お値段</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in purchases" :key="item.id">
          <td>{{ item.product.name }}</td>
          <td>{{ item.options.color }}</td>
          <td>{{ item.options.size }}</td>
          <td>{{ item.quantity }}</td>
          <td>{{ item.product.price }}円</td>
          <td>
            <button class="btn" @click="deleteItem(item.id)">×</button>
          </td>
        </tr>
        <tr>
            <td colspan="5" style="font-weight: bold;">合計</td>
            <td>{{ totalPrice }}円</td>
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
    computed: {
        totalPrice() {
            return this.purchases.reduce((sum, item) => {
                return sum + (item.product.price * item.quantity);
            }, 0);
        }
    },
    methods: {
        getPurchase() {
            axios.get('/api/purchase/')
                .then((res) => {
                    this.purchases = res.data;
                    console.log(res)
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
