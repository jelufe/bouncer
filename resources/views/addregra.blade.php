@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar regra para {{$role->name}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('salvarregra') }}">
                        {{ csrf_field() }}

                        <input name="id" type="hidden" class="form-control" id="id" value="{{$role->id}}" />

                        <div class="form-group{{ $errors->has('regra') ? ' has-error' : '' }}">
                            <label for="regra" class="col-md-4 control-label">Regra</label>

                            <div class="col-md-6">
                                <input id="regra" type="text" class="form-control" name="regra" value="{{ old('regra') }}" required autofocus>

                                @if ($errors->has('regra'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regra') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
