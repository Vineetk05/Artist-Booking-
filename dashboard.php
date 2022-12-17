<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "artist";

  $conn = mysqli_connect($servername,$username,$password,$database);

  if(!$conn){
    die("sorry we failed to connect: ". mysqli_connect_error());
  }
  if(isset($_POST['snoEdit'])){
    $sno = $_POST['snoEdit'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $genre = $_POST['genre'];
    $time = $_POST['time'];
    $budget = $_POST['budget'];
    $sql = "UPDATE `book_now` SET `artist` = '$name', `location` = '$location', `genre` = '$genre', `timing` = '$time', `budget` = '$budget' WHERE `book_now`.`Sno` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
      header("Location: /Artist/dashboard.php#BookingDetails");
    }else{
      echo "The record was not been updated! " . mysqli_error($conn);
    }
  }
  if(isset($_GET['deleteUser'])){
    $sno = $_GET['deleteUser'];

    $sql = "DELETE FROM `login_details` WHERE `login_details`.`Sno` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
      $deleteUser = true;
      header("Location: /Artist/dashboard.php#userDetail");
    }else{
      echo "The record was not been updated! " . mysqli_error($conn);
    }
  }
  if(isset($_GET['deleteUser1'])){
    $sno = $_GET['deleteUser1'];

    $sql = "DELETE FROM `book_now` WHERE `book_now`.`Sno` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
      $deleteUser = true;
      header("Location: /Artist/dashboard.php#BookingDetails");
    }else{
      echo "The record was not been updated! " . mysqli_error($conn);
    }
  }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

</head>

<body id="body-pd">
    <section>
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="bx bx-menu" id="header-toggle"></i>
            </div> 
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo">
                        <i class="bx bx-layer nav_logo-icon"></i>
                        <span class="nav_logo-name">.PartyBangers</span>
                    </a>
                    <div class="nav_list">

                        <a href="#userDetail" class="nav_link">
                            <i class="bx bx-user nav_icon"></i>
                            <span class="nav_name">Login details</span>
                        </a>

                        <a href="#BookingDetails" class="nav_link">
                            <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                            <span class="nav_name">Booking details</span>
                        </a>

                        <a href="#Contact" class="nav_link">
                            <i class="bx bx-message-square-detail nav_icon"></i>
                            <span class="nav_name">Messages</span>
                        </a>
                       
                    </div>
                </div>
                <a href="Mainpage.php" class="nav_link">
                    <i class="bx bx-log-out nav_icon"></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>
    </section>
    <section>
                <div class="modal top fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <form action="dashboard.php" method="post">
                                        <div class="inputBox">
                                            <h3>Artist</h3>
                                            <input name="name" id="nameEdit" type="text" placeholder="e.g. Ritviz">
                                        </div>
                                        <input type="hidden" name="snoEdit" id="snoEdit">
                                        <div class="inputBox">
                                            <h3>Location</h3>
                                            <input name="location" id="locationEdit" type="text" placeholder="e.g. Candolim">
                                        </div>

                                        <div class="inputBox">
                                            <h3>Genre</h3>
                                            <select name='genre' id="genreEdit">
                                                <option name="Singers">Singers</option>
                                                <option name="Dj">Dj</option>
                                                <option name="bands">bands</option>
                                                <option name="Musicians">Musicians </option>
                                                <option name="rappers">rappers</option>
                                            </select>
                                        </div>
                                        <div class="inputBox">
                                            <h3>Timings</h3>
                                            <input name="time" type="time" id="timeEdit">
                                        </div>
                                        <div class="inputBox">
                                            <h3>Budget</h3>
                                            <input name="budget" id="budgetEdit" type="number" placeholder="e.g. 10000">
                                        </div>
                                        <input type="submit" class="btn" value="book now">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="userDetail">
                <div class="card mb-10 my-5 mx-5">
                    <div class="card-body mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                                    <strong>Login Details</strong>
                                </h2>
                            </div>
                        </div>
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>password</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $sql = "SELECT * FROM `login_details`";
                                $result = mysqli_query($conn,$sql);
                                $Sno = false;
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<th>".$count."</th>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['password']."</td>";
                                    echo "<td>
                                    <button id='u".$row['Sno']."' type='button' rel='tooltip' class='deleteUser btn btn-danger btn-round btn-just-icon btn-sm'>delete User</button>
                                    </td>";
                                    echo "</tr>";
                                    $Sno = true;  
                                    $count = $count+1;      
                                }
                                if(!$Sno){
                                    echo "<p class='card-text text-center'> no users yet</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="BookingDetails">
                <div class="card mb-10 my-5 mx-5">
                    <div class="card-body mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                                    <strong>Booking Details</strong>
                                </h2>
                            </div>
                        </div>
                        
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Artist</th>
                                    <th>Location</th>
                                    <th>Genre</th>
                                    <th>Date</th>
                                    <th>Timing</th>
                                    <th>Budget</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $sql = "SELECT * FROM `book_now`";
                                $result = mysqli_query($conn,$sql);
                                $Sno = false;
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<th>".$count."</th>";
                                    echo "<td class='artist' id='' >".$row['artist']."</td>";
                                    echo "<td class='location' >".$row['location']."</td>";
                                    echo "<td class='genre' >".$row['genre']."</td>";
                                    echo "<td class='date' >".$row['date']."</td>";
                                    echo "<td class='time' >".$row['timing']."</td>";
                                    echo "<td class='budget' >".$row['budget']."</td>";
                                    echo "<td>
                                    <button id='t".$row['Sno']."' type='button' rel='tooltip' class='deleteUser1 btn btn-danger btn-round btn-just-icon btn-sm'>delete User</button>
                                    <button id='p".$row['Sno']."' type='button' class='editBlog btn btn-outline-success btn-sm' data-mdb-toggle='modal' data-mdb-target='#editModal'>Edit
                                    </button>
                                    </td>";
                                    echo "</tr>";
                                    $Sno = true;  
                                    $count = $count+1;      
                                }
                                if(!$Sno){
                                    echo "<p class='card-text text-center'> no users yet</p>";
                                }
                                ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </section>
            <section id="Contact">
                <div class="card mb-10 my-5 mx-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                                    <strong>Messages</strong>
                                </h2>
                            </div>
                        </div>
                       
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $sql = "SELECT * FROM `messages`";
                                $result = mysqli_query($conn,$sql);
                                $Sno = false;
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<th>".$count."</th>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['number']."</td>";
                                    echo "<td>".$row['subject']."</td>";
                                    echo "<td>".$row['message']."</td>";
                                    echo "</tr>";
                                    $Sno = true;  
                                    $count = $count+1;      
                                }
                                if(!$Sno){
                                    echo "<p class='card-text text-center'> no users yet</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!--Container Main end-->
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="dashboard.js"></script>
    <script>
        deletesUser = document.getElementsByClassName("deleteUser");
        Array.from(deletesUser).forEach((element) => {
            element.addEventListener("click", (e) => {
                sno = e.target.id.substr(1);
                if (confirm('want to delete?')) {
                    window.location = `/Artist/dashboard.php?deleteUser=${sno}`;
                }
            })
        })

        deletesUser1 = document.getElementsByClassName("deleteUser1");
        Array.from(deletesUser1).forEach((element) => {
            element.addEventListener("click", (e) => {
                sno = e.target.id.substr(1);
                if (confirm('want to delete?')) {
                    window.location = `/Artist/dashboard.php?deleteUser1=${sno}`;
                }
            })
        })

        deletesBlog = document.getElementsByClassName("deleteBlog");
        Array.from(deletesBlog).forEach((element) => {
            element.addEventListener("click", (e) => {
                sno = e.target.id.substr(1);
                if (confirm('want to delete?')) {
                    window.location = `/Artist/dashboard.php?deleteinfo=${sno}`;
                }
            })
        })
        edits = document.getElementsByClassName("editBlog");
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
            snoEdit.value = e.target.id.substr(1);
            console.log(snoEdit.value);
            })
        })
    </script>
</body>

</html>