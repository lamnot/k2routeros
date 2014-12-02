<?php
/**
 * Class to initiate a new MySQL connection based on $dbInfo settings found in dbSettings.php
 *
 * @example
 *    $db = new database(); // Initiate a new database connection
 *    mysql_close($db->get_link());
 */
class database{
	protected $databaseLink;
	function __construct(){
		include "dbSettings.php";
		$this->database = $dbInfo['host'];
		$this->mysql_user = $dbInfo['user'];
		$this->mysql_pass = $dbInfo['pass'];
		$this->openConnection();
		return $this->get_link();
	}
	function openConnection(){
		$this->databaseLink = mysql_connect($this->database, $this->mysql_user, $this->mysql_pass);
	}

	function get_link(){
		return $this->databaseLink;
	}
}

/**
 * Insert an associative array into a MySQL database
 *
 * @example
 *    $data = array('field1' => 'data1', 'field2'=> 'data2');
 *    insertArr("databaseName.tableName", $data);
 */
function insertArr($tableName, $insData){
	$db = new database();
	$columns = implode(", ",array_keys($insData));
	$escaped_values = array_map('mysql_real_escape_string', array_values($insData));
	foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
	$values  = implode(", ", $escaped_values);
	$query = "INSERT INTO $tableName ($columns) VALUES ($values)";
	mysql_query($query) or die(mysql_error());
	mysql_close($db->get_link());
}
?>