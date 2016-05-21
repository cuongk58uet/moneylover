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
		$wallets = $this->Wallet->find('first', array(
			'conditions' => array('Wallet.slug' => $slug),
			//'order' => array('Transaction.create_date' => 'desc')
			));
		//pr($wallets); exit;
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
				$this->Session->setFlash(' Ví chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
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

/**
* update_banlances method
*
*/
	public function update_banlances($id1, $id2, $amount){
		if($id1 != $id2){
			$wallet1 = $this->Wallet->findById($id1);
			$wallet2 = $this->Wallet->findById($id2);
			if(empty($wallet1) && empty($wallet2)){
				throw new NotFoundException(__('Không tìm thấy'));
			} else{
				$new_banlances1 = $wallet1['Wallet']['banlances'] - $amount;
				$this->Wallet->id = $id1;
				$this->Wallet->saveField('banlances', $new_banlances1);

				$new_banlances2 = $wallet2['Wallet']['banlances'] + $amount;
				$this->Wallet->id = $id2;
				$this->Wallet->saveField('banlances', $new_banlances2);
				return true;
			}
		} else{
			
			return true;
		}
		
	}

/**
* transfer_money method
*
*/
	public function transfer_money(){
		$user_info = $this->get_user();
		$sources = $this->Wallet->find('list', array(
			'conditions' => array('Wallet.user_id' => $user_info['id'])
			));
		//pr($wallet1); exit;
		$destinations = $this->Wallet->find('list', array(
			'conditions' => array('Wallet.user_id' => $user_info['id'])
			));
		if(!empty($this->request->data)){
			if($this->update_banlances($this->request->data['Wallet']['source_id'], $this->request->data['Wallet']['destination_id'], $this->request->data['Wallet']['amount'])){
					$this->Session->setFlash('Chuyển tiền thành công.', 'default', array('class' => 'alert alert-info'));
					return $this->redirect(array('action' => 'index'));
			} else{
				$this->Session->setFlash('Có lỗi xảy ra. Vui lòng thử lại', 'default', array('class' => 'alert alert-danger'));
			}
		}
		$this->set(compact('sources', 'destinations'));
	}
}
