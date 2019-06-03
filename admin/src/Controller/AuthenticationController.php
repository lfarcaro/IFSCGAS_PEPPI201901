<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Administradores Controller
 *
 * @property \App\Model\Table\AdministradoresTable $Administradores
 *
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthenticationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function login(){
		
		$this->Auth->logout();
		
        if($this->request->is('post')){
            $usuario = $this->Auth->identify();
            if($usuario !=null){  
                if($usuario['perfil'] =='A'){
                    $this->Auth->setUser($usuario);
                    return $this->redirect(['controller' => 'Administradores', 'action'=> 'principal']);
                }else if($usuario['perfil'] =='D'){
                    $this->Auth->setUser($usuario);
                    return $this->redirect(['controller' => 'Designers', 'action'=> 'principal']);
                }
            }else{
                $this->Flash->error(__('Your e-mail or password is incorrect.'));  
            }
        }
		$this->render('login','login');
    }
	
}
