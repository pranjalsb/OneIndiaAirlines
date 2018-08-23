<!DOCTYPE html>
<html>
<head>
<title>Airline Project OneIndia</title>
<style type="text/css">
a:link{color:black}
a:visited {color:white}
a:hover {color:white}
#gound{color: white}
html { 
  background: url(https://images.unsplash.com/photo-1437846972679-9e6e537be46e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=77fcdb7d89f2f4815d062ff8bf1c3f39&auto=format&fit=crop&w=500&q=60) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#main_area	{
	margin: auto auto;
	color: white;
	width:800px;
	height: 400px;
	margin: 0 auto;
	color:white;
	border-radius: 25px;
	margin-top:50px;
	padding-top: 30px;
	padding-right: 30px;
	padding-bottom: 30px;
	padding-left: 30px;
	background-color: rgba(0,0,0,0.3);
    box-shadow: inset -4px -4px rgba(0,0,0,0.5);
}
#welcometext	{
	font-family:"Calibri Light", cursive, sans-serif;
	
	font-size: 50px;
}
#registertext	{
	font-family:"Comic Sans MS", cursive, sans-serif;
	font-size: 25px;
}
#fillertext	{
	font-family:"Comic Sans MS", cursive, sans-serif;
	font-size: 35px;
}
</style>
</head>
<body>
<?php 
session_start();
include("nav.php") 
?>
<div align="center" id="main_area">
<div id="logo"><img src="Logo.jpg" alt="logo" height="100" width="100" align="left"/></div>
<div id="welcometext">Welcome To OneIndia Airline</div>
<br/><br/><br/><br/>
<div id="fillertext">Making your journey the Comfortable and Memorable!</div>
<br/><br/><br/><br/><br/><br/><br/>
<div id="registertext">Click here to register <a href="register.php">Click here</a><div>
</div>
</body>
</html>