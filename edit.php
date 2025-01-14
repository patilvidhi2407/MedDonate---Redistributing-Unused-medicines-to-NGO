<?php
    $host = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "node";
    $conn = mysqli_connect($host, $user, $pass, $db) or die('Error Connecting');
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>

</head>
<body>

<?php

if(isset($_POST['submitid']))
    {
        $Name=$_POST['Name'];
        $Password=$_POST['Password'];
        

$sql ="SELECT * FROM admin WHERE Name = '$Name' and Password = '$Password'";
//$row=mysqli_num_rows()
$query=mysqli_query($conn,$sql);
$row=mysqli_num_rows($query);

    if($row==1)
    {
    
        echo "<script>
        alert('login done') ;
        </script>";
        header('location:admininfo.php');
    
    }
    else
     {
        echo "<script>
        alert('failed') ;
        </script>";
            
    
    }
    

 
}
?>
   <div class="box">
    <div class="container">

        <div class="top">
            <header>Login</header>
        </div>
    <form id="admin_form" action="edit.php" method="post">
        <div class="input-field">
            <input type="text" class="input" placeholder="Username" id="">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Login" id="">
        </div>
    </div>
</form>
</div>  
</body>
</html>