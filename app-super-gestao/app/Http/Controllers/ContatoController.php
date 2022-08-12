<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();*/

        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */

        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){
       $request->validate([
        'nome'=>'required|min:3|max:40|unique:site_contatos',
        'telefone'=>'required',
        'email'=>'email',
        'motivo_contatos_id'=>'required',
        'mensagem'=>'required|max:2000',
       ],
    [
       'nome.required' => 'O campo nome precisa ser preenchido',
       'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
       'nome.max' => 'O campo nome precisa ter menos de 40 caracteres' ,
       'nome.unique' => 'O nome cadastrado já está em nosso banco de dados',
       'telefone.required' => 'O número de telefone é obrigatório',
       'email.email' => 'Email inválido',
       'motivo_contatos_id.required' => 'O motivo do contato é obrigatório',
       'mensagem.required' => 'A mensagem é obrigatória',
       'mensagem.max' => 'A mensagem só pode ter até 2000 caracteres'     
    ]);

       SiteContato::create($request->all());

       return redirect()->route('site.index');
    }
}

