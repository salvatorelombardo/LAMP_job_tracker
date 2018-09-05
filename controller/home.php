<?php
/* ALL GET PAGE FUNCTIONS HERE */
function homePage(){
	$pageData['base'] = "../";
	$pageData['title'] = "Home Page";
	$pageData['heading'] = "Job Tracker Home Page";
	$pageData['nav'] = true;
	$pageData['content'] = file_get_contents('views/admin/home.html');
	$pageData['js'] = "Util^general^login";
	$pageData['security'] = true;

	return $pageData;
}

/* ALL XHR FUNCTIONS HERE */
function getAccountInfo($dataObj){
	require '../classes/Pdo_methods.php';
		$pdo = new PdoMethods();
		$sql = "SELECT * FROM account WHERE id=:id";
		$bindings = array(
			array(':id',$dataObj->accId,'int'),
		);

		$records = $pdo->selectBinded($sql, $bindings);

		if($records == 'error'){
			echo 'error^^^There has been an error accessing the account data';
		}
		else{
			if(count($records) != 0){
				$data = json_encode($records);
				echo 'success^^^'.$data;
			}
			else {
				echo 'error^^^There is no account info';
			}
		}
}

 ?>