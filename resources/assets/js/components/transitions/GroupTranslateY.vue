<style>
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(-50px);
    }
</style>

<template>
    <transition-group name="list">
        <slot></slot>
    </transition-group>
</template>

<script>
    export default {}
</script>
