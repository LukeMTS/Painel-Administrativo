@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-between mt-5">
                    <h2>Clientes</h2>
                    @can('add')
                        <a href="{{ route('customer.register') }}" class="btn btn-info">Adicionar</a>
                    @endcan
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->fullname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    @can('edit')
                                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning">Editar</a>
                                    @endcan
                                    @can('delete')
                                        <a href="{{ route('customer.destroy', $customer->id) }}"
                                            class="btn btn-danger">Excluir</a>
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
