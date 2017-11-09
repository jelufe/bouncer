@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$role->name}} possui abilidades para:
                <a class="pull-right" href="{{ url('/add/regra/'.$role->id) }}">Adicionar nova regra para {{$role->name}}</a> </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($abilities as $abilitie)
                          <tr>
                            <td>{{$abilitie->name}}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'url' => 'regra/remover/'.$abilitie->name, 'style' => 'display: inline;']) !!}
                                <input name="id" type="hidden" class="form-control" id="id" value="{{$role->id}}" />
                                
                                <button type="submit" class="btn btn-default btn-sm">Remover</button>
                                {!! Form::close() !!}
                            </td>
                          </tr>

                        @endforeach()
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
