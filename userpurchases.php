<?php
session_start(); 
if (!isset($_SESSION["fname"])){
?>         

<script>window.location.href = "login.php";</script> 

<?php } else { 
        $sessionfname = $_SESSION["fname"]; 
        $sessionid = $_SESSION["accountid"];
}

$error = "";

require_once("connect-db.php");
$sql = "select * from purchase where accountid = $sessionid";
$statement1 = $db->prepare($sql);
if ($statement1->execute()) {
    $purchases = $statement1->fetchAll();
    $statement1->closeCursor();
    if ($purchases == null) {
        $error = "No purchases have been made.";
    }
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
                        <h3>Previous Purchases</h3>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <th>Purchase Date</th>
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
                            <?php echo $purchase["purchasedate"]?>
                        </td>
                    </tr>
                    <?php }  } else {
                                    echo "<tr><td><h4>$error</h4></td><td></td></tr>";
                                }
                                ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>
