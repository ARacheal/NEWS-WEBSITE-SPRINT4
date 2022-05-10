<?php
class User
{
	private $id;	
	public $name;
	private $mobile;
	private $email;
	private $password;
	private $role;
	private $status;

	
	public function getId(){return $this->id;}
	public function setId($id){ $this->id = $id;}	

	public function getName(){ return $this->name;}
	public function setName($name){ $this->name = $name;}
	
	public function getMobile(){ return $this->mobile;}
	public function setMobile($mobile){ $this->mobile = $mobile;}

	public function getEmail(){ return $this->email;}
	public function setEmail($email){ $this->email = $email;}	
	
	public function getPassword(){ return $this->password;}
	public function setPassword($password){ $this->password = $password;}

	public function getRole(){ return $this->role;}
	public function setRole($role){ $this->role = $role;}	

	public function getStatus(){return $this->status;}
	public function setStatus($status){$this->status = $status;}	
	
	
	function __construct($id, $name, $mobile, $email, $password, $role, $status)
	{
		$this->id = $id;
		$this->name = $name;
		$this->mobile = $mobile;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		$this->status = $status;
	}
}

?>
