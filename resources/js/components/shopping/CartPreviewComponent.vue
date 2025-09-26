<template>
    <div class="mt-3">
        <strong>選択内容:</strong>
        <p>カラー: {{ selectedOptions.color || '-' }}</p>
        <p>サイズ: {{ selectedOptions.size || '-' }}</p>
        <p>数量: {{ selectedOptions.quantity || 1 }}</p>
    </div>
</template>

<script>
export default {
    props: {
        selectedOptions: {
            type: Object,
            required: true,
        }
    }
}
</script>
