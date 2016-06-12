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
	<div id="welcome" class="container">

<div class="title">
	  <h2>Willkommen bei Fat-Chat</h2>
		</div>
		<p>Fat-Chat ist ein <strong>gratis</strong> online Chat für jeden.</p>
		<br>
		<p>Um jetzt mit dem Chatten zu beginnen wechsle zum tab "Chat".</p>
	</div>
</div>
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>
</body>
</html>
