
<?php
/*
 * switch (n) {
  case label1:
    code to be executed if n=label1;
    break;
  case label2:
    code to be executed if n=label2;
    break;
  case label3:
    code to be executed if n=label3;
    break;
  ...
  default:
    code to be executed if n is different from all labels;
} 
 */

$paid_amount = $insData['amount'];

switch ($paid_amount) {
	case "2000":
		$paid_profile = 'KaribuSOHO';
		break;
	case "1000":
		$paid_profile = 'KaribuHome';
		break;
	case "80":
		$paid_profile = 'KaribuFreedom';
		break;
	default:
		$paid_profile = '0';
}
/*
 *
if ($paid_amount === "2000") {
	$paid_profile = 'KaribuSOHO';
} elseif ($paid_amount === '1000') {
	$paid_profile = 'KaribuHome';
} elseif ($paid_amount === '80') {
	$paid_profile = 'KaribuFreedom';
} else {
	echo "Profile selection error!";
}
 * 
 */

?> 