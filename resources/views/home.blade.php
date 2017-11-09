@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

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
                            <th>Email</th>
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{!! Form::open(['method' => 'POST', 'url' => '/papeisdousuario/'.$user->id, 'style' => 'display: inline;']) !!}
                                <button type="submit" class="btn btn-default btn-sm">Visualizar Papeis</button>
                                {!! Form::close() !!}</td>
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
