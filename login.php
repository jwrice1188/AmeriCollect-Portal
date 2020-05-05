<?php
session_start();
if (isset($_SESSION["fname"])){
?>

<script> window.location.href = "index.php";</script>

<?php }

$cusername = $cpassword = $success = ""; 
$error = "no error"; 
 if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $cusername = $_POST['cusername'];
    $cpassword = $_POST['cpassword']; 
    require_once("connect-db.php"); 
    $sql="select * from account where accountusername = :cusername and accountpassword = :cpassword"; 
    $statement1=$db->prepare($sql); 
    $statement1->bindValue(":cusername", $cusername);
    $statement1->bindValue(":cpassword", $cpassword);
 
    $statement1->execute(); 
    $result = $statement1->fetchAll();
    $statement1->closeCursor();
     
    foreach($result as $theresult){ 
        $sessionfname = $theresult['fname'];
        $sessionid = $theresult['accountid'];
        $sessionadmin = $theresult['adminrights'];
    } 
    if (isset($sessionfname)) {
        $_SESSION["fname"] = $sessionfname; 
        $_SESSION["accountid"] = $sessionid; 
        $_SESSION["adminrights"] = $sessionadmin;
?>

<script type="text/javascript">window.location = "index.php";</script>

<?php 
    }else{ 
        $error = "Incorrect username and password"; 
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
                    <?php
                if ($error != "no error") {
                    echo "<h4 style='color: red;'>$error</h4>";
                } else {
                    echo $success;
                }
                ?>
            <h1>Please Login</h1>
            <h5>Don't have an account? <a href="products.php#contact">Register now!</a></h5>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <label>Username:</label>
                <input class="form-control" type="text" name="cusername" required><br>
               
                <label>Password:</label>
                <input class="form-control" type="password" name="cpassword" required><br>
                
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">&nbsp;
                <a href="index.php" class="btn btn-primary" role="button">Cancel</a>
            </form>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php");?>

</html>
