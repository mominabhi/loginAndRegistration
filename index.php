<?php
include "lib/header.php";
include "lib/database.php";
$obj = new database();
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
$results = $obj->read();

?>
    <div class="panel panel-default">
        <div class="panel-header">
            <h3>User List<span class="pull-right"> <strong>Welcome!</strong><?php echo $_SESSION['userName'] ?></span>
            </h3>
        </div>
        <div class="panel-body">

            <table class="table table-striped">
                <tr>
                    <th width="20%">Name</th>
                    <th width="20%">Username</th>
                    <th width="20%">email address</th>
                    <th width="20%">Action</th>
                </tr>
                <?php
                foreach ($results as $result) {
                    ?>
                    <tr>
                        <td style="display:none"><?php echo $result['id']?></td>
                        <td><?php echo $result['name']?></td>
                        <td><?php echo $result['user_name']?></td>
                        <td><?php echo $result['email']?></td>
                        <td><a class="btn btn-primary" href="profile.php?id=<?php echo $result['id']?>">View Profile</a></td>
                    </tr>
                    <?php
                }
                ?>


            </table>
        </div>

    </div>
<?php
include "lib/footer.php"
?>