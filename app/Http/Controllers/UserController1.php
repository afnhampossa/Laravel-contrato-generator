<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController1 extends Controller
{

//Meus dados

    public function edit(Request $request)
    {
        $debittype = User::find($request['id']);

        return view('users.edituser')->with(['debittype' => $debittype, 'msg' => '']);
    }



    public function update(Request $request)
    {
        try{
            $debittype = User::find($request['id']);
            $debittype->name = $request['name'];
            $debittype->cpf = $request['cpf'];
            $debittype->email = $request['email'];
            $debittype->endereco = $request['endereco'];
            $debittype->contato = $request['contato'];
            $debittype->cep = $request['cep'];
            $debittype->cidade = $request['cidade'];
            $debittype->save();

            return view('users.edituser')->with(['debittype' => $debittype, 'msg' => 'success']);
        }
        catch(\Exception $e){
            return view('users.edituser')->with(['debittype' => $debittype, 'msg' => 'error']);
        }
    }
//clientes





}
