<?php
App::uses('AppController', 'Controller');
/**
 * Wallets Controller
 *
 * @property Wallet $Wallet
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SecurityComponent $Security
 * @property SessionComponent $Session
 */
class WalletsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Security', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user_info = $this->get_user();
		$wallets = $this->paginate();
		$wallets = $this->Wallet->find('all',array(
			'recursive' => 0,
			'conditions' => array('user_id' => $user_info['id'] )
			));
		$this->set('wallets', $wallets);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Wallet->exists($id)) {
			throw new NotFoundException(__('Invalid wallet'));
		}
		$options = array('conditions' => array('Wallet.' . $this->Wallet->primaryKey => $id));
		$this->set('wallet', $this->Wallet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wallet->create();
			if ($this->Wallet->save($this->request->data)) {
				$this->Flash->success(__('The wallet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The wallet could not be saved. Please, try again.'));
			}
		}
		$users = $this->Wallet->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Wallet->exists($id)) {
			throw new NotFoundException(__('Invalid wallet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Wallet->save($this->request->data)) {
				$this->Flash->success(__('The wallet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The wallet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Wallet.' . $this->Wallet->primaryKey => $id));
			$this->request->data = $this->Wallet->find('first', $options);
		}
		$users = $this->Wallet->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Wallet->id = $id;
		if (!$this->Wallet->exists()) {
			throw new NotFoundException(__('Invalid wallet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Wallet->delete()) {
			$this->Flash->success(__('The wallet has been deleted.'));
		} else {
			$this->Flash->error(__('The wallet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
