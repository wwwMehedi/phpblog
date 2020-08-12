<?php
Class Database{

	public $host=DB_HOST;
	public $user=DB_USER;
	public $pass=DB_PASS;
	public $name=DB_NAME;


	public $link;
	public $error;
  
  public function __construct(){
  	$this->connectDB();
  }

	private function connectDB()
	{
		  $this->link=new mysqli($this->host,$this->user,$this->pass,$this->name);
		  if(!$this->link){

		  	$this->error="connection fails".$this->link->connect_error;
		  	return false;
		  }
		  else{
		  	echo "connection success";
		  }
	}

	public function select($query){
		$result=$this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}


     public function insert($query){
     	$insert_rows=$this->link->query($query) or die ($this->link->error.__LINE__);
     	if($insert_rows){
      header("Location: index.php?msg=".urlencode('data insert sucessfully.'));
        exit();
     	}

     	else{
     		die("Error:(".$this->link->erno.")" .$this->link->error);
     	}
     }

}

?>