<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}

$fname = $lname = $address = $city = $phone = $email = $error = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountid = $_POST["accountid"];
    $fname = scrub($_POST["fname"]); 
    $lname = scrub($_POST["lname"]); 
    $address = scrub($_POST["address"]); 
    $city = scrub($_POST["city"]); 
    $phone = scrub($_POST["phone"]);
    $email = scrub($_POST["email"]);
    require_once("connect-db.php");
    $sql = "update account set fname=:fname, lname=:lname, address=:address, city=:city, phone=:phone, email=:email where accountid = $accountid";
    $statement1 = $db->prepare($sql);
    $statement1->bindValue(':fname', $fname);
    $statement1->bindValue(':lname', $lname);
    $statement1->bindValue(':address', $address);
    $statement1->bindValue(':city', $city);
    $statement1->bindValue(':phone', $phone);
    $statement1->bindValue(':email', $email);
    if ($statement1->execute()) {
        $statement1->closeCursor();
        $success = "<h1 style='text-align: center;'>Account Successfully Updated.</h1><br><h4 style='text-align: center;'>You will be redirected back to the My Account page in 5 seconds.<br><br><br><br><br><br><img src='img/thumbs.png' alt='thumbs up'>";
?>

<script>
    setTimeout("location.href = 'account.php';", 5000);

</script>

<?php
    } else {
        $error = "Account NOT Successfully Updated!";
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