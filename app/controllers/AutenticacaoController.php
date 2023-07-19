<?php
use models\Usuario;

class AutenticacaoController {

    function index(){
        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("login", $send);
    }

	function logar(){

		$model = new Usuario();
		#busca o usuario pelo email e senha
		$user = $model->findByEmailAndSenha($_POST["email"],  $_POST["senha"]);

		#validacao
		$requeridos = ["email"=>"Email é obrigatório e deve ser válido",
		"senha"=>"É obrigatório o uso de senha"];
		foreach($requeridos as $field=>$msg){
			#verifica se o campo está vazio
			if (!validateRequired($_POST,$field)){
				setValidationError($field, $msg);
			}
		}
		
		#se alguma validação tiver falhado
		if (count($_SESSION['errors'])){
			setFlash("error","Falha ao realizar login.");
			#volta para a página que estava
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}

		if ($user != null){
			#se encontrar salva na sessao
			$_SESSION['user'] = $user;
			redirect("usuarios");
		} else {
			#caso contrario, manda para o login novamente
			$send = ["msg"=>"Login ou senha inválida"];
			render("login", $send);
		}
	}
	
	function logout(){
        session_destroy();
        redirect("autenticacao");
    }


}
