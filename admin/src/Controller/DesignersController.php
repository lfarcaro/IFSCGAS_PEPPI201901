<?php
namespace App\Controller;


use App\Controller\AppController;
use Cake\Core\Configure;
/**
 * Designers Controller
 *
 * @property \App\Model\Table\DesignersTable $Designers
 *
 * @method \App\Model\Entity\Designer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DesignersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $designers = $this->paginate($this->Designers);

        $this->set(compact('designers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $designer = $this->Designers->newEntity();
        if ($this->request->is('post')) {
            $designer = $this->Designers->patchEntity($designer, $this->request->getData());
			$designer->email = $this->request->getData('email');
            $designer->inscricao = time();
            $designer->atualizacao = time();
            $designer->aprovado = true;

            $senha = $this->request->getData('senha');
            $confirmacaoSenha = $this->request->getData('confirmacao_senha');
            if($senha === $confirmacaoSenha && ($senha !== "" && $confirmacaoSenha !== "")){
                $designer->senha = $this->request->getData('senha');
                if ($this->Designers->save($designer)) {
                    $this->Flash->success(__('The designer has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }else{
                $this->Flash->error(__('As senhas não coincidem'));
            }
            $this->Flash->error(__('The designer could not be saved. Please, try again.'));
        }
        $this->set(compact('designer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Designer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $designer = $this->Designers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $designer = $this->Designers->patchEntity($designer, $this->request->getData());

			$salvar = true;

			if(($this->request->getData('senha1') != "") || ($this->request->getData('senha2') != "")){
				if($this->request->getData('senha1') == $this->request->getData('senha2')){
					$designer->senha = $this->request->getData('senha1');
				}else{
					$this->Flash->error(__('As senhas não coincidem'));
					$salvar = false;
				}
			}
			
			if(!empty($_FILES['fotografia']['name'])){
			$nomearquivo = $designer->id . '.' . pathinfo($_FILES['fotografia']['name'], PATHINFO_EXTENSION);
			$uploadfile = Configure::read('Uploads.imagens') . 'fotografias/designers/' . $nomearquivo;
			if(!move_uploaded_file($_FILES['fotografia']['tmp_name'], $uploadfile)){
				$this->Flash->error(__('Falha ao salvar fotografia'));
				$salvar = false;
			}
			$designer->caminho_fotografia = $nomearquivo;
			}
			if($salvar==true){
				$designer->atualizacao = time();
				if ($this->Designers->save($designer)) {
					$this->Flash->success(__('The designer has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('The designer could not be saved. Please, try again.'));
			}
		}
        $this->set(compact('designer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Designer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $designer = $this->Designers->get($id);
        if ($this->Designers->delete($designer)) {
            $this->Flash->success(__('The designer has been deleted.'));
        } else {
            $this->Flash->error(__('The designer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
