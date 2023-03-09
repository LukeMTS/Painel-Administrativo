@extends('layouts.app')

@section('title')
    Registro de Usuários
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Login</h2>
                <hr>
                    <form method="POST" action="{{ route('user.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Senha:</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
