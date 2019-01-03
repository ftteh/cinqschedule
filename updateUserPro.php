 <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "cinqschedule";
      
    //  header("Access-Control-Allow-Origin: *");
    session_start();
    if ($_SESSION["Login"] == NULL) {
      header("Location: login.html"); //change this
    }
    else{
       $acid_id = $_SESSION["userid"];
        
       
    } 
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM user WHERE acid_id='".$_SESSION['userid']."'";
$result = $conn->query($sql);
        $user=array(
          "acid_id"=>"",
          "name"=>"",
          "password"=>"",
          "hp"=>"",
          "email"=>"",
          "address"=>"",
         // "photo"=>"",
        );
        
            while ($row = mysqli_fetch_array($result))
            {	
             $user=array(
                                  "acid_id"=>$row['acid_id'],
                                  "name"=>$row['name'],
                                  "password"=>$row['password'],
                                  "hp"=>$row['hp'],
                                  "email"=>$row['email'],
                                  "address"=>$row['address']
                                //  "photo"=>$row['photo'],
                          );
            }
            
   if(isset($_POST["name"]) 
  || isset($_POST["hp"]) || isset($_POST["email"]) || isset($_POST["address"])){
    
    
    
  $sql2 = "UPDATE user SET name='$_POST[name]',hp='$_POST[hp]'
          ,email='$_POST[email]',address='$_POST[address]'
           where acid_id='".$_SESSION['userid']."'";
  
 $result2 = $conn->query($sql2);

 
  if ($result2> 0) {
     echo '<script>alert("Your profile is updated.")</script>';

  }
  else
     echo "Failed to update". $conn->error;
  }
  

  
      

$conn->close();
  ?>     <script type="text/javascript">
  window.location="userPro.php";
  </script>
