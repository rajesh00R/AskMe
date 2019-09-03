<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>WEB PROJECT</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" type="text/css" href="home.css">

</head>
<body>

<div class="head">
<li style="float:left;font-family:cursive; font-size:40px; color:#f57f17; padding:20px; margin-left:100px;"><b>ASK ME</b></li>
<ul>
	
	<li style="float:right;margin-right: 100px; font-size:15px; padding:10px;"><?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>
            <a href="index.php?logout='1'">LOGOUT</a></p>
    <?php else: ?>
	<a href="login.php">LOGIN</a><a href="register.php">REGISTER</a>
<?php endif; ?></li>

	
</ul>
<div class="top"><ul style="float:left; font-size:15px;margin-left:100px; padding:4px;">
        <li style="position:relative;"><a href="index.php">HOME</a></li>
    <!--<li style="position:relative;"><a href="ask.php">PROFILE</a></li>-->
        <li style="position:relative;"><a href="article.php">ARTICLES</a></li></ul>

	</div>
</div>
    
<div class="show"><div class="left">
       
        <br><a href="#">Science</a><br>
         <a href="#">Technology</a>
        </div>

    <div class="right">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'registration');

         if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
            }
    
            $result = mysqli_query($db,"SELECT * FROM blogs ORDER BY reg_date DESC");
		 while( $row = mysqli_fetch_assoc($result) ){
	?>
        <div class="ques">	
            <div style="color:#f57f17; box-shadow: 5px 10px 18px #888888;">   <h3 style="font-family:cursive; "><?php echo $row['title']; ?></h3><br>	
            <p>User:<?php echo $row['username']; ?>
                    Category:<?php echo $row['category']; ?></p></div>
            <div style="padding: 20px;"> <h4><b><?php echo $row['article']; ?></b></h4></div>
                
        </div><br><br>
             <?php } ?>
            
        
		
    
    </div></div>




</body>
</html>

