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
  <title>顧客情報の編集 | 金天街</title>
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
  <form method="post" id="quickForm" action="/index.php/ClienteditC/update">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-body">
          <div class="form-group">
              <input type="hidden" name="hidden_id" value="<?= h($data['id']) ?>">
              <label for="inputDescription">顧客名［必須］</label>
              <input type="text" id="" class="form-control" name="save_name" value="<?= h($data['name']) ?>">
            </div>
            <div class="form-group">
              <label for="inputStatus">電話番号［必須］</label>
              <input type="text" id="" class="form-control" name="save_number" value="<?= h($data['number']) ?>">
            </div>
            <div class="form-group">
              <label for="">担当スタッフ［必須］</label>
              <input type="text" id="" class="form-control" name="save_staff" value="<?= h($data['staff']) ?>">
            </div>
            <div class="form-group">
                <label for="inputStatus">備考</label>
                <input type="text" id="" class="form-control" name="save_remarks" value="<?= h($data['remarks']) ?>">
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
          <a href="https://kintengai.booktown.tokyo/index.php/ClientTableC" class="btn btn-secondary">テーブル画面に戻る</a>
          <input type="submit" value="変更の保存" class="btn btn-success toastsDefaultSuccess" name="btn_save" id="submitButton">
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
      save_name: {
        required: true
      },
     save_number: {
        required: true
      },
      save_staff: {
        required: true
      }
    },
    messages: {
      save_name: {
        required: "顧客名を入力してください。",
      },
      save_number: {
        required: "電話番号を入力してください。",
      },
      save_staff: {
        required: "担当スタッフ名を入力してください。"
      }
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