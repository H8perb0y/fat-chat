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

<style type="text/css">
	.nb {
                text-align: right;
                background-color: #2056ac;
                border-bottom: 1px solid #2056ac;
                height: 50px;
                color:#FFF;
                width: 500px;
                position: fixed;
                border-radius: 5px;
                right: 20px;
            }

            .nb strong {
                color:#000000;

            }
            
            .nl {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 20px;
                padding-left:10px;
                  margin-top:10px;
                 margin-right:10px;
            }
            .nl a, .nla:link, .nl a:visited, .nl a:active {
                text-decoration:none;
                color: #FFF;
                padding: 0 5px 0 5px;

            }
            .nl a:hover {
                color: #D9581F;

            }
</style>
</head>
<body bgcolor="white" >
<?php 
	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;
	$db = new mysqli($servername, $username, $password, $database, $dbport);
	$benutzer = $_SESSION["benutzer"];
echo '<div class="nb">';
                        echo '<div class="nl" >';
                        	   
                        	
            
            if(!isset($_SESSION["benutzer"])) 
                { 
                    echo 'Willkommen ➔ <a href="../registerlogin.html">Einloggen/Registrieren</a>';
                }
               else
                {
                    echo 'Willkommen <a href="benutzer.php">'.$_SESSION["benutzer"].'</a>! ➔ <a href="../logout.php">Ausloggen</a>';
                }
                    
    echo '</div></div>';
                ?>
                
                        
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<img src="../img/small.png">
			<h1><a>Fat-Chat</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php" accesskey="1" title="">Home</a></li>
				<li><a href="chat.php" accesskey="2" title="">Chat</a></li>
				<li class="active"><a href="gaestebuch.php" accesskey="2" title="">Gästebuch</a></li>
				<li><a href="aboutus.php" accesskey="3" title="">Über uns</a></li>
			</ul>
		</div>
		
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">

<div class="title">
	  <h2>Willkommen bei Fat-Chat</h2>
		</div>
		
 
<?php
$pdo = new PDO('mysql:host=localhost;dbname=c9', 'root', '');
$show_form = true; 
$error = null;
 
//Das Formular wurde abgesendet, überprüfe den Inhalt und speichere es ab
if(isset($_GET['submit'])) {
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$text = trim($_POST['text']);
	
	//Überprüfen dass die E-Mail-Adresse gültig ist
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
	} else if(empty($name)) {
		$error = 'Bitte einen Namen eingeben<br>';
	} else if(empty($text)) {
		$error = 'Bitte einen Text eingeben<br>';		
	} else {
		$statement = $pdo->prepare("INSERT INTO gaestebuch (name, email, text) VALUES (:name, :email, :text)");
		$result = $statement->execute(array('name' => $name, 'email' => $email, 'text' => $text));
		
		if($result) {
			 header( 'Location: gaestebuch.php' ) ; 
			
		} else {
			$error = 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	}
}
?>
 
<?php 
if(!is_null($error)) { //Ein Fehler ist aufgetreten
	echo $error;
}
 
//Ausgabe des Formulars nur wenn $showForm == true ist
if($show_form): 
	
	$sql = "SELECT * from Kunden where username = '$benutzer'";
    $db_erg = mysqli_query( $db, $sql );
    if ( ! $db_erg )
    {
     die('Ungültige Abfrage: ' . mysqli_error());
    }
    $abfrage = mysqli_fetch_array( $db_erg, MYSQL_ASSOC);
                                                        
                                                        
?>
	<form action="?submit=1" method="post">
	Name:<br>
	<input type="text" size="40" maxlength="250" name="name" value="<?php 
	if($benutzer){
	echo  $abfrage['username'] .'"><br><br>';
	}
	else {
echo '"><br><br> ';
	} 
	?>
	E-Mail:<br>
	<input type="email" size="40" maxlength="250" name="email" value="<?php 
	if($benutzer){
	echo  $abfrage['email'] .' "><br><br>';
	}
	else {
echo '"><br><br> ';
	} 
	?>
	
	Text:<br>
	<textarea cols="50" rows="9" name="text"></textarea><br><br>
	
	<input type="submit" value="Eintragen">
	</form> 
<?php 
endif;
?>
 
<hr>
 
<?php 

$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM gaestebuch WHERE deleted_at IS NULL");
$statement->execute();
$row = $statement->fetch();
$anzahl_eintrage = $row['anzahl'];
echo "$anzahl_eintrage Personen sind eingetragen<br><br>";
 
 
//Berechne alles notwendige für die Blätterfunktion
$seite = 1;
if(isset($_GET['seite'])) {
	$seite = intval($_GET['seite']);
}
 
$beitraege_pro_seite =6;
$start = ($seite-1)*$beitraege_pro_seite;
 
//Abfrage der Datenbank und Ausgabe der Daten
$statement = $pdo->prepare("SELECT * FROM gaestebuch WHERE deleted_at IS NULL ORDER BY id DESC LIMIT :start, :limit");
$statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':limit', $beitraege_pro_seite, PDO::PARAM_INT);
$statement->execute();
while($row = $statement->fetch()) {
	$name = htmlentities($row['name']);
	$email = htmlentities($row['email']);
	$text = nl2br(htmlentities($row['text']));
	$date = new DateTime($row['created_at']);
	$dateFormatted = $date->format('d.m.y H:i');
	
	echo "<div style=\"border: 1px solid #000000;\">
			<div style=\"border-bottom:1px solid #000000;  padding: 5px; \">$dateFormatted von <a href=\"mailto:$email\">$name</a></div>
			<div style=\"padding: 5px;\">$text</div>
		 </div><br>";
}
 
//Berechne die Anzahl der Seiten:
$anzahl_seiten = ceil($anzahl_eintrage / floatval($beitraege_pro_seite));
 
//Ausgabe der Seitenlinks:
echo "<div align=\"center\">";
echo "<b>Seite:</b> ";
 
 
//Ausgabe der Links zu den verschiedenen Seiten
for($a=1; $a <= $anzahl_seiten; $a++) {
	//Wenn der User sich auf dieser Seite befindet, keinen Link ausgeben
	if($seite == $a){
		echo " <b>$a</b> ";
	} else {	//Aus dieser Seite ist der User nicht, also einen Link ausgeben
		echo " <a href=\"?seite=$a\">$a</a> ";
	}
}
echo "</div>";
 
?>
		
		
	</div>
</div>
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>
</body>
</html>

