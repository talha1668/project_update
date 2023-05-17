
<?php
 error_reporting(0);
//die("<h2>Server error(error 503)....please reload after a moment..</h2>");





class dbClass {



	private $host;

	private $user;

	private $pass;

	private $dbname;

	private $conn;

	private $error;

	

	public function __construct(){

		$this->connect();

	}

	

	public function __destruct() {

		$this->disconnect();

	}

	

	private function connect(){


    //exist
	$this->host = 'localhost';

		$this->user = 'root';

		$this->pass = '';

		$this->dbname = 'user';




		try {

			

			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.'', $this->user, $this->pass);

			

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		} catch (PDOException $e) {

			echo "Error: " . $e->getMessage();

		}

		

		if(!$this->conn) {

			$this->error = 'Fatal Error :'.$e->getMessage();

		}

		

		return $this->conn;

	

	}

	

	public function disconnect() {

		if ($this->conn) {

			$this->conn = null;

		}

	}

	

	public function getData($query) {

		$result = $this->conn->prepare($query);

		$query = $result->execute();

		if ($query == false) {

		   echo 'Error SQL: '.$query;

		   die();

		}

		

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$reponse = $result->fetch();

		

		return $reponse;

	}

	

	public function getAllData($query) {

		$result = $this->conn->prepare($query);

		$ret = $result->execute();

		if (!$ret) 

		{

		 	echo 'Error SQL: '.$ret;

		    die();

		}

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$reponse = $result->fetchAll();

		

		return $reponse;

	}

	

	public function getRowCount($query) {

		$result = $this->conn->prepare($query);

		$ret = $result->execute();

		if (!$ret) 

		{

		  return false;

		}

		$reponse = $result->rowCount();

		

		return $reponse;

	}

	

	public function execute($query) {

	  $response = $this->conn->exec($query);

		

		if($response == false)

			return false;

		else	

			return true;

	}

	public function addStr($val) {

		$res = addslashes(trim($val));

		return $res;

	}


	


	}











?>