<?php
//connect to database
global $db,$target;

$db = mysqli_connect("localhost","P4\$\$w0rd123","multi_login");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image,text) VALUES ('$image', '$text')";
  	// execute query
  	mysqli_query($db, $sql);
echo mysqli_query($db, $sql);
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Uploading File</title>
</head>
<body>
<div id="content">
	<?php
	$db = mysqli_connect("localhost","images","P4\$\$w0rd123","multi_login");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db,$sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
	<form action = "upload.php" method = "POST" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
		<input type="file" name="image">
	    </div>
	    <div>
	    <textarea name="text" cols="40" rows="4" placeholder="Type some information:"></textarea>
	    </div>
	    <div>
		<input type="submit" name="upload" value="Upload Image">
	</div>
	</form>
</div>
</body>
</html>
