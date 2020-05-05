<?php
session_start(); 
if (!isset($_SESSION["fname"])){
?>         

<script>window.location.href = "login.php";</script> 

<?php } else { 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"];
}


$error = $accountid = "";

$accountid = $_POST["accountid"];
require_once("connect-db.php");
$sql = "select * from account where accountid = $accountid";
$statement1 = $db->prepare($sql);
$statement1->execute();
$accounts = $statement1->fetchAll();
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Update Your Account</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form">
                <form action="updateuser-process.php" method="POST" role="form">
                    <?php foreach ($accounts as $account):?>
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $account["fname"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $account["lname"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $account["address"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $account["city"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $account["phone"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $account["email"];?>" required>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="accountid" value="<?php echo $account['accountid']; ?>">
                        <input type="submit" class="btn btn-primary" name="register" value="Update">
                        <a href="account.php" class="btn btn-primary" role="button">Cancel</a>
                    </div>
                    <?php endforeach;?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
