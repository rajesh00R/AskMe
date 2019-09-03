<?php
session_start();
$errors = array(); 
$db = mysqli_connect('localhost', 'root', '');
//chech connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
 mysqli_select_db($db,"registration");
 
if (isset($_POST['art'])) {
    $username=$_SESSION['username'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $article = $_POST['article'];
    
  	$query = "INSERT INTO blogs(username,category,title,article) 
  		  VALUES('$username','$category','$title','$article')";
  	mysqli_query($db, $query);
       
        $query = "INSERT INTO $username(category,title,article) 
  		  VALUES('$category','$title','$article')";
  	mysqli_query($db, $query);    
  	header('location: article.php');
}

if (isset($_POST['que'])) {
    $username=$_SESSION['username'];
    
    $category = $_POST['category'];
    
    $question = $_POST['question'];


  	$query = "INSERT INTO allquestion(username,category,question) 
  		  VALUES('$username','$category','$question')";
  	mysqli_query($db, $query);
        
        $query = "INSERT INTO $username(category,question) 
  		  VALUES('$category', '$question')";
  	mysqli_query($db, $query);    
  	header('location: index.php');
}
if (isset($_POST['ans'])) {
    $username=$_SESSION['username'];
 
    $qid=$_POST['qid'];
    $answer = $_POST['answer'];

  	$query = "INSERT INTO answers(username,qid,answer) 
  		  VALUES('$username','$qid', '$answer')";
  	mysqli_query($db, $query);
        $query = "INSERT INTO $username(qid,answer) 
  		  VALUES('$qid', '$answer')";
  	mysqli_query($db, $query);    
  	header('location: index.php');
}


?>

