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
$sum = 0;

require_once("connect-db.php");
$sql = "select * from cart";
$statement1 = $db->prepare($sql);
if ($statement1->execute()) {
    $cart = $statement1->fetchAll();
    if ($cart == null) {
        $error = "Your Cart Is Empty!";
    }
    $statement1->closeCursor();
} else {
    $error = "Error Retrieving Cart!";
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Your Cart</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <tr class="row">
                    <th style="text-align: center;" class="col-sm-5">Product</th>
                    <th style="text-align: center;" class="col-sm-3">Price</th>
                    <th style="text-align: center;" class="col-sm-2">Quantity</th>
                    <th style="text-align: center;" class="col-sm-2">Cart</th>
                </tr>
                <?php if ($cart != null) {
                    foreach($cart as $item) {
                ?>
                <tr class="row">
                    <td style="text-align: center;" class="col-sm-5"><?php echo $item["name"]?></td>
                    <td style="text-align: center;" class="col-sm-3"><?php echo "$".$item["price"].".00"?></td>
                    <td style="text-align: center;" class="col-sm-2"><?php echo $item["numberordered"]?></td>
                    <td style="text-align: center;" class="col-sm-2">
                        <form action="deletecartitem.php" method="POST">
                            <input type="hidden" name="numberordered" value="<?php echo $item['numberordered']?>"> 
                            <input type="hidden" name="productid" value="<?php echo $item['productid']?>"> 
                            <input type="submit" class="btn btn-primary" value="Remove">
                        </form>
                    </td>
                </tr>
                <?php $sum = $sum + $item["total"];
                    } } else {
                        echo "<tr class='row'><td><h1>$error</h1></td><td></td><td></td><td></td></tr>";    
                    } ?>
                <tr class="row">
                    <td style="text-align: center;" class="col-sm-5"></td>
                    <td style="text-align: center;" class="col-sm-3"><?php echo "Total: $".$sum.".00"?></td>
                    <td style="text-align: center;" class="col-sm-2"></td>
                    <td class="col-sm-2"></td>
                </tr>
                <tr class="row">
                    <td class="col-sm-2"></td>
                    <td style="text-align: center;" class="col-sm-8">
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="numberordered" value="<?php echo $numberordered?>">
                            <input type="hidden" name="carttotal" value="<?php echo $sum;?>">
                            <?php if ($error == "Your Cart Is Empty!") { ?>
                            <button type="submit" class="btn btn-primary" disabled>Check Out</button>
                            <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Check Out</button>
                            <?php } ?>
                        </form>
                    </td>
                    <td></td><td></td>
                </tr>
            </table>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
