@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="card my-3">
        <h5 class="card-header col">Cadastro de Álbuns</h5>
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
                <form action="{{ route('album.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-3">
                            <label for="perfil">Perfil</label>
                            <input value="{{ $album->profile }}" type="text" class="form-control" id="profile"
                                name="profile" required>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="type">Tipo de Álbum</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">Selecione...</option>
                                <option {{ $album->type == 'image' ? 'selected' : '' }} value="image">Imagem</option>
                                <option {{ $album->type == 'video' ? 'selected' : '' }} value="video">Vídeo</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="customer_id">Cliente</label>
                            <select class="form-control" id="customer_id" name="customer_id" required>
                                <option value="">Selecione o Cliente</option>
                                @foreach ($customers as $customer)
                                    <option {{ $album->customer_id == $customer->id ? 'selected' : '' }}
                                        value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="title">Título</label>
                            <input value="{{ $album->title }}" type="text" class="form-control" id="title"
                                name="title" required>
                        </div>
                        <div class="form-group  col-12">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description" required>{{ $album->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="main_image">Imagem Principal</label><br><br>
                            <input type="file" class="form-control-file" id="main_image" name="main_image">
                            <br><br>
                            <img width="150" src="{{ asset('images/' . $multimedia) }}" alt="Product Image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-4">
                            <label for="situation_id">Situação</label>
                            <select class="form-control" id="situation_id" name="situation_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($albumSituations as $situation)
                                    <option {{ $album->situation_id == $situation->id ? 'selected' : '' }}
                                        value="{{ $situation->id }}">{{ $situation->situation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn w-100 btn-primary">Atualizar</button>
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
