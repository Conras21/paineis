@extends('admin.layouts.app')

@section('title', 'Editar painel')

@section('content')
    <h1>Editar o painel <strong>{{ $painel->dsc_nome_painel }}</strong></h1>
    {{--        Verificar se todos os campos estão preenchidos e exibir mensagem de erro   --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action=" {{ route('paineis.update', $painel->id) }} " method="post" enctype="multipart/form-data">
        @method('put')
        @include('admin.partials.forms')
    </form>
@endsection