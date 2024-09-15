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
                  <h2>Kategoriler</h2>
                </div>

                <div class="card-body">
                  <?php if(!isset($_GET['p'])) { ?>
                    <table id="dataTable" class="table table-responsive table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>İsmi</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $sql = "SELECT * FROM categories";
                        foreach ($db->query($sql) as $key) { $sira++; ?>
                          <tr>
                            <td><?php echo $sira ?></td>
                            <td><?php echo $key['name'] ?></td>
                            <td align="right">
                              <a href="includes/action.php?sil=ok&p=category&id=<?php echo $key['id'] ?>" class="btn btn-danger btn-sm p-2">Sil</a>
                              <a href="kategoriler.php?p=edit&id=<?php echo $key['id'] ?>" class="btn btn-warning p-2 btn-sm">Düzenle</a>
                            </td>
                          </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  <?php } ?>
                  <?php if($_GET['p'] == 'add') { ?>
                    <div class="col-md-6">
                      <form class="forms-sample" action="includes/action.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                          <label for="" class="form-label">Kategori İsmi</label>
                          <input type="text" class="form-control" name="categoryName">
                        </div>
                        <div class="form-group">
                          <label for="" class="form-label">Kategori Resmi</label>
                          <input type="file" class="form-control" name="catImage">
                        </div>
                        <button type="submit" name="addCategory" class="btn btn-primary btn-block">Ekle</button>
                      </form>
                    </div>
                  <?php } ?>
                  <?php if($_GET['p'] == 'edit') { ?>
                    <?php

                    $id = $_GET['id'];
                    $sor = $db->prepare("SELECT * FROM categories WHERE id=?");
                    $sor->execute(array($id));
                    $cek = $sor->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-md-6">
                      <form class="forms-sample" action="includes/action.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                          <label for="" class="form-label">Kategori İsmi</label>
                          <input type="text" class="form-control" name="categoryName" value="<?php echo getCatName($id); ?>">
                        </div>
                        <div class="form-group">
                          <label for="" class="form-label">Kategori Resmi</label>
                          <img src="../<?php echo $cek['image'] ?>" alt="" width="100">
                          <input type="file" class="form-control" name="catImage">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="editCategory" class="btn btn-primary btn-block">Ekle</button>
                      </form>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include 'includes/footer.php'; ?>
