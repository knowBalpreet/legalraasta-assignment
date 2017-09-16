<?php
if(isset($_FILES["file"]["type"]))
{
$validextensions = array("csv");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "application/vnd.ms-excel")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("upload/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "files/".uniqid().$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "<span id='success'>File Uploaded Successfully at:</span><br/>";
echo "<br/><b>File Name:</b> " . $targetPath . "<br>";
echo '<a href="display.php" class="btn btn-outline-primary">Display Data</a>';
include_once 'test.php';
deleteData();
$arr = getcsv($targetPath);
createHeader($arr);
insertValue($arr);

}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
?>