<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Member Registration</title>
</head>
<body>
<h2>Member Registration- PHP Email Testing
</h2>
<?php
// retrieve details from POST submission
	$name = $_POST['name'];
	$address = $_POST['address'];
	$age = $_POST['age'];
	$profession = $_POST['profession'];
	$resident = $_POST['resident'];
// validate submitted data
	// check name
	if (empty($name)) {
	die('ERROR: Please provide your name.');
	}
	// check address
	if (empty($address)) {
	die('ERROR: Please provide your address.');
	}
	// check age
	if (empty($age)) {
	die('ERROR: Please provide your age');
	} 
	else if ($age < 18 || $age > 60) {
	die('ERROR: Membership is only open to those between 18 and 60 years.');
	}
	// check profession
	if (empty($profession)) {
	 die('ERROR: Please provide your profession.');
	}
	// check residential status
	if (strcmp($resident, 'no') == 0) {
	die('ERROR: Membership is only open to residents.');
	}
	echo $_POST["name"];  
	echo "<br>";
	echo $_POST["address"];
	echo "<br>"; 
	echo $_POST["age"]; 
	echo "<br>";
	echo $_POST["profession"]; 
	echo "<br>";
	echo $_POST["resident"]; 
	echo "<br>";
	// if we get this far
	// all the input has passed validation
	// formulate and send e-mail message
	$to = 'adansinghani1@student.gsu.edu';
	$from = 'codd@cs.gsu.edu';
	$subject = 'PHP - Email Testing';
	$body = "Name: $name\r\nAddress: $address\r\n
	Age: $age\r\nProfession: $profession\r\n
	Residential status: $resident\r\n";
	if(mail($to, $subject, $body, "From: $from")) {
	echo 'Thank you for your application.';
	} 
	else 
	{
	die('ERROR: Mail delivery error');
	}
// print all the variables
?>
</body>
</html>