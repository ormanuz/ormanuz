<?php
 session_start();

 if(isset($_SESSION['auth'])){
     $_SESSION['status'] = "Shaxsiy hisobingizga kiring!";
     header("Location: dashboard.php");
     exit(0);
 } 
    include_once("./components/Navbar.php");
?>
<link rel="stylesheet" href="./assets/css/form.css">

    
    </div>
    <main>
    <section class="container1">
      <?
        if(isset($_SESSION['status'])){
          ?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?=$_SESSION['status']?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><?
          unset($_SESSION['status']);
        }
        
      ?>
      <header>Ro'yxatdan o'tish</header>
      <p class="my-3 text-center">Akkauntingiz bormi? Unda <a href="./Login.php">Kirish</a></p>

      <form action="./code.php" class="form" method="POST">
        <div class="input-box">
          <label for="name">To'liq ism</label>
          <input type="text" placeholder="To'liq ismingizni kiriting" name="name" id="name" required />
        </div>
        <div class="input-box">
          <label for="email">Elektron pochta</label>
          <input type="text" name="email" id="email" placeholder="Elektron pochtangizni kiriting" required />
        </div>
          <div class="input-box">
            <label for="phone">Telefon raqam</label>
            <input type="number" id="phone" name="phone" placeholder="909998877" required />
          </div>
          <div class="input-box">
            <label for="password">Parol</label>
            <input type="password" id="password" name="password" placeholder="Parol yarating" required />
            <div class="d-flex my-3"><input class="seepass" id="seepass" name="seepass" type="checkbox" onclick="myFunction()"><label for="seepass">&nbsp;&nbsp;&nbsp;Parolni ko'rish</label></div>
          </div>
        <button name="register_btn">Ro'yxatdan o'tish</button>
      </form>
    </section>
    </main>

    <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
<?  
    include_once("./components/Footer.php");
?>