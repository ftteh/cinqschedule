<html>
<HEAD><TITLE>Insert User</TITLE></HEAD>
<body>
<?PHP
    
    require_once('config.php');
    $acidID = $_POST["acidID"];
    $acidID = strtoupper($acidID);
	$username = $_POST["username"]; 
    $username = strtoupper($username);
    $password = $_POST["password"];
    $password = strtoupper($password);
    $email = $_POST["email"];
    $email = strtoupper($email);
    
    $sql = "insert into user(acid_id, name, password, hp,email,address, photo, role) " . 
            "values('$acidID','$username','$password','','$email','','','$_POST[role]')" ; 
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User is added successfully');</script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
        $conn->close();
?>

<script type="text/javascript"> 
    
    window.location="a_viewUser.php"; //remember change here
</script>

</body>
</html>