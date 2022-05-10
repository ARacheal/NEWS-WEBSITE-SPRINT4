<?php
class FavoriteUser
{
	public $id;	
	public $user_id;
	public $news_id;

	
	public function getId(){return $this->id;}
	public function setId($id){ $this->id = $id;}	

	public function getUserId(){ return $this->user_id;}
	public function setUserId($user_id){ $this->user_id = $user_id;}

	public function getNewsId(){ return $this->news_id;}
	public function setNewsId($news_id){ $this->news_id = $news_id;}
	
	function __construct($id, $user_id, $news_id)
	{
		$this->id = $id;
		$this->user_id = $user_id;
		$this->news_id = $news_id;
	}
}

?>
