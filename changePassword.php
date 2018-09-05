<?php
include "lib/header.php";
include "lib/database.php";
$obj=new database();

if (!isset($_SESSION['email']))
{
    header("Location:login.php");
}

if(isset($_POST['update']))
{
    $obj->changePassword($_POST);
}

?>
<div class="panel panel-default">
    <div class="panel-header">
        <h3>Change Password<span class="pull-right"><a class="btn btn-primary" href="index.php">Back To Home Page</a></span></h3>
    </div>
    <div class="panel-body">
        <div style="max-width: 680px; margin:auto">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Old Password</label>
                    <input type="hidden" name="id" value="<?php echo $id=$_GET['id']?>">
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user_name">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-success">Update</button>

            </form>
        </div>
    </div>
</div>
<?php
include "lib/footer.php"
?>
