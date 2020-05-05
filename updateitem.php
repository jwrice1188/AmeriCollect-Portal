<?php
session_start(); 
if (!isset($_SESSION["fname"])){
?>

<script>window.location.href = "login.php";</script>

<?php } else { 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"];
}


$error = $productid = "";

$productid = $_POST["productid"];
require_once("connect-db.php");
$sql = "select * from product where productid = $productid";
$statement1 = $db->prepare($sql);
$statement1->execute();
$products = $statement1->fetchAll();
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Update Product Info</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form">
                <form action="updateitem-process.php" method="POST" role="form">
                    <?php foreach ($products as $product):?>
                    <div class="form-group">
                        <label>Product Type:</label><br>
                        <input type="radio" name="type" required value="cigar" <?php echo ($product['type']=='cigar')?'checked':'' ?>>&nbsp;Cigar&nbsp;
                        <input type="radio" name="type" required value="pipe" <?php echo ($product['type']=='pipe')?'checked':'' ?>>&nbsp;Pipe&nbsp;
                        <input type="radio" name="type" required value="accessory" <?php echo ($product['type']=='accessory')?'checked':'' ?>>&nbsp;Accessory&nbsp;<br>
                    </div>
                    <div class="form-group">
                        <label>Product Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $product["name"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class ="form-control" name="description" rows = "3" cols = "50" required value="<?php echo $product["description"];?>"><?php echo $product["description"];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Inventory:</label>
                        <input type="text" name="quantity" class="form-control" value="<?php echo $product["quantity"];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $product["price"];?>" required>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="productid" value="<?php echo $product['productid']; ?>">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="admin.php" class="btn btn-primary" role="button">Cancel</a>
                    </div>
                    <?php endforeach;?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
