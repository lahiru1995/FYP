<?php
require_once ("include/initialize.php");
	//if(!isset($_SESSION['USERID'])){
	//redirect(web_root."admin/index.php");
//}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;

	case 'addp' :
	doInsertp();
	break;

	case 'addans' :
	doInsertans();
	break;

	case 'edit' :
	doEdit();
	break;

	case 'editmarks' :
	doEditmarks();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'updatefiles' :
	dochangefile();
	break;

 
	}
   
	function doInsert(){ 
		if(isset($_POST['save'])){ 

			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$category = $_POST['Category'];

			$filename = UploadImage();
			$location = "files/". $filename ;

			$lesson = new Lesson();
			$lesson->LessonChapter = $chapter;
			$lesson->LessonTitle   = $title;
			$lesson->FileLocation  = $location;
			$lesson->Category  = $category;
			$lesson->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("dash.php?q=6");
			
		}  
	}

	function doInsertp(){ 
		if(isset($_POST['save'])){ 

			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$category = "";

			$filename = UploadImage();
			$location = "files/". $filename ;

			$lesson = new Lesson();
			$lesson->LessonChapter = $chapter;
			$lesson->LessonTitle   = $title;
			$lesson->FileLocation  = $location;
			$lesson->Category  = $category;
			$lesson->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("dash.php?q=6");
			
		}  
	}

	function doInsertans(){ 
		if(isset($_POST['save1'])){ 

			$name = $_POST['studentName'];
			$email1  = $_POST['studentEmail'];
			$chapter = $_POST['chapter'];
			$title  = $_POST['questionTitle'];
			$quid = $_POST['questionId'];
			
			$category = "";

			$filename = UploadImage();
			$location = "files/". $filename ;

			$answer = new answer();
			$answer->studentName = $name;
			$answer->studentEmail  = $email1;
			$answer->chapter  = $chapter;
			$answer->questionTitle  = $title;
			$answer->questionId  = $quid;
			$answer->FileLocation  = $location;
			$answer->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("account.php?q=1");
			
		}/*{
			$filename = UploadImage();
			$location = "files/". $filename ;
			$answer = new answer();
			$answer->FileLocation  = $location;
			$answer->update($id); 

			message("Lesson has been saved in the database.", "success");
			redirect("account.php?q=1");
		}  */
	}


	function doEditmarks(){ 
		if(isset($_POST['save3'])){  
			$mar = $_POST['marks'];
			$fl  = $_POST['flocation'];
			$fid  = $_POST['fid'];
 
				// $filename = UploadImage();
				// $location = "files/". $filename ;

				$answer = new answer();
				$answer->marks = $mar;
				//$answer->LessonTitle   = $title;
				
				// $lesson->FileLocation  = $location;
				$answer->update1($fl); 

				message("Lesson has been saved in the database.", "success");
				redirect("dash.php?q=15&id=".$fid);
			
		}
	}

	function doEdit(){ 
		if(isset($_POST['save'])){  
			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$id = $_POST['LessonID'];
			$category = $_POST['Category'];

 
				// $filename = UploadImage();
				// $location = "files/". $filename ;

				$lesson = new Lesson();
				$lesson->LessonChapter = $chapter;
				$lesson->LessonTitle   = $title;
				$lesson->Category  = $category;
				// $lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("Lesson has been saved in the database.", "success");
				redirect("dash.php?q=6");
			
		}
	}


	function doDelete(){
		 
			$id = 	$_GET['id'];

			$lesson = New Lesson();
			$lesson->delete($id);
 
			message("Lesson has been removed!","info");
			redirect('dash.php?q=6');
		 
		
	}


	function dochangefile(){
		if(isset($_POST['save'])){   
			$id = $_POST['LessonID']; 

 
				$filename = UploadImage();
				$location = "files/". $filename ;

				$lesson = new Lesson(); 
				$lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("File has been updated in the database.", "success");
				redirect("dash.php?q=6");
		 

			
	 		
		}
	}

 
 
  function UploadImage(){
			$target_dir = "files/";
		    $target_file = $target_dir  . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
				|| $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
					return   basename($_FILES["file"]["name"]);
				}else{
					echo "Error Uploading File";
					exit;
				}
			}else{
					echo "File Not Supported";
					exit;
	 }
} 

	 
 
?>