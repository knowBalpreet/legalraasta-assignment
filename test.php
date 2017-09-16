<?php 
function getcsv($path)
{
	$file = fopen($path,"r");

	while (!feof($file)) {
		$content = fgetcsv($file);
		$count = count($content);
		$k=0;
		for ($i=0; $i < $count; $i++) { 
			if (!empty($content[$i])) {
				$arr[$i][] = $content[$i];
				// echo $content[$i]."\t";
			}
		}
		if (!isset($content)) {
			echo "<br>";
		}
	}
	return $arr;
}
	function createHeader($arr)
	{
	include 'database.php';	
		
	$query = "CREATE TABLE Data (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
		$len = count($arr);
		$a = 1;
	foreach ($arr as $key => $value) {
			// echo $arr[$key][0]."\t\t";
			$query .= "`".$arr[$key][0]."` VARCHAR(256)";
		
		if ($a<$len) {
			$query .= ",";
			$a++;
		}
				// echo "<br>";
	}	
		$query .= ");";
		$db->query($query);
	}

	function insertValue($arr)
	{
		include 'database.php';
		$a = 1;
		$b = 1;
		$len = count($arr);
		$len1 = sizeof($arr[key($arr)]);
		for ($i=1; $i < $len1; $i++) { 
			# code...
		$query = "INSERT INTO data (";
			foreach ($arr as $key => $value) {
			$query .= "`".$arr[$key][0]."` ";
		if ($a<$len) {
			$query .= ",";
			$a++;
		}
					
			}
		$query .=") VALUES (";

		foreach ($arr as $key => $value) {
			$query .= "'".$arr[$key][$i]."' ";
		if ($b<$len) {
			$query .= ",";
			$b++;
		}
		}
		$query .= ");";
		$db->query($query) or die($db->error);
		$b=1;
		$a=1;
		}
	}
	function deleteData()
	{
		include 'database.php';
		if (checkData()) {
			$query = "DROP TABLE data";
			$db->query($query);
		}
	}
	// deleteData();
	function checkData()
	{
		include 'database.php';
		if($db->query("DESCRIBE `data`")) {
			return TRUE;
		}else{
			return FALSE;
		}
		# code...
	}
	// $arr = getcsv('file.csv');
	// createHeader($arr);
	// insertValue($arr);

	// deleteData();
	function getNames()
	{
		include 'database.php';
		$query = "Select id, Fields from data";
		$result = $db->query($query);
		while ($row = $result->fetch_assoc()) {
			$names[$row['id']]  = $row['Fields'];
		}
		return $names;
	}

	function getNamesfromid($id)
	{
		include 'database.php';
		$query = "Select * from data where id =".$id;
		$result = $db->query($query);
		$ctr=0;
		while($row = $result->fetch_assoc())
		{
		    foreach($row as $key => $value)
		    {
		    	if ($ctr<2) {
		    		$ctr+=1;
		    	}else{

		        $data[$key] = $value;
		    	}
		    }
		}
		return $data;
	}
	// getNamesfromid(1);

	function getSubjectsfromName($name)
	{
		include 'database.php';
		$query = "Select Fields,`$name` from data ";
		$result = $db->query($query);
		$ctr=0;
		while($row = $result->fetch_assoc())
		{
			$data[$row['Fields']] = $row[$name];
			
		}
		return $data;
	}
	// getSubjectsfromName('Maths~50');
	function getNamefromid($id)
	{
		include 'database.php';
		$query = "Select Fields from data where id =".$id;
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		return $row['Fields'];
	}
	// getNamefromid(1);

	function getFields()
	{
		include 'database.php';
		$query = "Show columns from data";
		$result = $db->query($query);
		$ctr = 0;
		while ($row = $result->fetch_assoc()) {
			if ($ctr<2) {
				$ctr+=1;
			}else{
				$fields[] = $row['Field'];
				
			}
		}
		return $fields;
	}
	// getFields();
	// getNamesfromid(1);
?>
