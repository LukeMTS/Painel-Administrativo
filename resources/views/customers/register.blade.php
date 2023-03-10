@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<div class="card my-3">
    <h5 class="card-header col">Cadastro de clientes</h5>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <div class="row px-5">
            <form action="{{ route('customer.insert') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-md-3">
                        <label for="username">Nome de usuário:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label for="fullname">Nome Completo:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-3">
                        <label for="rg">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg" required>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="birthdate">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-4">
                        <label for="street">Rua:</label>
                        <input type="text" name="street" class="form-control" id="street" placeholder="Digite o CEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="number">Número:</label>
                        <input type="text" name="number" class="form-control" id="number" placeholder="Digite o CEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="complement">Complemento:</label>
                        <input type="text" name="complement" class="form-control" id="complement" placeholder="Digite o CEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zipcode">CEP:</label>
                        <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Digite o CEP">
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="city">Cidade:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade">
                    </div>
                    <div class="form-group col-12 col-md-2">
                        <label for="state">Estado:</label>
                        <select id="state" name="state" class="form-control">
                            <option selected>Escolher...</option>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                        </select>
                    </div>


                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-2">
                        <label for="profile_type_id">Perfil</label>
                        <select class="form-control" id="profile_type_id" name="profile_type_id" required>
                            <option value="">Selecione o Perfil</option>
                            @foreach($profileTypes as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-2">
                        <label for="profile">Usuário do perfil</label>
                        <input type="text" name="profile" class="form-control" id="profile" placeholder="@cliente123">
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="url">URL:</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="https://redesocial.com/cliente123">
                    </div>
                    <div class="form-group col-12 col-md-2">
                        <label for="last_access">Último acesso:</label>
                        <input type="date" class="form-control" id="last_access" name="last_access" required>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="phone">Celular:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-12 col-md-6">
                        <button type="submit" class="btn w-100 btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('style')
.form-group {
margin: 20px 0px;
}
@endsection