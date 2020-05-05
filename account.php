<?php
session_start();
if (!isset($_SESSION["fname"])){
?>

<script>window.location.href = "login.php";</script>

<?php } else{ 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"]; 
}

$error = $accountid = "";

$accountid = $sessionid;
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
                <h3 class="section-title">Your Account</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form class="text-center" action="updateuser.php" method="POST">
                <?php foreach ($accounts as $account):?>
                <label>First Name: </label><br>
                <input name="fname" type="hidden"><i><?php echo $account["fname"];?></i><br><br>
                
                <label>Last Name: </label><br>
                <input name="lname" type="hidden"><i><?php echo $account["lname"];?></i><br><br>

                <label>Address:</label><br>
                <input name="address" type="hidden"><i><?php echo $account["address"];?></i><br><br>
                
                <label>City:</label><br>
                <input name="city" type="hidden"><i><?php echo $account["city"];?></i><br><br>
                
                <label>Phone Number:</label><br>
                <input name="phone" type="hidden"><i><?php echo $account["phone"];?></i><br><br>
                
                <label>Email Address:</label><br>
                <input name="email" type="hidden"><i><?php echo $account["email"];?></i><br><br>

                <input type="hidden" name="accountid" value="<?php echo $account['accountid']; ?>">
                <input type="submit" class="btn btn-primary" value="Update Information">
            </form><br>
            <form class="text-center" action="userpurchases.php" method="POST">
                <input type="submit" class="btn btn-primary" value="View Previous Purchases">
            </form>
                <?php endforeach;?>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
