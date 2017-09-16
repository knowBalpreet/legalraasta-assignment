<?php
include 'database.php';
include 'test.php';
	if (isset($_POST['id']) ) {
		$jsonData[] = array('Subject','Percentage');

		$id = $_POST['id'];
		// $id = $_GET['id'];
		$data = getNamesfromid($id);
		foreach ($data as $key => $value) {
			$subject 	= explode("~", $key)[0];
			$totalmarks = explode("~", $key)[1];
			$percentage = ((int)$value/$totalmarks)*100;
			$jsonData[] = [$subject,$percentage];
		}		
		echo json_encode($jsonData);
	}

	if (isset($_POST['name']) ) {
		$jsonData[] = array('Student','Marks');

		$name = $_POST['name'];
		// $id = $_GET['id'];
		$data = getSubjectsfromName($name);
		foreach ($data as $key => $value) {
			// $subject 	= explode("~", $key)[0];
			// $totalmarks = explode("~", $key)[1];
			// $percentage = ((int)$value/$totalmarks)*100;
			$jsonData[] = [$key,(int)$value];
		}		
		echo json_encode($jsonData);
	}

	if (isset($_POST['value']) ) {

		$id = $_POST['value'];
		// $id = $_GET['id'];
		$data = getNamefromid($id);
		echo "<h3>".$data."</h3>";
	}

	if (isset($_POST['subject']) ) {

		$subject = $_POST['subject'];
		// $id = $_GET['id'];
		// $data = getNamefromid($id);
		$data = explode('~',$subject)[0];
		echo "<h3>".$data."</h3>";
	}
?>