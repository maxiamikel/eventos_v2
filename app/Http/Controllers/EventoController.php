<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\Endereco;
use App\Models\User;

class EventoController extends Controller
{
    public function index()
    {
        $search = request('search');
        if($search)
        {
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }
        else
        {
           $eventos = Evento::all(); 
        }
        return view('home',['eventos' => $eventos,'search' => $search]);
    }

    public function create()
    {
        $enderecos = Endereco::all();
        return view('eventos.create',['enderecos' => $enderecos]);
    }

    public function store(Request $request)
    {
        $evento = new Evento();

        $evento->titulo = $request->txtTitulo;
        $evento->descripcao = $request->txtDescripcao;
        $evento->id_endereco = $request->endereco_id;
        $evento->status = $request->txtStatus;
        $evento->num_convidado = $request->txtParticipante;
        $evento->data_publicacao = $request->txtDataPublicacao;
        $evento->data_evento = $request->txtDateEvento;
        $evento->hora_evento = $request->txtHoraEvento;
        $user = auth()->user();
        $evento->id_user = $user->id;
        if($request->hasFile('caricatura') && $request->file('caricatura')->isValid())
        {
            $requestCaricatura = $request->caricatura;
            $extensionCaricatura = $requestCaricatura->extension();
            $nomeCaricatura = md5($requestCaricatura->getClientOriginalName(). strtotime("now")). ".".$extensionCaricatura;
           // $imageName = md5($requestImage->getClientOriginalName().strtotime("now"). "." . $extensionImage);
            $requestCaricatura->move(public_path('img/eventos'), $nomeCaricatura);
            $evento->foto = $nomeCaricatura; 
        }
        $evento->save();
        return redirect('/')->with('msg','Registro de evento criado com sucesso');
    }

    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        $userEvento = User::where('id', $evento->id_user)->first()->toArray();
        $idEndereco = $evento->id_endereco;
        $endereco = Endereco::findOrFail($idEndereco);
        return view('eventos.show', ['evento' => $evento, 'endereco'=> $endereco,'userEvento'=>$userEvento]);
    }

    public function getEventsUser()
    {
        $user = auth()->user();
        $eventos = $user->eventos;
        return view('eventos.dashboard',['eventos' => $eventos]);
    }

    public function reservar($id)
    {
        $evento = Evento::findOrFail($id);
        return view('reservas.reservar',['id' =>$id, 'evento' => $evento]);
    }

}
