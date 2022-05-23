@extends('admin.layouts.app')

@section('title', 'Detalhes do painel')

@section('content')
    <h1>Detalhes do Painel {{ $painel->dsc_nome_painel }} </h1>

    <ul>
        <li> Descrição: {{ $painel->dsc_descricao_painel }} </li>
        <li> Link: {{ $painel->dsc_link_painel }} </li>
    </ul>

    <form action="{{ route('paineis.destroy',$painel->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Excluir o Painel: {{ $painel->dsc_nome_painel }}</button>
    </form>
@endsection