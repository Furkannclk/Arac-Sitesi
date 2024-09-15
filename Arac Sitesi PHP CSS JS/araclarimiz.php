<?php
include 'adminpanel/includes/db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta charset="utf-8">
   <title>Oto Galeri/Araçlar</title>



   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">


   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


   <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link href="lib/animate/animate.min.css" rel="stylesheet">
   <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
   <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">


   <link href="css/style.css" rel="stylesheet">

   <style>
      div.gallery {
         margin: 5px;
         border: 1px solid #ccc;
         float: left;
         width: 180px;
      }

      div.gallery:hover {
         border: 1px solid #777;
      }

      div.gallery img {
         width: 100%;
         height: auto;
      }

      div.desc {
         padding: 15px;
         text-align: center;
      }
   </style>

</head>

<body id="body">

   <!-- ÜST BAR -->

   <section id="topbar" class="d-none d-lg-block">
      <div class="container clearfix">

         <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i><a> otogaleri@otogaleri.com</a>
            <i class="fa fa-phone"></i> 0511 111 11 11

         </div>
         <div class="social-links float-right">
            <a href="https://twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="login/login.php" class="login"><i class="fa fa-key"></i></a>
         </div>
      </div>

   </section>


   <!-- header -->

   <header id="header">

      <div class="container">

         <div id="logo" class="pull-left">
            <h1><a href="#body" class="scrollto">Oto <span>Galeri</span></a></h1>


         </div>


         <nav id="nav-menu-container">
            <ul class="nav-menu">
               <li class=""><a href="index.php">Anasayfa</a></li>
               <li><a href="hakkimizda.php">Hakkımızda</a></li>
               <li><a href="araclarimiz.php">Araçlarımız</a></li>
               <li><a href="iletisim.php">iletişim</a></li>
            </ul>
         </nav>

      </div>




   </header>

   <section id="filo" class="wow fadeInUp">

      <div class="container">
         <div class="section-header">
            <h2>Araçlarımız</h2>
            <p>Tüm araçlarımızın sergilendiği alanımıza hoşgeldiniz.</p>
         </div>
      </div>
      <div class="container">
         <div class="row no-gutters">
           <?php

           $sql = "SELECT * FROM araclar";
           foreach ($db->query($sql) as $key) { ?>
                     <div class="col-lg-3 col-md-4">
                        <div class="filo-item wow fadeInUp">
                           <a href="<?php echo $key['image'] ?>" class="filo-popup">
                              <img src="<?php echo $key['image'] ?>" alt="" width="200" height="200" style="object-fit: contain;">
                              <div class="filo-overlay"></div>
                           </a>
                           <div class="">
                               <p>Model:<?php echo $key['aciklama'] ?></p>
                <p>Fiyat:<?php echo $key['carPrice'] ?></p>
                             

                           </div>
                        </div>
                     </div>
                   <?php } ?>
         </div>
      </div>
   </section>

   <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



   <script src="lib/jquery/jquery.min.js"></script>
   <script src="lib/jquery/jquery-migrate.min.js"></script>
   <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/superfish/hoverIntent.js"></script>
   <script src="lib/superfish/superfish.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="lib/magnific-popup/magnific-popup.min.js"></script>
   <script src="lib/sticky/sticky.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
