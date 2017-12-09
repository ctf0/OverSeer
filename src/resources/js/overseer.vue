<template>
    <form target="_blank"
          method="post"
          action="/overseer"
          @submit.prevent="showPreview($event)">

        <input type="hidden" name="template" :value="template">
        <input type="hidden" name="data" :value="formData">
        <slot/>
    </form>
</template>

<script>
const serialize = require('form-serialize')

export default {
    props: {
        formId: {required: true}, // the form we want to preview its data
        template: {required: true} // where will we review the data
    },
    data() {
        return {
            formData: null
        }
    },
    methods: {
        showPreview(event) {
            this.WYSIWYG()

            this.formData = JSON.stringify(
                serialize(document.getElementById(this.formId), {
                    hash: true,
                    empty: true
                })
            )

            this.$nextTick(() => {
                event.target.submit()
            })
        },
        WYSIWYG() {
            if (typeof tinyMCE != 'undefined') {
                tinyMCE.triggerSave()
            }
        }
    },
    render() {}
}
</script>
