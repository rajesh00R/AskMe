<?php 

  session_start(); 
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
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
     <ul style="float:right; font-size:14px;margin-right:100px; padding:4px;">   
         <li style="position:relative; margin:0px 0px 0px 10px;"><a class="button" href="#popup1"><b>ASK QUESTION</b></a><li>
         <li style="position:relative; margin:0px 0px 0px 10px;"><a class="button" href="#popup2"><b>WRITE ARTICLE</b></a><li>
     </ul>

<div id="popup1" class="overlay">
	<div class="popup">
            <h2><b>Ask Your Question</b></h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			 <form action="server1.php" method="post">
<div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "4" id="sample5" name="question"></textarea>
    <label class="mdl-textfield__label" for="sample5">Write Here...</label>
  </div>
</textarea><br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
        <select class="mdl-textfield__input" id="stream" name="category">
      <option></option>
      <option>Technology</option>
<option>Science</option>
<option>History</option>
<option>Geogrphy</option>
<option>Entertainment</option>
<option>Sports</option>
<option>Just for Fun</option>
      
    </select>
    <label class="mdl-textfield__label" for="octane">Category</label>
    </div>
<button type="submit" name="que" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  ASK
</button>
                         </form>
</div>
		</div>
	</div>
    <div id="popup2" class="overlay">
	<div class="popup">
            <h2><b>Write Your Article</b></h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
	<form action="server1.php" method="post">
       <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" id="sample1" name="title">
    <label class="mdl-textfield__label" for="sample1">Title...</label>
  </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
        <select class="mdl-textfield__input" id="stream" name="category">
      <option></option>
      <option>Technology</option>
<option>Science</option>
<option>History</option>
<option>Geogrphy</option>
<option>Entertainment</option>
<option>Sports</option>
<option>Just for Fun</option>
      
    </select>
    <label class="mdl-textfield__label" for="octane">Category</label>
    </div>
        
       
<div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "8" cols="100" id="sample5" name="article"></textarea>
    <label class="mdl-textfield__label" for="sample5">Write Here...</label>
  </div><br>
<button type="submit" name="art" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  POST
</button>
</form>
</div>
		</div>
	</div>
</div>
    
    
</div>

    <div class="show"><div class="left">
       
        <br><a href="article.php">ARTICLES</a>
         <a href="index.php">QUESTIONS</a>
        </div>
   
    <div class="right">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'registration');

         if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
            }
    
            $result = mysqli_query($db,"SELECT * FROM allquestion ORDER BY reg_date DESC");
		 while( $row = mysqli_fetch_assoc($result) ){
	?>
        <div class="ques">	
            <div style="font-family:cursive; color:#f57f17; box-shadow: 5px 10px 18px #888888;"> <h4 style="font-family:cursive;"><?php echo $row['question']; ?></h4>	
            <p>User:<?php echo $row['username']; ?>
            Category:<?php echo $row['category']; ?></div>
            <?php $qid=$row['id']; ?></p>
            
            <div class="comment">
                <?php  $result1 = mysqli_query($db,"SELECT * FROM answers ");
		 while( $row1 = mysqli_fetch_assoc($result1) ){
                     if($qid==$row1['qid']){
                ?>
                <h5 style="color:#212121; font-family: system-ui;">User:<?php echo $row1['username']; ?></h5>
                <p><b><?php echo $row1['answer']; ?></b></p><br> 
                 <?php } }?>
            </div><br>
            <form action="server1.php" method="post">
            
             <input type="hidden" name="qid" value="<?php echo $qid;?>" />
            <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "2" id="sample5" name="answer"></textarea>
    <label class="mdl-textfield__label" for="sample5">Write Your Answer Here...</label>
  </div>
            <br><button type="submit" name="ans" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  SUBMIT
</button></form>
            <br>
        </div><br><br>
		
            <?php } ?>
    
    </div>

</div>
    

</body>
</html>
