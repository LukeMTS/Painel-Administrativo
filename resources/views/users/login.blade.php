@extends('layouts.app')

@section('title')
Registro de Usuários
@endsection

@section('content')
<div class="mt-5 d-flex justify-content-center">
    <div class="card">
        <h5 class="card-header col">Login</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('user.login') }}">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control mb-4" name="email" placeholder="admin@admin.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Senha:</label>
                        <input type="password" name="password" class="form-control mb-4" placeholder="*****" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="w-50  btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection