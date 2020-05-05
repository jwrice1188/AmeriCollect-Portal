<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}

$productid = $error = $success = "";

$numberordered = $_POST["numberordered"];
$productid = $_POST['productid'];
require_once("connect-db.php");
$sql = "delete from cart where productid=$productid; update product set quantity=quantity+$numberordered where productid=$productid";
$statement1 = $db->prepare($sql);
$statement1->execute();
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("includes/lessheader.php");?>
    
        <div class="container main">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        header("Location: cart.php");
                    ?>
                </div>
            </div>
        </div>
    <?php include("includes/footer.php");?>
</html>
