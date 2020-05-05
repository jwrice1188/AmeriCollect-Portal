<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}

$error = $type = $name = $description = $quantity = $price = $success = $productid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST['productid'];
    $type = scrub($_POST['type']);
    $name = scrub($_POST['name']);
    $description = scrub($_POST['description']);
    $quantity = scrub($_POST['quantity']);
    $price = scrub($_POST['price']);

if ($error == "") {
    require_once("connect-db.php");
    $sql="update product set type=:type, name=:name, description=:description, quantity=:quantity, price=:price where productid = $productid";
    
    $statement1=$db->prepare($sql);
    $statement1->bindValue(':type', $type);
    $statement1->bindValue(':name', $name);
    $statement1->bindValue(':description', $description);
    $statement1->bindValue(':quantity', $quantity);
    $statement1->bindValue(':price', $price);

    if ($statement1->execute()) {
        $statement1->closeCursor();
        $success = "<h1 style='text-align: center;'>Product Successfully Updated.</h1><br><h4 style='text-align: center;'>You will be redirected back to the Admin page in 5 seconds.</h4>";
?>

<script>
    setTimeout("location.href = 'admin.php';", 5000);
</script>

<?php
    } else {
        $error = "Product NOT Successfully Updated!";
    }
} }

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
                <?php
                if ($error != "") {
                echo "<h4 style='color: red;'>$error</h4>";
                } else {
                echo $success;
                } ?>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php");?>

</html>