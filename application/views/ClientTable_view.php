<?php
$alert_data = null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>顧客テーブル | 金天街</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<!-- Main content -->
  <div class="row">
    <div class="col-12">
    <img src="../../dist/img/logo_transparent.png" alt="金天街のロゴ">
    <?php foreach ($shop_name as $name): ?>
            <h3 class=""><?php echo $name['shop_name']; ?></h3>
            <?php endforeach; ?>
      <div class="card">
      　　<div>
        　　<?php if (isset($_GET['alert']) && $_GET['alert'] == '1') : ?>
        　　<div class="alert alert-danger alert-dismissible">
          　<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          　<h5><i class="icon fas fa-check"></i> Alert!</h5>
          　ユーザー情報を削除しました。
        　</div>
      　　<?php endif; ?>
      　　<?php if (isset($_GET['alert']) && $_GET['alert'] == '2') : ?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          ユーザー情報を追加しました。
        </div>
      　<?php endif;?>
      　<?php if (isset($_GET['alert']) && $_GET['alert'] == '3') : ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          ユーザー情報を編集しました。
        </div>
      　<?php endif; ?>
    　</div>
        <div class="card-header">
          <h3 class="card-title">顧客テーブル</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 250px;">
              <div class="input-group-append">
                <a href="http://kintengai.booktown.tokyo/">
                    <button type="button" class="btn btn-block btn-default">ログアウト</button>
                </a>
                <a href="http://kintengai.booktown.tokyo/index.php/ClientaddC">
                    <button type="button" class="btn btn-block btn-info">顧客の追加</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>顧客名</th>
                <th>電話番号</th>
                <th>担当スタッフ</th>
                <th>備考</th>
                <th>登録日</th>
                <th>更新日</th>
                <th>編集</th>
                <th>削除</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row): ?>
              <tr>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["number"]; ?></td>
                <td><?= $row["staff"]; ?></td>
                <td><?= $row["remarks"]; ?></td>
                <td><?= $row["registration_date"]; ?></td>
                <td><?= $row["update_date"]; ?></td>
                <td>                  
                  <a href="http://kintengai.booktown.tokyo/index.php/ClienteditC?id=<?php echo $row['id'] ?>">
                    <button type="button" class="btn btn-block btn-success">編集</button>
                  </a>
                </td>
                <td>
                  <a href="http://kintengai.booktown.tokyo/index.php/ClientdeleteC?id=<?php echo $row['id'] ?>">
                      <button type="button" class="btn btn-block btn-danger">削除</button>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
    </div>
  </div>
  <!-- /.row -->
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>
</html>