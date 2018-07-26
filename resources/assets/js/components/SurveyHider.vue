<style scoped>
    .option-container {
        display: flex;
    }

    .option-select {
        flex: 1;
    }

    .option-label {
        flex-basis: 100px;
    }
</style>

<template>
    <div>
        <div class="checkbox">
            <label>
                <input type="checkbox" v-model="hideConfig.allow" />
                Ocultar Preguntas
            </label>
        </div>
        <div v-if="hideConfig.allow">
            <div>
                <label>Seleccione Preguntas a Ocultar</label>
                <div v-for="(options, value) in hideConfig.options" :key="value" class="option-container">
                    <div class="option-label text-center">{{ value }}</div>
                    <div class="option-select">
                        <select multiple v-model="hideConfig.options[value]">
                            <option v-for="availableElement in availableElements" :key="availableElement.uid" :value="availableElement.uid" :disabled="availableElement.uid == exceptUid">{{ availableElement.text }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import uniqueString from 'unique-string';
    import Bus from './../Bus';

    export default {
        props: ['hideConfig', 'exceptUid'],

        data() {
            return {
                uid: uniqueString(),
                availableElements: [],
            }
        },

        created() {
            Bus.$on('available-elements', this.setAvailableElements);
            this.$nextTick(() => {
                Bus.$emit('get-available-elements');
            });
        },

        methods: {
            setAvailableElements(availableElements) {
                this.availableElements = availableElements;
            }
        }
    }
</script>
