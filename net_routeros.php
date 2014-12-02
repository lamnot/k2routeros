<?php
namespace PEAR2\Net\RouterOS;
?>   
    <?php
    use PEAR2\Net\RouterOS;
    //include_once 'PEAR2/Autoload.php';
    require_once '/home/cohabo/php/PEAR2_Net_RouterOS-1.0.0b4.phar';
    
    $user_id = $insData['sender_phone'];
    $customer = 'care';
    
    //Examples of subscriber data 
    //$user_id = 'nana';
    //$paid_profile = 'Admin';
    
    
    
    if($paid_profile) {
    	try {
    		$client = new Client('41.78.26.166', 'admin', 'nakhumicha', '443');
    	} catch (Exception $e) {
    		echo $e;
    		die('Unable to connect to the router');
    		//Inspect $e if you want to know details about the failure.
    	}
    	$printRequest = new RouterOS\Request('/tool user-manager user print');
    	$query = Query::where('name', $user_id);
    	$printRequest->setQuery($query);
    	$responses = $client->sendSync($printRequest);
    	
    	foreach ($responses as $response) {
    		if ($response->getType() === RouterOS\Response::TYPE_DATA) {
    			$customer = $response->getArgument('customer');
    			$insData['subscriber_message'] = "{$customer} {$paid_profile} subscription for {$user_id}";
    		"</br>";
    		} else {
    			$insData['subscriber_message'] = "{$paid_profile} subscription for {$user_id}";
    			"</br>";
    		}
    	}
    	
    	try {
    		$setRequest = new RouterOS\Request('/tool user-manager user
    				create-and-activate-profile');
    				if ($client->sendSync($setRequest
    						->setArgument('customer', $customer)
    						->setArgument('profile', $paid_profile)
    						->setArgument('user', $user_id))
    						->getType() === RouterOS\Response::TYPE_ERROR) {
    							$insData['status'] = '"02"';
    							$insData['description'] = '"Account not found"';
    							echo
                                    '{
                                    "status" : '."{$insData['status']}".',
                                    "description" : '."{$insData['description']}".',
                                    "subscriber_message" : "Dear '."{$insData['first_name']}".', Kindly call Nana on 0725678809 for assistance with creating your account, Karibu4G."
                                    }';
    						}
    						else {
    							$insData['status'] = '"01"';
    							$insData['description'] = '"Accepted"';
    							echo
                                    '{
                                    "status" : '."{$insData['status']}".',
                                    "description" : '."{$insData['description']}".',
                                    "subscriber_message" : "Dear '."{$insData['first_name']}".', Your '."{$insData['subscriber_message']}".' is now active, Karibu4G."
                                    }';
    						}
    	} catch (Exception $e) {
    		echo $e;
    	}
    }
    else {
    	echo 
            '{
            "status" : '."03".',
            "description" : '."Invalid Payment".',
            "subscriber_message" : "Dear '."{$insData['first_name']}".', Kindly call Nana on 0725678809 for assistance with activating your account, Karibu4G."
            }';
    }

    ?>