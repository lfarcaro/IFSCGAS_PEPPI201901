<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

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

                if (!empty($_FILES['capa']['name'])){
                    $nomearquivo = $desfile->id . '.' . pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
                    $uploadfile = Configure::read('Uploads.imagens') . 'desfiles/capa/' . $nomearquivo;
                    if (move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile)){
                        $desfile->caminho_capa = $nomearquivo;

                        if ($this->Desfiles->save($desfile)) {
                            $this->Flash->success(__('The desfile has been saved.'));
                            return $this->redirect(['action' => 'index']);
                        }
                    } else {
                        $this->Flash->error(__('Falha ao salvar a imagem de capa'));
                    }        
                } else {
                     $this->Flash->success(__('The desfile has been saved.'));
                     return $this->redirect(['action' => 'index']);
                }
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
            
            $salvar = true;

            if (!empty($_FILES['capa']['name'])){
                $nomearquivo = $desfile->id . '.' . pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
                $uploadfile = Configure::read('Uploads.imagens') . 'desfiles/capa/' . $nomearquivo;
                if (move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile)){
                    $desfile->caminho_capa = $nomearquivo;
                }else{
                    $this->Flash->error(__('Falha ao salvar a imagem de capa'));
                    $salvar = false;
                }
            }

            if($salvar == true){
                if ($this->Desfiles->save($desfile)) {
                    $this->Flash->success(__('The desfile has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Falha ao salvar a imagem de capa'));
            }
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
    public function fotografiaIndex($id){
    	//$this->request->allowMethod(['ajax']);
    	$this ->loadModel('DesfileFotografias');

    	$desfileFotografias = $this->DesfileFotografias->find()
    		->where(['desfile_id' =>$id])
    		->order(['ordem' => 'ASC']);
    	$this-> set('result', $desfileFotografias);
    	$this-> render('ajax', 'ajax');

    }

/*
*delete method
*/
	public function fotografiaExcluir($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('DesfileFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		$desfileFotografia = $this->DesfileFotografias->get($id);
		if ($this->DesfileFotografias->delete($desfileFotografia)) {

			//@unlink(WEBSITE_IMAGE_PATH_ARTIGOSFOTOGRAFIAS . DS . $desfileFotografia->caminho_arquivo);

            $success = true;
			$message = __('Sucesso');
        } else {
			$message = __('Erro ao remover fotografia');
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}
	

	//fotografia para cima

	    public function fotografiaCima($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('DesfileFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$desfileFotografia = $this->DesfileFotografias->get($id);

		// Busca todas as entidades
		$desfileFotografias = $this->DesfileFotografias->find()->where(['artigo_id' => $desfileFotografia->desfile_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($desfileFotografias as $indice => $desfileFotografia) {
			if ($desfileFotografia->id == $id) {
				if ($indice > 0) {
					$ordemTemp = $desfileFotografias[$indice-1]->ordem;
					$desfileFotografias[$indice-1]->ordem = $desfileFotografias[$indice]->ordem;
					$desfileFotografias[$indice]->ordem = $ordemTemp;
					if ($this->desfileFotografias->save($desfileFotografias[$indice])) {
						if ($this->DesfileFotografias->save($desfileFotografias[$indice-1])) {
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
		$this->loadModel('DesfileFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$desfileFotografia = $this->desfileFotografias->get($id);

		// Busca todas as entidades
		$desfileFotografias = $this->desfileFotografias->find()->where(['desfile_id' => $desfileFotografia->desfile_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($desfileFotografias as $indice => $desfileFotografia) {
			if ($desfileFotografia->id == $id) {
				if ($indice < (count($desfileFotografias)-1)) {
					$ordemTemp = $desfileFotografias[$indice+1]->ordem;
					$desfileFotografias[$indice+1]->ordem = $desfileFotografias[$indice]->ordem;
					$desfileFotografias[$indice]->ordem = $ordemTemp;
					if ($this->desfileFotografias->save($desfileFotografias[$indice])) {
						if ($this->DesfileFotografias->save($desfileFotografias[$indice+1])) {
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
}
    