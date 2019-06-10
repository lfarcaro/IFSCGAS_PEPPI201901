<?php
include('conexao.php');

/**
* 
*/
class ModContato
{
	private $para = "bruno.hjandrade@gmail.com";

	function validaEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	function enviarContato(string $stNome
						  ,string $stEmail
						  ,string $stTelefone
						  ,string $stCelular
						  ,bool $blCelularWhatsapp
						  ,string $stMensagem){
	$retorno = false;
		
	if ($this->validaEmail($stEmail)){
		$headers = "From: $para\r\n" .
				   "Reply-To: $stEmail\r\n" .
				   "X-Mailer: PHP/" . phpversion() . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  
	  	mail($para, "Contato", nl2br($stMensagem), $headers);

	  	$conexao = new conexao();
		$con = $conexao->connect();
		$sql = 'insert into log_contatos set datahora, nome, email, telefone, celular, celular_whatsapp, mensagem values (CURRENT_TIMESTAMP, :nome, :email, :telefone, :celular, :celular_whatsapp, :mensagem)';
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':nome', $stNome);
		$stmt->bindParam(':email', $stEmail);
		$stmt->bindParam(':telefone', $stTelefone);
		$stmt->bindParam(':celular', $stCelular);
		$stmt->bindParam(':celular_whatsapp', $blCelularWhatsapp);
		$stmt->bindParam(':mensagem', $stMensagem);
		$stmt->execute();
		return $stmt->rowCount()>0;
	}
	
	return $retorno;

	}

}

/*
enviarContato(in stNome:string, in stEmail:string, in stTelefone:string, in stCelular:string, in blCelularWhatsapp:boolean, in stMensagem:string): boolean
*/