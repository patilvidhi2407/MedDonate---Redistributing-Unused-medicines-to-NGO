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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ngologin-signup.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body>

<?php
     



if(count($_POST)>0) {
	$result = mysqli_query($conn,"SELECT * FROM donarsign WHERE Password = '". $_POST["Password"]."'and DonarName= '". $_POST["DonarName"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		echo "<script>alert('Invalid RollNo or Password!!');</script>";
		
		echo "<script>window.location.href='./donarlogin-signup.php';</script>";
		exit();
		//$message = "Invalid Username or Password!";
	} else
		echo "<script>alert('You are successfully authenticated!');</script>";
		echo "<script>window.location.href='./donate.php';</script>";
									
}


 ?>











<form  id="login" class="login-data" method="post" action="donarlogin-signup.php">


    <div class="container">
        <div class="login" data-aos="zoom-in-up" data-aos-duration="1000"
        data-aos-easing="ease-in-out">
            <h1>Login</h1>
            <form  id="login" class="login-data" method="post" action="donarlogin-signup.php">
                <label for="text" >Donar Name</label>
                <input type="text" id="donar-name" placeholder="Full name" name="DonarName"
                required minlength="2" maxlength="100" />
                
              
                <label for="text" >Password</label>
                <input type="password" id="Donar-password" placeholder="Create Password (Min. 8 Characters)" name="Password"
                required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" title="please include 1 uppercase Character,1 lowercase Character and 1 number. "
          />
                <button type="submit" name="submitid">Login</button>
                <a href="Donarsignup.php" style="text-decoration:none;color:white">Make new account!!</a>
            
            </form>
        </div>
        
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="ngologin-signupScript.js"></script>
    <?php
    if(isset($_POST['submitid']))
    {
        $Name=$_POST['Name'];
      /* $ReceiveGoods=$_POST['ReceiveGoods'];*/
        $Password=$_POST['Password'];
        $query2="INSERT INTO donarlogin(Name,Password) VALUES('$Name',,'$Password');";
        $res2=mysqli_query($conn,$query2);
        
      
    }
    ?>
</body>
</html>