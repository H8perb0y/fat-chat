<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start(); 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Fat-Chat</title>

<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body bgcolor="white">
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<img src="../img/small.png">
			<h1><a>Fat-Chat</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="index.php" accesskey="1" title="">Home</a></li>
				<li><a href="chat.php" accesskey="2" title="">Chat</a></li>
				<li><a href="gaestebuch.php" accesskey="2" title="">Gästebuch</a></li>
				<li><a href="aboutus.php" accesskey="3" title="">Über uns</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	<?php 
                    
                    $servername = getenv('IP');
                    $username = getenv('C9_USER');
                    $password = "";
                    $database = "c9";
                    $dbport = 3306;
                
                    // Create connection
                   
                    $db = mysqli_connect($servername , $username, $password, $database, $dbport); 
 

$benutzer = $_POST["username"]; 
$passwort = md5($_POST["password"]); 

$abfrage = mysqli_query($db, "SELECT username, password FROM Kunden WHERE username LIKE '$benutzer' LIMIT 1"); 

$row = mysqli_fetch_object($abfrage); 

if($row->password == $passwort) 
    { 
      $sql = "SELECT * FROM Kunden where username='$benutzer'";
      $db_erg = mysqli_query( $db, $sql );  
      $benutzeridabfrage = mysqli_fetch_array( $db_erg, MYSQL_ASSOC);
      $benutzerid = $benutzeridabfrage['userID'];
                                                          
        
    $_SESSION["benutzer"] = $benutzer; 
    $_SESSION["benutzerid"] = $benutzerid;
    echo "<br><center>Login erfolgreich. <br> <a href=\"index.php\">Sie werden in kürze weitergeleitet</a></center>"; 
    echo '<meta http-equiv="refresh" content="2; URL=index.php">';
   

} 
else 
    { 
    echo "<br><center>Benutzername und/oder Passwort waren falsch. <a href=\"login.html\">Login</a></center>"; 
    } 

?>       
</div>
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>
</body>
</html>
