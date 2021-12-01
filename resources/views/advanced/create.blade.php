@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Create Advanced Template
                </div>

                <div class="panel-body">
                  <form action="{{ route('advanced.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-sm-6 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="File Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="col-sm-6 form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control" placeholder="File Description">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                      <label for="file">PDF File</label>
                      <input type="file" name="file" id="file" class="form-control" />
                      @if ($errors->has('file'))
                        <span class="help-block">
                          <strong class="text-danger">{{ $errors->first('file') }}</strong>
                        </span>
                      @endif
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
