@extends('layouts.main')
@section('title', 'Adicionar novo evento')
@section('content')
<div class="container col-md-4 offest-md-3" id="form-container">
<div id="messageAviso"></div>
<h2>Criar novo evento</h2>
    <form action="/eventos" method="POST" name="novoEvento" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="titulo">Titulo: </label>
                <input type="text" name="txtTitulo" autocomplete="off" class="form-control" id="titulo" placeholder="Titulo do evento" >
            </div>
            <div class="form-group">
                <label for="desctipcao">Desctip&ccedil;&atilde;o</label>
                <textarea name="txtDescripcao" autocomplete="off" class="form-control" id="descricao" col="10" placeholder="Breve descrip&ccedil;&atilde;o do evento" ></textarea>
            </div>
            <div class="form-group">
                <label for="dataEvento">Data do evento: </label>
                <input type="date" name="txtDateEvento" id="" class="form-control">
                <input type="time" name="txtHoraEvento" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="endereco">Endere&ccedil;o do evento: </label>
                <select name="endereco_id" class="form-control">
                    <option value="0">Selecione o c&oacute;digo do endere&ccedil;o</option>
                    @foreach($enderecos as $endereco)
                        <option value="{{$endereco->id}}">{{$endereco->logaduro}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="txtStatus"  id="titulo" value="1" >
                <input type="hidden" name="txtDataPublicacao"  id="titulo" value="<?php echo now(); ?>" >
                
            </div>
            <div class="form-group">
                <label for="participante">N&uacute;mero de participantes</label>
                <input type="number" name="txtParticipante" class="form-control" id="descricao" placeholder="Breve descrip&ccedil;&atilde;o do evento" >
            </div>
            <div class="form-group">
                <label for="caricatura">Seleciona a caricatura do evento: </label>
                <input type="file" name="caricatura" class="form-data-control" id="caricatura" >
            </div>
            <div class="form-group-control">
            <input type="button" name="custo" class="btn btn-segundary" id="btn" value='Salvar no banco' onClick="validarForm()" > 
            </div>
        </form>
    </div>
@endsection