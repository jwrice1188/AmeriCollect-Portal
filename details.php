<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}

$error = $productid = "";

$productid = $_POST["productid"];
require_once("connect-db.php");
$sql = "select * from product where productid = $productid";
$statement1 = $db->prepare($sql);
$statement1->execute();
$items = $statement1->fetchAll();
if ($items == null) {
    $error = "No Product Available.";
    $statement1->closeCursor();
}
else {
    $error = "Error Finding Product";
    $statement1->closeCursor();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Product Details</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">  
            <table class="table">
                <tr class="row">
                    <th class="col-sm-2">Name</th>
                    <th class="col-sm-7">Description</th>
                    <th class="col-sm-1">Price</th>
                    <th class="col-sm-2">Number In Stock</th>
                </tr>
                <?php    
                    if ($items != null) {
                    foreach($items as $item) {
                ?>
                <tr class="row">
                    <td><?php echo $item["name"]?></td>
                    <td><?php 
                            if ($item["type"] == "pipe" || $item["type"] == "accessory") {
                                echo "<img style='width: 25%;' src='img/".$item["description"]."' alt='product image'>";
                            }
                    else {echo $item["description"];}?></td>
                    <td><?php echo "$".$item["price"].".00"?></td>
                    <td><?php echo $item["quantity"]?></td>
                </tr>
                <tr class="row">
                    <td>
                        <form action="add-to-cart.php" method="POST">
                            <input type="hidden" name="productid" value="<?php echo $item["productid"];?>">
                            <label>Enter Quantity:</label><input type="text" name="numberordered" required><br><br>
                            <input type="submit" class="btn btn-primary" value="Add to Cart">&nbsp;
                            <a href="products.php" class="btn btn-primary" role="button">Cancel</a>
                        </form>
                    </td><td></td><td></td><td></td>
                </tr>
                <?php } } else {
                            echo "<td><h1>$error</h4></td><td></td><td></td><td></td>";    
                        } ?>
            </table>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
