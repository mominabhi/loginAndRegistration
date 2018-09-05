<?php
include "lib/header.php";
include "lib/database.php";

if(isset($_SESSION['email']))
{
    header("Location:index.php");
}
$obj = new database();

if (isset($_POST['login'])) {
    $result=$obj->login($_POST);

}

?>
    <div class="panel panel-default">
        <div class="panel-header">
            <h3 style="text-align: center">User Login</h3>
        </div>
        <div class="panel-body">
            <div style="max-width: 680px; margin:auto">
           <form action="" method="post">
               <div class="form-group">
                   <label for="email">Email </label>
                   <input type="text" name="email" id="email" class="form-control">
               </div>
               <div class="form-group">
                   <label for="password">Password </label>
                   <input type="text" name="password" id="password" class="form-control">
               </div>
               <button type="submit" name="login" class="btn btn-success">Login</button>
           </form>
        </div>
        </div>
    </div>
<?php
include "lib/footer.php"
?>