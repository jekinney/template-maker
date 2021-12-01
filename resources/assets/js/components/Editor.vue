<template>
  <div>
    <ckeditor v-model="editorData" :config="editorConfig" />
    <input type="hidden" id="html" name="html" :value="editorData" />
  </div>
</template>

<script>
import CKEditor from 'ckeditor4-vue';

export default {
  props: {
    current: {
      type: String,
      default: null
    }
  },
  components: {
    ckeditor: CKEditor.component
  },
  data () {
    return {
      editorData: this.current,
      editorConfig: {
          // The configuration of the editor.
      }
    }
  },
}
</script>
