<?php
App::uses('AppModel', 'Model');
App:: uses('BlowfishPasswordHasher' , 'Controller/Component/Auth' );
/**
 * User Model
 *
 * @property Wallet $Wallet
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */

	// The Associations below have been created with all possible keys, those that are not needed can be removed


	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => 'notBlank' ,
				'message' => 'Tên đăng nhập không được trống'
				),
			'unique' => array(
				'rule' =>'isUnique',
				'message' => 'Tên tài khoản đã tồn tại. Vui lòng thử lại'
				),
			),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank' ,
				'message' => ' Mật khẩu không được trống'),
			'minlength' => array(
				'rule' => array('minlength',8),
				'message' => 'Mật khẩu tối thiểu 8 kí tự'
			)
		),
		'confirm_password' => array(
				'required' => array(
					'rule' => 'notBlank' ,
					'message' => ' Mật khẩu không được trống'),
				'minlength' => array(
				'rule' => array('minlength',8),
				'message' => 'Mật khẩu tối thiểu 8 kí tự'
				)
			),
		'email' => array(
			'required' => array(
				'rule' => array('email', 'notBlank'),
				'message' => 'Email không được trống'
				),
			'unique' => array(
				'rule' =>'isUnique',
				'message' => 'Email này đã được đăng kí. Vui lòng thử lại'
				)
			),

		'role' => array(
			'valid' => array(
				'rule' => array('inList' , array('admin' , 'author' )),
				'message' => 'Vui lòng nhập giá trị' ,
				'allowEmpty' => false)));

	public function beforeSave($options = array()) {
		if(isset($this->data['User']['password'])){
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}

	public function beforeValidate($options = array()){
		if(isset($this->data['User']['username'])){
			$user_info = AuthComponent::user();
			$user = $this->findById($user_info['id']);
			if((!empty($user_info)) && $this->data['User']['username'] == $user['User']['username']){
				unset($this->data['User']['username']);
			}
		}
		if(isset($this->data['User']['email'])){
			$user_info = AuthComponent::user();
			$user = $this->findById($user_info['id']);
			if((!empty($user_info)) && $this->data['User']['email'] == $user['User']['email']){
				unset($this->data['User']['email']);
			}
		}
		return true;
	}
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Wallet' => array(
			'className' => 'Wallet',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transaction' => array(
			'className' => 'Transaction',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
