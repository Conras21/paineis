@extends('admin.layouts.app')

@section('title', 'Inserir novo painel')

@section('content')
    <h1>Inserir novo painel</h1>

    <form action=" {{ route('paineis.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.partials.forms')
    </form>
@endsection