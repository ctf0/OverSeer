<template>
    <form target="_blank"
          method="post"
          :action="title ? `/overseer/${title}` : '/overseer'"
          @submit.prevent="showPreview($event)">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="template" :value="template">
        <input type="hidden" name="data" :value="formData">
        <slot/>
    </form>
</template>

<script>
const serialize = require('form-serialize')

export default {
    props: {
        formId: { // the form we want to preview its data
            type: String,
            required: true
        },
        template: { // where will we review the data
            type: String,
            required: true
        },
        csrf: {
            type: String,
            required: true,
            default: ''
        },
        title: { // optional page url
            type: String,
            required: false,
            default: ''
        }
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

        // editors support
        WYSIWYG() {
            if (typeof tinyMCE != 'undefined') {
                tinyMCE.triggerSave()
            }
        }
    }
}
</script>
