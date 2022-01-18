<?php
error_reporting(0);
session_start();
include "includes/bootstrap.php";
?>
 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

    <h1 class="logo me-auto">&#128062;  <a href="Home.php">ACME</a>  &#128062;</h1> 
    
      <i style="font-style: Brush Script MT, Brush Script Std, cursive;">Pet clinic and grooming services</i>
    
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a href="Home.php" class="active">Home</a></li> 
          <!-- <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li> -->

          <!-- <li><a href="contact.html">Contact</a></li> -->
          <!-- <li><a href="order.php">Order Now</a></li> -->
          <li><a href="consultadd.php">Consultation Form</a></li>

          <li><a href="Searchindex.php">Search Pet</a></li> 
          &#128269;
          
          <li class="dropdown"><a href="Checkcust.php"><span>Order Here</span> &#128722;<i class="bi bi-chevron-down"></i></a>
        
            <ul>
            <li><a href="order.php"><span>Shopping</span></a></li>
            <li><a href="view_cart.php"><span>View Cart</span></a></li>

          </ul>
          </li>

          <!-- <li><a href="order.php">Order Here</a></li>
          &#128722; -->

           <li class="dropdown"><a href="#"><span>Storage</span> <i class="bi bi-chevron-down"></i></a>
            <ul>

         <!-- <li class="dropdown"><a href="Sindex.php"><span>Pet Services</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="Screate.php">Add New Pet Service</a></li>
                </ul>
              </li> -->

            <li><a href="Cindex.php"><span>Customer</span></a></li>

              <li><a href="Pindex.php"><span>Pet Data</span></a></li>

              <li><a href="Sindex.php"><span>Pet Services</span></a></li>

              <li><a href="Eindex.php"><span>Employee</span></a></li>

              <li><a href="Consindex.php"><span>Consultations</span></a></li>

              <li><a href="Ordindex.php"><span>Orders</span></a></li>

             <!--  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Database</span><i class="bi bi-chevron-down"></i></a>
        
        <ul>

        <li><a href="Backup.php"><span>Backup</span></a></li>
        <li><a href="Restore.php"><span>Restore</span></a></li>

      </ul>
      </li>

          <body>
          <!-- <li><a href="login.php" class="getstarted">Log In</a></li> -->
    <li><?php if ( (isset($_SESSION['EmployeeID'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
      echo '<a href="logout.php" class="getstarted">Log Out</a>';
      } else {
      echo '<a href="login.php" class="getstarted">Log In</a>';
      }?>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->