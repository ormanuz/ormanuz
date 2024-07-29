<?php
  session_start();
  include("./dbcon.php");
  if(isset($_POST['contact_btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $contact_query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $contact_query_run = mysqli_query($con, $contact_query);

    if($contact_query_run){
      $_SESSION['contact_status'] = "Xabaringiz yuborildi";
      header("Location: index.php#contact");
      exit(0);
    } else{
      $_SESSION['contact_status'] = "Xabaringiz yuborilmadi";
      header("Location: index.php#contact");
      exit(0);
    }
  }
?>
