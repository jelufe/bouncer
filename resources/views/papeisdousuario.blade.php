@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Papeis para {{$user->name}} </div>

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
                        @foreach($roles as $role)
                        @if(Bouncer::is($user)->a($role->name))
                          <tr class="success">
                            <td>{{$role->name}}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'url' => '/papel/'.$role->id, 'style' => 'display: inline;']) !!}
                                <button type="submit" class="btn btn-default btn-sm">Visualizar Regras</button>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST', 'url' => 'removerpapel/'.$role->name, 'style' => 'display: inline;']) !!}
                                <input name="id" type="hidden" class="form-control" id="id" value="{{$user->id}}" />
                                <button type="submit" class="btn btn-default btn-sm">Remover Papel</button>
                                {!! Form::close() !!}
                            </td>
                          </tr>
                          @else

                            <tr class="danger">
                            <td>{{$role->name}}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'url' => '/papel/'.$role->id, 'style' => 'display: inline;']) !!}
                                <button type="submit" class="btn btn-default btn-sm">Visualizar Regras</button>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST', 'url' => 'adicionarpapel/'.$role->name, 'style' => 'display: inline;']) !!}
                                <input name="id" type="hidden" class="form-control" id="id" value="{{$user->id}}" />

                                <button type="submit" class="btn btn-default btn-sm">Adicionar Papel</button>
                                {!! Form::close() !!}
                            </td>
                          </tr>

                          @endif
                        @endforeach()
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
