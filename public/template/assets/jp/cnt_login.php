<?php
  include_once '../../class/db.php';
  include_once '../../class/initial.php';
  include_once '../../class/usuario.php';

  $usuario = new Usuario($db); 

  $saida='0';

  if(!empty($_POST['selecionar'])) {
      if ($_POST["selecionar"]=="login") {

        $email=$_POST['email'];
        $pass=$_POST['password'];
        
        if($usuario->existe_email($email)==1){  

           $usuario->getUser($email);
           if($usuario->key == md5($pass)){

              session_start();   
              $_SESSION['email']= $email;
              $_SESSION['nome']=$usuario->nome;
              $_SESSION['apelido']=$usuario->apelido;
              $_SESSION['pass']= $pass;

              $saida= "ok";

           }else 
              $saida= "off2";

        } else $saida="off1";

      }   
      if ($_POST["selecionar"]=="cadastro") {

          $usuario->nome = $_POST['nome'];
          $usuario->apelido = $_POST['apelido'];
          $usuario->dataNasc = $_POST['dataNasc'];
          $usuario->key = $_POST['password'];
          $usuario->homem = $_POST['homem'];
          $usuario->beatmaker = $_POST['beatmaker'];
          $usuario->compositor = $_POST['compositor'];
          $usuario->produtor = $_POST['produtor'];
          $usuario->design = $_POST['design'];
          $usuario->email = $_POST['email'];

          $saida=$usuario->create();
        //  $saida=$usuario->existe_email("chimbinde@yahoo.com");
         

      } 
  }

  echo $saida;

?>