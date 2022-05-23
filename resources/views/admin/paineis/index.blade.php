@extends('admin.layouts.app')

@section('title', 'Paineis MDR')

@section('content')
    <a href="{{ route('paineis.create') }}">Inserir novo painel</a>
    <hr>

    {{-- Mostra a messagem de exclusão do painel caso ocorra --}}
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('paineis.search') }}" method="get">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar">
        <button type="submit">Pequisar</button>
    </form>

    <h1> Painéis </h1>

    @foreach ($paineis as $paineis)
        <p>
            <img src="{{ url("storage/{$paineis->image}") }}" alt="{{ $paineis->dsc_nome_painel }}">
            {{ $paineis->dsc_nome_painel }} [ <a href="{{ route('paineis.show', $paineis->id) }}">Detalhes</a> ]
            [ <a href=" {{ route('paineis.edit', $paineis->id) }} ">Editar</a> ]
        </p>
    @endforeach


@endsection