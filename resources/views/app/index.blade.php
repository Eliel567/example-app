@extends('layouts.app')

@section('content')
  <h1>Bem-vindo ao Infinite 🚀</h1>
  <a href="{{ route('tela1') }}">Ir para Tela 1</a> |
  <a href="{{ route('tela2') }}">Ir para Tela 2</a>
@endsection
