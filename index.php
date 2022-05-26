<?php
	session_start();
?>

<!doctype html> 
<html> 
  <head> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  	<title>Visiting Makhanda - Home</title>
    <link rel="stylesheet" href="./css/style.css">
  </head> 
  <body id="body_index">  	     
    <header>
      <a class="home-logo-link" href="index.php">
        <div class="logo-heading">
          <img width="30px" src="./Images/logo/potholeanddonkey_transparent.png" alt="logo">
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
        <li> <a href="./index.php"> Home </a></li>
        <li> <a href="./php/About.php"> About </a></li>
        <li > <a  href="./php/Attractions.php"> Attractions </a> </li>
        <?php
          if (isset($_SESSION["ID"])) {
            echo '<li><a href="./php/Profile.php"> Profile </a></li>' ;
          } else {
            echo '<li><a href="./php/Login.php"> Login </a></li>';
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
	<!-- <a href="./php/profile.php"><img id="user_thumbnail" style="width:300px;" src="<?php if (isset($_SESSION['img'])) {echo './Images/thumbnails/' . $_SESSION['img'];} ?>" ></a> -->
    <main id = "#main-padding">
      <section class="welcome">
    	  <div class="projector">
    			<div class="slide">
    				<img src="./Images/Index/makhanda.jpg" alt="makhanda">
    				<div class="slide-caption">Makhanda</div>
    			</div>
    			<div class="slide">
    				<img src="./Images/Index/cathedral.jpg" alt="cathedral">
    				<div class="slide-caption">Cathedral of St. Michael and St. George</div>
    			</div>
    			<div class="slide">
    				<img src="./Images/Index/observatory.jpg" alt="observatory">
    				<div class="slide-caption">Observatory</div>
    			</div>
    			<div class="slide">
    				<img src="./Images/Index/monument.jpg" alt="monument">
    				<div class="slide-caption">1820 Settlers Monument</div>
    			</div>
    	  </div>
	  
    <div class="test"></div>
	     <div class="introduction">
        <h1>Welcome to Makhanda! <img id="wave" src="Images/Index/hand.png" alt="hand"></h1>
        <!-- TODO: make heading -->
        <p title="Welcome message">From newly-arrived students to well-seasoned travellers, Makhanda offers many historical attractions and fine dining establishment for people of all colours, places, and different shoes laces. 
          This small town has magnetic aura that will keep intrigued at every step of the way. From the eccentric weather to the welcoming residents, every tourist is destined to embark on a spirited adventure
          that leaves you with memories that will last a lifetime! 
        </p>
        </div>
      </section>
      <section class="newsletter">
        <h3 class="gutter" id="blinking-text">Sign up for our newsletter! </h3>

        <form id="newsletter-form" action="" method="post">
          <input type="text" id ="email_text" placeholder="you@email.com"></input>
          <button id ="#submit-color" type="submit">Submit</button>
        </form>

      </section>
      
    </main>
    <footer>
      
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

          <h3> <span class="heading-highlight"> Terms and Conditions </span> </h3>
          <p>Click <a href="terms_and_conds.txt">here</a> for our terms and conditions.</p>
        </section>
		<section class="nav">
			<button id="nav_btn">Click for navigator information</button>
		</section>
      </div>

      <p class="copy-symbol">
        
        <small >Copyright &copy; 2022</small>
      </p>
    </footer>
	<script src="./js/main.js"></script>
  </body> 
</html>