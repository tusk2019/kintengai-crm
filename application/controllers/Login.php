<?php
defined('BASEPATH') or exit('No direct script access allowed');
$row="";
$errorMessage = array();

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        //訪問者がテーブル画面でログアウトボタンを使わずにブラウザバックでログイン画面に戻った時の対策
        if (!empty($_SESSION['id'])) {
            session_regenerate_id(true);
            if ($_SESSION['id'] == '1') {
                header("Location: /index.php/MasterTableC");
                exit;
            } elseif ($_SESSION['id'] >= 2) {
                header("Location: /index.php/ClientTableC");
            }
            exit;
        }

        $this->load->view('view_login');
    }

    public function login()
    {
        $errorMessage = array();
        // ログインボタンが押された場合
        if (isset($_POST["SignIn"])) {
            if (empty($_POST["Email"]) && empty($_POST["Password"])) {
                $errorMessage[0] = 'メールアドレスとパスワードが未入力です。';
                var_dump($errorMessage[0]);
            } elseif (empty($_POST["Email"])) {
                $errorMessage[1] = 'メールアドレスが未入力です。';
                var_dump($errorMessage[1]);
            } elseif (empty($_POST["Password"])) {
                $errorMessage[2] = 'パスワードが未入力です。';
                var_dump($errorMessage[2]);
            }
            
            if (empty($errorMessage)) {

                // 入力したメールアドレスを格納
                $email = $_POST["Email"];
                
                $row = $this->User_model->get_by_email($email);
                
                $password = $_POST["Password"];
                
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION["Email"] = $email;
                    session_regenerate_id(true);

                    if ($row['id'] == '1') {
                        header("Location: /index.php/MasterTableC");
                        exit;
                    } elseif ($row['id'] >= 2) {
                        $catch_id = $row['id'];
                        $_SESSION["Id"] = $catch_id;
                        header("Location: /index.php/ClientTableC");
                        exit;
                    }
                } else {
                    // 認証失敗
                    $errorMessage = 'メールアドレスあるいはパスワードに誤りがあります。';
                    echo $errorMessage;
                }
            } else {
                //ログインページにエラーを出すために一時的にセッションにエラーメッセージを入れる
                $_SESSION['error_message'] = $errorMessage;
            }
        } else {
            header("location: /");
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: https://kintengai.booktown.tokyo/");
        exit;
    }
}
