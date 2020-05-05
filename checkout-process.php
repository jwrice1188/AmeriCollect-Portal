<?php
session_start();
if (!isset($_SESSION["fname"])){
?>

<script> window.location.href = "login.php";</script>

<?php } else{ 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"]; 
}
$error = $payment = $purchasedate = $success = "";

$numberordered = $_POST["numberordered"];
$purchasedate = date("Y-m-j");
$payment = $_POST["payment"];
require_once("connect-db.php");
$sql = "select * from cart";
$statement1 = $db->prepare($sql);
$statement1->execute();
$cart = $statement1->fetchAll();

foreach ($cart as $item) {
    require_once("connect-db.php");
    $sql2 = "insert into purchase (name, price, accountid, payment, total, purchasedate) values (:name, :price, :accountid, :payment, :total, :purchasedate); update product set quantity=quantity-$numberordered ; delete from cart;";
    $statement2 = $db->prepare($sql2);
    $statement2->bindValue(':name', $item["name"]);
    $statement2->bindValue(':price', $item["price"]);
    $statement2->bindValue(':accountid', $sessionid);
    $statement2->bindValue(':payment', $payment);
    $statement2->bindValue(':total', $item["total"]);
    $statement2->bindValue(':purchasedate', $purchasedate);
    
    if ($statement2->execute()) {
        $statement2->closeCursor();
        $success = "<h1 style='text-align: center;'>Items Successfully Purchased.</h1><br><h4 style='text-align: center;'>You will be redirected to you previous purchases page in 5 seconds.";
    }
    else {
        $error = "Error purchasing items.";
    }
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
                        header("refresh:5;url=userpurchases.php");
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
