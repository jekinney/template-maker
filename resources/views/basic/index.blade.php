@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="">Basic Templates</h1>
                  <a href="{{ route('basic.create') }}" class="btn btn-primary">Create</a>
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th width="20%">Name</th>
                      <th>Description</th>
                      <th class="text-center" width="20%">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $basics as $basic ) 
                      <tr>
                        <td>{{ $basic->name }}</td>
                        <td>{{ $basic->description }}</td>
                        <td class="text-center">
                          <a href="{{route('basic.show', $basic) }}" class="btn btn-sm btn-success">Show</a>
                          <a href="{{route('basic.edit', $basic) }}" class="btn btn-sm btn-primary">Edit</a>
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
