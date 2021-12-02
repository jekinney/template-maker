<div class="panel panel-default">

  <div class="panel-heading">
    Avalible Variables
  </div>

  <div class="panel-body">
    @foreach( $variables as $variable )
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Name: </strong>{{ $variable->name }}</div>
        <div class="panel-body">
          <code>{{ '{ '.$variable->formatVariable().' }' }}</code>
        </div>
        <div class="panel-footer">
          <strong>Description: </strong>{{ $variable->description }}
        </div>
      </div>
    @endforeach
  </div>
</div>