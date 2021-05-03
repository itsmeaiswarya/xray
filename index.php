<?php 
$dir_path = "images/";
$extensions_array = array('jpg','png','jpeg');

if (is_dir($dir_path));
{
	$files = scandir($dir_path);
	for($i=0;$i < count($files); $i++)
	{
		if($files[$i] != '.' && $files[$i] != '..')
		{
			//get file name
			echo "File Name -> $files[$i]<br>";
			//get file extension
			$file = pathinfo($files[$i]);
			$extension = $file['extension'];
			echo "File Extension -> $extension<br>";
			echo "<img src='$dir_path$files[$i]' style='width:150px;height:150px;'><br>";
		}
	}
}
?>
