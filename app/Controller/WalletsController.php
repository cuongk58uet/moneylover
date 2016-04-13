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
	public $components = array('Paginator', 'Flash', 'Security', 'Session','Tool');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user_info = $this->get_user();
		$this->Wallet->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->paginate = array(
			'order' => array('wallet_name' => 'asc'),
			'limit' => 10,
			'conditions' => array('user_id' => $user_info['id'] ),
			'paramType' => 'querystring'
			);
		
		$this->set('wallets', $this->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$wallets = $this->Wallet->find('first', array('conditions' => array('Wallet.slug' => $slug)));
		if (!$wallets) {
			throw new NotFoundException(__(' Không tìm thấy trang bạn yêu cầu'));
		} else{
			$this->set('wallet', $wallets);
		}
		
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
				$this->Session->setFlash('Lưu thành công.', 'default', array('class' => 'alert alert-info'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(' Ví chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-info'));
			}
		}
		$user_info = $this->get_user();
		$users = $this->Wallet->User->find('list',array(
			'conditions' => array('id' => $user_info['id'])
			));
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($slug = null) {
		if (!$this->Wallet->find('first', array('conditions' => array('Wallet.slug' => $slug)))) {
			throw new NotFoundException(__(' Không tìm thấy trang bạn yêu cầu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Wallet->save($this->request->data)) {
				$this->Session->setFlash(' Lưu thành công.', 'default', array('class' => 'alert alert-info'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Ví chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $this->Wallet->find('first', array('conditions' => array('Wallet.slug' => $slug)));
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
			throw new NotFoundException(__('Không tìm thấy trang bạn yêu cầu'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Wallet->delete()) {
			$this->Session->setFlash('Xóa thành công.', 'default', array('class' => 'alert alert-info'));
		} else {
			$this->Session->setFlash(' Ví chưa được Xóa. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function update_banlances($id, $amount, $string){
		$this->Wallet->id = $id;
		$banlances = 0;
		if(strlen($string) == 7 || strlen($string) == 8){
			$banlances = $this->Wallet->banlances - $amount;
		} else{
			$banlances = $this->Wallet->banlances + $amount;
		}
		if($this->Wallet->saveField('banlances',$banlances)){
			return true;
		} else{
			return false;
		}
	}
}
