<?php
session_start(); 
require_once dirname(__FILE__)."/src/phpfreechat.class.php";
$params = array();
$params['de_DE-informal'];
$params["nick"] = ""; // setup the intitial nickname
$params['firstisadmin'] = false;
//$params["isadmin"] = false; // makes everybody admin: do not use it on production servers ;)
$params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
$params["debug"] = false;
$params["refresh_delay"] = 0; // 2000ms = 2s
$params["admins"] = array(
   'Muskeltier1' => '1234',
   'Muskeltier2' => '1234',
   'Muskeltier3' => '1234',
   'Muskeltier4' => '1234' );
   
   $params["channels"] = array("Allgemein","Gaming","Kennenlernen");
$chat = new phpFreeChat( $params );



?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" title="classic" type="text/css" href="style/header.css" />
<link rel="stylesheet" title="classic" type="text/css" href="style/footer.css" />
<link rel="stylesheet" title="classic" type="text/css" href="style/menu.css" />
<link rel="stylesheet" title="classic" type="text/css" href="style/content.css" />  
 
      <title>Fat-Chat</title>
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
 
    <body>
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
			<h1><a href="#">Fat-Chat</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li ><a href="index.php" accesskey="1" title="">Home</a></li>
				<li class="active"><a href="chat.php" accesskey="2" title="">Chat</a></li>
				<li><a href="gaestebuch.php" accesskey="2" title="">Gästebuch</a></li>
				<li><a href="aboutus.php" accesskey="3" title="">Über uns</a></li>
			</ul>
		</div>
	</div>
</div>
     
      <?php $chat->printChat(); ?>
  <?php if (isset($params["isadmin"]) && $params["isadmin"]) { ?>
    <p style="color:red;font-weight:bold;">Warning: because of "isadmin" parameter, everybody is admin. Please modify this script before using it on production servers!</p>
  <?php } ?>
  
  <div class="wrapper">
    <br>
		 <center><h3>&copy; 2016 Fat-Chat. All rights reserved.</h3></center>
</div>

  </body>
  </html>