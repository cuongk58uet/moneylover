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
		'confim_password' => array(
				'required' => array(
					'rule' => 'notBlank' ,
					'message' => ' Mật khẩu không được trống'),
				/*'minlenght' => array(
				'rule' => array('minlenght',8),
				'message' => 'Mật khẩu tối thiểu 8 kí tự'
				)*/
			),

		'role' => array(
			'valid' => array(
				'rule' => array('inList' , array('admin' , 'author' )),
				'message' => 'Please enter a valid role' ,
				'allowEmpty' => false)));

	public function beforeSave($options = array()) {
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}

	public function beforeValidate($options = array()){
		if(isset($this->data['User']['username'])){
			$user_info = AuthComponent::user();
			$user = $this->findById($user_info['id']);
			if(!empty($user_info) && $this->data['User']['username'] == $user['User']['username']){
				unset($this->data['User']['username']);
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
			'dependent' => false,
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
