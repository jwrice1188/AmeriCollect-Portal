<?php
session_start();
if (isset($_SESSION["fname"])) {
  $sessionfname = $_SESSION["fname"];
  $sessionid = $_SESSION["accountid"];
}

$key = $value = $error = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("connect-db.php");
  foreach ($_POST as $key => $value) {
    $sql = "update account set tokens=$value where accountid=$key";
    $statement1 = $db->prepare($sql);
    if ($statement1->execute()) {
      $statement1->closeCursor();
      $success = "<h1 style='text-align: center;'>Tokens Successfully Updated.</h1><br><h4 style='text-align: center;'>You will be redirected back to the Admin page in 5 seconds.<br><br><img src='img/thumbs.png' alt='thumbs up'>";
    } else {
      $error = "Account NOT Successfully Updated!";
    }
  }
}
?>
<script>
  setTimeout("location.href = 'admin.php';", 5000);
</script>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/headnav.php"); ?>
<div class="container-fluid p-0">
  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
      <?php
      if ($error != "") {
        echo "<h4 style='color: red;'>$error</h4>";
      } else {
        echo $success;
      } ?>
    </div>
  </section>
</div>
<?php include("includes/scripts.php"); ?>

</html>