<template>
  <div class="panel-body">
    <form @submit.prevent="submit" method="post">
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="name">Name</label>
          <input type="text" v-model="formData.name" id="name" class="form-control" placeholder="File Name">
        </div>
        <div class="col-sm-6 form-group">
          <label for="description">Description</label>
          <input type="text" v-model="formData.description" id="description" class="form-control" placeholder="File Description">
        </div>
      </div>
      <div class="form-group">
        <quill-editor 
          ref="myTextEditor"
          v-model="formData.html"
          :options="editorOption" 
        />
      </div>
      <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
  import { quillEditor } from 'vue-quill-editor'

  export default {
    name: 'create-Template',
    props: {
      url: {
        type: String,
        required: true
      },
    },
    methods: {
      submit () {
        axios.post( this.url, this.formData ).then( (res) => {
          console.log( res.data )
          res.data.files; // binary representation of the file
          res.status; // HTTP status
        }).catch( errors => {
          this.errors = errors
        });
      }
    },
    components: {
      quillEditor
    },
    data () {
      return {
        errors: [],
        formData: {
          html: null,
          name: null,
          description: null,
        },
        editorOption: {
          boundary: document.body, 
          modules: {
            toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['clean'],
          ]
        },
        placeholder: 'Copy and Paste HTML here',}
      }
    },
  }
</script>

<style scoped>
  .quill-editor {
    height: 500px;
    margin-bottom: 50px;
  }
</style>