<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","","airline");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$sql = "SELECT * FROM flights WHERE f_src = '$source' AND f_dest='$destination';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$f_no=$row['f_no'];
$query="UPDATE passenger SET f_no='$f_no' WHERE email='$email';";
	if(mysqli_query($conn, $query))
{  
	if(!empty($row)){
			$f_no=$row['f_no'];
			$message = "Flight booked successfully";
		}
		else{
			$message="Flight Not Availale!";
		}
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
if (isset($_POST['cancel']))
{
$cancelflight=$_POST['cancelflight'];
$sql = "delete from tickets where t_no='$cancelflight';";
	if(mysqli_query($conn, $sql))
{  
			$message = "Ticket cancelled successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<html>
<head>
<title>Transaction form</title>
<script type="text/javascript">
		function validate()	{
			var source=document.getElementById("source");
			if(source.selectedIndex==0)
			{
				alert("Please select your source");
				source.focus();
				return false;		
			}
			var destination=document.getElementById("destination");
			if(destination.selectedIndex==0)
			{
				alert("Please select your destination");
				destination.focus();
				return false;		
			}
		}
</script>
<style type="text/css">
	html {
		background: url(https://images.unsplash.com/photo-1504723246034-0977641ea907?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9b30215f6793899060ed43181e0b53b8&auto=format&fit=crop&w=500&q=60) no-repeat center center;
		background-size: cover;
	}
	#mainarea	{
		width: 40%;
		height: 60%;
		margin: auto;
		border-radius: 25px;
		border: 2px white;
		margin-top: 90px;
		padding-bottom: 20px;
		background-color: rgba(0,0,0,0.2);
	    
	}
	#cancelform	{
		margin-top: 50px;
	}
</style>
</head>
<body>
<?php 
include ("nav.php")
?>
<div id="mainarea">
<h1 align="center"><font color="Cornsilk" face="Times New Roman">Enter the Flight Details</font></h1>
<form name="transaction" action="book.php" method="post" onsubmit="return validate()">
<table align="center">
<tr>
<td><p><font color="Cornsilk" size="5"> Select source:</font></p></td>&nbsp;&nbsp;
<td><select id="source" align="center" name="source">
<option value="None" disabled selected>------Select source------</option>
<option value="Mumbai">Mumbai</option>
<option value="Chennai">Chennai</option>
<option value="Ahmedabad">Ahmedabad</option>
<option value="Kolkata">Kolkata</option>
<option value="Goa">Goa</option>
<option value="Delhi">Delhi</option>
</select>
</td>
</tr>
<tr>
<td><p><font color="Cornsilk" size="5">Select destination:</font></p></td>
<td><select id="destination" align="center" name="destination">
<option value="None" disabled selected>---Select destination---</option>
<option value="Delhi">Delhi</option>
<option value="Chennai">Chennai</option>
<option value="Kolkata">Kolkata</option>
<option value="Mumbai">Mumbai</option>
<option value="Goa">Goa</option></select></td>
</tr>
</table><br><br>
<center><input type="SUBMIT" value="SUBMIT" id="submit" name="submit" ></center>
</form>
<form method="post" action="book.php" align="center" id="cancelform">
	
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="cancel" id="cancel" value="Cancel previously booked ticket">
</form>
</div>
</body>
</html>