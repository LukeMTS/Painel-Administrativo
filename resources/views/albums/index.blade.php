@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                <div class="d-flex justify-content-between mt-5">
                <h2>Albuns</h2>
                    @can('add')
                            <a href="{{ route('album.register') }}" class="btn btn-info">Adicionar</a>
                    @endcan
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <td>{{ $album->title }}</td>
                                <td>{{ $album->description }}</td>
                                <td>
                                    @can('edit')
                                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-warning">Editar</a>
                                    @endcan
                                    @can('delete')
                                        <a href="{{ route('album.destroy', $album->id) }}" class="btn btn-danger">Excluir</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
