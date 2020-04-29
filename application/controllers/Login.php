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
            
                // 入力したユーザIDを格納
                $email = $_POST["Email"];
                
                $row = $this->User_model->get_by_email($email);
                
                $password = $_POST["Password"];
                
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);
                    $_SESSION["Email"] = $email;

                    if ($row['id'] == '1') {
                        header("Location: /index.php/MasterTableC");
                    } elseif ($row['id'] >= 2) {
                        //SESSIONに配列を入れてはいけないので、$row['id']を$catch_idに代入
                        $catch_id = $row['id'];
                        $_SESSION["Id"] = $catch_id;
                        header("Location: /index.php/ClientTableC");
                    }
                } else {
                    // 認証失敗
                    $errorMessage = 'メールアドレスあるいはパスワードに誤りがあります。';
                    echo $errorMessage;
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                //ログインページにエラーを出すために一時的にセッションにエラーメッセージを入れる
                $_SESSION['error_message'] = $errorMessage;
            }
        } else {
            header("location: /");
        }
    }

    public function MasterTableC()
    {
        $this->load->view('MasterTable_view');
    }
}
