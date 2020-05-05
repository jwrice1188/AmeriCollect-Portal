<?php
session_start();
if (!isset($_SESSION["fname"])){
?>

<script> window.location.href = "login.php";</script>

<?php } else{ 
        if ($_SESSION["adminrights"] != 1) {
?>

<script> window.location.href = "index.php";</script>

<?php }
        $sessionfname = $_SESSION["fname"];
        $sessionid = $_SESSION["accountid"];
        $sessionadmin = $_SESSION["adminrights"];
}

$error = "";

require_once("connect-db.php");
$sql = "select * from product";
$statement1 = $db->prepare($sql);
if ($statement1->execute()) {
    $products = $statement1->fetchAll();
if ($products == null) {
    $error = "No products entered.";
}
    $statement1->closeCursor();
} else {
    $error = "Error finding products";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/adminheader.php");?>
<!--==========================
  Admin Section
  ============================-->
<section id="about">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Administrative Tasks</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container about-container wow fadeInUp">
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <td><a href="adminpurchases.php" class="btn btn-primary" role="button">View All Purchases</a></td>
                    <td><a href="addproduct.php" class="btn btn-primary" role="button">Add New Product</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Inventory</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
                <?php 
                    if ($products != null) {
                    foreach ($products as $product) { ?>
                <tr>                    
                    <td><?php echo $product["name"]?></td>
                    <td><?php echo $product["type"]?></td>
                    <td><?php echo $product["description"]?></td>
                    <td><?php echo $product["quantity"]?></td>
                    <td><?php echo $product["price"]?></td>
                    <td class="text-center">
                        <form action="updateitem.php" method="POST">
                            <input type="hidden" name="productid" value="<?php echo $product["productid"]?>">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                        <form action="deleteadminitem.php" method="POST">
                            <input type="hidden" name="productid" value="<?php echo $product["productid"]?>">
                            <input type="submit" class="btn btn-primary" value="Remove">
                        </form>
                    </td>
                </tr>
                <?php } } else {
                    echo "<td><h4>$error</h4></td><td></td><td></td><td></td><td></td><td></td>";
                }
                ?>
            </table>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>
</html>