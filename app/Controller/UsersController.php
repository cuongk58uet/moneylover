<?php
App::uses('AppController', 'Controller');
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
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
/*		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());*/
		$user_info = $this->get_user();
		$this->set('data',$user_info);
		$data = $this->User->findById($user_info['id']);
		$this->set('user',$data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__(' Không tìm thấy trang'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__(' Tài khoản đã được lưu.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__(' Tài khoản chưa được lưu. Vui lòng thử lại.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Không tìm thấy trang'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$user_info = $this->get_user();
			$this->User->id = $user_info['id'];
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Tài khoản đã được lưu.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Tài khoản chưa được lưu. Vui lòng thử lại.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
			$this->Flash->success(__(' Tài khoản đã được xóa.'));
		} else {
			$this->Flash->error(__(' Tài khoản chưa được xóa. Vui lòng thử lại'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
		parent:: beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add');
		
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

	public function change_password(){
		if($this->request->is('post')) {
			$this->User->set($this->request->data);
			if($this->User->validates()){
				if(strcmp($this->request->data['User']['password'],$this->request->data['User']['confim_password']) == 0) {
					$user_info = $this->get_user();
					$this->User->id = $user_info['id'];
					if($this->User->saveField('password',$this->requets->data['User']['password'])) {
						$this->Flash->set('Đã lưu thành công');
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Flash->set('Có lỗi xảy ra. Vui lòng thử lại');
					}

				} else{
					$this->Flash->set('Xác nhận mật khẩu không đúng');
				}
				
			} else{
				//$this->set->('errors',$this->User->validationErrors);
			}
		}

	}
}
