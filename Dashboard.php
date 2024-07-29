<?
    session_start();
    include('./auth.php');
    include_once("./components/Navbar.php");
?>
   <div class="container my-5 pt-5">
        <!-- <h1>It's dashboard</h1>
        <h4>Name : <?=$_SESSION['auth_user']['name']?></h4>
        <h4>Email : <?=$_SESSION['auth_user']['email']?></h4>
        <h4>Phone : <?=$_SESSION['auth_user']['phone']?></h4> -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Daraxt nomi</th>
      <th scope="col">Narxi</th>
      <th scope="col">Sotuv</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Palonya daraxt kochati</td>
      <td>10.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Archa ko'chati</td>
      <td>8.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Manzarali daraxt</td>
      <td>15.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>

    <tr>
      <th scope="row">4</th>
      <td>Tol daraxt kochati</td>
      <td>20.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Chinor ko'chati</td>
      <td>15.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Yong'oq daraxt</td>
      <td>30.000 so'm</td>
      <td><button class="btn btn-success">Olish</button></td>
    </tr>
  </tbody>
</table>
   </div>
<?
    include_once("./components/Footer.php");
?>