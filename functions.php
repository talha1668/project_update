<?php
//  error_reporting(E_ALL);
 error_reporting(0);

class Admin
{
	private $ID;
	private $Username;
	private $Email;
	private $Password;
	private $Session;
	private $conndb;

	public function checkSession($Session)
	{
		$this->Session = $Session;
		if (empty($Session)) {
			echo "<script>window.location.href='welcome.php'</script>";
		}
	}



	public function addData($data, $table)
	{
		$conn = new dbClass;
		$fields = $values = array();
		foreach (array_keys($data) as $key) {
			$fields[] = "`$key`";
			$values[] = "'" . $data[$key] . "'";
		}
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$stmt = $conn->execute($sql);
		return $stmt;
	}
	public function getDataByUniqueColumn($table, $unique_col, $unique_col_value)
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `$table` WHERE `$unique_col`='$unique_col_value' LIMIT 1");
		return $stmt;
	}

	public function addStr($val) {

		$res = addslashes(trim($val));

		return $res;

	}
	
	public function getAllCustomData($query)
	{
		$conn = new dbClass;
		$this->conndb = $conn;


		$stmt = $conn->getAllData("$query");
		return $stmt;
	}
	public function getCustomNumrowsCount($query)
	{
		$conn = new dbClass;
	
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("$query");
		return $stmt;
	}
	public function getNumrowsCountby2attr($Table, $primary_key, $attr, $attrVal, $attr2, $attrVal2)
	{
		$conn = new dbClass;
		$this->Table = $Table;
		$this->Primary_key = $Table;
		$this->conndb = $conn;

		$stmt = $conn->getRowCount("SELECT `$primary_key` FROM `$Table` WHERE `$attr`='$attrVal' AND `$attr2`='$attrVal2' ORDER BY `$primary_key` DESC");
		return $stmt;
	}
	public function getDataBy2UniqueColumn($table, $unique_col, $unique_col_value,$unique_col2, $unique_col_value2)
	{
		$conn = new dbClass;
		$this->conndb = $conn;

		$stmt = $conn->getData("SELECT * FROM `$table` WHERE `$unique_col`='$unique_col_value' AND `$unique_col2`='$unique_col_value2' LIMIT 1");
		return $stmt;
	}



}
?>