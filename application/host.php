<?php

// セッション開始
session_start();

$dbInfo=null;
$sql="";
$res="";

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "root";  // ユーザー名
$db['pass'] = "";  // ユーザー名のパスワード
$db['dbname'] = "user";  // データベース名

$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

/*try {
        $pdo = new PDO("mysql: host=127.0.0.1;dbname=user;charset=utf8", "root", "");
        $sql = 'SELECT * FROM user';
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($user);
    }catch(PDOException $e){
    //エラー出力
        echo "接続に失敗しました";
    }*/
 
    //データベースの情報を$resに入れる

    // 取得したデータを出力
	// foreach( $res as $value ) {
	// 	var_dump($value[shop_id]);
	// }


  try {
    $pdo = new PDO("mysql: host=127.0.0.1;dbname=user;charset=utf8", "root", "");
    $sql = 'select * from user where shop_id > 0';
    $stmt = $pdo->query($sql);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($user);
}catch(PDOException $e){
//エラー出力
    echo "接続に失敗しました";
}


// 接続を閉じる
$dbh = null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Simple Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
<!-- Main content -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">店舗ユーザー</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              

              <div class="input-group-append">
                <!--<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>-->
                <button>ユーザーの追加</button>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>店舗ID</th>
                <th>メールアドレス</th>
                <th>パスワード</th>
                <th>店舗名</th>
                <th>店舗住所</th>
                <th>代表者</th>
                <th>備考</th>
                <th>編集</th>
                <th>削除</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($user as $row): ?>
              <tr>
                <td><?= $row["shop_id"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["password"]; ?></td>
                <td><?= $row["shop_name"]; ?></td>
                <td><?= $row["address"]; ?></td>
                <td><?= $row["representative"]; ?></td>
                <td><?= $row["remarks"]; ?></td>
                <td>
                  <a href="http://localhost/list/pages/examples/edit.php?shop_id=<?= $row["shop_id"];  ?>">
                    <button>編集</button>
                  </a>
                </td>
                <td>
                  <button>削除</button>
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