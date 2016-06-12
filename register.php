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
                
                    $db = mysqli_connect($servername , $username, $password, $database, $dbport);
                    
                    
                    $username = $_POST["username"]; 
                    $passwort = $_POST["passwort"]; 
                    $passwort2 = $_POST["passwort2"]; 
                    $vorname = $_POST["vorname"]; 
                    $nachname = $_POST["nachname"]; 
                    $email = $_POST["email"]; 
                    $land = $_POST["land"]; 
                    $stadt = $_POST["stadt"]; 
                    
                    if($passwort != $passwort2 OR $username == "" OR $passwort == "") 
                        { 
                        echo "<center>Eingabefehler. Bitte alle Felder korekt ausfüllen. <a href=\"register.html\">Zurück</a></center>"; 
                        echo "<br>";
                        echo "<center>Erneut versuchen!</center>";
                       
                                
                        exit; 
                        }
                        $passwort = md5($passwort);
                    
                  $result = mysqli_query($db,"SELECT userID FROM Kunden WHERE username LIKE '$username'");
                  $kontrolle = mysqli_num_rows($result);
               
                   
                    
                    if($kontrolle == 0) 
                        { 
                          
                         $sql = "INSERT INTO Kunden (username, password, vorname, nachname, land, stadt , email) VALUES ('$username', '$passwort', '$vorname', '$nachname', '$land', '$stadt', '$email')";
                          $db_erg = mysqli_query($db, $sql);
                          
                        if( ! $db_erg ) 
                            { 
                             echo "<center>Fehler beim Speichern des Benutzernames. <a href=\"registerlogin.html\">Zurück</a></center>"; 
                            } 
                        else 
                            { 
                            echo "<center>Benutzername <b>$username</b> wurde erstellt. <a href=\"registerlogin.html\">Login</a></center>";    
                            
                            } 
                    
                    
                        } 
                    
                    else 
                        { 
                        echo "<center>Benutzername schon vorhanden. <a href=\"registerlogin.html\">Zurück</a></center>"; 
                        } 
                    ?>      
</div>
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>
</body>
</html>
