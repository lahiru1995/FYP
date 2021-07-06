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

	case 'pdf' :
	dopdf();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'updatefiles' :
	dochangefile();
	break;

	case 'publishmarks' :
	publishmarks();
	break;

 
	}
   
	function doInsert(){ 
		
		if(isset($_POST['save'])){ 

			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$category = $_POST['Category'];

			$class  = $_POST['class'];
			$subject = $_POST['subject'];

			$filename = UploadImage();
			$location = "files/". $filename ;

			$lesson = new Lesson();
			$lesson->LessonChapter = $chapter;
			$lesson->LessonTitle   = $title;
			$lesson->FileLocation  = $location;
			$lesson->Category  = $category;
			$lesson->grade  = $class;
			$lesson->subject  = $subject;
			$lesson->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("dash.php?q=6&c=".$class."&s=".$subject);
			
		}  
	}

	function doInsertp(){ 
		if(isset($_POST['save'])){ 

			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$category = "";
			$class=@$_GET['c'];
			$subject=@$_GET['s'];

			$filename = UploadImage();
			$location = "files/". $filename ;

			$lesson = new Lesson();
			$lesson->LessonChapter = $chapter;
			$lesson->LessonTitle   = $title;
			$lesson->FileLocation  = $location;
			$lesson->Category  = $category;
			$lesson->grade  = $class;
			$lesson->subject  = $subject;
			$lesson->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("dash.php?q=6&c=".$class."&s=".$subject);
			
		}  
	}

	function doInsertans(){ 
		if(isset($_POST['save1'])){ 

			$name = $_POST['studentName'];
			$email1  = $_POST['studentEmail'];
			$chapter = $_POST['chapter'];
			$title  = $_POST['questionTitle'];
			$quid = $_POST['questionId'];
			
			$class=@$_GET['c'];
			$subject=@$_GET['s'];

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
			$lesson->grade  = $class;
			$lesson->subject  = $subject;
			$answer->create(); 

			message("Lesson has been saved in the database.", "success");
			redirect("account.php?q=01&c=".$class."&s=".$subject);
			
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
			$class=@$_GET['c'];
			$subject=@$_GET['s'];
				// $filename = UploadImage();
				// $location = "files/". $filename ;

				$answer = new answer();
				$answer->marks = $mar;
				//$answer->LessonTitle   = $title;
				
				// $lesson->FileLocation  = $location;
				$answer->update1($fl); 

				message("Lesson has been saved in the database.", "success");
				redirect("dash.php?q=15&id=".$fid."&c=".$class."&s=".$subject);
			
		}
	}
	//create pdf start
	function dopdf(){
		if(isset($_POST['generate_pdf'])){    
			$id  = $_POST['fid'];
			$cp  = $_POST['chapter']; 
			$ct  = $_POST['qtitle']; 
			$c=0; 
			$class=@$_GET['c'];
			$subject=@$_GET['s'];
			$answer = new answer();
      require_once('tcpdf/tcpdf.php');    
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
      $obj_pdf->SetCreator(PDF_CREATOR);    
      $obj_pdf->SetTitle("Question Paper Marks");    
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);    
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));    
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));    
      $obj_pdf->SetDefaultMonospacedFont('helvetica');    
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);    
      $obj_pdf->setPrintHeader(false);    
      $obj_pdf->setPrintFooter(false);    
      $obj_pdf->SetAutoPageBreak(TRUE, 10);    
      $obj_pdf->SetFont('helvetica', '', 11);    
      $obj_pdf->AddPage();    
      $content = '';    
	  $content .= '    
	  <h4 align="center"><b>------ MARKS ------</b></h4><br /> 
      <h4 align="center">Chapter :  '.$cp.' | Question Title: '.$ct.'</h4><br />   
      <table border="1" cellspacing="0" cellpadding="3">    
           <tr>    
				<th width="5%"><b>No</b></th>
				<th width="40%"><b>Student Name</b></th>    
                <th width="30%"><b>Student Email</b></th>    
                <th width="25%"><b>Marks</b></th>    
           </tr>    
      ';     
	 $content .= fetch_data($id);    
	 $content .= '</table>';    
	 
      $obj_pdf->writeHTML($content);    
      $obj_pdf->Output(''.$cp.'-'.$ct.'.pdf', 'I');    
 	}    
	}
	function fetch_data($id=0){
		global $mydb;
		$c=0;
		
		$output = '';    
		$conn = mysqli_connect("localhost", "root", "", "project");    
		$sql = "SELECT * FROM questionanswer where questionId='{$id}'";  
		$result = mysqli_query($conn, $sql);    
		while($row = mysqli_fetch_array($result))    
		{   $c++;
			//while ($row = mysqli_fetch_object($cur)) {      
		$output .= '<tr>    
							<td>'.$c.'</td> 
							<td>'.$row["studentName"].'</td>   
							<td>'.$row["studentEmail"].'</td>    
							<td>'.$row["marks"].'</td>    
					   </tr>    
							';    
			}
		return $output;   
	
	}//create pdf end

	function doEdit(){ 
		if(isset($_POST['save'])){  
			$chapter = $_POST['LessonChapter'];
			$title  = $_POST['LessonTitle'];
			$id = $_POST['LessonID'];
			$category = $_POST['Category'];

			$class=@$_GET['c'];
			$subject=@$_GET['s'];
				// $filename = UploadImage();
				// $location = "files/". $filename ;

				$lesson = new Lesson();
				$lesson->LessonChapter = $chapter;
				$lesson->LessonTitle   = $title;
				$lesson->Category  = $category;
				// $lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("Lesson has been saved in the database.", "success");
				redirect('dash.php?q=6&c='.$class.'&s='.$subject.'');
			
		}
	}


	function doDelete(){
		 
			$id = 	$_GET['id'];
			$class=@$_GET['c'];
			$subject=@$_GET['s'];

			$lesson = New Lesson();
			$lesson->delete($id);
 
			message("Lesson has been removed!","info");
			redirect('dash.php?q=6&c='.$class.'&s='.$subject.'');
		 
		
	}
//marksLocation 
	function publishmarks(){
		if(isset($_POST['save'])){   
			$id = $_POST['LessonID']; 


				$filename = UploadImage();
				$location = "files/". $filename ;
				$class=@$_GET['c'];
				$subject=@$_GET['s'];

				$lesson = new Lesson(); 
				$lesson->marksLocation  = $location;
				$lesson->update($id); 

				message("File has been updated in the database.", "success");
				redirect('dash.php?q=6&c='.$class.'&s='.$subject.'');	
			
		}
	}


	function dochangefile(){
		if(isset($_POST['save'])){   
			$id = $_POST['LessonID']; 
			$class=@$_GET['c'];
			$subject=@$_GET['s'];
 
				$filename = UploadImage();
				$location = "files/". $filename ;

				$lesson = new Lesson(); 
				$lesson->FileLocation  = $location;
				$lesson->update($id); 

				message("File has been updated in the database.", "success");
				redirect('dash.php?q=6&c='.$class.'&s='.$subject.'');	
	 		
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