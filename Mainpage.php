<?php 
  $insert = false;
  $update = false;
  $delete = false;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "artist";

  $conn = mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
    die("sorry we failed to connect: ". mysqli_connect_error());
  }
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_GET['deleteUser'])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $number = $_POST["number"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $sql = "INSERT INTO `messages` (`name`, `email`, `number`, `subject`, `message`) VALUES ('$name', '$email', '$number', '$subject', '$message');";
            $result = mysqli_query($conn,$sql);
            if($result){
              echo "The record has been inserted successfully! <br>";
              $insert = true;
            }else{
              echo "The record was not been inserted! " . mysqli_error($conn);
            }
        }
      }
      if(isset($_GET['budget'])){
        $name = $_GET["name"];
        $location = $_GET["location"];
        $genre = $_GET["genre"];
        $date = $_GET["date"];
        $time = $_GET["time"];
        $budget = $_GET["budget"];
        $sql = "INSERT INTO `book_now` (`artist`, `location`, `genre`, `date`, `timing`, `budget`) VALUES ('$name', '$location', '$genre', '$date', '$time', '$budget')";
        $result = mysqli_query($conn,$sql);
        if($result){
        header("Location: /Artist/Mainpage.php");
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
    <title>Artist Booking Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- header section starts -->
    <header>
        <a href="#" class="logo"><span>.</span>PartyBangers</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#gallery">Artists</a>
            <a href="#book">Book</a>
            <a href="#contact">Contact</a>
            <a href="about.html">About Us</a>
        </nav>

        <div class="icons">
            <a href="login.php"><i class="fa-solid fa-circle-user" id="login-btn"></i></a>
        </div>
    </header>
    <!-- header section end -->

    <!-- home section starts -->
    <section class="home" id="home">
        <div class="content">
            <h3>PartyBangers</h3>
            <p>Get Your Party Banging With PartyBangers</p>
            <button class="btn"><a  href="#book">book now</a></button>
        </div>


        <div class="video-container">
            <img src="Our images\delhi-clubs-cover.jpg" id="video-slider"></img>
        </div>
    </section>
    <!-- home section ends -->

    <!-- gallery section starts -->
    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>《ARTISTS》</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="Our Images\Divine.jpg">
                <div class="content">
                    <h3>DIVINE</h3>
                    <p>Haa Mein Baazigar 
                        Sabse alag, Sabse asli Different Calibre
                        Hamse Masti Seedha Pappi Tere Aansu Par
                    </p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\Anuv.jpg">
                <div class="content">
                    <h3>ANUV JAIN</h3>
                    <p>Toote Makan Ik Baar Girkar Waise Bante Kaha </p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\KRSNA.jpg">
                <div class="content">
                    <h3>KR$NA</h3>
                    <p>Jab Puche Haa Kaun Hai Best, It's Me I Guess</p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\Prakriti.jpg">
                <div class="content">
                    <h3>PRAKRITI</h3>
                    <p>Tum Hum Aur Hum Tum Ho Jaaye Kahin Ghum Maahiya</p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\ritviz.jpg">
                <div class="content">
                    <h3>RITVIZ</h3>
                    <p>Hum Toh Ud Gae, Ud Gae, Ud Gae</p>
                   
                </div>
            </div>
            <div class="box">
                <img src="Our Images\dhvani.jpg">
                <div class="content">
                    <h3>DHVANI</h3>
                    <p>Vaaste Jaan Bhi Du
                        Main Gawah Emaan Bhi Du
                        Kismato Ka Likha Mod Du</p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\DarshanRaval.jpg">
                <div class="content">
                    <h3>DARSHAN RAVAL</h3>
                    <p>Chogada tara
                        Chabeela tara
                        Rangeela tara
                        Rangbheru jue tari vaat re, Haah!</p>
                    
                </div>
            </div>
            <div class="box">
                <img src="Our Images\Seedhe.jpg">
                <div class="content">
                    <h3>SEEDHE MAUT</h3>
                    <p>Kalam jale, Dard dukhe, Marham bane 
                        aashvaasan andhvishwasi
                        bharam toote, Sabhi jhooke
                        Aur shradhdha se bole seedhe maut
                        namastute</p>
                   
                </div>
            </div>
            <div class="box">
                <img src="Our Images\Armaan-Malik.webp">
                <div class="content">
                    <h3>ARMAAN MALIK</h3>
                    <p>main rahoon ya na rahoon tum mujh mein kahin baaki rehna</p>
                    
                </div>
            </div>
        </div>

    </section>
    <!-- gallery section ends -->
    
    <!-- book section starts -->
    <hr>
    <section class="book" id="book">
        <h1 class="heading">
          <span>《BOOK NOW》</span>
        </h1>

        <div class="row">

            <div class="images">
                <img src="Our Images\animation.jpg">
            </div>

            <form action="Mainpage.php" method="get">
                <div class="inputBox">
                    <h3>Artist</h3>
                    <input name="name" type="text" placeholder="e.g. Ritviz" required>
                </div>
                <div class="inputBox">
                    <h3>Location</h3>
                    <input name="location" type="text" placeholder="e.g. Candolim" required>
                </div>
                
                <div class="inputBox">
                    <h3>Genre</h3>
                    <select name='genre'>
                        <option name="Singers">Singers</option>
                        <option name="Dj">Dj</option>
                        <option name="bands">bands</option>
                        <option name="Musicians">Musicians </option>
                        <option name="rappers">rappers</option>
                    </select>
                </div>
                <div class="inputBox">
                    <h3>Date</h3>
                    <input name="date" type="date" required>
                </div>
                <div class="inputBox">
                    <h3>Timings</h3>
                    <input name="time" type="time" required>
                </div>
                <div class="inputBox">
                    <h3>Budget</h3>
                    <input name="budget" type="number" placeholder="e.g. 10000" required>
                </div>
                <input type="submit" class="btn" value="book now">
            </form>
        </div>
    </section>
    <!-- book section ends -->
   
    <!-- contact section starts -->
    <section class="contact" id="contact">

        <h1 class="heading">
            <span>《CONTACT》</span>
        </h1>

        <div class="row">
            <div class="images">
                <img src="Our Images\cont2.png">
            </div>

            <form action="Mainpage.php" method="post">
                <div class="inputBox">
                    <input name="name" type="text" placeholder="name" >
                    <input name="email" type="email" placeholder="email" >
                    <input name="number" type="number" placeholder="number">
                    <input name="subject" type="text" placeholder="subject"> 
                </div>
                <textarea placeholder="message" name="message" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="send message">
            </form>
        </div>
    </section>
    <!-- contact section ends -->

    <!-- footer section starts -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about</h3>
                <p>•PartyBangers is an Artist Booking platform with finest of Talent from the music industry.</p>
                <p>•We believe in making your event a great success with our top notch artist booking services.</p>
              
            </div>
            <ul class="wrapper">
                <li class="icon facebook">
                  <span class="tooltip">Facebook</span>
                  <span><i class="fab fa-facebook-f"></i></span>
                </li>
                <li class="icon twitter">
                  <span class="tooltip">Twitter</span>
                  <span><i class="fab fa-twitter"></i></span>
                </li>
                <li class="icon instagram">
                  <span class="tooltip">Instagram</span>
                  <span><i class="fab fa-instagram"></i></span>
                </li>
                <li class="icon github">
                  <span class="tooltip">Github</span>
                 <a href="https://github.com/Vineetk05"><span><i class="fab fa-github"></i></span></a>
                </li>
                <li class="icon youtube">
                  <span class="tooltip">Youtube</span>
                  <a href="https://youtu.be/dQw4w9WgXcQ"><span><i class="fab fa-youtube"></i></span></a>
                </li>
              </ul>
        </div>
    </section>
    <!-- footer section ends -->
    <script src="script.js"></script>
</body>
</html>