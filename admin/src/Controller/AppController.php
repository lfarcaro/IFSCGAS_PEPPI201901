<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        // Carrega componente de autenticação
        $this->loadComponent('Auth', [
            'authenticate' => 'Dual',
            'loginAction' => ['controller' => 'Authentication', 'action' => 'login'],
            'unauthorizedRedirect' => '/'
        ]);
    }

    // Permissões de administradores
    private static $permissoesAdministrador = [
        'Authentication/login',
        'Administradores/principal',
		'Administradores/index',
		'Administradores/edit',
		'Administradores/add',
		'Administradores/delete',	
		'Designers/index',
		'Designers/edit',
		'Designers/add',
		'Designers/delete',		
		'Categorias/index',
		'Categorias/edit',
		'Categorias/add',
		'Categorias/delete',	
		'Artigos/index',
		'Artigos/edit',
		'Artigos/add',
		'Artigos/delete',
		'Artigos/fotografiaIndex',
		'Artigos/fotografiaAdd',
		'Artigos/fotografiaCima',
		'Artigos/fotografiaBaixo',
		'Artigos/fotografiaExcluir',
		'Desfiles/index',
		'Desfiles/edit',
		'Desfiles/add',
		'Desfiles/delete',
        'Desfiles/fotografiaIndex',  
		'Projetos/index',
		'Projetos/edit',
		'Projetos/add',
		'Projetos/fotografiaIndex',
		'Projetos/delete',
		'Paginas/index',
		'Paginas/edit'
    ];

    // Permissões de designers
    private static $permissoesDesigner = [
        'Authentication/login',
        'Designers/principal',
		'Designers/edit',
		
		'Artigos/index',
		'Artigos/edit',
		'Artigos/add',
		'Artigos/delete',
		'Artigos/fotografiaIndex',
		'Artigos/fotografiaAdd',
		'Artigos/fotografiaCima',
		'Artigos/fotografiaBaixo',
		'Artigos/fotografiaExcluir'
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Obtém dados da requisição
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        $controlleraction = $controller . "/" . $action;
        // Obtém usuário logado
        $usuario = $this->Auth->user();
        if ($usuario !== null) {
            // Verifica o perfil do usuário
            if ($usuario['perfil'] == 'A') {// Administrador
                if (!in_array($controlleraction, self::$permissoesAdministrador)) {
                    $this->Flash->error(__('You are not authorized to access {0}.', $controlleraction));
                    return $this->redirect(['controller' => 'Authentication', 'action' => 'login']);
                }
                $this->set(compact('usuario'));
            } else if ($usuario['perfil'] == 'D') { // Designer
                if (!in_array($controlleraction, self::$permissoesDesigner)) {
                    $this->Flash->error(__('You are not authorized to access {0}.', $controlleraction));
                    return $this->redirect(['controller' => 'Authentication', 'action' => 'login']);
                }
                $this->set(compact('usuario'));
            } else {
                $this->Flash->error(__("The authenticated user's profile is not supported."));
                return $this->redirect(['controller' => 'Authentication', 'action' => 'login']);
            }
        } else if ($controlleraction !== 'Authentication/login') {
            return $this->redirect(['controller' => 'Authentication', 'action' => 'login']);
        }
    }
}
