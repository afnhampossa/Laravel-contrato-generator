<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PDF;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::where('id' ,'!=','1')->get();
        // $users = User::all();

        return view('users.listuser')->with(['users' => $users, 'msg' => '']);
    }


    public function create(){
      return view('users.storeuser')->with('msg', '');
    }

    public function contratopdf(Request $request){
      $user = User::find($request['id']); 
      $filename = 'template/contratos/' . str_random(15).$user->name.'.pdf';
      $user->save();

      $pdf = PDF::loadView('users.contrato_pdf', ['user' => $user])->setPaper('a4', 'portrait');
      $content = $pdf->output();
      $user->contrato = $filename;
      $user->save();
      file_put_contents($filename, $content);
      //  return response()->download($filename);
      return $pdf->stream($filename);
    }

    //Credito
    function contratopdf1(Request $request){
      $user = User::find($request['id']);
      $pdf = PDF::loadView('users.contrato_pdf', ['user' => $user])->setPaper('a4', 'portrait');
      $filename = 'Contrato';
      return $pdf->stream($filename. '.pdf');
    }


    public function store(Request $request){
        try{
            $users = User::all();
            $user = new User();
            $user->name = $request['name'];
            $user->data_nascimento = $request['data_nascimento'];
            $user->endereco = $request['endereco'];
            $user->numero = $request['numero'];
            $user->email = $request['email'];
            $user->cidade = $request['cidade'];
            $user->cpf = $request['cpf'];
            $user->rg = $request['rg'];
            $user->contato = $request['contato'];
            $user->responsavel = $request['responsavel'];
            $user->responsavel_rg = $request['responsavel_rg'];
            $user->responsavel_cpf = $request['responsavel_cpf'];
            $user->curso = $request['curso'];
            $user->forma_pagamento = $request['forma_pagamento'];
            $user->dia_vencimente = $request['dia_vencimente'];

            $user->save();
            return view('users.storeuser')->with(['msg' => 'success']);
    }
    catch(Exception $ex){
        return view('users.storeuser')->with('msg', 'error');
    }
    }

    public function edit(){
      return view('users.changePass')->with(['msg' => '']);
    }
    public function editcliente(Request $request)
    {
      $user = User::find($request['id']);
      return view('users.editcliente')->with(['user' => $user, 'msg' => '']);
    }

    public function update(Request $request){
        $user = User::where(['email' =>$request['email']])->first();
        if(Hash::check($request['password'], $user->password)){
            if($request['newPassword'] == $request['confirmPassword']){
                $user->password = bcrypt($request['newPassword']);
                $user->name = $request['name'];
                $user->save();
                return view('users.changePass')->with(['msg' => 'success']);
            }
            else {
                return view('users.changePass')->with(['msg' => 'notMatch']);
            }
        }
        else {
            return view('users.changePass')->with(['msg' => 'passIncorrect']);
        }
    }

    public function updatecliente(Request $request){
      $user = User::find($request['id']); 

      $user->name = $request['name'];
      $user->data_nascimento = $request['data_nascimento'];
      $user->endereco = $request['endereco'];
      $user->numero = $request['numero'];
      $user->email = $request['email'];
      $user->endereco = $request['endereco'];
      $user->cidade = $request['cidade'];
      $user->cpf = $request['cpf'];
      $user->rg = $request['rg'];
      $user->contato = $request['contato'];
      $user->responsavel = $request['responsavel'];
      $user->responsavel_rg = $request['responsavel_rg'];
      $user->responsavel_cpf = $request['responsavel_cpf'];
      $user->curso = $request['curso'];
      $user->forma_pagamento = $request['forma_pagamento'];
      $user->dia_vencimente = $request['dia_vencimente'];
      $user->save();
      return view('users.editcliente')->with(['user' => $user,'msg' => 'success']);
  


    }

    public function destroy(Request $request){
        $user = User::find($request['id']);
        $user->delete();

        $users = User::all()->sortByDesc('id');
        return view('users.listuser')->with(['users' => $users, 'msg' => 'success']);

    }
    public function confirmdelete(Request $request){
        $user = User::find($request['id']);

        $users = User::all()->sortByDesc('id');
        $userss = $user->id;
        return view('users.listuser')->with(['users' => $users,'userss' => $userss, 'msg' => 'confirm']);
    }

  
}
