<?php
//Start Session
session_start();
if (isset($_SESSION["fname"])) {
  $sessionfname = $_SESSION["fname"];
  $sessionid = $_SESSION["accountid"];
}
?>

<script>
  setTimeout("location.href = 'logout.php';", 10000);
</script>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/headnavbad.php"); ?>
<div class="container-fluid p-0">
  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
      <h1 style='text-align: center;'>You do not have any tokens!</h1><br>
      <h4 style='text-align: center;'>You will be logged out in 10 seconds.<br><br><img src='img/thumbsdown.png' alt='thumbs up'>
    </div>
  </section>
</div>
<?php include("includes/scripts.php"); ?>

</html>