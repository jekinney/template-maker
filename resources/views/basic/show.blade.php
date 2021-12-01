@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Preview for template {{ $basic->name }}
                </div>

                <div class="panel-body">
                  {!! $basic->defaultVariables() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
