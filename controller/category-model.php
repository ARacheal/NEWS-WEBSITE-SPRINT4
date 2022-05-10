<?php
class Category
{
	private $id;	
	private $name;
	private $url;
	private $status;

	
	public function getId(){return $this->id;}
	public function setId($id){ $this->id = $id;}	

	public function getName(){ return $this->name;}
	public function setName($name){ $this->name = $name;}
	
	public function getUrl(){ return $this->url;}
	public function setUrl($url){ $this->url = $url;}	

	public function getStatus(){return $this->status;}
	public function setStatus($status){$this->status = $status;}	
	
	
	function __construct($id, $name, $url, $status)
	{
		$this->id = $id;
		$this->name = $name;
		$this->url = $url;
		$this->status = $status;
	}
}

?>
