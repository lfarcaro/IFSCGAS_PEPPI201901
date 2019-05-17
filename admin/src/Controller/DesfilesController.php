<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Desfiles Controller
 *
 * @property \App\Model\Table\DesfilesTable $Desfiles
 *
 * @method \App\Model\Entity\Desfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DesfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $desfiles = $this->paginate($this->Desfiles);

        $this->set(compact('desfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Desfile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $desfile = $this->Desfiles->get($id, [
            'contain' => ['DesfileFotografias']
        ]);

        $this->set('desfile', $desfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $desfile = $this->Desfiles->newEntity();
        if ($this->request->is('post')) {
            $desfile = $this->Desfiles->patchEntity($desfile, $this->request->getData());
            if ($this->Desfiles->save($desfile)) {
                $this->Flash->success(__('The desfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The desfile could not be saved. Please, try again.'));
        }
        $this->set(compact('desfile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Desfile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $desfile = $this->Desfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $desfile = $this->Desfiles->patchEntity($desfile, $this->request->getData());
            if ($this->Desfiles->save($desfile)) {
                $this->Flash->success(__('The desfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The desfile could not be saved. Please, try again.'));
        }
        $this->set(compact('desfile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Desfile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $desfile = $this->Desfiles->get($id);
        if ($this->Desfiles->delete($desfile)) {
            $this->Flash->success(__('The desfile has been deleted.'));
        } else {
            $this->Flash->error(__('The desfile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
