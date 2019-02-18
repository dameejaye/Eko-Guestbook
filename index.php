<?php
	$errors = "";

	//connecting to database
	$db = mysqli_connect('localhost', 'root', '', 'list');

	if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$phnumber=$_POST['phnumber'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$feedback=$_POST['feedback'];   
		
		
		//if (empty($name)){
		//$errors = "Enter field";
	//}else {
		mysqli_query($db, "INSERT INTO file (name, phnumber, email, address, feedback) VALUES ('$name', '$phnumber', '$email', '$address', '$feedback')");

		header('location: index.php');

		}

		
		
	//}
	// delete task
	if (isset($_GET['del_field'])){
		$id = $_GET['del_field'];
		mysqli_query($db, "DELETE FROM file WHERE id=$id");
		

	}

	 $file = mysqli_query($db, "SELECT * FROM file");
?>

<!DOCTYPE html>
<html>
<head>
	<title>GUESTBOOK</title>
	<link rel="stylesheet"  href="style.css">
</head>
<body background="lagos.jpg">
	 <div class="heading"><h2>Welcome to Eko</h2></div>
	 <form action="index.php" method="POST" > 
	 	<?php if (isset($errors)) { ?>
	 	<p><?php echo $errors; ?> </p>
	 	<?php } ?>
	 	
	 		
	 			
	 	<table class="input">	<tbody class="input">
	 	<tr class="input"><td class="input-table"> NAME:	</td>
	 	<td> <input type="text" name="name" class="name-input" required autocomplete="none" size="20"></td> </tr>
	 		
	 	<tr class="input"><td class="input-table"> P/NUMBER: </td>
	 	<td> <input type="text" name="phnumber" class="name-input" required autocomplete="none"></td>	</tr>
	     <tr class="input"><td class="input-table"> EMAIL: </td>
	 	<td> <input type="text" name="email" class="name-input" required autocomplete="none"></td> </tr>
	 	<tr class="input"><td class="input-table">	 ADDRESS: </td>
	 	<td> <input type="text" name="address" class="name-input" required autocomplete="none"> </td> </tr>
	 	<tr class="input"><td class="input-table">	 FEEDBACK:</td>
	 	<td> <textarea cols="75" rows="6" name="feedback"> </textarea></td> </tr>
	 	<tr><td>
	 	<button type="submit" class="add_btn" name="submit">Add</button></td></tr>
	 	</tbody>		
	 	</table>
	 	</form>
	 	
	 	<table>
	 		<thead>
	 			<tr>
	 				<th>S/N</th>
	 				<th>Name</th>
	 				<th>P/NUMBER</th>
	 				<th>EMAIL</th>
	 				<th>ADDRESS</th>
	 				<th>FEEDBACK</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 			<?php $count = 1; ?>
	 			<?php while ($row = mysqli_fetch_array($file)){ ?>
	 			 
	 			<tr class="output">
	 				<?php $id = $row['id']; ?>
	 				<td><?php echo $count ?></td>
	 				<td><?php echo $row['name']; ?></td>
	 				<td><?php echo $row['phnumber']; ?></td>
	 				<td><?php echo $row['email']; ?></td>
	 				<td><?php echo $row['address']; ?></td>
	 				<td><?php echo $row['feedback']; ?></td>
	 				
	 				<td class="delete"> <a href="index.php?del_field=<?php echo $row['id']?>">x</a></td>
	 				<td><a href="edit.php?id=<?php echo $id; ?>">EDIT</a></td>
	 			</tr>
	 			<?php $count++; ?>
	 			<?php }?>
	 			
	 	 	</tbody>

	 	</table>
	 	
</body>
</html>

