<?php
error_reporting(e_all);
ini_set("display_errors",1);

include('connect.php');

$_POST = json_decode(file_get_contents("php://input"),true);

if(isset($_POST) && !empty($_POST)) {

  // CREATE
  if($_POST["choix"] == "insertStat") {
    return false;
  }

  // READ
  if($_POST["choix"] == "getAllStats") {
    $reqGetAllStats = $bdd->query("SELECT * FROM stats_for_ai_marketing ORDER BY Date ASC");
    $respGetAllStats = $reqGetAllStats->fetchAll();
    // var_dump($respGetAllStats);
    echo json_encode(["stats" => $respGetAllStats]);
  }

  if($_POST["choix"] == "getStatsById") {
    return false;
  }

  // UPDATE
  if($_POST["choix"] == "updateStats") {
    return false;
  }

  // DELETE
  if($_POST["choix"] == "deleteStats") {
    return false;
  }

} else {
  ?>
  {
    "success": false,
    "message": "Only POST request allowedsssss"
  }
  <?php
}
?>
