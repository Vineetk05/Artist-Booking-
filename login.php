<?php 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "artist";

  $conn = mysqli_connect($servername,$username,$password,$database);

  if(!$conn){
    die("sorry we failed to connect: ". mysqli_connect_error());
  }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      
      $username = $_POST["username"];
      $password = $_POST["password"];
      $sql = "INSERT INTO `login_details` (`username`, `password`) VALUES ('$username', '$password')";
      $result = mysqli_query($conn,$sql);
      if($result){
        header("Location: /Artist/dashboard.php");
        
      }else{
        echo "The record was not been inserted! " . mysqli_error($conn);
      }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="exit">
      <a href="logsinfo.html">
      <button id='close'>close</button>
      </a>
    </div>
    <form autocomplete='off' class='form' method="post" action="login.php">
        <div class='control'>
          <h1>
            Sign In
          </h1>
        </div>
        <div class='control block-cube block-input'>
          <input id='user' name='username' placeholder='Username' type='text' maxlength="20">
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg'>
            <div class='bg-inner'></div>
          </div>
        </div>
        <div class='control block-cube block-input'>
          <input name='password' id='pwd' placeholder='Password' type='password' maxlength="8" required>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg'>
            <div class='bg-inner'></div>
          </div>
        </div>
        <button class='btn block-cube block-cube-hover' type='submit' onclick='return validate()'>
          <div class='bg-top'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg-right'>
            <div class='bg-inner'></div>
          </div>
          <div class='bg'>
            <div class='bg-inner'></div>
          </div>
          <div class='text'>
            Log In
          </div>
        </button>
      </form>
<script type="text/javascript">
   function Open()
        {
          window.open("dashboard.php","_self");
        }
        function validate()
        {
          var fname = document.getElementById("user");
        if (fname.value == "" || (isNaN(fname.value)==false))
        {
            alert("Please enter your correct name");
            return false;
        }
        var pass = document.getElementById("pwd");
        if (pass.value == "") {
            alert("Please enter your password");
            return false;
        }
        }
</script>
</body>
</html>