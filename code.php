<?
session_start();
include('./dbcon.php');
print_r($con);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token){
    $mail = new PHPMailer(true);                   //Enable verbose debug output
    // $mail->SMTPDebug = 2;   
    $mail->isSMTP();       
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    
    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username = 'itschoolpresidency@gmail.com';                     //SMTP username
    $mail->Password = 'jhbysjmqkvzlobmv';       
    
    //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port = 587;                                    //TCP 465 port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('itschoolpresidency@gmail.com', $name);
    $mail->addAddress($email);     //Add a recipient
    

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Orman.uz saytini tasdiqlang';

    // Email body with styles
    $mail->Body    = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333333;
                margin: 0;
                padding: 0;
            }
            .email-container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border: 1px solid #dddddd;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                text-align: center;
                padding: 20px 0;
                background-color: #4CAF50;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
            .email-body {
                padding: 20px;
                text-align: center;
            }
            .email-footer {
                text-align: center;
                padding: 20px;
                color: #777777;
                font-size: 12px;
            }
            .verify-button {
                display: inline-block;
                padding: 10px 20px;
                margin: 20px 0;
                font-size: 16px;
                color: #ffffff!important;
                background-color: #4CAF50;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='email-header'>
                <h1>Orman.uz</h1>
            </div>
            <div class='email-body'>
                <h2>Salom, $name!</h2>
                <p>Elektron pochtangizni <b>Orman.uz</b> sayti uchun tasdiqlashingizni ma`lum qilamiz.</p>
                <a href='http://orman/verifyEmail.php?token=$verify_token' class='verify-button'>Quyidagi havola orqali tasdiqlang</a>
            </div>
            <div class='email-footer'>
                <p>&copy; 2024 Orman.uz. Barcha huquqlar himoyalangan.</p>
            </div>
        </div>
    </body>
    </html>";

    $mail->send();
    echo 'Message has been sent';
}

if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // sendemail_verify("$name", "$email", "$verify_token");
    // echo "Sent";
    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['status'] = 'Bu elektron pochta oldin saytimizdan ro`yxatdan o`tgan';
        header('Location: Register.php');
    } else{
        $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            sendemail_verify("$name", "$email", "$verify_token");
            $_SESSION['status'] = 'Muvaffaqiyatli amalga oshirildi! Elektron pochtangizni tasdiqlang! Tasdiq pochtasini topa olmagan bo`lsangiz elektron pochtangizning spam bo`limini tekshirib ko`ring.';
            header('Location: Register.php');
        } else{
            $_SESSION['status'] = 'Ro`yxatdan o`tish amalga oshirilmadi. Iltimos keyingroq urunib ko`ring!';
            header('Location: Register.php');
        }
    }
}
?>
