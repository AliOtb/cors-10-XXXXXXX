<html><body>

<form method="post">
Name: <input type="text" name="name"/></br>
Age: <input type="text" name="age"/></br>
<input type="submit" name="insert" value="insert"/></br>
<input type="submit" name="show" value="show"/></br>
</form>
</form>



<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dhname = "CA10";
	
	//create connetion
	$conn=new mysqli($servername,$username,$password,$dhname);
	
	//check connetion
	if(!$conn) echo "No connetion";
	else echo "OK </br>";
	
	//Insert
	if(isset($_POST["insert"]))
	{
		$name = $_POST['name'];
		$age = $_POST['age'];
		if(!empty($name) || !empty($age))
		{
			$sql = "insert INTO m (name, age) VALUES ('$name', '$age')";
			$result = mysqli_query($conn, $sql);
			if ($result == TRUE)
				echo "New ";
			else
				echo "Save failes</br>";
		}
		else echo "Name and age can`t be empty";
	}
	// show

	if(isset($_POST["show"]))
	{
		$sql = "select name, age from m ";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)> 0)
		{
			while ($row = mysqli_fetch_array($result))
				echo $row["name"]. " " . $row["age"]. "</br>";
		}
		else echo "No data";
	}	
			
	
?>
</body></html>