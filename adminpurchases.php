<?php
session_start();
if (!isset($_SESSION["fname"])){
?>

<script> window.location.href = "login.php";</script>

<?php } else{ 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"]; 
}

$error = "";

require_once("connect-db.php");
$sql = "select * from purchase inner join account on account.accountid = purchase.accountid";
$statement1 = $db->prepare($sql);
if ($statement1->execute()) {
    $purchases = $statement1->fetchAll();
    if ($purchases == null) {
        $error = "No Purchases have been made.";
    }
    $statement1->closeCursor();
} else {
    $error = "Error finding purchases.";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <h3>All Purchases</h3>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        if ($purchases != null){
                            foreach($purchases as $purchase) {
                            ?>
                    <tr>
                        <td>
                            <?php echo $purchase["name"]?>
                        </td>
                        <td>
                            <?php echo "$".$purchase["price"].".00"?>
                        </td>
                        <td>
                            <?php echo $purchase["fname"]." ".$purchase["lname"]."<br>".$purchase["address"]."<br>".$purchase["city"]?>
                        </td>
                        <td>
                            <?php echo "$".$purchase["total"].".00"?>
                        </td>
                        <td>
                            <?php echo $purchase["purchasedate"]?>
                        </td>
                    </tr>
                    <?php }  } else {
                                    echo "<tr><td><h4>$error</h4></td><td></td><td></td><td></td><td></td></tr>";
                                }
                                ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
