<style scoped>
    .option-container {
        display: flex;
        margin-bottom: 5px;
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
                Lógica de exclusión de preguntas
            </label>
        </div>
        <div v-if="hideConfig.allow">
            <div>
                <label>Seleccione Preguntas a Ocultar</label>
                <div v-for="(options, value) in hideConfig.options" :key="value" class="option-container">
                    <div class="option-label text-center">{{ value }}</div>
                    <div class="option-select">
                        <vue-select v-model="hideConfig.options[value]" :options="parsedOptions" :settings="{ multiple: true, width: '95%' }"></vue-select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from './../Bus';

    export default {
        props: ['hideConfig', 'surveyElementUid', 'answer', 'index'],

        data() {
            return {
                availableElements: [],
            }
        },

        computed: {
            parsedOptions() {
                return this.availableElements.map(element => {
                    return {
                        id: element.uid,
                        text: element.text
                    }
                });
            }
        },

        created() {
            Bus.$on('available-elements', this.setAvailableElements);
            Bus.$on('remove-question', this.emitShowElements);
            this.$nextTick(() => {
                Bus.$emit('get-available-elements');
            });
        },

        methods: {
            setAvailableElements(availableElements) {
                this.$nextTick(() => {
                    this.availableElements = availableElements.filter((element, index) => index > this.index);
                });
            },

            emitShowElements(uid) {
                if (uid == this.surveyElementUid) {
                    Bus.$emit('toggle-hide-elements', this.hideConfig.options[this.answer] || [], []);
                }
            }
        }
    }
</script>
