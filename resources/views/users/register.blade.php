@extends('layouts.app')

@section('title')
    Registro de Usuários
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Formulário de Cadastro de Usuários</h2>
                <hr>
                <form method="POST" action="{{ route('user.insert') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Data de Aniversário:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Número:</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Senha:</label>
                        <input type="password" name="password" required>
                
                        <label for="password_confirmation">Confirme a senha:</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
