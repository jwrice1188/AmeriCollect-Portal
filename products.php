<?php
session_start();
if (isset($_SESSION["fname"])){
    $sessionfname = $_SESSION["fname"]; 
    $sessionid = $_SESSION["accountid"];
}   

//////////////////Cigar Products//////////////////////////////////
$error = "";

require_once("connect-db.php");
$sqlcigar = "select * from product where type = 'cigar'";
$statement1 = $db->prepare($sqlcigar);
if ($statement1->execute()) {
    $cigars = $statement1->fetchAll();
if ($cigars == null) {
    $error = "No cigars available.";
}
    $statement1->closeCursor();
} else {
    $error = "Error finding cigars";
}

//////////////////Pipe Products//////////////////////////////////
$error = "";

require_once("connect-db.php");
$sqlpipe = "select * from product where type = 'pipe'";
$statement2 = $db->prepare($sqlpipe);
if ($statement2->execute()) {
    $pipes = $statement2->fetchAll();
if ($pipes == null) {
    $error = "No pipes available.";
}
    $statement2->closeCursor();
} else {
    $error = "Error finding pipes";
}

//////////////////Accessory Products//////////////////////////////////
$error = "";

require_once("connect-db.php");
$sqlaccessory = "select * from product where type = 'accessory'";
$statement3 = $db->prepare($sqlaccessory);
if ($statement3->execute()) {
    $accessories = $statement3->fetchAll();
if ($accessories == null) {
    $error = "No accessories available.";
}
    $statement3->closeCursor();
} else {
    $error = "Error finding accessories";
}

//////////////////Register//////////////////////////////////
$accountusername = $accountpassword = $fname = $lname = $address = $city = $phone = $email = $registererror = $registersuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountusername = scrub($_POST["accountusername"]);
    $accountpassword = scrub($_POST["accountpassword"]);
    $fname = scrub($_POST["fname"]); 
    $lname = scrub($_POST["lname"]); 
    $address = scrub($_POST["address"]); 
    $city = scrub($_POST["city"]); 
    $phone = scrub($_POST["phone"]);
    $email = scrub($_POST["email"]);
    require_once("connect-db.php");
    $sqlregister = "insert into account (accountusername, accountpassword, fname, lname, address, city, phone, email) values (:accountusername, :accountpassword, :fname, :lname, :address, :city, :phone, :email);";
    $statement4 = $db->prepare($sqlregister);
    $statement4->bindValue(':accountusername', $accountusername);
    $statement4->bindValue(':accountpassword', $accountpassword);
    $statement4->bindValue(':fname', $fname);
    $statement4->bindValue(':lname', $lname);
    $statement4->bindValue(':address', $address);
    $statement4->bindValue(':city', $city);
    $statement4->bindValue(':phone', $phone);
    $statement4->bindValue(':email', $email);
    if ($statement4->execute()) {
        $statement4->closeCursor();
        $registersuccess = "<h1 style='text-align: center;'>New Account created successfully!</h1><br><h1 style='text-align: center;'>Please <a href='login.php'>Log In</a> to Add Items to Your Cart.</h1>";
?>

<script>
    setTimeout("location.href = '#contact';", 0);

</script>

<?php
    } else {
        $registererror = "User NOT successfully created.";
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
<?php include("includes/productheader.php");?>
<!--==========================
  Cigar Section
  ============================-->
<section id="about">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Cigars</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Browse our extensive selection of premium cigars</p>
            </div>
        </div>
    </div>
    <div class="container wow fadeInUp">
        <table class="table table-hover">
            <tr class="row">
                <th style="text-align:center;">Cigar</th>
                <th style="text-align: center;">Description</th>
                <th></th>
            </tr>
            <?php
                    if ($cigars != null) {
                        foreach($cigars as $cigar) {
                            if ($cigar["quantity"] != 0) {
                                ?>
            <tr class="row">
                <td class="col-sm-3" style="text-align: center;">
                    <?php echo $cigar["name"]?>
                </td>
                <td class="col-sm-8">
                    <?php echo $cigar["description"]?>
                </td>
                <td class="text-center col-sm-1">
                    <form action="details.php" method="POST">
                        <input type="hidden" name="productid" value="<?php echo $cigar["productid"];?>">
                        <input type="submit" class="btn btn-primary" value="More Details">
                    </form>
                </td>
            </tr>
            <?php } } } else {
                            echo "<td><h4>$error</h4></td><td></td>";
                        } ?>
        </table>
    </div>
</section>

<!--==========================
  Register Pre-Section
  ============================-->
<section id="subscribe">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-8">
                <h3 class="subscribe-title">Register To Begin Shopping</h3>
                <p class="subscribe-text">Be part of the Hot Ash family and register an account to begin shopping our excellent products!</p>
            </div>
            <div class="col-md-4 subscribe-btn-container">
                <a class="subscribe-btn" href="products.php#contact">Register Now</a>
            </div>
        </div>
    </div>
</section>
<!--==========================
  Pipe Section
  ============================-->
<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Pipes</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Browse our extensive selection of pipes</p>
            </div>
        </div>
    </div>
    <div class="container wow fadeInUp">
        <table class="table table-hover">
            <tr class="row">
                <th></th>
                <th style="text-align:center;">Name</th>
                <th></th>
            </tr>
            <?php
                    if ($pipes != null) {
                        foreach($pipes as $pipe) {
                            if ($pipe["quantity"] != 0) {
                                ?>
            <tr class="row">
                <td class="col-sm-3" style="text-align: center;">
                    <?php echo "<img style='width: 100%;' src='img/".$pipe["description"]."' alt='pipe'>"?>
                </td>
                <td class="col-sm-7" style="text-align:center;">
                    <?php echo $pipe["name"]?>
                </td>
                <td class="text-center col-sm-2">
                    <form action="details.php" method="POST">
                        <input type="hidden" name="productid" value="<?php echo $pipe["productid"];?>">
                        <input type="submit" class="btn btn-primary" value="More Details">
                    </form>
                </td>
            </tr>
            <?php } } } else {
                            echo "<td><h4>$error</h4></td><td></td>";
                        } ?>
        </table>
    </div>
</section>


<!--==========================
  Register Pre-Section
  ============================-->
<section id="subscribe">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-8">
                <h3 class="subscribe-title">Register To Begin Shopping</h3>
                <p class="subscribe-text">Be part of the Hot Ash family and register an account to begin shopping our excellent products!</p>
            </div>
            <div class="col-md-4 subscribe-btn-container">
                <a class="subscribe-btn" href="products.php#contact">Register Now</a>
            </div>
        </div>
    </div>
</section>

<!--==========================
  Accessory Section
  ============================-->
<section id="team">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Accessories</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Browse our cigar and pipe accessories</p>
            </div>
        </div>
    </div>
    <div class="container wow fadeInUp">
        <table class="table table-hover">
            <tr class="row">
                <th></th>
                <th style="text-align:center;">Name</th>
                <th></th>
            </tr>
            <?php
                    if ($accessories != null) {
                        foreach($accessories as $accessory) {
                            if ($accessory["quantity"] != 0) {
                                ?>
            <tr class="row">
                <td class="col-sm-3" style="text-align: center;">
                    <?php echo "<img style='width: 100%; height: auto;' src='img/".$accessory["description"]."' alt='accessory'>"?>
                </td>
                <td class="col-sm-7" style="text-align:center;">
                    <?php echo $accessory["name"]?>
                </td>
                <td class="text-center col-sm-2">
                    <form action="details.php" method="POST">
                        <input type="hidden" name="productid" value="<?php echo $accessory["productid"];?>">
                        <input type="submit" class="btn btn-primary" value="More Details">
                    </form>
                </td>
            </tr>
            <?php } } } else {
                            echo "<td><h4>$error</h4></td><td></td>";
                        } ?>
        </table>
    </div>
</section>
<!--==========================
  Register Section
  ============================-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($registererror != "") {
                    echo "<h4 style='color: red;'>$registererror</h4>";
                } else {
                    echo $registersuccess;
                } ?>
                <h3 class="section-title">Register New Account</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">Complete the form below to register an account and begin buying products!</p>
            </div>
        </div>
        <div>
            <div class="form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" role="form">
                    <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="sample@email.com" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="accountusername" placeholder="Create Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="accountpassword" placeholder="Create Password" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="register" value="Register">
                        <input type="reset" class="btn btn-primary" name="cancel" value="Clear">
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<?php include("includes/footer.php");?>

</html>
