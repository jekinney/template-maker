@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <aside class="col-md-3">
        @include('basic.shared.aside')
      </aside>
        <div class="col-md-9">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Update Basic Template
                </div>

                <div class="panel-body">
                  <form action="{{ route('basic.update', $basic) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-sm-6 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $basic->name) }}" class="form-control" placeholder="File Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="col-sm-6 form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description', $basic->description) }}" class="form-control" placeholder="File Description">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('html') ? ' has-error' : '' }}">
                      <label for="html">Text @if ($errors->has('html'))<strong class="text-danger">{{ $errors->first('html') }}</strong>@endif
                      </label>
                      <editor current="{{ old('html', $basic->html) }}" />
                    </div>
                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
