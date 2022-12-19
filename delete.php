<?php

include "config.php";

if(!empty($_POST['player_ids']))
{
    $player_id = $_POST['player_ids'];
    $sql_statement = "DELETE FROM Players WHERE player_id = '$player_id'";
    $result = mysqli_query($db, $sql_statement);
    // echo "Your result is " . $result;
    header("Location: showPlayers.php");
    exit();
}

?>