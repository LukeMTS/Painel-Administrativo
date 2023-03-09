@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Albuns</h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                    <tr>
                        <td>{{ $album->title }}</td>
                        <td>{{ $album->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection