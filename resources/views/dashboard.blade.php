@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
@if($customers->count() > 0)
  <table class="table table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome Completo</th>
          <th scope="col">Situação do Cliente</th>
          <th scope="col">Título do Álbum</th>
          <th scope="col">Situação do Álbum</th>
        </tr>
      </thead>
      <tbody>
      @foreach($customers as $customer)
        <tr>
          <th scope="row">1</th>
          <td>{{ $customer->fullname }}</td>
          <td>{{ $customer->customers_situations->situation }}</td>
          <td>{{ $customer->albums ? $customer->albums->title : "Não há" }}</td>
          <td>{{ $customer->albums ? $customer->albums->albums_situations->situation : "Não há" }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @else
  <div class="text-center mt-5">
    <h3 class="text-right">Não há Clientes Registrados no momento</h3>   
  </div>
  
  @endif
  @endsection