<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Worlds || TEST YOUR SKILL </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <style><?php include 'css/main.css'; ?></style>
 <style><?php include 'css/font.css'; ?></style>
 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">My School</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
//header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar" <?php  echo'class="active"'; ?> ></span>
      </button>
      <a class="navbar-brand" href="homet.php"><b>Back</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
	    	<li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		</ul>
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--class button start-->
<br>



<!--class button end-->


<!--home start-->
<?php if(@$_GET['q']==1) {

echo '<div class="container">

      <div class="row">
      <div class="col text-center">
        <div class="col-lg-12">
          <p>
          <a href="dash.php?c=1&s=math" class="btn btn-primary btn-lg btn-block">
                <i></i>
                ගණිතය  - Mathematics
            </a>
            <a href="dash.php?c=1&s=Buddhism" class="btn btn-primary btn-lg btn-block">
                <i></i>
                බුද්ධ ධර්මය  -  Buddhism
            </a>
            
            <a href="dash.php?c=1&s=Sinhala" class="btn btn-primary btn-lg btn-block">
                <i></i>
                මව්බස - Sinhala Language 
            </a>
            <a href="dash.php?c=1&s=Tamil" class="btn btn-primary btn-lg btn-block">
              <i></i>
               දෙමළ භාෂාව  - Tamil Language     
            </a>
            <a href="dash.php?c=1&s=English" class="btn btn-primary btn-lg btn-block">
                <i></i>
              ඉංග්‍රීසි භාෂාව - English Language      
            </a>
        <a href="dash.php?c=1&s=Environment" class="btn btn-primary btn-lg btn-block">
                <i></i>
                පරිසරය ආශ්‍රිත ක්‍රියාකාරකම් - Environment Related Activities
            </a>
        
          
          </p>
        </div>
        </div>
    </div>

</div>';

}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

<!--home closed-->

<!--quiz start-->

<!--quiz end-->
<?php
//history start
if(@$_GET['q']== 2) 
{
  echo '<div class="container">

      <div class="row">
      <div class="col text-center">
        <div class="col-lg-12">
          <p>
          <a href="dash.php?c=2&s=math" class="btn btn-primary btn-lg btn-block">
                <i></i>
                ගණිතය  - Mathematics
            </a>
            <a href="dash.php?c=2&s=Buddhism" class="btn btn-primary btn-lg btn-block">
                <i></i>
                බුද්ධ ධර්මය  -  Buddhism
            </a>
            
            <a href="dash.php?c=2&s=Sinhala" class="btn btn-primary btn-lg btn-block">
                <i></i>
                මව්බස - Sinhala Language 
            </a>
            <a href="dash.php?c=2&s=Tamil" class="btn btn-primary btn-lg btn-block">
              <i></i>
               දෙමළ භාෂාව  - Tamil Language     
            </a>
            <a href="dash.php?c=2&s=English" class="btn btn-primary btn-lg btn-block">
                <i></i>
              ඉංග්‍රීසි භාෂාව - English Language      
            </a>
        <a href="dash.php?c=2&s=Environment" class="btn btn-primary btn-lg btn-block">
                <i></i>
                පරිසරය ආශ්‍රිත ක්‍රියාකාරකම් - Environment Related Activities
            </a>
        
          
          </p>
        </div>
        </div>
    </div>

</div>';
}

//ranking start
if(@$_GET['q']== 3) 
{
  echo '<div class="container">

      <div class="row">
      <div class="col text-center">
        <div class="col-lg-12">
          <p>
          <a href="dash.php?c=3&s=math" class="btn btn-primary btn-lg btn-block">
                <i></i>
                ගණිතය  - Mathematics
            </a>
            <a href="dash.php?c=3&s=Buddhism" class="btn btn-primary btn-lg btn-block">
                <i></i>
                බුද්ධ ධර්මය  -  Buddhism
            </a>
            
            <a href="dash.php?c=3&s=Sinhala" class="btn btn-primary btn-lg btn-block">
                <i></i>
                මව්බස - Sinhala Language 
            </a>
            <a href="dash.php?c=3&s=Tamil" class="btn btn-primary btn-lg btn-block">
              <i></i>
               දෙමළ භාෂාව  - Tamil Language     
            </a>
            <a href="dash.php?c=3&s=English" class="btn btn-primary btn-lg btn-block">
                <i></i>
              ඉංග්‍රීසි භාෂාව - English Language      
            </a>
        <a href="dash.php?c=3&s=Environment" class="btn btn-primary btn-lg btn-block">
                <i></i>
                පරිසරය ආශ්‍රිත ක්‍රියාකාරකම් - Environment Related Activities
            </a>
        
          
          </p>
        </div>
        </div>
    </div>

</div>';}

if(@$_GET['q']== 4) 
{
  echo '<div class="container">

      <div class="row">
      <div class="col text-center">
        <div class="col-lg-12">
          <p>
          <a href="dash.php?c=4&s=math" class="btn btn-primary btn-lg btn-block">
                <i></i>
                ගණිතය  - Mathematics
            </a>
            <a href="dash.php?c=4&s=Buddhism" class="btn btn-primary btn-lg btn-block">
                <i></i>
                බුද්ධ ධර්මය  -  Buddhism
            </a>
            
            <a href="dash.php?c=4&s=Sinhala" class="btn btn-primary btn-lg btn-block">
                <i></i>
                මව්බස - Sinhala Language 
            </a>
            <a href="dash.php?c=4&s=Tamil" class="btn btn-primary btn-lg btn-block">
              <i></i>
               දෙමළ භාෂාව  - Tamil Language     
            </a>
            <a href="dash.php?c=4&s=English" class="btn btn-primary btn-lg btn-block">
                <i></i>
              ඉංග්‍රීසි භාෂාව - English Language      
            </a>
        <a href="dash.php?c=4&s=Environment" class="btn btn-primary btn-lg btn-block">
                <i></i>
                පරිසරය ආශ්‍රිත ක්‍රියාකාරකම් - Environment Related Activities
            </a>
        
          
          </p>
        </div>
        </div>
    </div>

</div>';}

if(@$_GET['q']== 5) 
{
  echo '<div class="container">

      <div class="row">
      <div class="col text-center">
        <div class="col-lg-12">
          <p>
          <a href="dash.php?c=5&s=math" class="btn btn-primary btn-lg btn-block">
                <i></i>
                ගණිතය  - Mathematics
            </a>
            <a href="dash.php?c=5&s=Buddhism" class="btn btn-primary btn-lg btn-block">
                <i></i>
                බුද්ධ ධර්මය  -  Buddhism
            </a>
            
            <a href="dash.php?c=5&s=Sinhala" class="btn btn-primary btn-lg btn-block">
                <i></i>
                මව්බස - Sinhala Language 
            </a>
            <a href="dash.php?c=5&s=Tamil" class="btn btn-primary btn-lg btn-block">
              <i></i>
               දෙමළ භාෂාව  - Tamil Language     
            </a>
            <a href="dash.php?c=5&s=English" class="btn btn-primary btn-lg btn-block">
                <i></i>
              ඉංග්‍රීසි භාෂාව - English Language      
            </a>
        <a href="dash.php?c=5&s=Environment" class="btn btn-primary btn-lg btn-block">
                <i></i>
                පරිසරය ආශ්‍රිත ක්‍රියාකාරකම් - Environment Related Activities
            </a>
        
          
          </p>
        </div>
        </div>
    </div>

</div>';}


if(@$_GET['q']== 6) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=6&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=6&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=6&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=6&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=6&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=6&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=6&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=6&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=6&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=6&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=6&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=6&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=6&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=6&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 7) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=7&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=7&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=7&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=7&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=7&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=7&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=7&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=7&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=7&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=7&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=7&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=7&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=7&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=7&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 8) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=8&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=8&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=8&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=8&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=8&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=8&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=8&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=8&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=8&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=8&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=8&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=8&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=8&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=8&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 9) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=9&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=9&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=9&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=9&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=9&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=9&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=9&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=9&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=9&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=9&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=9&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=9&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=9&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=9&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 10) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=10&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=10&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=10&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=10&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=10&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=10&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=10&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=10&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=10&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=10&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=10&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=10&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=10&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=10&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
<a href="dash.php?c=10&s=BusinessStu" class="btn btn-primary btn-lg btn-block">
<i></i>
ව්‍යාපාර අධ්‍යයනය හා ගිණුම්කරණය - Business Studies & Accounts
</a>
<a href="dash.php?c=10&s=Home" class="btn btn-primary btn-lg btn-block">
<i></i>
ගෘහ ආර්ථික විද්‍යාව - Home Economics
</a>
<a href="dash.php?c=10&s=Enterpreneurial" class="btn btn-primary btn-lg btn-block">
<i></i>
ව්‍යවසායකත්ව අධ්‍යයනය - Enterpreneurial Education
</a>
<a href="dash.php?c=10&s=engLiterature" class="btn btn-primary btn-lg btn-block">
<i></i>
ඉංග්‍රීසි භාෂාව හා සාහිත්‍ය - English Literature
</a>
<a href="dash.php?c=10&s=sinLiterature" class="btn btn-primary btn-lg btn-block">
<i></i>
සිංහල භාෂාව හා සාහිත්‍ය - Sinhala Literature
</a>
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 11) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=11&s=Math" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ගණිතය  - Mathematics
  </a>
  <a href="dash.php?c=11&s=Sci" class="btn btn-primary btn-lg btn-block">
  <i></i>
  විද්‍යාව - Science
</a>
  <a href="dash.php?c=11&s=Buddhism" class="btn btn-primary btn-lg btn-block">
      <i></i>
      බුද්ධ ධර්මය  -  Buddhism
  </a>
  
  <a href="dash.php?c=11&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සිංහල භාෂාව - Sinhala Language 
  </a>
  <a href="dash.php?c=11&s=Tamil" class="btn btn-primary btn-lg btn-block">
    <i></i>
     දෙමළ භාෂාව  - Tamil Language     
  </a>
  <a href="dash.php?c=11&s=English" class="btn btn-primary btn-lg btn-block">
      <i></i>
    ඉංග්‍රීසි භාෂාව - English Language      
  </a>
<a href="dash.php?c=11&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ඉතිහාසය - History
  </a>
  <a href="dash.php?c=11&s=Life" class="btn btn-primary btn-lg btn-block">
      <i></i>
      ජීවන නිපුණතා හා පුරවැසි අධ්‍යාපනය - Life skills & Citizenshipn Education
  </a>
  
  <a href="dash.php?c=11&s=IT" class="btn btn-primary btn-lg btn-block">
      <i></i>
      තොරතුරු හා සන්නිවේදන තාක්ෂණය - Information & Communication Technology
  </a>
  
<a href="dash.php?c=11&s=Geography" class="btn btn-primary btn-lg btn-block">
<i></i>
භූගෝල විද්‍යාව - Geography
</a>

<a href="dash.php?c=11&s=Health" class="btn btn-primary btn-lg btn-block">
<i></i>
සෞඛ්‍ය හා ශාරීරික අධ්‍යාපනය - Health & Physical Education
</a>
<a href="dash.php?c=11&s=Music" class="btn btn-primary btn-lg btn-block">
      <i></i>
      සංගීතය - Music
  </a>
  <a href="dash.php?c=11&s=Art" class="btn btn-primary btn-lg btn-block">
      <i></i>
      චිත්‍ර කලාව - Art
  </a>
  <a href="dash.php?c=11&s=Dancing" class="btn btn-primary btn-lg btn-block">
<i></i>
නර්තනය - Dancing
</a>
<a href="dash.php?c=11&s=BusinessStu" class="btn btn-primary btn-lg btn-block">
<i></i>
ව්‍යාපාර අධ්‍යයනය හා ගිණුම්කරණය - Business Studies & Accounts
</a>
<a href="dash.php?c=11&s=Home" class="btn btn-primary btn-lg btn-block">
<i></i>
ගෘහ ආර්ථික විද්‍යාව - Home Economics
</a>
<a href="dash.php?c=11&s=Enterpreneurial" class="btn btn-primary btn-lg btn-block">
<i></i>
ව්‍යවසායකත්ව අධ්‍යයනය - Enterpreneurial Education
</a>
<a href="dash.php?c=11&s=engLiterature" class="btn btn-primary btn-lg btn-block">
<i></i>
ඉංග්‍රීසි භාෂාව හා සාහිත්‍ය - English Literature
</a>
<a href="dash.php?c=11&s=sinLiterature" class="btn btn-primary btn-lg btn-block">
<i></i>
සිංහල භාෂාව හා සාහිත්‍ය - Sinhala Literature
</a>
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 112) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=112&s=Physics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Physics - භෞතික විද්‍යාව
  </a>
  <a href="dash.php?c=112&s=Chemistry" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Chemistry - රසායන විද්‍යාව
</a>
  <a href="dash.php?c=112&s=Combined" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Combined Maths - සංයුක්ත ගණිතය
  </a>
  
  <a href="dash.php?c=112&s=IT" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Information and Communication Technology  - තොරතුරු තාක්ෂනය     
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 212) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=212&s=Physics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Physics - භෞතික විද්‍යාව
  </a>
  <a href="dash.php?c=212&s=Chemistry" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Chemistry - රසායන විද්‍යාව
</a>
  <a href="dash.php?c=212&s=Biology" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Biology - ජීව විද්‍යාව
  </a>
  
  <a href="dash.php?c=212&s=Agricultural" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Agricultural science -  කෘෂිකාර්මික විද්‍යාව    
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 312) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=312&s=Accounting" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Accounting - ගිණුම්කරණය
  </a>
  <a href="dash.php?c=312&s=BusinessStu" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Business Studies  - ව්‍යාපාර අධ්‍යයනය
</a>
  <a href="dash.php?c=312&s=Economics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Economics - ආර්ථික විද්‍යාව
  </a>
  
  <a href="dash.php?c=312&s=IT" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Information Technology -  තොරතුරු තාක්ෂනය    
  </a>
  <a href="dash.php?c=312&s=BusinessSta" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Business Statistics -  ව්‍යාපාර සංඛ්‍යානය 
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 412) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=412&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Sinhala - උසස් පෙළ සිංහල
  </a>
  <a href="dash.php?c=412&s=Logic" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Logic - තර්ක ශාස්ත්‍රය
</a>
  <a href="dash.php?c=412&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      History - ලංකා සහ ඉන්දියා ඉතිහාසය
  </a>
  
  <a href="dash.php?c=412&s=Geography" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Geography - භූගෝල විද්‍යාව   
  </a>
  <a href="dash.php?c=412&s=Buddhist" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Buddhist Civilization - බෞද්ධ දර්ශනය ස‍හ බෞද්ධ ශීෂ්ඨාචාරය 
  </a>
  <a href="dash.php?c=412&s=Political" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Political Science - දේශපාලන විද්‍යාව  
  </a>
  <a href="dash.php?c=412&s=Economics" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Economics - ආර්ථික විද්‍යාව 
</a>
  <a href="dash.php?c=412&s=Music" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Music - උසස් පෙළ සංගීතය
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 512) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=512&s=Science4" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Science for Technology - තාක්ෂණවේදය සදහා විද්‍යාව 
  </a>
  <a href="dash.php?c=512&s=Bio" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Bio Systems - ජෛව පද්ධති
</a>
  <a href="dash.php?c=512&s=Engineering" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Engineering Technology - ඉංජිනේරු තාක්ෂණය 
  </a>
  
  <a href="dash.php?c=512&s=Geography" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Geography - භූගෝල විද්‍යාව   
  </a>
  
  
  <a href="dash.php?c=512&s=Economics" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Economics - ආර්ථික විද්‍යාව 
</a>
<a href="dash.php?c=512&s=it" class="btn btn-primary btn-lg btn-block">
<i></i>
Information Technology -  තොරතුරු තාක්ෂනය    
</a>
<a href="dash.php?c=512&s=Accounting" class="btn btn-primary btn-lg btn-block">
<i></i>
Accounting - ගිණුම්කරණය
</a>
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 113) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=113&s=Physics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Physics - භෞතික විද්‍යාව
  </a>
  <a href="dash.php?c=113&s=Chemistry" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Chemistry - රසායන විද්‍යාව
</a>
  <a href="dash.php?c=113&s=Combined" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Combined Maths - සංයුක්ත ගණිතය
  </a>
  
  <a href="dash.php?c=113&s=IT" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Information and Communication Technology  - තොරතුරු තාක්ෂනය     
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}


if(@$_GET['q']== 213) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=213&s=Physics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Physics - භෞතික විද්‍යාව
  </a>
  <a href="dash.php?c=213&s=Chemistry" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Chemistry - රසායන විද්‍යාව
</a>
  <a href="dash.php?c=213&s=Biology" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Biology - ජීව විද්‍යාව
  </a>
  
  <a href="dash.php?c=213&s=Agricultural" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Agricultural science -  කෘෂිකාර්මික විද්‍යාව    
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 313) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=313&s=Accounting" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Accounting - ගිණුම්කරණය
  </a>
  <a href="dash.php?c=313&s=BusinessStu" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Business Studies  - ව්‍යාපාර අධ්‍යයනය
</a>
  <a href="dash.php?c=313&s=Economics" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Economics - ආර්ථික විද්‍යාව
  </a>
  
  <a href="dash.php?c=313&s=IT" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Information Technology -  තොරතුරු තාක්ෂනය    
  </a>
  <a href="dash.php?c=313&s=BusinessSta" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Business Statistics -  ව්‍යාපාර සංඛ්‍යානය 
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 413) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=413&s=Sinhala" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Sinhala - උසස් පෙළ සිංහල
  </a>
  <a href="dash.php?c=413&s=Logic" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Logic - තර්ක ශාස්ත්‍රය
</a>
  <a href="dash.php?c=413&s=History" class="btn btn-primary btn-lg btn-block">
      <i></i>
      History - ලංකා සහ ඉන්දියා ඉතිහාසය
  </a>
  
  <a href="dash.php?c=413&s=Geography" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Geography - භූගෝල විද්‍යාව   
  </a>
  <a href="dash.php?c=413&s=Buddhist" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Buddhist Civilization - බෞද්ධ දර්ශනය ස‍හ බෞද්ධ ශීෂ්ඨාචාරය 
  </a>
  <a href="dash.php?c=413&s=Political" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Political Science - දේශපාලන විද්‍යාව  
  </a>
  <a href="dash.php?c=413&s=Economics" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Economics - ආර්ථික විද්‍යාව 
</a>
  <a href="dash.php?c=413&s=Music" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Music - උසස් පෙළ සංගීතය
  </a>
  
      </p>
    </div>
    </div>
</div>


</div>';}



if(@$_GET['q']== 513) 
{
  echo '<div class="container">

  <div class="row">
  <div class="col text-center">
    <div class="col-lg-12">
      <p>
      <a href="dash.php?c=513&s=Science4" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Science for Technology - තාක්ෂණවේදය සදහා විද්‍යාව 
  </a>
  <a href="dash.php?c=513&s=Bio" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Bio Systems - ජෛව පද්ධති
</a>
  <a href="dash.php?c=513&s=Engineering" class="btn btn-primary btn-lg btn-block">
      <i></i>
      Engineering Technology - ඉංජිනේරු තාක්ෂණය 
  </a>
  
  <a href="dash.php?c=513&s=Geography" class="btn btn-primary btn-lg btn-block">
    <i></i>
    Geography - භූගෝල විද්‍යාව   
  </a>
  
  
  <a href="dash.php?c=513&s=Economics" class="btn btn-primary btn-lg btn-block">
  <i></i>
  Economics - ආර්ථික විද්‍යාව 
</a>
<a href="dash.php?c=513&s=it" class="btn btn-primary btn-lg btn-block">
<i></i>
Information Technology -  තොරතුරු තාක්ෂනය    
</a>
<a href="dash.php?c=513&s=Accounting" class="btn btn-primary btn-lg btn-block">
<i></i>
Accounting - ගිණුම්කරණය
</a>
      </p>
    </div>
    </div>
</div>


</div>';}
?>



</div></div></div></div>
<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="http://www.projectworlds.in/online-examination" target="_blank">About us</a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login">Admin Login</a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers">Developers</a>
</div>
<div class="col-md-3 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/CAM00121.jpg" width=100 height=100 alt="Sunny Prakash Tiwari" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="http://yugeshverma.blogspot.in" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Yugesh Verma</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91 9165063741</h4>
		<h4 style="font-family:'typo' ">vermayugesh323@gmail.com</h4>
		<h4 style="font-family:'typo' ">Chhattishgarh insitute of management & Technology ,bhilai</h4></div></div>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>
