@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  Update template
                </div>

                <div class="panel-body">
                  <form action="{{ route('variable.update', $variable) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-sm-6 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" value="{{ old('name', $variable->name) }}" class="form-control" placeholder="File Name">
                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="col-sm-6 form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" value="{{ old('description', $convert->description) }}" class="form-control" placeholder="File Description">
                      @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('variable') ? ' has-error' : '' }}">
                      <label for="variable">Variable</label>
                      <input type="text" name="variable" id="variable" value="{{old('variable', $convert->html)}}" class="form-control" />
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
