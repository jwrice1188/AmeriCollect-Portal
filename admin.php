<?php
session_start();
if (!isset($_SESSION["fname"])) {
?>

  <script>
    window.location.href = "login.php";
  </script>

  <?php } else {
  if ($_SESSION["adminrights"] != 1) {
  ?>

    <script>
      window.location.href = "index.php";
    </script>

<?php }
  $sessionfname = $_SESSION["fname"];
  $sessionid = $_SESSION["accountid"];
  $sessionadmin = $_SESSION["adminrights"];
}

$error = "";

require_once("connect-db.php");
$sql = "select * from account";
$statement1 = $db->prepare($sql);
if ($statement1->execute()) {
  $accounts = $statement1->fetchAll();
  if ($accounts == null) {
    $error = "No accounts have been input yet";
  }
  $statement1->closeCursor();
} else {
  $error = "Error finding accounts";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/headnav.php"); ?>
<div class="container-fluid p-0">
  <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
      <h1 class="mb-0" id="admin">ADMIN</h1><br>
      <p class="lead mb-5">Welcome to the Admin section! Use this space to view your employee's information and alter their token count.</p>
      <table class="table">
        <tr>
          <th>Employee ID</th>
          <th>Employee Name</th>
          <th>Tokens</th>
        </tr>
        <form style="text-align: center" action="updatetokens-process.php" method="POST">
        <?php
        if ($accounts != null) {
          foreach ($accounts as $account) { ?>
            <tr>
              <td><?php echo $account["employeeid"] ?></td>
              <td><?php echo $account["fname"] ?></td>
              <td><input type="number" step="1" min="0" name=<?php echo $account["accountid"] ?> class="tInput" value="<?php echo $account["tokens"] ?>"></td>
            </tr>
        <?php }
        } else {
          echo "<td><h4>$error</h4></td><td></td><td></td><td></td>";
        }
        ?>
      </table>
        <input type="submit" class="btn btn-primary" value="Save Changes">
      </form>
    </div>
  </section>
</div>
<?php include("includes/scripts.php"); ?>

</html>