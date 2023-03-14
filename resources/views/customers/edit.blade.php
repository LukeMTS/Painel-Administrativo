@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edição de Cliente</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <hr>
                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Nome de usuário:</label>
                        <input type="text" value="{{ $customer->username }}" class="form-control" id="username"
                            name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Nome Completo:</label>
                        <input type="text" value="{{ $customer->fullname }}" class="form-control" id="fullname"
                            name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" value="{{ $customer->cpf }}" class="form-control" id="cpf"
                            name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="rg">RG:</label>
                        <input type="text" value="{{ $customer->rg }}" class="form-control" id="rg" name="rg"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Data de Nascimento:</label>
                        <input type="date" value="{{ $customer->birthdate }}" class="form-control" id="birthdate"
                            name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" value="{{ $customer->email }}" class="form-control" id="email"
                            name="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">Cidade:</label>
                            <input type="text" value="{{ $customer->address()->first()->city }}" class="form-control"
                                id="city" name="city" placeholder="Digite a cidade">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">Estado:</label>
                            <select id="state" name="state"
                                class="form-control">
                                <option selected>Escolher...</option>
                                <option {{ $customer->address->state == 'AC' ? 'selected' : '' }}>AC</option>
                                <option {{ $customer->address->state == 'AL' ? 'selected' : '' }}>AL</option>
                                <option {{ $customer->address->state == 'AP' ? 'selected' : '' }}>AP</option>
                                <option {{ $customer->address->state == 'AM' ? 'selected' : '' }}>AM</option>
                                <option {{ $customer->address->state == 'BA' ? 'selected' : '' }}>BA</option>
                                <option {{ $customer->address->state == 'CE' ? 'selected' : '' }}>CE</option>
                                <option {{ $customer->address->state == 'DF' ? 'selected' : '' }}>DF</option>
                                <option {{ $customer->address->state == 'ES' ? 'selected' : '' }}>ES</option>
                                <option {{ $customer->address->state == 'GO' ? 'selected' : '' }}>GO</option>
                                <option {{ $customer->address->state == 'MA' ? 'selected' : '' }}>MA</option>
                                <option {{ $customer->address->state == 'MT' ? 'selected' : '' }}>MT</option>
                                <option {{ $customer->address->state == 'MS' ? 'selected' : '' }}>MS</option>
                                <option {{ $customer->address->state == 'MG' ? 'selected' : '' }}>MG</option>
                                <option {{ $customer->address->state == 'PA' ? 'selected' : '' }}>PA</option>
                                <option {{ $customer->address->state == 'PB' ? 'selected' : '' }}>PB</option>
                                <option {{ $customer->address->state == 'PR' ? 'selected' : '' }}>PR</option>
                                <option {{ $customer->address->state == 'PE' ? 'selected' : '' }}>PE</option>
                                <option {{ $customer->address->state == 'PI' ? 'selected' : '' }}>PI</option>
                                <option {{ $customer->address->state == 'RJ' ? 'selected' : '' }}>RJ</option>
                                <option {{ $customer->address->state == 'RN' ? 'selected' : '' }}>RN</option>
                                <option {{ $customer->address->state == 'RS' ? 'selected' : '' }}>RS</option>
                                <option {{ $customer->address->state == 'RO' ? 'selected' : '' }}>RO</option>
                                <option {{ $customer->address->state == 'RR' ? 'selected' : '' }}>RR</option>
                                <option {{ $customer->address->state == 'SC' ? 'selected' : '' }}>SC</option>
                                <option {{ $customer->address->state == 'SP' ? 'selected' : '' }}>SP</option>
                                <option {{ $customer->address->state == 'SE' ? 'selected' : '' }}>SE</option>
                                <option {{ $customer->address->state == 'TO' ? 'selected' : '' }}>TO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zipcode">CEP:</label>
                            <input type="text" value="{{ $customer->address->zipcode }}" name="zipcode"
                                class="form-control" id="zipcode" placeholder="Digite o CEP">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="street">Rua:</label>
                            <input type="text" value="{{ $customer->address->street }}" name="street"
                                class="form-control" id="street" placeholder="Digite a Rua">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="number">Número:</label>
                            <input type="text" value="{{ $customer->address->number }}" name="number"
                                class="form-control" id="number" placeholder="Digite o Número">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="complement">Complemento:</label>
                            <input type="text" value="{{ $customer->address->complement }}" name="complement"
                                class="form-control" id="complement" placeholder="Digite o Complemento">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_type_id">Perfil</label>
                        <select class="form-control" id="profile_type_id" name="profile_type_id" required>
                            <option value="">Selecione o Perfil</option>
                            @foreach ($profileTypes as $profile)
                                <option {{ $customer->profiles->profile_type_id == $profile->id ? 'selected' : '' }}
                                    value="{{ $profile->id }}">{{ $profile->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="profile">Nome de usuário do perfil:</label>
                        <input type="text" value="{{ $customer->profiles->username }}" name="profile" class="form-control"
                            id="profile" placeholder="Digite o nome de usuario">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="url">URL:</label>
                        <input type="text" value="{{ $customer->profiles->url }}" name="url" class="form-control"
                            id="url" placeholder="Digite o CEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="last_access">Último acesso:</label>
                        <input type="date" value="{{ $customer->profiles->last_access }}" class="form-control" id="last_access" name="last_access" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Celular:</label>
                        <input type="tel" value="{{ $customer->phone }}" class="form-control" id="phone"
                            name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
