@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<div class="card my-3">
    <h5 class="card-header col">Cadastro de Álbum</h5>
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
            <form method="POST" action="{{ route('album.insert') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-md-3">
                        <label for="perfil">Perfil</label>
                        <input type="text" class="form-control" id="profile" name="profile" required>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="type">Tipo de Álbum</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Selecione...</option>
                            <option value="image">Imagem</option>
                            <option value="video">Vídeo</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="customer_id">Cliente</label>
                        <select class="form-control" id="customer_id" name="customer_id" required>
                            <option value="">Selecione o Cliente</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group  col-12">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-12">
                        <label for="imagem_principal">Imagem Principal</label><br><br>
                        <input type="file" class="form-control-file" id="imagem_principal" name="main_image" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-4">
                        <label for="situation_id">Situação</label>
                        <select class="form-control" id="situation_id" name="situation_id" required>
                            <option value="">Selecione...</option>
                            @foreach($albumSituations as $situation)
                            <option value="{{ $situation->id }}">{{ $situation->situation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-12 col-md-6">
                        <button type="submit" class="btn w-100 btn-primary">Enviar</button>
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