<?php
include "lib/header.php";
include "lib/database.php";
//if (!isset($_SESSION['email']))
//{
//    header("Location:login.php");
//}
$obj = new database();

if (isset($_POST) & !empty($_POST)) {
    $msg=$obj->registration($_POST);
    echo $msg;

}

?>
    <div class="panel panel-default">
        <div class="panel-header">
            <h3 style="text-align: center">User Register</h3>
        </div>
        <div class="panel-body">
            <div style="max-width: 680px; margin:auto">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" name="name" id="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="user_name">User Name </label>
                        <input type="text" name="user_name" id="user_name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" name="email" id="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="text" name="password" id="password" class="form-control" required="">
                    </div>
                    <button type="submit" name="registration" class="btn btn-success">Registration</button>
                </form>
            </div>
        </div>
    </div>
<?php
include "lib/footer.php"
?>