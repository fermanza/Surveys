<style>
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
                <label>Alcance</label>
                <div class="checkbox" v-for="availableElement in availableElements">
                    <label>
                        <input type="checkbox" :name="uid" v-model="hideConfig.scope" :value="availableElement" />
                        {{ availableElement.text }}
                    </label>
                </div>
            </div>
            <div>
                <label>Seleccione Preguntas a Ocultar</label>
                <div v-for="(options, value) in hideConfig.options" class="option-container">
                    <div class="option-label text-center">{{ value }}</div>
                    <div class="option-select">
                        <select multiple v-model="hideConfig.options[value]">
                            <option v-for="scopeOption in hideConfig.scope" :value="scopeOption.uid">{{ scopeOption.text }}</option>
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
        props: ['hideConfig'],

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
