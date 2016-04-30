<?php
App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
App:: uses('BlowfishPasswordHasher' , 'Controller/Component/Auth' );
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SecurityComponent $Security
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session','Tool');
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user_info = $this->get_user();
		$this->User->recursive = 1;
		$this->paginate = array(
			'Transaction' => array(
				//'order' => array('create_date' => 'desc'),
				'limit' => 5,
				'conditions' => array('Transaction.user_id' => $user_info['id']),
				'paramType' => 'querystring'
			),
			'Wallet' => array(
				'limit' => 5,
				'conditions' => array('Wallet.user_id' => $user_info['id']),
				'paramType' => 'querystring'
			),
			'conditions' => array('User.id' => $user_info['id'])
			);
		$this->Paginator->settings = $this->paginate;
		$this->set('transactions', $this->paginate('Transaction'));
		$this->set('wallets', $this->paginate('Wallet'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view() {
		/*if (!$this->User->exists($id)) {
			throw new NotFoundException(__(' Không tìm thấy trang'));
		}*/
		//$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$users = $this->get_user();
		$this->set('user', $this->User->findById($users['id']));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$location = null;
		if ($this->request->is('post')) {
			$this->User->create();
			if($this->User->validates()){
				if(strcmp($this->request->data['User']['password'], $this->request->data['User']['confirm_password']) == 0){
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash(' Tài khoản đã được lưu.', 'default', array('class' => 'alert alert-info'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(' Tài khoản chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
					}
				} else{
					$this->Session->setFlash('Xác nhận mật khẩu không đúng', 'default', array('class' => 'alert alert-danger'));
					unset($this->request->data['User']['password']);
					unset($this->request->data['User']['confirm_password']);
				}	
			}
		}
	}

/**
 * uploadFile method
 *
 * @throws NotFoundException
 * @param void
 * @return void
 */
	
	private function uploadFile(){
		$file = new File($this->request->data['User']['avatar']['tmp_name']);
		$file_name = $this->request->data['User']['avatar']['name'];
		if($file->copy(APP.'webroot/img/'.$file_name)){
			return true;
		} else {
			return false;
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Không tìm thấy trang'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(' Tài khoản đã được xóa.', 'default', array('class' => 'alert alert-danger'));
		} else {
			$this->Session->setFlash(' Tài khoản chưa được xóa. Vui lòng thử lại', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
		parent:: beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add','forgot','confirm');
		
	}

	public function login() {
		if ($this->request->is('post' )) {
			if ($this->Auth->login()) {
			return $this->redirect($this->Auth->redirectUrl());
		} else{
			$this->Session->setFlash('Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại','default', array('class'=>'alert alert-danger'),'auth');
		}
		
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function change_info(){
		$user_info = $this->get_user();
		//pr($user_info); exit;
		$save = true;
		$location = $user_info['avatar'];
		if($this->request->is(array('post', 'put'))){
			//pr($this->request->data); exit;
			$this->User->set($this->request->data);
			if($this->User->validates()){
				if(!empty($this->request->data['User']['avatar']['name']) && $this->request->data['User']['avatar']['error']== 0){
					if($this->uploadFile()){
						$location = '/img/'.$this->request->data['User']['avatar']['name'];
						$this->request->data['User']['avatar'] = $location;
						//pr($this->request->data); exit;
						$data = array(
							'fullname' => $this->request->data['User']['fullname'],
							'address' => $this->request->data['User']['address'],
							'avatar' => $this->request->data['User']['avatar'],
							'role' => $this->request->data['User']['role'],
							);
						} else{
							$this->Session->setFlash('Ảnh chưa được lưu. Vui lòng thử lại.', 'default', array('class' => 'alert alert-danger'));
							$save = false;
						}
					} 
				else{
					$user_data = $this->User->findById($user_info['id']);
					$current_avatar = $user_data['User']['avatar'];
					$this->request->data['User']['avatar'] = $current_avatar;
					$data = array(
							'fullname' => $this->request->data['User']['fullname'],
							'address' => $this->request->data['User']['address'],
							'avatar' => $this->request->data['User']['avatar'],
							'role' => $this->request->data['User']['role'],
							);
				}
				
				$this->User->id = $user_info['id'];
				if($save){
					if($this->User->save($data)){
						$this->Session->setFlash('Cập nhật thành công', 'default', array('class'=>'alert alert-info'));
						$this->redirect($this->referer());
					} else{
						$this->Session->setFlash('Có lỗi xảy ra. Vui lòng thử lại', 'default', array('class'=>'alert alert-danger'));
						}
				} else{
					$this->set('errors',$this->User->validationErrors);
				}
			} 
		}else{
			$this->request->data = $this->User->findById($user_info['id']);
		}
	}


	public function change_password(){
		if($this->request->is('post')) {
			$this->User->set($this->request->data);
			if($this->User->validates()){
				if(strcmp($this->request->data['User']['password'],$this->request->data['User']['confirm_password']) == 0) {
					$user_info = $this->get_user();
					// $this->User->id = $user_info['id'];
					if($this->update_password($user_info['id'])) {
						$this->Session->setFlash('Đã lưu thành công', 'default', array('class' => 'alert alert-info'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('Có lỗi xảy ra. Vui lòng thử lại', 'default', array('class'=> 'alert alert-danger'));
					}

				} else{
					$this->Session->setFlash('Xác nhận mật khẩu không đúng', 'default', array('class' => 'alert alert-danger'));
				}
				
			} else{
				//$this->set->('errors',$this->User->validationErrors);
			}
		}
	}

	public function forgot(){
		if($this->request->is('post')){
			$user = $this->User->findByEmail($this->request->data['User']['email']);
			if(!empty($user)){
				$code = $this->Tool->generate_code();
				$link_confirm = 'http://localhost/cakephp/xac-nhan/'.$code;
				$this->User->id = $user['User']['id'];
				$this->User->saveField('code',$code);
				$this->Session->setFlash('Vui lòng truy cập đường link sau để lấy lại mật khẩu - '.$link_confirm, 'default', array('class' => 'alert alert-info'));

			} else{
				$this->Session->setFlash('Email chưa được đăng kí', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function confirm($code = null){
		$confirm = false;
		if(!empty($code)){
			$user = $this->User->findByCode($code);
			if(!empty($user)){
				$confirm = true;
				if($this->request->is('post')){
					$this->User->set($this->request->data);
					if($this->User->validates()){
						if(strcmp($this->request->data['User']['password'],$this->request->data['User']['confirm_password']) == 0){
							if($this->update_password($user['User']['id'])){
								$this->User->updateAll(array('User.code' => null), array('User.id'=>$user['User']['id']));
								$this->Session->setFlash('Lấy lại mật khẩu thành công. Vui lòng đăng nhập bằng mật khẩu mới', 'default', array('class' => 'alert alert-info'));
								return $this->redirect(array( 'controller' => 'users', 'action' => 'login'));
							} else{
								$this->set('errors', $this->validationErrors);
							}
						} else {
							$this->Session->setFlash('Xác nhận mật khẩu không đúng. Vui lòng thử lại', 'default', array('class' => 'alert alert-danger'));
							unset($this->request->data['User']['password']);
							unset($this->request->data['User']['confirm_password']);
						}		
				}
			}
		}
		$this->set('confirm', $confirm);
	}
}

	public function update_password($id){
		$this->User->id = $id;
		if($this->User->saveField('password',$this->request->data['User']['password'])) {
			return true;
		} else {
			return false;
		}
	}



}
