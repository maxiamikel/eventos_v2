@extends('layouts.main')
@section('title', 'Lista de eventos do usuario')
@section('content')

<div class="col-md-10 offest-md-1" id="dashboard-title">
    <h2>Lista de eventos</h2>
</div>
<div class="col-md-10 offest-md-1" id="dashboard-container">
    @if(count($eventos) > 0 )

    @else
        <p>Usuario ainda n&atilde;o tem evento vinculado. <a href="/eventos/create">Adicionar seu eventos</a></p>
    @endif
</div>



@endsection