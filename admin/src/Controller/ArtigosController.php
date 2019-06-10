<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Artigos Controller
 *
 * @property \App\Model\Table\ArtigosTable $Artigos
 *
 * @method \App\Model\Entity\Artigo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtigosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Designers', 'Categorias']
        ];
		
		$usuario = $this->Auth->user();
		
		if($usuario['perfil'] == 'A'){
			$artigos = $this->paginate($this->Artigos);	
		}else if($usuario['perfil'] == 'D'){
			$artigos = $this->paginate($this->Artigos->findByDesignerId($usuario['id']));
		}
       
        $this->set(compact('artigos'));
    }

    /**
     * View method
     *
     * @param string|null $id Artigo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artigo = $this->Artigos->get($id, [
            'contain' => ['Designers', 'Categorias', 'ArtigoFotografias', 'LogContatodesigners', 'LogCustomizacoes']
        ]);

        $this->set('artigo', $artigo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artigo = $this->Artigos->newEntity();
        if ($this->request->is('post')) {
            $artigo = $this->Artigos->patchEntity($artigo, $this->request->getData());
			
			$usuario = $this->Auth->user();
			if($usuario['perfil'] == 'A'){
				$artigo->designer_id = $this->request->getData('designer_id');
			}else if($usuario['perfil'] == 'D'){
				$artigo->designer_id = $usuario['id'];
			}
			
			$artigo->criacao = time();
			$artigo->atualizacao = time();
			$artigo->numero_visualizacoes = 0;
			$artigo->numero_favoritacoes = 0;
			$artigo->numero_compartilhamentos = 0;
			
            if ($this->Artigos->save($artigo)) {
                $this->Flash->success(__('The artigo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigo could not be saved. Please, try again.'));
        }
        $designers = $this->Artigos->Designers->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'limit' => 200]);
        $categorias = $this->Artigos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'limit' => 200]);
        $this->set(compact('artigo', 'designers', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artigo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artigo = $this->Artigos->get($id, [
            'contain' => []
        ]);
		
		$usuario = $this->Auth->user();
		if($usuario['perfil'] == 'D'){
			if($artigo->designer_id != $usuario['id']){
				$this->Flash->error(__('O Artigo não pertence ao designer autenticado'));
				return $this->redirect(['action' => 'index']);
			}
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artigo = $this->Artigos->patchEntity($artigo, $this->request->getData());
			
			$artigo->atualizacao = time();
			
            if ($this->Artigos->save($artigo)) {
                $this->Flash->success(__('The artigo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artigo could not be saved. Please, try again.'));
        }
        $designers = $this->Artigos->Designers->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'limit' => 200]);
        $categorias = $this->Artigos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'limit' => 200]);
        $this->set(compact('artigo', 'designers', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artigo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {	
        $this->request->allowMethod(['post', 'delete']);
        $artigo = $this->Artigos->get($id);	
		
		$usuario = $this->Auth->user();
		if($usuario['perfil'] == 'D'){
			if($artigo->designer_id != $usuario['id']){
				$this->Flash->error(__('O Artigo não pertence ao designer autenticado'));
				return $this->redirect(['action' => 'index']);
			}
		}
		
		if ($this->Artigos->delete($artigo)) {
			$this->Flash->success(__('The artigo has been deleted.'));
		} else {
			$this->Flash->error(__('The artigo could not be deleted. Please, try again.'));
		}
		

        return $this->redirect(['action' => 'index']);
    }
	
	public function fotografiaIndex($id)
	{
		//$this->request->allowMethod(['ajax']);
		$this->loadModel('ArtigoFotografias');
		
		$artigoFotografias = $this->ArtigoFotografias->find()
		->where(['artigo_id' => $id])
		->order(['ordem' => 'ASC']);
		
		$this->set('result',$artigoFotografias);
		$this->render('ajax','ajax');
	}
}
