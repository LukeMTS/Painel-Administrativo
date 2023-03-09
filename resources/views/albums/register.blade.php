@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Formulário de Cadastro de Álbuns</h2>
                <hr>
                <form method="POST" action="{{ route('album.insert') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <input type="text" class="form-control" id="profile" name="profile" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo de Álbum</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Selecione...</option>
                            <option value="image">Imagem</option>
                            <option value="video">Vídeo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_id">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id" required>
                            <option value="">Selecione o Cliente</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagem_principal">Imagem Principal</label>
                        <input type="file" class="form-control-file" id="imagem_principal" name="main_image"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="date_inclusion">Data de Inclusão</label>
                        <input type="date" class="form-control" id="date_inclusion" name="date_inclusion" required>
                    </div>
                    <div class="form-group">
                        <label for="situation_id">Situação</label>
                        <select class="form-control" id="situation_id" name="situation_id" required>
                            <option value="">Selecione...</option>
                            @foreach($albumSituations as $situation)
                                <option value="{{ $situation->id }}">{{ $situation->situation }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
