@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Papeis <a class="pull-right" href="{{ url('/add/papel/') }}">Adicionar novo Papel</a> </div>

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
                          <tr>
                            <td>{{$role->name}}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'url' => '/papel/'.$role->id, 'style' => 'display: inline;']) !!}
                                <button type="submit" class="btn btn-default btn-sm">Visualizar Regras</button>
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
