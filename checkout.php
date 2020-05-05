<?php
session_start();
if (!isset($_SESSION["fname"])){
?>

<script> window.location.href = "login.php";</script>

<?php } else{ 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"]; 
}

$error = $accountid = "";
$sum = $numberordered = 0;

$numerordered = $_POST["numberordered"];
$sum = $_POST["carttotal"];
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
                <h3 class="section-title">Billing/Shipping Information</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form class="text-center" action="updateuser.php" method="POST">
                <?php foreach ($accounts as $account):?>
                <input type="hidden" name="accountid" value="<?php echo $account['accountid']; ?>">
                <input type="submit" class="btn btn-primary" value="Update Information"><br><br>
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
                <?php endforeach;?>
                <h3>Total: $<?php echo $sum.".00";?> </h3>
            </form>
            <h3 class="text-center"><b>Payment:</b></h3>
            <form class="text-center" action="checkout-process.php" method="POST">
                <input type="hidden" name="numberordered" value="<?php echo $numberordered;?>">
                <input type="radio" name="payment" value="Silver" required>&nbsp;Silver&nbsp;
                <input type="radio" name="payment" value="Gold" required>&nbsp;Gold&nbsp;
                <input type="radio" name="payment" value="Platinum" required>&nbsp;Platinum&nbsp;<br><br>
                <input type="submit" class="btn btn-primary" value="Complete Purchase">&nbsp;
                <a href="cart.php" class="btn btn-primary" role="button">Cancel</a>
            </form>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>