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
  <title>ユーザーの追加 | 金天街</title>
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
  <form method="post" id="quickForm" action="/index.php/MTaddC/insert">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" name="hidden_id" value="">
              <label for="inputDescription">メールアドレス</label>
              <input type="text" id="" class="form-control" name="add_email" value="">
            </div>
            <div class="form-group">
              <label for="inputStatus">パスワード</label>
              <input type="text" id="" class="form-control" name="add_password" value="">
            </div>
            <div class="form-group">
              <label for="">店舗名</label>
              <input type="text" id="" class="form-control" name="add_shop_name" value="">
            </div>
            <div class="form-group">
                <label for="inputStatus">店舗住所</label>
                <input type="text" id="" class="form-control" name="add_shop_address" value="">
            </div>
            <div class="form-group">
                <label for="inputStatus">代表者</label>
                <input type="text" id="" class="form-control" name="add_rep" value="">
            </div>
            <div class="form-group">
                <label for="inputDescription">備考</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="add_remarks"></textarea>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-12">
          <a href="https://kintengai.booktown.tokyo/index.php/MasterTableC" class="btn btn-secondary">テーブル画面に戻る</a>
          <input type="submit" value="追加" class="btn btn-info" name="btn_add" id="submitButton">
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
<!-- jquery-validation -->
<script src="<?= base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url(); ?>plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      add_email: {
        required: true,
        email: true,
      },
     add_password: {
        required: true,
        minlength: 5
      },
      add_shop_name: {
        required: true
      },
      add_shop_address: {
        required: true
      },
      add_rep: {
        required: true
      },
    },
    messages: {
      add_email: {
        required: "メールアドレスを入力してください。",
        email: "有効なメールアドレスを入力してください。"
      },
      add_password: {
        required: "パスワードを入力してください。",
        minlength: "パスワードは5文字以上にする必要があります。"
      },
      add_shop_name: {
        required: "店舗名を入力してください。"
      },
      add_shop_address: {
        required: "店舗住所を入力してください。"
      },
      add_rep: {
        required: "代表者名を入力してください。"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>