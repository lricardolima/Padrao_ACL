@extends('layouts.app')
@section('title', 'Perfis')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <h2>Perfis</h2>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content">
                            <a class="btn" id="btn-default" href="{{ route('role.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Perfil</a>
                        </div>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th>Perfil</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role -> name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="mr-3 btn btn-sm btn-outline-success" href="{{ route('role.edit' , ['role' => $role -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                        <a class="mr-3 btn btn-sm btn-outline-info" href="{{ route('role.permissions' , ['role' => $role -> id]) }}"><i class="fa fa-user-o" aria-hidden="true"></i> Permissões</a>
                                        <form action="{{ route('role.destroy' , ['role' => $role -> id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a> Remover</button>
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
