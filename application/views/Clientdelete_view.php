<?php
function h($str)
{
    echo htmlspecialchars($str, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>顧客情報の削除 | 金天街</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<!-- Main content -->
<section class="content">
  <form method="post" id="quickForm" action="/index.php/ClientdeleteC/delete">
    <div class="row">
      <div class="col-md-6">
        <h4>削除しますか？</h4>
          <div class="form-group">
              <input type="hidden" name="hidden_id" value="<?= h($data['id']) ?>">
              <input type="hidden" id="" class="form-control" name="delete_name" value="<?= h($data['name']) ?>" disabled>
              <input type="hidden" id="" class="form-control" name="delete_number" value="<?= h($data['number']) ?>" disabled>
              <input type="hidden" id="" class="form-control" name="delete_staff" value="<?= h($data['staff']) ?>" disabled>
              <input type="hidden" id="" class="form-control" name="delete_remarks" value="<?= h($data['remarks']) ?>" disabled>
          </div>
      </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-12">
          <a href="http://kintengai.booktown.tokyo/index.php/ClientTableC" class="btn btn-secondary">テーブル画面に戻る</a>
          <input type="submit" value="削除" class="btn btn-danger" name="btn_delete" id="submitButton">
        </div>
    </div>
    <!--/.row-->
    </form>
</section>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>