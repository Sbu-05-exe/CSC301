<?php

  include('connection.php');
  include('validation.php');

  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // sql to sanitize 
    $review = $_POST["freview"];

    $rating = $_POST["frating"];
    $date = date("Y-m-d");
    $attractionid = $_GET["id"];

    $userid = $_SESSION["ID"];

    $insertReview = $conn->prepare("INSERT INTO Reviews (UserID, AttractionID, Rating, ReviewDescription, DateEntered, DateUpdated) Values (?,?,?,?,?,?)");
    $insertReview->bind_param("ssssss",$userid, $attractionid, $rating, $review, $date, $date);
    $insertReview->execute();

    header("Location: ./Reviews.php?=" . $attractionid);
  }
?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Visiting Makhanda - Attractions</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/main.js"></script>
</head>

<body id="body-attractions">
    <header>
      <a class="home-logo-link" href="../index.php">
        <div class="logo-heading">
            <img width="30px" src="../Images/logo/potholeanddonkey_transparent.png" alt="logo">
            <h2> Visit Makhanda</h2>
        </div>
      </a>
      <input id="menu-toggle" type="checkbox">
      <div class="hamburger-container">  
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>

      <nav><ul class="menu">
        <li> <a href="../index.php"> Home </a></li>
        <li> <a href="About.php"> About </a></li>
        <li > <a href="Attractions.php"> Attractions </a></li>
        <?php
          if (isset($_SESSION["loggedin"])) {

              echo '<li><a href="./Profile.php"> Profile </a></li>' ;

          } else {
            // echo "you're not logged in";
            echo '<li><a href="./Login.php"> Login </a></li>';
          } 
          ?>
        <section class="toggle">
            <label class="toggle_bar round">
                <input type="checkbox">
                <span id="#slider-color" class="slider round"><i id="#toggle-icon" class="sun large icon"></i></span>
            </label>
        </section>
        </ul>
      </nav>
    </header>

    <main>

      <?php 


        $_id = $_GET["id"];

        // get the attraction
        $queryAttraction = $conn->prepare("SELECT * FROM attractions WHERE AttractionID = ?");
        $queryAttraction->bind_param("s", $_id);
        $queryAttraction->execute();

        $result = $queryAttraction->get_result()->fetch_assoc();

        if (!$result) {
          header("Location: Attractions.php "); // if the users tries to see an attraction that does not exist take them out
        }
      ?>

        <div class="gutter attraction-container">
          <div class="attraction">
            <div class="attraction-thumbnail-container">
            <figure class="attraction-thumbnail">
              
              <img src="<?php echo "../Images/Attractions/" . $result["thumbnail"] ?>" alt="picture of <?php echo $result["Title"] ?>">
            <figure/>
            </div>	
            <section class="attraction-description">
              <?php 
                echo "<h3>" . $result["Title"]. "</h3>";
                echo "<p>" . $result["Descriptions"] . "</p>";
              ?>
            </section>
          </div>
        </div>

        <!-- run query to find all reviews associated with this page -->  

        <?php
          $queryReviews = $conn->prepare("SELECT * FROM Reviews AS R, Users AS U WHERE R.UserID = U.UserID AND AttractionID = ? ");
          $queryReviews->bind_param("s", $_id);
          $queryReviews->execute();

          $cursor = $queryReviews->get_result();

          if (isset($_SESSION["ID"])) {
            $display_form = true;
          } else {
            $display_form = false;
          };


          while ($row = $cursor->fetch_assoc()) {
            if (isset($_SESSION["ID"])) {
              if ($_SESSION["ID"] == $row["UserID"]) {
                // the use has commented so don't display the form
                $display_form = false;
              } else {
                // echo "why are you here";
              }
            } else {
              echo "session is not set";
              $display_form = false;
            }

            // write a conditional to determine whether the comment belongs to the logged in user or not 

            // get review based off this
            echo '<section class="gutter reviews-container">
              
              <div class="user-thumbnail-container">
                <img class="user-thumbnail" src="../Images/thumbnails/' . $row["ImgRef"] . '" alt="display photo of user">
                ' . $row["Username"] . '
              </div>
              <div class="comment-container">
                <p class="comment-text"> ' . $row["ReviewDescription"] . ' </p>
                <p class="comment-date"> ' . $row["DateUpdated"] . ' </p>
              </div>
            </section>';
            
          }
        ?>

        <!-- loop through this with php -->
        <!-- if person has not commented then add this form to their page to add a comment-->

        <?php
          if ($display_form) {
            echo '<section class="gutter add-comment form-section"/>
              <form id="review-form" action="" method="POST">
                <div class="form-input" >
                  <label for="freview">
                    <p>Review: </p>
                    <textarea name="freview" id="freview" cols="60" rows="5"></textarea>
                  </label>
                  <label for="frating">
                    <p>Rating:</p>
                    <input name="frating" id="frating"  min="0" max="5" type="number">
                  </label>
                </div>
                <input type="submit" id="add-review-button" value="add comment">
              </form>
            </section>';
          }
        ?>

    </main>

<footer class="shift_attraction">
    
    <div class="footer-content">
        <section class="contact-us">
        <h3 id="contact-us-heading">Contact us</h3>
        <ul>
        <li>Emily Morgan: <a href="#"> e.morgan@ru.ac.za</a></li>
        <li>Sibusiso Dlamini:<a href="#"> s.dlamini@ru.ac.za</a> </li>
        <li>John Morrison:<a href="#"> j.morrison@ru.ac.za</a> </li>
        </ul>
        </section>
        <section class="terms_and_conds">

        <h3>Terms and Conditions</h3>
        <p>Click <a href="terms_and_conds.txt">here</a> for our terms and conditions.</p>
        </section>
    </div> 
    <p class="copy-symbol">
        
      <small >Copyright &copy; 2022</small>
    </p>
  </footer>