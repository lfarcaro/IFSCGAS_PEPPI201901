<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

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
		$this->set('caminhoFotografias', Configure::read('Uploads.url_imagens') . 'fotografias/artigos/');
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
	
	 public function fotografiaAdd($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('ArtigoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		$fotografia = $this->request->data['fotografia'];
		if (!empty($fotografia['name'])) {

			// Obtém a maior ordem já inserida
			$query = $this->ArtigoFotografias->query();
			$maxOrdem = $query->select(['ordem' => $query->func()->max('ordem')])->where(['artigo_id' => $id])->first();

			$artigoFotografia = $this->ArtigoFotografias->newEntity();
			$artigoFotografia->artigo_id = $id;
			$artigoFotografia->ordem = ($maxOrdem ? $maxOrdem->ordem + 1 : 1);
			$artigoFotografia->nome_arquivo = $fotografia['name'];
			$artigoFotografia->caminho_arquivo = "";
			if ($this->ArtigoFotografias->save($artigoFotografia)) {
				$extensao = strtolower(pathinfo($fotografia['name'], PATHINFO_EXTENSION));
				$artigoFotografia->caminho_arquivo = $artigoFotografia->artigo_id . "_" . $artigoFotografia->id . "." . $extensao;
				@mkdir(Configure::read('Uploads.imagens') . 'fotografias/artigos', 0777, true);
				if (@move_uploaded_file($fotografia['tmp_name'], Configure::read('Uploads.imagens') . 'fotografias/artigos/' . $artigoFotografia->caminho_arquivo)) {
					if ($this->ArtigoFotografias->save($artigoFotografia)) {
						$success = true;
						$message = __('Sucesso');
					} else {
						@$this->ArtigoFotografias->delete($artigoFotografia);
						@unlink(Configure::read('Uploads.imagens') . 'fotografias/artigos/' . $artigoFotografia->caminho_arquivo);
						$message = __('Erro ao registrar arquivo');
					}
				} else {
					@$this->ArtigoFotografias->delete($artigoFotografia);
					@unlink(Configure::read('Uploads.imagens') . 'fotografias/artigos/'. $artigoFotografia->caminho_arquivo);
					$message = __('Erro ao mover arquivo');
				}
			} else {
				$message = __('Erro ao registrar fotografia');
			}
		} else {
			$message = __('Arquivo inválido');
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}
	
	public function fotografiaCima($id = null)
	{
		$this->request->allowMethod(['ajax']);
		$this->loadModel('ArtigoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$artigoFotografia = $this->ArtigoFotografias->get($id);

		// Busca todas as entidades
		$artigoFotografias = $this->ArtigoFotografias->find()->where(['artigo_id' => $artigoFotografia->artigo_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($artigoFotografias as $indice => $artigoFotografia) {
			if ($artigoFotografia->id == $id) {
				if ($indice > 0) {
					$ordemTemp = $artigoFotografias[$indice-1]->ordem;
					$artigoFotografias[$indice-1]->ordem = $artigoFotografias[$indice]->ordem;
					$artigoFotografias[$indice]->ordem = $ordemTemp;
					if ($this->ArtigoFotografias->save($artigoFotografias[$indice])) {
						if ($this->ArtigoFotografias->save($artigoFotografias[$indice-1])) {
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
		$this->loadModel('ArtigoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		// Busca entidade a ser movida
		$artigoFotografia = $this->ArtigoFotografias->get($id);

		// Busca todas as entidades
		$artigoFotografias = $this->ArtigoFotografias->find()->where(['artigo_id' => $artigoFotografia->artigo_id])->order(['ordem' => 'ASC'])->toArray();

		// Busca a entidade a ser movida no vetor
		foreach ($artigoFotografias as $indice => $artigoFotografia) {
			if ($artigoFotografia->id == $id) {
				if ($indice < (count($artigoFotografias)-1)) {
					$ordemTemp = $artigoFotografias[$indice+1]->ordem;
					$artigoFotografias[$indice+1]->ordem = $artigoFotografias[$indice]->ordem;
					$artigoFotografias[$indice]->ordem = $ordemTemp;
					if ($this->ArtigoFotografias->save($artigoFotografias[$indice])) {
						if ($this->ArtigoFotografias->save($artigoFotografias[$indice+1])) {
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
		$this->loadModel('ArtigoFotografias');

		$success = false;
		$message = __('Erro desconhecido');

		$artigoFotografia = $this->ArtigoFotografias->get($id);
		if ($this->ArtigoFotografias->delete($artigoFotografia)) {

			//@unlink(WEBSITE_IMAGE_PATH_ARTIGOSFOTOGRAFIAS . DS . $artigoFotografia->caminho_arquivo);

            $success = true;
			$message = __('Sucesso');
        } else {
			$message = __('Erro ao remover fotografia');
		}

		$this->set('result', compact('success', 'message'));
		$this->render('ajax');
	}
}
