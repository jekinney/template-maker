<template>
  <div class="row">

    <aside class="col-sm-3">
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
                @dragstart="startDrag($event, variable)">
                {{ variable.variable }}
              </code>
            </div>
            <div class="panel-footer">
              <strong>Description: </strong>{{ variable.description }}
            </div>
          </div>
        </div>
      </div>
    </aside>

  <div class="col-sm-9" @drop="onDrop($event)" @dragover.prevent @dragenter.prevent>
    <canvas id="viewport" />
    <input type="hidden" name="locations[]" :value="locations" id="locations" />
  </div>

  </div>
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      default: ''
    }
  },
  methods: {
    drawImage (item = null) {
      var canvas = document.getElementById('viewport')
      var context = canvas.getContext('2d');

      var baseImage = new Image()
      if (item) {
        this.canvas = canvas.toDataURL();
        baseImage.src = this.canvas
      } else {
        baseImage.src = this.image
      }
      baseImage.onload = function() {
        var imgWidth = baseImage.width
        var imgHeight = baseImage.height
        context.canvas.width = imgWidth
        context.canvas.height = imgHeight
        context.drawImage(baseImage, 0, 0, imgWidth, imgHeight)
        if ( item ) {
          var rect = canvas.getBoundingClientRect()
          if ( item.text == '{{ law-name }}') {
            var x = item.event.layerX - rect.top - 45
            var y = item.event.clientY - rect.top - 42
          } else if ( item.text == '{{ law-address }}') {
            var x = item.event.layerX - rect.top - 120
            var y = item.event.clientY - rect.top - 42
          } else if (item.text == '{{ res-name }}') {
            x = item.event.layerX - rect.top
            y = item.event.clientY - rect.top - 30
          } else if ( item.text == '{{ res-address }}') {
            x = item.event.layerX - rect.top - 120
            y = item.event.clientY - rect.top - 30
          }

          context.font = "10pt Calibri";
          context.fillText(item.text, x, y);
        }
      }
      this.draggingItem = null
    },
    onDrop (event) {
      console.log( event )
      this.drawImage({
        text: this.draggingItem.variable,
        event: event
      })
  	},
    getData () {
      axios.get( '/api/variable/listings' ).then( response => {
        this.variables = response.data.variables
      })
    },
    startDrag (evt, variable) {
      evt.dataTransfer.dropEffect = 'move'
      evt.dataTransfer.effectAllowed = 'move'
      this.draggingItem = variable
    },
  },
  data () {
    return {
      canvas: null,
      context: null,
      imgWidth: 0,
      imgHeight: 0,
      variables: [],
      locations: [],
      baseImage: null,
      draggingItem: null
    }
  },
  mounted () {
    this.getData()
    this.drawImage()
  },
}
</script>
