
<?php
session_start();

if(isset($_POST['logout'])) {
  // Clear session data
  session_unset();
  session_destroy();

  // Redirect to login page or any other page you want
  header("Location: Myhome.html");
  exit();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Logout Example</title>
  <style>
  .container {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
}
</style>

</head>
<body>
  <div class="container">
    <h2>Welcome to the website!</h2>
    <form action="logout.php" method="post">
      <input type="submit" value="Logout" name="logout">
    </form>
  </div>
</body>
</html>
