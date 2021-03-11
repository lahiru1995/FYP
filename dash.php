<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Worlds || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo" >My School</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
		<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
			
          </ul>
          <li <?php if(@$_GET['q']==6) echo'class="active"'; ?>><a href="dash.php?q=6">Lesson</a></li>
		  <li <?php if(@$_GET['q']==18) echo'class="active"'; ?>><a href="dash.php?q=18">Chat Room</a></li>
        </li><li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->
<!--lesson start-->
<?php if(@$_GET['q']==6) {

  echo ' <h3 align="center" >List of Lessons | Add <a href="dash.php?q=7" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> New</a></h3> ';

$q=mysqli_query($con,"SELECT * FROM lesson where Category= 'Docs' OR Category= 'Video'" )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>No</b></td><td><b>Chapter</b></td><td><b>Title</b></td><td><b>File Type</b></td><td><b>Action</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$c1=$row['LessonChapter'];
$t=$row['LessonTitle'];
$l=$row['FileLocation'];
$categ=$row['Category'];
$lid=$row['LessonID'];
//$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
//while($row=mysqli_fetch_array($q12) )
//{
//$name=$row['name'];
//$gender=$row['gender'];
//$college=$row['college'];
//}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$c1.'</td><td>'.$t.'</td><td>'.$categ.'</td>';

if ($categ=="Video") {
  # code...
  $view = "dash.php?q=11&id=".$lid;
}else{
  $view = "dash.php?q=10&id=".$lid;

}

echo '<td > <a title="Edit Details" href="dash.php?q=8&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span> Edit</a> 
<a title="Change File" href="dash.php?q=9&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-upload fw-fa"></span> Change File</a> 
 <a title="View Files"  href="'.$view.'" class="btn btn-info btn-xs" ><span class="fa fa-info fw-fa"></span> View</a>
 <a title="Delete" href="controller.php?action=delete&id='.$lid.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> Delete</a>
 </td>';

//echo '<td>';
}
echo '</table></div></div>';

//question papers
echo ' <h3 align="center" >List of Question papers | Add <a href="dash.php?q=13" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> New</a></h3> ';
$qp=mysqli_query($con,"SELECT * FROM lesson where Category=''" )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>No</b></td><td><b>Chapter</b></td><td><b>Question Paper Title</b></td><td><b>Action</b></td><td><b>Answers</b></td><td><b>Publish Marks</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($qp) )
{
$c1=$row['LessonChapter'];
$t=$row['LessonTitle'];
$l=$row['FileLocation'];
$categ=$row['Category'];
$lid=$row['LessonID'];

$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$c1.'</td><td>'.$t.'</td>';

if ($categ=="") {
  # code...
  $view = "dash.php?q=10&id=".$lid;
}else{
  $view = "dash.php?q=10&id=".$lid;

}

echo '<td > <a title="Edit Details" href="dash.php?q=14&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span> Edit</a> 
<a title="Change File" href="dash.php?q=9&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-upload fw-fa"></span> Change File</a> 
 <a title="View Files"  href="'.$view.'" class="btn btn-info btn-xs" ><span class="fa fa-info fw-fa"></span> View</a>
 <a title="Delete" href="controller.php?action=delete&id='.$lid.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> Delete</a>
 </td>
 <td > <a title="Edit Details" href="dash.php?q=15&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span>View Student Answers</a> </td>
 <td><a title="Change File" href="dash.php?q=17&id='.$lid.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-upload fw-fa"></span>Publish Marks</a></td>';

//echo '<td>';
}
echo '</table></div></div>';
}?>

<!--view answers table start-->
<?php if(@$_GET['q']==15) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}

$qp=mysqli_query($con,"SELECT * FROM questionanswer where questionId='{$id}'" )or die('Error223');
$c=0;
echo  '<div class="panel title"><div class="table-responsive">
<table id="exportTable" class="table table-striped title1" >
<tr style="color:red"><td><b>No</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Answers</b></td><td><b>Add Marks</b></td></tr>';
while($row=mysqli_fetch_array($qp) )
{
$sn=$row['studentName'];
$se=$row['studentEmail'];
$ll=$row['FileLocation'];
$ql=$row['questionId'];
$mk=$row['marks'];
$cp=$row['chapter'];
$ct=$row['questionTitle'];

if($mk==""){
  $mk="Enter Marks";
}else{
  $mk=$mk;
}
$view2 = "dash.php?q=16&id=".$ql;

$c++;


echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$sn.'</td><td>'.$se.'</td>';
echo '<td ><a title="View Files"  href="'.$view2.'" class="btn btn-info btn-xs" ><span class="fa fa-info fw-fa"></span> View</a></td>';
echo '<td> <form action="controller.php?action=editmarks"  method="POST" enctype="multipart/form-data">
<input class=" " id="marks" name="marks" placeholder="'.$mk.'" type="text" value="'.$mk.'"> 
<input name="flocation" id="flocation" type="hidden" type="text" value="'.$ll.'">
<input name="fid" id="fid" type="hidden" type="text" value="'.$ql.'">
<button class="btn btn-primary btn-sm" name="save3" type="submit" ><span class="fa fa-save fw-fa"></span>Add</button> 
 
  </form></td>
  
  ';
 
}
echo '</table></div>';
echo '<form action="controller.php?action=pdf" method="POST">
  <input name="fid" id="fid" type="hidden" type="text" value="'.$ql.'">   
  <input name="chapter" id="chapter" type="hidden" type="text" value="'.$cp.'"> 
  <input name="qtitle" id="qtitle" type="hidden" type="text" value="'.$ct.'"> 
  <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />    
</form> ';
echo '</div>';

}

?>
<!--view submitted answer-->
<?php if(@$_GET['q']==16) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$answer = New answer();
$res = $answer->single_answer1($id);

$fl = $res->FileLocation;
$sn = $res->studentName;
$se = $res->studentEmail;

echo '
<p style="font-size: 18px;font-weight: bold;">Student Name : '.$sn.' | Email : '.$se.'</p>
<div class="container">
	<embed src="'.$fl.'" type="application/pdf" width="100%" height="600px" />
</div>';
}
?>
<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->
<!--add new lesson-->
<?php if(@$_GET['q']==7) {
echo '<form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Upload New Lesson</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

 <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                 "Chapter" type="text" value="">
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                 "Title" type="text" value="">
           </div>
         </div>
       </div>

        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "Category">Select File Type:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <select class="form-control input-sm" id="Category" name="Category" >
                 <option>Docs</option>
                 <option>Video</option>
              </select>
           </div>
         </div>
       </div>

        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2" align = "right"for=
           "file">Upload File:</label>

           <div class="col-md-10">
           <input type="file" name="file"/>
           </div>
         </div>
       </div>

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';
}
?>
<!--end add lesson-->
<!--add new question papers-->
<?php if(@$_GET['q']==13) {
echo '<form class="form-horizontal span6" action="controller.php?action=addp" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Upload New Lesson</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

 <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                 "Chapter" type="text" value="">
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                 "Title" type="text" value="">
           </div>
         </div>
       </div>

        

        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2" align = "right"for=
           "file">Upload File:</label>

           <div class="col-md-10">
           <input type="file" name="file"/>
           </div>
         </div>
       </div>

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';
}
?>
<!--edit lesson start-->
<?php if(@$_GET['q']==8) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;


echo '<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Update Lesson</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

 <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="LessonID" type="hidden" value="'.$lid.'">
              <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                 "Chapter" type="text" value="'.$lc.'">
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                 "Title" type="text" value="'.$lt.'">
           </div>
         </div>
       </div>

       <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "Category">Select File Type:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <select class="form-control input-sm" id="Category" name="Category" >
                 <option <?php echo ('.$cc.' == "Docs") ? "Selected" : ""?>Docs</option>
                 <option <?php echo ('.$cc.' == "Video") ? "Selected" : ""?>Video</option>
              </select>
           </div>
         </div>
       </div>

<!--              <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2" align = "right"for=
           "file">Upload File:</label>

           <div class="col-md-10">
           <input type="file" name="file" value="'.$fl.'" />
           </div>
         </div>
       </div> -->

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';
}
?>
<!--edit question start-->
<?php if(@$_GET['q']==14) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;


echo '<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Update Lesson</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

 <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="LessonID" type="hidden" value="'.$lid.'">
              <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                 "Chapter" type="text" value="'.$lc.'">
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="LessonTitle" name="LessonTitle" placeholder=
                 "Title" type="text" value="'.$lt.'">
           </div>
         </div>
       </div>

    

<!--              <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2" align = "right"for=
           "file">Upload File:</label>

           <div class="col-md-10">
           <input type="file" name="file" value="'.$fl.'" />
           </div>
         </div>
       </div> -->

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';
}
?>
<!--update file start-->
<?php if(@$_GET['q']==9) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;


echo '<form class="form-horizontal span6" action="controller.php?action=updatefiles" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Update Files</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

<div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="LessonID" type="hidden" value="'.$lid.'">
             <label class="control-label">'.$lc.'</label>
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
             <label class="control-label">'.$lt.'</label>
           </div>
         </div>
       </div>

       <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "Category">File Type:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
              <label class="control-label">'.$cc.'</label>
           </div>
         </div>
       </div>


  <div class="form-group">
   <div class="col-md-11">
     <label class="col-md-2" align = "right"for=
     "file">Upload File:</label>

     <div class="col-md-10"> 
     <input type="file" name="file" value="'.$fl.'" />
     </div>
   </div>
 </div>

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';
}
?>

<!--publish answers file start-->
<?php if(@$_GET['q']==17) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;
$ml = $res->marksLocation;

echo '<form class="form-horizontal span6" action="controller.php?action=publishmarks" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
 <h1 class="page-header">Publish Marks</h1>
</div>
<!-- /.col-lg-12 -->
</div> 

<div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonChapter">Chapter:</label>

           <div class="col-md-10">
             <input name="LessonID" type="hidden" value="'.$lid.'">
             <label class="control-label">'.$lc.'</label>
           </div>
         </div>
       </div>
           
        <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "LessonTitle">Title:</label>

           <div class="col-md-10">
             <input name="deptid" type="hidden" value="">
             <label class="control-label">'.$lt.'</label>
           </div>
         </div>
       </div>

      


  <div class="form-group">
   <div class="col-md-11">
     <label class="col-md-2" align = "right"for=
     "file">Upload File:</label>

     <div class="col-md-10"> 
     <input type="file" name="file" value="'.$fl.'" />
     </div>
   </div>
 </div>

  <div class="form-group">
         <div class="col-md-11">
           <label class="col-md-2 control-label" for=
           "idno"></label>

           <div class="col-md-10">
            <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
              </div>
         </div>
       </div> 
</form> ';

//$answer = new answer();
//$res1 = $answer->single_answer($id, $email);
//$ansfl = $res1->FileLocation;
if($ml==""){
  echo '<h2></h2>';
}else{
echo '<h2><?php echo '.$lt.' ; ?></h2>
<p style="font-size: 18px;font-weight: bold;">Uploaded Marks File: </p>
<div class="container">
	<embed src="'.$ml.'" type="application/pdf" width="100%" height="600px" />
</div>';}

}
?>
<!--view pdf start-->
<?php if(@$_GET['q']==10) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;
$title = "view file";

echo '<h2><?php echo '.$title.' ; ?></h2>
<p style="font-size: 18px;font-weight: bold;">Chapter : '.$lc.' | Title : '.$lt.'</p>
<div class="container">
	<embed src="'.$fl.'" type="application/pdf" width="100%" height="400px" />
</div>';
}
?>

<!--play video start-->
<?php if(@$_GET['q']==11) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}
$lesson = New Lesson();
$res = $lesson->single_lesson($id);
$lc = $res->LessonChapter;
$lid = $res->LessonID;
$lt = $res->LessonTitle; 
$fl = $res->FileLocation;
$cc = $res->Category;



echo '
<h3>Play Video</h3> 
<div class="container" >
 <video width="420" heigth="240" controls>
    <source src="'.$fl.'" type="video/mp4">
    <source src="'.$fl.'" type="video/ogg"> 
  </video>
    
      <div class="col-lg-12">Description</div>
       <div class="col-lg-12">
         <label class="col-md-2" class="control-label">Chapter  :</label>
         <label class="col-md-10" class="control-label">'.$lc.'</label>
       </div>
       <div class="col-lg-12">
         <label class="col-md-2" class="control-label">Title   : </label>
         <label class="col-md-10" class="control-label">'.$lt.'</label>
       </div> 
</div> 
  ';
}
?>
<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


<!--chat start-->
<?php if(@$_GET['q']==18) {
  require_once ("include/initialize.php");
@$id = $_GET['id'];
 if($id==''){
//redirect("index.php");
}

$name = $_SESSION['name'];
$_SESSION['user'] = $name;
echo '
<div class="centeralised">
	
	<div class="chathistory"></div>

	<div class="chatbox">
		
		<form action="" method="POST">
			
			<textarea class="txtarea" id="message" name="message"></textarea>

		</form>

	</div>

	</div>
	
	<style>
	.centeralised{
	margin:10px auto;
	width:1000px;
	text-align:center;
	
}

.chathistory{
	min-height:500px;
	width:600px;
	margin:10px auto;
	padding:10px;
	background:#f1f1f1;
	text-align:left;
	border: 1px solid #b3b3b3;
	overflow: scroll;
}


.txtarea{
	min-height:100px;
	width:600px;
	margin:10px auto;
	padding:10px;
}

.siglemessage{
	font-size:12px;
	padding:5px;
	border-bottom:1px solid #b3b3b3;
}</style>';
}
?>

<script>


		$(document).ready(function(){
			loadChat();
		});


		
		$('#message').keyup(function(e){


			var message = $(this).val();

			if( e.which == 13 ){

				$.post('handlers/ajax.php?action=SendMessage&message='+message, function(response){
					
					loadChat();
					$('#message').val('');

				});

			}

		});



		function loadChat()
		{
			$.post('handlers/ajax.php?action=getChat', function(response){
				
				$('.chathistory').html(response);

			});
		}


		setInterval(function(){
			loadChat();
		}, 2000);

	</script>

</div><!--container closed-->
</div></div>
</body>
</html>
