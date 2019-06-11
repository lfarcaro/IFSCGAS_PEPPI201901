<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 *
 * @method \App\Model\Entity\Projeto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjetosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $projetos = $this->paginate($this->Projetos);

        $this->set(compact('projetos'));
    }
	
	public function fotografiaIndex($id)
    {
     //$this->request-allowMethod(['post','delete']);
	 //$projetos = $this->Projetos->get($id);
	 $this->loadModel('ProjetoFotografias');
	 
	 $projetoFotografias = $this->ProjetoFotografias->find()
		->where(['projeto_id' => $id])
		->order(['ordem' => 'ASC']);
	 
	 $this->set('result',$projetoFotografias);
	 
	 $this->render('ajax','ajax');

    }
	 public function fotografiaCima($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('ProjetoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$projetoFotografia = $this->ProjetoFotografias->get($id);

		// Busca todas as entidades
		$projetoFotografias = $this->ProjetoFotografias->find()->where(['projeto_id' => $artigoFotografia->projeto_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($projetoFotografias as $indice => $projetoFotografia) {
			if ($projetoFotografia->id == $id) {
				if ($indice > 0) {
					$ordemTemp = $projetoFotografias[$indice-1]->ordem;
					$projetoFotografias[$indice-1]->ordem = $projetoFotografias[$indice]->ordem;
					$projetoFotografias[$indice]->ordem = $ordemTemp;
					if ($this->ProjetoFotografias->save($projetoFotografias[$indice])) {
						if ($this->ProjetoFotografias->save($projetoFotografias[$indice-1])) {
							$success = true;
							$message = __('Sucesso');
						} else {
							$message = __('Erro ao salvar entidade próxima');
						}
					} else {
						$message = __('Erro ao salvar entidade próxima');
					}
				} else {
					$success = true;
					$message = __('Sucesso');
				}
				break;
			}
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}

    public function fotografiaBaixo($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('ProjetoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$projetoFotografia = $this->ProjetoFotografias->get($id);

		// Busca todas as entidades
		$projetoFotografias = $this->ProjetoFotografias->find()->where(['projeto_id' => $artigoFotografia->projeto_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($projetoFotografias as $indice => $projetoFotografia) {
			if ($projetoFotografia->id == $id) {
				if ($indice < (count($projetoFotografias)-1)) {
					$ordemTemp = $projetoFotografias[$indice+1]->ordem;
					$projetoFotografias[$indice+1]->ordem = $projetoFotografias[$indice]->ordem;
					$projetoFotografias[$indice]->ordem = $ordemTemp;
					if ($this->ProjetoFotografias->save($projetoFotografias[$indice])) {
						if ($this->ProjetoFotografias->save($projetoFotografias[$indice+1])) {
							$success = true;
							$message = __('Sucesso');
						} else {
							$message = __('Erro ao salvar entidade próxima');
						}
					} else {
						$message = __('Erro ao salvar entidade próxima');
					}
				} else {
					$success = true;
					$message = __('Sucesso');
				}
				break;
			}
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}


	public function fotografiaExcluir($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('ProjetoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		$projetoFotografias = $this->ProjetoFotografias->get($id);
		if ($this->ProjetoFotografias->delete($projetoFotografias)) {

			//@unlink(WEBSITE_IMAGE_PATH_ARTIGOSFOTOGRAFIAS . DS . $projetoFotografias->caminho_arquivo);

            $success = true;
			$message = __('Sucesso');
        } else {
			$message = __('Erro ao remover fotografia');
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projetos->newEntity();
        if ($this->request->is('post')) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
        }
        $this->set(compact('projeto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projeto = $this->Projetos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
        }
        $this->set(compact('projeto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        if ($this->Projetos->delete($projeto)) {
            $this->Flash->success(__('The projeto has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
}
