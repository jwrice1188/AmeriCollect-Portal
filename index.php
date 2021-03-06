<?php
//Start Session
session_start();
if (isset($_SESSION["fname"])) {
  $sessionfname = $_SESSION["fname"];
  $sessionid = $_SESSION["accountid"];
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/headnav.php"); ?>
<div class="container-fluid p-0">
  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
      <h1 class="mb-0">Game Hub</h1><br>
      <p class="lead mb-5">Welcome to the Americollect Game Hub. Please login to access games.</p>
      <p class="lead mb-5">**NOTICE: If you don't have any tokens, you will not be able to login!**</p>
    </div>
  </section>
</div>
<?php include("includes/scripts.php"); ?>
</html>