<?php
include "lib/header.php";
include "lib/database.php";
$obj=new database();

if (!isset($_SESSION['email']))
{
    header("Location:login.php");
}
?>
    <div class="panel panel-default">
        <div class="panel-header">
            <h3>Admin Profile<span class="pull-right"><a class="btn btn-primary" href="index.php">Back To Home Page</a></span></h3>
        </div>
        <div class="panel-body">
            <div style="max-width: 680px; margin:auto">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_name">User Name </label>
                        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $_SESSION['userName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email'] ?>">
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php
include "lib/footer.php"
?>