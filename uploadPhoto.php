<?php
if(isset($_POST["upload"])){
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['photo']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //DB details
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "cinqschedule";
      
    //  header("Access-Control-Allow-Origin: *");
      
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
session_start();
        
        //Insert image content into database
        $insert = $conn->query("UPDATE user SET photo='$imgContent' WHERE acid_id='".$_SESSION['userid']."'");
        if($insert){
            echo "<script type='text/javascript'>
            alert('File uploaded successfully.')</script>";
        }else{
            echo "<script type='text/javascript'>
            alert('File upload failed, please try again.');
            window.location='userPro.php';
            </script>";
            
        } 
    }else{
        echo "<script type='text/javascript'>
        alert('Please select an image file to upload.');
        window.location='userPro.php';
        </script>";
        return false;
        
    }
}
  
$conn->close();

?>
<script type="text/javascript">
    window.location="userPro.php";
    </script>