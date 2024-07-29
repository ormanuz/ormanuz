<?
    session_start();
    include("./dbcon.php");
    if(isset($_POST['login_now_btn'])){
        if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $login_query = "SELECT * from users WHERE email='$email' AND password='$password'";
            $login_query_run=mysqli_query($con, $login_query);

            if(mysqli_num_rows($login_query_run) > 0){
                $row = mysqli_fetch_array($login_query_run);
                if($row['verify_status'] == '1'){
                    $_SESSION['auth'] = TRUE;
                    $_SESSION['auth_user'] = [
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone']
                    ];
                    // $_SESSION['status'] = "Muvaffaqiyatli kirdingiz";
                    header("Location: dashboard.php");
                    exit(0);
                } else{
                 $_SESSION['status'] = "Iltimos elektron pochtangizni tasdiqlang!";
                header("Location: login.php");
                exit(0);
                }
            } else{
                $_SESSION['status'] = "Elektron pochta yoki parolni xato kiritdingiz";
                header("Location: login.php");
                exit(0);
            }
        }
       
    } else{
        $_SESSION['status'] = "Barcha maydonlarni to'ldiring!";
        header("Location: login.php");
        exit(0);
    }

?>