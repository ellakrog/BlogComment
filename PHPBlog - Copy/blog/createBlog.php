<?php


    

if($_POST){
  $folder ="../uploads/"; 

  $image = $_FILES['blog_image']['name']; 
  
  $path = $folder . $image ; 
  
  $target_file=$folder.basename($_FILES["blog_image"]["name"]);
  
   
   $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
   $allowed=array('jpeg','png' ,'jpg'); 
   $filename=$_FILES['blog_image']['name']; 
// $id=$id;
$city = $_POST['city'];
$culture= $_POST['culture'];
$food= $_POST['food'];
$lenguage= $_POST['lenguage'];
$nightlife= $_POST['nightlife'];
$education= $_POST['education'];
$people= $_POST['people'];
$id_user=$_POST['id_user'];

$ext=pathinfo($filename, PATHINFO_EXTENSION);
 if(!in_array($ext,$allowed) ) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{ 

move_uploaded_file( $_FILES['blog_image'] ['tmp_name'], $target_file); 

 
 
 


    if($blog->create($city, $culture, $food,$lenguage,$nightlife, $education,$people, $id_user,$filename)){
       
       
       header("Location: ../user/user_page.php?id_user={$_SESSION['user']['id_user']}");
       echo "Success!";
      
     
   
       
     
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to create new blog.</div>";
    }
   
    
   
   }
  }
  ?>