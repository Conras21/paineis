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

@csrf
<input type="file" name="image" id="image">
<input type="text" name="dsc_nome_painel" id="dsc_nome_painel" placeholder="Nome do Painel" value="{{ $painel->dsc_nome_painel  ?? old('dsc_nome_painel')}}">
<textarea name="dsc_descricao_painel" id="dsc_descricao_painel" cols="10" rows="10" placeholder="Descrição do Painel"> {{ $painel->dsc_descricao_painel ?? old('dsc_descricao_painel')}} </textarea>
<input type="text" name="dsc_link_painel" id="dsc_link_painel" placeholder="Link do Painel" value="{{ $painel->dsc_link_painel ?? old('dsc_link_painel')}}">
<button type="submit">Enviar</button>
