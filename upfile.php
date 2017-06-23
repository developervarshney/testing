<?php
error_reporting(1);

if(isset($_POST['submit']) && $_POST['submit'] == 'Upload File'){
    upload_file($_FILES['image']);
}

function upload_file($file, $type){
   if(isset($_FILES['image'])){
      $errors= array();
      print_r($_FILES);
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $imginfo_array = getimagesize($file_tmp);   // returns a false if not a valid image file
      $file_ext_all = explode('.',$_FILES['image']['name']);
      $file_ext_all = array_map('strtolower', $file_ext_all);;
      $file_ext = $file_ext_all[count($file_ext_all)-1];
      $expensions= array("jpeg","jpg","png");
      if(in_array('php', $file_ext_all) || in_array($file_ext, $expensions)=== false || $imginfo_array === false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         //move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
}
?>
<html>
   <body>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" name="submit" value="Upload File"/>
      </form>
   </body>
</html>
