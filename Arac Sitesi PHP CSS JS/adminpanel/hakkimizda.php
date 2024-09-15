<?php include 'includes/head.php'; ?>
<body>
  <div class="container-scroller">
    
    <?php include 'includes/navbar.php' ?>
    
    <div class="container-fluid page-body-wrapper">

      <?php include 'includes/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12">
              <?php if($_GET['action'] == 'ok') { echo "<div class='card p-3 my-4 bg-primary'>";
    echo "<b class='text-white'>İşlem Başarılı</b>";
    echo "</div>"; } ?>
              <?php if($_GET['action'] == 'no') { echo "<div class='card p-3 my-4 bg-danger'>";
    echo "<b class='text-white'>İşlem Başarısız</b>";
    echo "</div>"; } ?>
              <div class="card p-4">
                <div class="card-header">
                  <h2>Hakkımızda Sayfası</h2>
                  <p>Hakkımızda sayfasındaki yazıyı buradan düzenleyebilirsiniz.</p>
                </div>
                <div class="card-body">
                  <div class="col-md-6">
                    <form class="" action="includes/action.php" method="post">
                      <label for="" class="form-label">Yazı:</label>
                      <textarea type="" class="form-control" id="editor" name="text"><?php echo getAboutText(); ?></textarea>
        							<script>
        								CKEDITOR.replace( 'editor' );
        							</script>
                      <button type="submit" class="btn btn-primary my-2" name="updateAbout">Güncelle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'includes/footer.php'; ?>
