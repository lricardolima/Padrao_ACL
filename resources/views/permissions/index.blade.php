@extends('layouts.app')
@section('title', 'Permissões')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <h2>Permissões</h2>

                    <div class="card-body">
                        
                        @if (session('message'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-start">
                            <a class="btn mr-2" id="btn-default" href="{{ route('permission.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Permissão</a>
                        </div>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <table class="table table-striped textMenu mt-4">
                            <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission -> name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="mr-3 btn btn-sm btn-outline-success" href="{{ route('permission.edit' , ['permission' => $permission -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                        <form action="{{ route('permission.destroy' , ['permission' => $permission -> id]) }}" method="post">
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
