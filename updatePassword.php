 <?php
    require_once('config.php');
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $cnewpass = $_POST['cnewpassword'];
        
    if($oldpass != "" && $newpass != "" && $cnewpass !=""){
          
                 if($newpass!=$cnewpass){
                     echo"<script>alert('New password does not match with confirm password')
                     window.location='userPro.php';
                     </script>";
                 }
                 else // If new password matched
                     {
                        session_start();
                        $sqlchgpass = "SELECT password FROM user WHERE acid_id='".$_SESSION['userid']."'";
                        $record = $conn->query($sqlchgpass);
                        $oldp = mysqli_fetch_array($record);
                        
               
                     if($oldp['password']!=$oldpass){
                       echo"<script>alert('Old password is incorrect');
                      window.location='userPro.php';
                        </script>";
                    }

                   else{
                    $sql1="Update user SET password='$newpass' where acid_id='".$_SESSION['userid']."' ";
                    $resultchgpass = $conn->query($sql1);
                    // to reflect data changed immediately after update
                    if ($conn->query($sqlchgpass) == TRUE && $conn->query($sql1)) {
                        echo "<script type='text/javascript'>
                        alert('Password changed successfully')</script>";
                        
                    } else {
                        echo "Error changing password: ". $conn->error;
                    
                    }
                    
                }
            }
        }
                    $conn->close();
                    ?>
                    <script type="text/javascript">
                      window.location="userPro.php";
                     </script>
                    
     