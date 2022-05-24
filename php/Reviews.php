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
        <li> <a href="Login.php"> Login </a></li>
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

        <div class="gutter attraction-container">
          <div class="attraction">
            <div class="attraction-thumbnail-container">
            <figure class="attraction-thumbnail">
              
              <img src="<?php echo "../Images/Attractions/" . $_GET["thumbnail"] ?>" alt="picture of <?php echo $_GET["title"] ?>">
            <figure/>
            </div>	
            <section class="attraction-description">
              <?php 
                echo "<h3>" . $_GET["title"]. "</h3>";
                echo "<p>" . $_GET["description"] . "</p>";
              ?>

            </section>
          </div>
        </div>

        <!-- run query to find all reviews associated with this page -->  

        <!-- loop through this with php -->
        <section class="gutter reviews-container">
          
          <div class="user-thumbnail-container">
            <img src="defaultthumbnail" alt="display photo of user">
          </div>
          <div class="comment-container">
            <p class="comment-text"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, illum? Aspernatur rem eligendi rerum cum, error consectetur natus dolor iusto. </p>
            <p class="comment-date">5th May</p>
          </div>
        </section>
        <!-- if person has not commented then add this form to their page to add a comment-->
        <section class="gutter add-comment>"/>
          <form action="processReview.php" method="POST">
            <textarea name="fcomment" id="fcomment" cols="60" rows="5"></textarea>
          </form>
        </section>

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