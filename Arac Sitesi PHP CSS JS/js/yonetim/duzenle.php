<?php
include("../config.php");

if (isset($_GET["id"])) {
    $numara = $_GET["id"];

    if (isset($_POST['gonder'])) {
        $arac_modeli = $_POST['arac_modeli'];
        $arac_markasi = $_POST['arac_markasi'];

        $sorgu = "UPDATE images SET kategori = '$arac_markasi', model = '$arac_modeli' WHERE id='$numara'" ;

        if ($con->query($sorgu) === TRUE) {
            header("location: arac.php");
        } else {
            echo "Error: " . $sorgu . "<br>" . $con->error;
        }
    }

    $sql = "SELECT * FROM images WHERE id= '$numara'";
    $result = $con->query($sql);

    $item = $result->fetch_row();

    if ($item == null) {
        header("location: arac.php");
    }
} else {
    die("Numara yok !");
}

if (isset($_POST['but_upload'])) {
    $selection = $_POST['cars'];
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);



    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $name)) {
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('upload/' . $name));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            $query = "UPDATE images SET name='$name',image='$image'";
            if($query==TRUE){
                 echo '<script type="text/javascript">';
            echo ' alert("Resim Değiştirildi")';  //not showing an alert box.
            echo '</script>';

            }

           
            mysqli_query($con, $query) or die(mysqli_error($con));
        }
    }
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">

    <title>Oto Galeri-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="../index.php"><img src="assets/images/logo/logo12.jpg" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                            <li><a href="#"><i class="ti-pencil"></i> <span>Site Ayarları</span></a></li>
                            <li><a href="#"><i class="ti-image"></i> <span>İntro Ayarları</span></a></li>
                            <li><a href="#"><i class="ti-flag"></i> <span>Hakkımızda Ayarları</span></a></li>
                            <li><a href="#"><i class="ti-eye"></i> <span>Araç Markaları Ayarları</span></a></li>
                            <li><a href="arac.php"><i class="ti-car"></i> <span>Araçlarımız Ayarları</span></a></li>



                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kullanıcı <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="logout.php">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->

            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->

                <div class="row">
                    <div class="col-lg-12 mt-5 bg-white" style="min-height:500px;">
                        <form method="post" action="" enctype='multipart/form-data'>
                            <label for="arac_id">Arac İd </label>
                            <input type="text" name="arac_id" id="arac_id" value="<?php echo $item[0]; ?>" disabled><br> <br>
                            <label for="">Arac Resmi:</label>
                            <input type='file' name='file' /><input type='submit' value='Değiştir' name='but_upload'><br>

                            <label for="arac_markasi">Arac Markası </label>
                            <input type="text" name="arac_markasi" value="<?php echo $item[3]; ?>"><br> <br>
                            <label for="arac_modeli">Arac Modeli</label>
                            <input type="text" name="arac_modeli" value="<?php echo $item[4]; ?>"><br> <br>

                            <input type="submit" value="Kaydet" name="gonder" id="gonder">
                        </form>





                    </div>

                </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- page container area end -->


    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>