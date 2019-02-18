<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
	<link rel="stylesheet" href="style.css">
</head>
<body background="lagos.jpg">

<?php
$id = $_GET['id'];
if (isset($_POST['update'])) {
	// $id = $_POST['id'];
	$name=$_POST['name'];
	$phnumber=$_POST['phnumber'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$feedback=$_POST['feedback'];   
		
		
		//if (empty($name)){
		//$errors = "Enter field";
	//}else {
	$db = mysqli_connect('localhost', 'root', '', 'list');
		mysqli_query($db, "UPDATE file SET name='$name', phnumber='$phnumber', email='$email', address='$address', feedback='$feedback' WHERE id='$id' ");

		header('location: index.php');

		
}

if (!empty($id)) {
	$db = mysqli_connect('localhost', 'root', '', 'list');
	$query = "SELECT * FROM file WHERE id = '$id' ";
	$result = mysqli_query($db,$query);

	if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
?>
<form action="" method="POST">
	
<table class="input">	<tbody class="input">
<tr class="input"><td class="input-table"> NAME:	</td>


	 	<td> <input type="text" name="name" class="name-input" required autocomplete="none" size="20" value="<?php echo $row['name']; ?>"></td> </tr>
	 		
	 	<tr class="input"><td class="input-table"> P/NUMBER: </td>
	 	<td> <input type="text" name="phnumber" class="name-input" required autocomplete="none" value="<?php echo $row['phnumber']; ?>"></td>	</tr>
	     <tr class="input"><td class="input-table"> EMAIL: </td>
	 	<td> <input type="text" name="email" class="name-input" required autocomplete="none" value="<?php echo $row['email']; ?>"></td> </tr>
	 	<tr class="input"><td class="input-table">	 ADDRESS: </td>
	 	<td> <input type="text" name="address" class="name-input" required autocomplete="none" value="<?php echo $row['address']; ?>"> </td> </tr>
	 	<tr class="input"><td class="input-table">	 FEEDBACK:</td>
	 	<td> <textarea cols="20" rows="6" name="feedback"><?php echo $row['feedback']; ?> </textarea></td> </tr>
	 	<tr><td>
	 	<button type="submit" class="add_btn" name="update">Update</button></td></tr>
	 	</tbody>		
	 	</table></form>
	 	;
<?php 
}
else {
	echo 'record not found';
}
}
?>
</body>
</html>