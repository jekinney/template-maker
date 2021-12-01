@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Avalible Variables</h1>
                  <a href="{{ route('variable.create') }}" class="btn btn-primary">Create Variable</a>
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th width="20%">Name</th>
                      <th>Variable</th>
                      <th>Test Data</th>
                      <th>Description</th>
                      <th class="text-center" width="20%">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $variables as $variable ) 
                      <tr>
                        <td>{{ $variable->name }}</td>
                        <td>{{ $variable->formatVariable() }}</td>
                        <td>{{ $variable->test_data }}</td>
                        <td>{{ $variable->description }}</td>
                        <td class="text-center">
                          <a href="{{route('variable.edit', $variable) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
