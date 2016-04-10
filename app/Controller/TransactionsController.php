<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class TransactionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user_info = $this->get_user();
		$this->Transaction->recursive = 0;
		$this->paginate = array(
			'order' => array('create_date' => 'desc'),
			'limit' => 10,
			'conditions' => array('Transaction.user_id' => $user_info['id']),
			'paramType' => 'querystring'
			);
		$this->Paginator->settings = $this->paginate;
		$this->set('transactions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transaction->exists($id)) {
			throw new NotFoundException(__(' Không tìm thấy trang bạn yêu cầu.'));
		}
		$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
		$this->set('transaction', $this->Transaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash('Lưu giao dịch thành công.', 'default', array('class' => 'alert alert-info'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Giao dịch chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
			}
		}
		$user_info = $this->get_user();
		$wallets = $this->Transaction->Wallet->find('list',array(
			'fields' => 'wallet_name',
			'conditions' => array('user_id' => $user_info['id'])
			));

		$categories = $this->Transaction->Category->find('list');
		$users = $this->Transaction->User->find('list',array(
			'conditions' => array('id' => $user_info['id'])));
		$this->set(compact('wallets', 'categories','users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transaction->exists($id)) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transaction->save($this->request->data)) {
				//pr($this->request->data); exit;
				$this->Session->setFlash('Lưu giao dịch thành công.', 'default', array('class' => 'alert alert-info'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Giao dịch chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
			$this->request->data = $this->Transaction->find('first', $options);
		}
		$user_info = $this->get_user();
		$wallets = $this->Transaction->Wallet->find('list',array(
			'fields' => 'wallet_name',
			'conditions' => array('user_id' => $user_info['id'])
			));
		
		$categories = $this->Transaction->Category->find('list');
		$this->set(compact('wallets', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transaction->delete()) {
			$this->Session->setFlash('Giao dịch đã được xóa', 'default', array('class' => 'alert alert-info'));
		} else {
			$this->Session->setFlash('Giao dịch chưa được xóa. Vui lòng thử lại.', 'default', array('class' => 'alert alert-info'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
