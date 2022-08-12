{{$slot}}

<form action="{{route('site.contato')}}" method="POST">
@csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    @if($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
     {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key => $motivo)
         <option value="{{$motivo->id}}" {{old('motivo_contatos_id') == $motivo->id ? 'selected':''}}>{{$motivo->motivo_contato}}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
   
    <br>
    <textarea name="mensagem" class="{{$classe}}">
    @if(old('mensagem') != '')
        {{old('mensagem')}}
    @else
        Preencha aqui a sua mensagem
    @endif
    </textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>


@if($errors->any())
<div style="position:absolute;top:0px;left:0px;width:100%;background-color:red;"> 
    @foreach($errors->all() as $erro)
        {{$erro}}
        <br>
    @endforeach
</div>
@endif


