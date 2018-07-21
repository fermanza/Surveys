<style scoped>
    
</style>

<template>
    <div>
        <i :class="`fa fa-fw ${rootElement.className}`"></i>
        <span>{{ rootElement.title }}</span>
    </div>
</template>

<script>
    export default {
        props: ['rootElement']
    }
</script>
