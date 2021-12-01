@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                  <h1>Edit Variable {{ $variable->name }}</h1>
                </div>

                <div class="panel-body">
                  <form action="{{ route('variable.update', $variable) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" value="{{ old('name', $variable->name) }}" class="form-control" placeholder="Residents Name">
                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" value="{{ old('description', $variable->description) }}" class="form-control" placeholder="Variable to insert a residents name.">
                      @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('variable') ? ' has-error' : '' }}">
                      <label for="variable">Variable <span class="text-danger">We automaticly will put curly brackets around the variable.</span></label>
                      <input type="text" name="variable" id="variable" value="{{ old('variable', $variable->formatVariable()) }}" class="form-control" placeholder="res_name"/>
                      @if ($errors->has('variable'))
                        <span class="help-block">
                            <strong>{{ $errors->first('variable') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('test_data') ? ' has-error' : '' }}">
                      <label for="test_data">Test Data <span class="text-danger">"Fake" data for placeholder while testing with out an account.</span></label>
                      <input type="text" name="test_data" id="test_data" value="{{ old('test_data', $variable->test_data) }}" class="form-control" placeholder="John Doe"/>
                      @if ($errors->has('test_data'))
                        <span class="help-block">
                            <strong>{{ $errors->first('test_data') }}</strong>
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
