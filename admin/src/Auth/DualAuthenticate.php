<?php
namespace App\Auth;

use Cake\Auth\FormAuthenticate;
use Cake\Http\Response;
use Cake\Http\ServerRequest;

use App\Model\Entity\Administrador;
use App\Model\Entity\Designer;

class DualAuthenticate extends FormAuthenticate
{
    public function authenticate(ServerRequest $request, Response $response)
	{
        $email = $request->data['email'];
        $senha = $request->data['senha'];

		// Tenta autenticar como designer
        $table = $this->getTableLocator()->get("Designers");
		$designer = $table->findByEmail($email, [ 'limit' => 1 ])->first();
        if ($designer !== null) {
			if ($senha === $designer->senha) {
				$usuario = [
					'id' => $designer->id,
					'email' => $designer->email,
					'nome' => $designer->nome,
					'perfil' => 'D'
				];
				return $usuario;
			}
        }

		// Tenta autenticar como administrador
        $table = $this->getTableLocator()->get("Administradores");
		$administrador = $table->findByEmail($email, [ 'limit' => 1 ])->first();
        if ($administrador !== null) {
			if ($senha === $administrador->senha) {
				$usuario = [
					'id' => $administrador->id,
					'email' => $administrador->email,
					'nome' => $administrador->nome,
					'perfil' => 'A'
				];
				return $usuario;
			}
        }

		// Falha na autenticação
        return null;
    }
}
