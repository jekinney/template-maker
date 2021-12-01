@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Advanced Templates</h1>
                  <a href="{{ route('advanced.create') }}" class="btn btn-primary">Create</a>
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
                    @foreach( $advances as $advanced ) 
                      <tr>
                        <td>{{ $advanced->name }}</td>
                        <td>{{ $advanced->description }}</td>
                        <td class="text-center">
                          <a href="{{route('advanced.show', $advanced) }}" class="btn btn-sm btn-success">Show</a>
                          <a href="{{route('advanced.edit', $advanced) }}" class="btn btn-sm btn-primary">Edit</a>
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
