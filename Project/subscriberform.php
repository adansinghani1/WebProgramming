<HTML>
 <HEAD>
  <h1> Thank You for the Feedback! </h1>
 </HEAD>
 <BODY>
 </BODY>
</HTML>
<?php


if($_POST["message"]) {


mail("adansinghani1@student.gsu.edu", "Here is the subject line",


$_POST["insert your message here"]. "From: an@email.address");


}

?>
