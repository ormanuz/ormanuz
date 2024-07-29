<?
  session_start();

    if(isset($_SESSION['auth'])){
        $_SESSION['status'] = "Shaxsiy hisobingizga kiring!";
        header("Location: dashboard.php");
        exit(0);
    } 
    include_once("./components/Navbar.php");
?>

   <link rel="stylesheet" href="./assets/css/form.css">


    <main>
    <section class="container1">
    <div>
      <?
        if(isset($_SESSION['status'])){
          ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <?=$_SESSION['status']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
          <?
          unset($_SESSION['status']);
        }
      ?>
      <header>Kirish</header>
      <p class="my-3 text-center">Akkauntingiz yo'qmi? Unda <a href="./Register.php">Ro'yxatdan o'tish</a></p>

      <form action="logincode.php" method="POST" class="form">
        <div class="input-box">
          <label for="email">Elektron pochta</label>
          
          <input type="text" name="email" id="email" placeholder="Elektron pochtangizni kiriting" required />
        </div>
        <div class="input-box">
            <label for="password1">Parol</label>
            <input type="password" id="password1" name="password" placeholder="Parolingizni kiriting" required />
            <div class="d-flex my-3"><input class="seepass" type="checkbox" onclick="myFunction()"><span>&nbsp;&nbsp;&nbsp;Parolni ko'rish</span></div>
          </div>
        <button type="submit" name="login_now_btn">Kirish</button>
      </form>
    </section>
    </main>
    <script>
      function myFunction() {
        var x = document.getElementById("password1");
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