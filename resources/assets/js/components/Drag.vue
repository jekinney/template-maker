<template>
  <div class="panel panel-default">

    <div class="panel-heading">
      Avalible Variables
    </div>

    <div class="panel-body">
        <div v-for="variable in variables" :key="variable.id" class="panel panel-default">
          <div class="panel-heading"><strong>Name: </strong>{{ variable.name }}</div>
          <div class="panel-body">
            <code 
              :id="variable.id+'-'+variable.variable" 
              draggable
              @dragstart="startDrag($event, item)">
              {{ variable.variable }}
            </code>
          </div>
          <div class="panel-footer">
            <strong>Description: </strong>{{ variable.description }}
          </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      variables: []
    }
  },
  mounted () {
    this.getData()
  },
  methods: {
    getData () {
      axios.get( '/api/variable/listings' ).then( response => {
        this.variables = response.data.variables
      })
    },
    startDrag (evt, item) {
      evt.dataTransfer.dropEffect = 'move'
      evt.dataTransfer.effectAllowed = 'move'
      evt.dataTransfer.setData('itemID', item.id)
    },
  }
}
</script>