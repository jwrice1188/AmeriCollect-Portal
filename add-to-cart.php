<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}   

$error = $success = $productid = $name = $price = $numberordered = $total = "";

$productid = $_POST["productid"];
$numberordered = $_POST["numberordered"];
require_once("connect-db.php");
$sql = "select * from product where productid = $productid";
$statement1 = $db->prepare($sql);
$statement1->execute();
$cart = $statement1->fetchAll();
$statement1->closeCursor();

foreach ($cart as $item) {
    $name = $item["name"];
    $price = $item["price"];
    $total = $price * $numberordered;
}

require_once("connect-db.php");
$sql2 = "insert into cart (productid, accountid, name, price, numberordered, total) values (:productid, $sessionid, :name, :price, :numberordered, :total); update product set quantity = quantity - $numberordered where productid = $productid";
$statement2 = $db->prepare($sql2);
$statement2->bindValue(':productid', $productid);
$statement2->bindValue(':numberordered', $numberordered);
$statement2->bindValue(':name', $name);
$statement2->bindValue(':price', $price);
$statement2->bindValue(':total', $total);
if ($statement2->execute()) {
    $statement2->closeCursor();
    $success = "Item Successfully Added to <a href='cart.php'>Your Cart</a>!<br><br><h4 class='section-title'><a href='products.php'>Click Here</a> to return to Product page.</h4>";
}
else {
    $error = "Error adding items to your cart. Please <a href='login.php'>Log In</a> to add items to your cart.";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/lessheader.php");?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">
                    <?php
                    if ($error == "") {
                        echo $success;
                    }
                    else {
                        echo $error;
                        
                    } ?>
                </h3>
                <div class="section-title-divider"></div>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
