<style scoped>
    .root-element {
        font-size: 15px;
        padding: 10px 15px;
        border-bottom: 1px solid #d1d1d1;
        color: #232323;
        cursor: pointer;
    }


    @media screen and (max-width: 768px) {
        .element-title {
            display: none;
        }
    }
</style>

<template>
    <div class="root-element">
        <i :class="`fa fa-fw ${rootElement.className}`"></i>
        <span class="element-title">{{ rootElement.title }}</span>
    </div>
</template>

<script>
    export default {
        props: ['rootElement']
    }
</script>
