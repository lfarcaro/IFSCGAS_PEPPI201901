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
class AdministradoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $administradores = $this->paginate($this->Administradores);

        $this->set(compact('administradores'));
    }

    /**
     * View method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrador = $this->Administradores->get($id, [
            'contain' => []
        ]);

        $this->set('administrador', $administrador);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrador = $this->Administradores->newEntity();
        if ($this->request->is('post')) {
            $administrador = $this->Administradores->patchEntity($administrador, $this->request->getData());
            
            if ($this->request->getData('senha1') == $this->request->getData('senha2')){
                $administrador->senha = $this->request->getData('senha1');
                if ($this->Administradores->save($administrador)) {
                    $this->Flash->success(__('The administrador has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The administrador could not be saved. Please, try again.'));     
            }else{
                $this->Flash->error(__('As senhas não coincidem.'));
            }
        }
        $this->set(compact('administrador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrador = $this->Administradores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrador = $this->Administradores->patchEntity($administrador, $this->request->getData());
            
            if (($this->request->getData('senha1') != "") || ($this->request->getData('senha2') != ""){
              if ($this->request->getData('senha1') == $this->request->getData('senha2')){
                $administrador->senha = $this->request->getData('senha1');
                
                if ($this->Administradores->save($administrador)) {
                    $this->Flash->success(__('The administrador has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                 $this->Flash->error(__('The administrador could not be saved. Please, try again.'));     
              } else {
                 $this->Flash->error(__('As senhas não coincidem.'));
              }

            }


            if ($salvar == true){
                if ($this->Administradores->save($administrador)) {
                    $this->Flash->success(__('The administrador has been saved.'));

                    return $this->redirect(['action' => 'index']);
                 }
                $this->Flash->error(__('The administrador could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('administrador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrador = $this->Administradores->get($id);
        if ($this->Administradores->delete($administrador)) {
            $this->Flash->success(__('The administrador has been deleted.'));
        } else {
            $this->Flash->error(__('The administrador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
