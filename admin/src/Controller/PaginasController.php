<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paginas Controller
 *
 * @property \App\Model\Table\PaginasTable $Paginas
 *
 * @method \App\Model\Entity\Pagina[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaginasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $paginas = $this->paginate($this->Paginas);

        $this->set(compact('paginas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pagina id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagina = $this->Paginas->get($id, [
            'contain' => []
        ]);

        $this->set('pagina', $pagina);
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Pagina id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagina = $this->Paginas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagina = $this->Paginas->patchEntity($pagina, $this->request->getData());
            if ($this->Paginas->save($pagina)) {
                $this->Flash->success(__('The pagina has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagina could not be saved. Please, try again.'));
        }
        $this->set(compact('pagina'));
    }

 
}
