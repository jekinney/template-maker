@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Preview for template {{ $advanced->name }}
                </div>

                <div class="panel-body">
                  <img src="{{ asset('storage/uploads/test_2.png') }}" />
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
