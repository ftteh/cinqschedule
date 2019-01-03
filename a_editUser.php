<HTML>
<HEAD><TITLE>Edit Info</TITLE></HEAD>
<BODY>
    <?php
        require_once("config.php");
        $acidid=$_POST['acidID'];
        $name=$_POST['username'];
        $email=$_POST['email'];
        $pw=$_POST['password'];
        $role=$_POST['role'];
        $id=$_POST['id'];

        $acidid = strtoupper($acidid);
        $name = strtoupper($name);
        $pw = strtoupper($pw);
        $email = strtoupper($email);
        
        $sql = "UPDATE user SET acid_id='$acidid',name='$name',email='$email', password='$pw',role='$role'WHERE acid_id='$id'";
       
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Information is updated successfully!');</script>";
        }  else {
            echo "Error updating record: " . mysqli_error($conn);
        }
     

        $conn->close();
    ?>
    <script type="text/javascript"> 
        window.location.href="a_viewUser.php";
    </script>
</BODY>
</HTML>