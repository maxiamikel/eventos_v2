@extends('layouts.main')
@section('title', 'SGE, {{$evento->titulo}}')
@section('content')

<div class="col-md-10 offest-md-1" id="show-container">
    <div class="row">
        <div class="col-md-6" id="image-container">
            <img src="/img/eventos/{{$evento->foto}}" class="img-fluid" alt="{{$evento->titulo}}" />
        </div>
        <div class="col-md-6" id="show-info">
            <h1>{{$evento->titulo}}</h1>
            <div id="data-evento">
                <div id="data1">
                    <span>Publicado em :{{ now() }}</span>
                </div> 
                <div id="data1">
                    <p class="card-date">Data e hora do evento: {{date('d/m/Y',strtotime($evento->data_evento))}} &aacute;s 20:00:00</p>
                </div>
            </div>
            <h3>Sobre o evento</h3>
            <p class="card-descriocao"> {{$evento->descripcao}} </p>
            <p>Enders&ccedil;o: {{$endereco->tipo_endereco}},   {{$endereco->logaduro}}, {{$endereco->numero}} <ion-icon name="navigate-circle-outline"></ion-icon></p>
            <p>CEP: {{$endereco->cep}}</p>
            <p>Bairro: {{$endereco->bairro}}</p>
            <p>Cidade: {{$endereco->cidade}}-{{$endereco->estado}}</p>
            <p class="publico">Quantidade de convites:  {{$evento->num_convidado}}</p>
            <p class="publico">Ingressos disponiveis: {{$evento->num_convidado - $evento->vendido}} / {{$evento->num_convidado}}</p>
            <p class="publico">Status: 
            @if($evento->status == 0)
                       <span class="status0">Fechado</span> 
                    @else
                        <span class="status1"> Aberto</span>
                    @endif
            </p>
            
            <div class="col-md-6" id="col-md-6">
                @if($evento->num_convidado > $evento->vendido)
                    <a href="/reservas/{{$evento->id}}" class="btn btn-primary">Reservar</a>
                @else
                    <a href="/"><ion-icon name="arrow-back-outline"></ion-icon></a>
                @endif
            </div>
         </div>
    </div>
    
</div>
@endsection