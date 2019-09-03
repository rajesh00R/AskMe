<?php include('server.php') ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>WEB PROJECT</title>

<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
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





    <div class="login"><div style="text-align: center; "><h3 style="font-weight:bold;font-family:cursive;">REGISTRATION</h3></div>
        <div class="tabcontent">
 <form action="register.php" method="post">
  <?php include('errors.php'); ?>
<div class="mdl-textfield mdl-js-textfield" style="width: 50%;">
    <br> <input class="mdl-textfield__input" type="text"  name="username" required>
    <label class="mdl-textfield__label" for="sample1">Username...</label>
</div><br>
<div class="mdl-textfield mdl-js-textfield" style="width: 50%;">
    <br> <input class="mdl-textfield__input" type="text"  name="email" required>
    <label class="mdl-textfield__label" for="sample1">Email...</label>
</div><br>
<div class="mdl-textfield mdl-js-textfield" style="width: 50%;">
    <br><input class="mdl-textfield__input" type="password" name="password_1" required>
    <label class="mdl-textfield__label" for="sample1">Password...</label>
</div><br>
<div class="mdl-textfield mdl-js-textfield" style="width: 50%;">
    <br><input class="mdl-textfield__input" type="password"  name="password_2" required>
    <label class="mdl-textfield__label" for="sample1">Confirm Password...</label>
</div><br><br>
  <button type="submit" name="reg_user" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  REGISTER
</button>
<br>
</form>
        </div>

</div> 

</body>
</html>