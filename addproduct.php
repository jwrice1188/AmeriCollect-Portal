<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}   

$error = $type = $name = $description = $quantity = $price = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = scrub($_POST['type']);
    $name = scrub($_POST['name']);
    $description = scrub($_POST['description']);
    $quantity = scrub($_POST['quantity']);
    $price = scrub($_POST['price']);

if ($error == "") {
    require_once("connect-db.php");
    $sql="INSERT INTO product (type, name, description, quantity, price) VALUES (:type, :name, :description, :quantity, :price)";
    $statement1=$db->prepare($sql);
    $statement1->bindValue(':type', $type);
    $statement1->bindValue(':name', $name);
    $statement1->bindValue(':description', $description);
    $statement1->bindValue(':quantity', $quantity);
    $statement1->bindValue(':price', $price);

    if ($statement1->execute()) {
        $statement1->closeCursor();
        $success=true;
    } else {
        $error="Error adding product.";
    }
}
}
function scrub($data) {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Add New Product</h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
        <tr>
            <?php if ($error != "no error") {
                    echo "<h3 style='color: red;'>$error</h3>";
                }
                if ($success == true) {
                    echo "<h3>Product Successfully Added</h3><h4>You will be redirected back to the admin page in 5 seconds.</h4>";
                    header("refresh:5;url=admin.php");
                } ?>
        </tr>
        <tr>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <label>Type of Product:</label><br>
                <input type="radio" name="type" required value="cigar" <?php echo ($type=='cigar' )?'checked':'' ?>>&nbsp;Cigar&nbsp;
                <input type="radio" name="type" required value="pipe" <?php echo ($type=='pipe' )?'checked':'' ?>>&nbsp;Pipe&nbsp;
                <input type="radio" name="type" required value="accessory" <?php echo ($type=='accessory' )?'checked':'' ?>>&nbsp;Accessory&nbsp;<br><br>

                <label>Name of Product:</label><br>
                <input type="text" name="name" required value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"><br><br>

                <label>Product Description: (if entering image as description, please enter image file name)</label><br>
                <textarea name="description" rows = "3" cols = "50" required value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea><br><br>

                <label>Quantity on Hand:</label><br>
                <input type="text" name="quantity" required value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?>"><br><br>

                <label>Price: (whole numbers only)</label><br>
                <input type="text" name="price" required value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>"><br><br>

                <input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;
                <a href="admin.php" class="btn btn-primary" role="button">Cancel</a>
            </form>
        </tr>
    </table>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
