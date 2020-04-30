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
  <title>ユーザーの削除 | 金天街</title>
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
  <form method="post" id="quickForm" action="/index.php/MTdeleteC/delete">
    <div class="row">
      <div class="col-md-6">
	<h4>削除しますか？</h4>
          <div class="form-group">
            <input type="hidden" name="hidden_id" value="<?= h($data['id']) ?>">
            <input type="hidden" id="" class="form-control" name="save_email" value="<?php echo h($data['email']) ?>" disabled>
            <input type="hidden" id="" class="form-control" name="save_password" value="<?php echo h($data['password']) ?>" disabled>
            <input type="hidden" id="" class="form-control" name="save_shop_name" value="<?php echo h($data['shop_name']) ?>" disabled>
            <input type="hidden" id="" class="form-control" name="save_shop_address" value="<?php echo h($data['shop_address']) ?>" disabled>           
            <input type="hidden" id="" class="form-control" name="save_rep" value="<?php echo h($data['rep']) ?>" disabled>     
            <input type="hidden" id="" class="form-control" name="save_remarks" value="<?php echo h($data['remarks']) ?>" disabled>
          </div>  
      </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-12">
          <a href="https://kintengai.booktown.tokyo/index.php/MasterTableC" class="btn btn-secondary">テーブル画面に戻る</a>
          <input type="submit" value="削除する" class="btn btn-danger" name="btn_delete" id="submitButton">
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