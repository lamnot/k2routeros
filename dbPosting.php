<?php

error_reporting(0);                                     // Disable error reporting
// error_reporting(E_ALL);                              // Enable error reporting
// error_reporting(E_ERROR | E_WARNING | E_PARSE);      // Report runtime errors

include "auth.php";
include "db.php"; 
//include("./assets/php/db.php");

//$post_data = file_get_contents('php://input');

$insData = array(
		'service_name' => htmlspecialchars($_POST['service_name']),
		'business_number' => htmlspecialchars($_POST['business_number']),
		'transaction_reference' => htmlspecialchars($_POST['transaction_reference']),
		'internal_transaction_id' => htmlspecialchars($_POST['internal_transaction_id']),
		'transaction_timestamp' => htmlspecialchars($_POST['transaction_timestamp']), 
		'transaction_type' => htmlspecialchars($_POST['transaction_type']),
		'account_number' => htmlspecialchars($_POST['account_number']),
		'sender_phone' => htmlspecialchars((str_ireplace('+254','0', ($_POST['sender_phone'])))),
		'first_name' => htmlspecialchars($_POST['first_name']),
		'middle_name' => htmlspecialchars($_POST['middle_name']),
		'last_name' => htmlspecialchars($_POST['last_name']),
		'amount' => htmlspecialchars($_POST['amount']),
		'currency' => htmlspecialchars($_POST['currency']),
		//'signature' => htmlspecialchars($_POST['signature']),
		'status' => 'status',
		'description' => 'description',
		'subscriber_message' => 'subscriber_message',	
		
);




include "select_profile.php";

include "net_routeros.php";

insertArr("cohabo_Karibu4G.kopokopo_post_request", $insData);


?>