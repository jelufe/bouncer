@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Papel</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('salvarpapel') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('papel') ? ' has-error' : '' }}">
                            <label for="papel" class="col-md-4 control-label">Papel</label>

                            <div class="col-md-6">
                                <input id="papel" type="text" class="form-control" name="papel" value="{{ old('papel') }}" required autofocus>

                                @if ($errors->has('papel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('papel') }}</strong>
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
