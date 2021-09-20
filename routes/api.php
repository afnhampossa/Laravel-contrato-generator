<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Conta;
use App\Credito;
use App\Debito;
use App\Ganho;
use App\Historico;
use App\Notification;


/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Config para o Aplicativo */

// LOGIN
Route::post('login', function (Request $request) {
    
    if($request->input('email') == null 
    || $request->input('password') == null ) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
    
    
    
    $user = User::where('email',$request->input('email'))->first();
    
    if($user != null){
        
            if($user->user_type == "nautorizado"){
                
                                            return response()->json([
            'status' => 'error',
            'message' => "A sua conta ainda se encontra em aguardo da aprovação!",
            'code' => 401,
                                ], 401);
            }
            else if($user->user_type == "Administrador"){
                
                                            return response()->json([
            'status' => 'error',
            'message' => "O administrador não tem permissão ao aplicativo!",
            'code' => 401,
                                ], 401);
            }
            // SUCESSO 
            else if(Hash::check($request->input('password'), $user->password)){
                
                $historico = Historico::where('iduser',$user->id)->orderBy('created_at', 'desc')->get();
                $conta = Conta::where('iduser',$user->id)->first();
                
                        return response()->json([
            'status' => 'success',
            'message' => 'Perfil do usuario',
            'perfil' => $user,
            'historico' => $historico,
            'carteira' => $conta,
            'code' => 200,
                                ], 200);
            }
            
            else{
                                return response()->json([
            'status' => 'error',
            'message' => "Senha inválida!",
            'code' => 401,
                                ], 401);
            }

    
    } else{
                return response()->json([
        'status' => 'error',
        'message' => "Usuário não encontrado!",
        'code' => 401,
                            ], 401);
        
    }
    
});

// REGISTRO
Route::post('registro', function (Request $request) {
    
    if($request->input('email') == null 
    || $request->input('password') == null 
    || $request->input('name') == null 
    || $request->input('contato') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
        $user_exists = User::where('email',$request->input('email'))->first();
        if($user_exists != null){
                return response()->json([
            'status' => 'error',
            'message' => "Este email já foi usado por outro usuário!",
            'code' => 401,
                                ], 401);
        }
        
    
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->contato = $request['contato'];
            $user->password = bcrypt($request['password']);
            $user->user_type = "nautorizado";
            $user->cpf = "-";
            $user->endereco = "-";
            $user->profissao = "-";
            $user->complemento = "-";
            $user->cep = "-";
            $user->municipio = "-";
            $user->estado = "-";

            if($user->save()){
                
            $note = new Notification();

            $note->iduser = 0;
            $note->assunto = 'Acaba de registrar-se no aplicativo';
            $note->valor = 0;
            $note->estado = '0';
            $note->nome = $request['name'];
            $note->save();
                
                return response()->json([
        'status' => 'success',
        'message' => 'Registrado com sucesso! Brevemente autorizaremos a sua conta',
        'code' => 200,
                            ], 200);
            } else {
                return response()->json([
        'status' => 'error',
        'message' => "Erro ao registrar!",
        'code' => 401,
                            ], 401);
            }
            
    
});

// CARTEIRA OU CONTA E HISTORICO - EXTRATO GERAL
Route::post('extratoGeral', function (Request $request) {
    
    
                $historico = Historico::where('iduser',$request['id'])->orderBy('created_at', 'desc')->get();
                $conta = Conta::where('iduser',$request['id'])->first();


        return response()->json([
        'status' => 'success',
        'message' => 'Carteira e Historico',
        'historico' => $historico,
        'carteira' => $conta,
        'code' => 200,
                            ], 200);

            
    
});

// CARTEIRA OU CONTA E HISTORICO - EXTRATO POR INTERVALO DE DATA
Route::post('extrairPorIntervalo', function (Request $request) {
    
$from = $request['dataDe'];
$to = $request['dataAte'];
                $historico= Historico::where('iduser',$request['id'])->whereBetween('created_at', [$from.' 00:00:00',$to.' 23:59:59'])->orderBy('created_at', 'desc')
        ->get();
                $conta = Conta::where('iduser',$request['id'])->first();


        return response()->json([
        'status' => 'success',
        'message' => 'Carteira e Historico Por Intervalo de Datas',
        'historico' => $historico,
        'carteira' => $conta,
        'code' => 200,
                            ], 200);

            
    
});

// SOLICITAR SAQUE OU DEPOSITO
Route::post('pedirSaqueOuDeposito', function (Request $request) {
    
        if($request->input('valor') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
            $note = new Notification();

            $note->iduser = $request['id'];
            $note->assunto = $request['assunto'];
            $note->valor = $request['valor'];
            $note->estado = '0';
            $note->nome = $request['nome'];
            $note->save();


        return response()->json([
        'status' => 'success',
        'message' => 'Solicitação feita com sucesso! Brevemente entraremos em contato consigo.',
        'code' => 200,
                            ], 200);

});

// GUARDAR DEVICE TOKEN
Route::post('setarDeviceToken', function (Request $request) {
    
                $user = User::find($request['id']);
                $user->device_token = $request['device_token'];
                $user->save();


        return response()->json([
        'status' => 'success',
        'message' => 'Device Token Setado - FCM', 
        'code' => 200,
                            ], 200);

            
    
});

// ACTUALIZAR PERFIL
Route::post('updatePerfil', function (Request $request) {
    
            if($request->input('valor') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha o campo!",
            'code' => 401,
                                ], 401);
    }
    
                $user = User::find($request['id']);
                $variavel = $request['atributo'];
                
                $user->$variavel = $request['valor'];
                
                
                

        if($user->save()){
             $user = User::where('id',$request->input('id'))->first();
                    return response()->json([
        'status' => 'success',
        'message' => 'Actualizado com sucesso', 
        'perfil' => $user,
        'code' => 200,
                            ], 200);
        } else {
                    return response()->json([
        'status' => 'error',
        'message' => 'Erro ao actualizar', 
        'code' => 401,
                            ], 401);
        }



            
    
});






