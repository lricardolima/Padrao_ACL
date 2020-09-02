@extends('layouts.app')
@section('title', 'Gestão de Usuários')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <h2>Gestão de Usuários</h2>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-start">
                            <a class="btn" id="btn-default" href="{{ route('user.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Usuário</a>
                        </div>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <table class="table table-striped mt-4 textMenu">
                            <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user -> name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="mr-3 btn btn-sm btn-outline-success" href="{{ route('user.edit' , ['user' => $user -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                        <a class="mr-3 btn btn-sm btn-outline-info" href="{{ route('user.roles' , ['user' => $user -> id]) }}"><i class="fa fa-user-o" aria-hidden="true"></i> Perfis</a>
                                        <form action="{{ route('user.destroy' , ['user' => $user -> id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Remover</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
