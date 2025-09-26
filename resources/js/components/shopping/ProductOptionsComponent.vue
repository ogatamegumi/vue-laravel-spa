<template>
  <div class="product-options">
    <!-- 色 -->
    <div class="mb-2">
      <label>色:</label>
      <select v-model="localValue.color" @change="updateParent" class="form-select">
        <option v-for="color in options.color" :key="color" :value="color">{{ color }}</option>
      </select>
    </div>

    <!-- サイズ -->
    <div class="mb-2">
      <label>サイズ:</label>
      <select v-model="localValue.size" @change="updateParent" class="form-select">
        <option v-for="size in options.size" :key="size" :value="size">{{ size }}</option>
      </select>
    </div>

    <!-- 数量 -->
    <div class="mb-2">
      <label>数量:</label>
      <input type="number" min="1" v-model.number="localValue.quantity" @input="updateParent" class="form-control">
    </div>
  </div>
</template>

<script>
export default {
  props: {
    options: {
      type: Object,
      required: true
    },
    modelValue: {
      type: Object,
      default: () => ({ color: '', size: '' , quantity: '' })
    }
  },
  data() {
    return {
      localValue: { ...this.modelValue }
    };
  },
  watch: {
    modelValue(newVal) {
      this.localValue = { ...newVal };
    }
  },
  methods: {
    updateParent() {
      this.$emit('update:modelValue', { ...this.localValue });
    }
  }
};
</script>
