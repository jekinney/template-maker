@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Preview for template {{ $convert->name }}
                  <a href="{{ route('convert.index') }}" class="btn btn-primary">List</a>
                </div>

                <div class="panel-body">
                  {!! $convert->html !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
