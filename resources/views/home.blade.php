@extends('layouts.main')
@section('title', 'Home')
@section('content')
<div id="search-container" class="col-md-12">
<h2>Encontrar um evento</h2>
        <form action="/" name="fsearch" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Digite a palavra a buscar" autocomplete="off">
        </form>
</div>
<div id="events-container" class="col-md-12">
@if($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Proximos eventos</h2>
        <p class="title-2">Veja os eventos </p>
    @endif
    <div id="cards-container" class="row">
        @foreach($eventos as $evento)
        <div class="card">
            <img class="card-img-top" id="card-img-top" src="/img/eventos/{{$evento->foto}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-date">Data do evento: {{date('d/m/Y', strtotime($evento->data_evento))}} {{$evento->hora_evento}}</p>
                <h6 class="card-title">{{$evento->titulo}}</h6>
                <p class="card-descriocao"> {{$evento->descripcao}} </p>
                <p class="publico">Convites: {{$evento->num_convidado - $evento->vendido - 7}} / {{$evento->num_convidado}}</p>
                <p class="publico">Status:
                    @if($evento->status == 0)
                       <span class="fechado">Fechado</span> 
                    @else
                        <span class="aberto"> Aberto</span>
                    @endif
                </p>
                <a href="/eventos/{{ $evento->id }}" class="btn btn-primary"><ion-icon name="list-outline"></ion-icon> Detalhes </a>
            </div>
        </div>
        @endforeach
        @if(count($eventos) == 0 && $search)
            <p><ion-icon name="information-circle-outline"></ion-icon> N&atilde;o encontramos nenhum evento com o {{$search}} </p>
        @elseif(count($eventos) == 0 )
            <p><ion-icon name="information-circle-outline"></ion-icon> N&atilde;o tem evento dispon&iacute;vel!</p>
        @endif
    </div>
</div>
@endsection
