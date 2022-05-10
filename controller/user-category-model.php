<?php
class UserCategory
{
	private $id;	
	private $userId;	
	private $categoryId;
	private $status;

	private $user;
	private $category;
	
	public function getId(){return $this->id;}
	public function setId($id){ $this->id = $id;}

	public function getUserId(){return $this->userId;}
	public function setUserId($userId){ $this->userId = $userId;}
	
	public function getCategoryId(){return $this->categoryId;}
	public function setCategoryId($categoryId){ $this->categoryId = $categoryId;}

	public function getStatus(){return $this->status;}
	public function setStatus($status){$this->status = $status;}
	
	
	
	public function getUser(){return $this->user;}
	public function setUser($user){$this->user = $user;}

	public function getCategory(){return $this->category;}
	public function setCategory($category){$this->category = $category;}	
	
	function __construct($id, $userId, $categoryId, $status)
	{
		$this->id = $id;
		$this->userId = $userId;
		$this->categoryId = $categoryId;		
		$this->status = $status;		
	}
}

?>
