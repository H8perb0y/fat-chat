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

table{
    text-align:center;
    width:600px;
}
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
<body bgcolor="white">
	<?php 
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
				<li class="active"><a href="index.php" accesskey="1" title="">Home</a></li>
				<li><a href="chat.php" accesskey="2" title="">Chat</a></li>
				<li><a href="gaestebuch.php" accesskey="2" title="">Gästebuch</a></li>
				<li><a href="aboutus.php" accesskey="3" title="">Über uns</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	
	<center>
	<br>  
                <h1>Mein Profil</h1>
                  <br>
                        
                           <?php
                           $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 

                                                        $benutzer = $_SESSION["benutzer"]; 
                                                        $benutzerid = $_SESSION["benutzerid"];
 
                                                        $sql = "SELECT * from Kunden where username = '$benutzer'";
                                                       
                                                        
                                                       
                                                        
                                                        $db_erg = mysqli_query( $db, $sql );
                                                        if ( ! $db_erg )
                                                        {
                                                          die('Ungültige Abfrage: ' . mysqli_error());
                                                        }
                                                        $zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC);
                                                        echo '<div class="CSSTableGenerator" >';
                                                        echo '<table>';
                                                         echo "<tr>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo '</tr>';
                                                        echo "<tr>";
                                                        echo "<td>Benutzername </td>";
                                                        echo "<td>". $zeile['username'] . "</td>";
                                                        echo '</tr>';
                                                        echo "<tr>";
                                                        echo "<td>Vorname </td>";
                                                        echo "<td>". $zeile['vorname'] . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>Nachname </td>";
                                                        echo "<td>". $zeile['nachname'] . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>E-Mail </td>";
                                                        echo "<td>". $zeile['email'] . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>Land </td>";
                                                        echo "<td>". $zeile['land'] . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>Stadt </td>";
                                                        echo "<td>". $zeile['stadt'] . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>Passwort ändern </td>";
                                                        echo '<td> <a href="pwchange.html" target="_parent"><button> Ändern </button></a></td>';
                                                        echo "</tr>";
                                                        echo "</table>";
                                                        echo "</div>";
                                                        mysqli_free_result( $db_erg );
                                                        
                                                       

                                                        ?> 

	
</div>
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>
</body>
</html>
