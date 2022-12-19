<?php 

include "config.php"; 

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (!empty($_POST['player_name'])){
    $player_id = generateRandomString(8);
    $player_name = $_POST['player_name']; 
    $team_id = $_POST['team_id']; 
    $nationality = $_POST['nationality']; 
    $player_age = $_POST['player_age'];
    $player_height = $_POST['player_height'];
    $player_weight = $_POST['player_weight'];
    $isActive = $_POST['isActive'];
    $player_pos = $_POST['player_pos'];

    $rings_won = $_POST['rings_won'];
    $player_rating = $_POST['player_rating'];
    $sql_statement = "INSERT INTO Players(player_id, player_name, team_id, nationality, player_age, player_height, player_weight, isActive, player_pos, rings_won, player_rating) VALUES ('$player_id','$player_name','$team_id','$nationality',$player_age,$player_height,$player_weight,$isActive,'$player_pos',$rings_won,$player_rating)"; 

    $result = mysqli_query($db, $sql_statement);
    // echo "Your result is: " . $result;
    header("Location: showPlayers.php");
    exit();
} 
else 
{
    echo "You did not enter your name.";
}

?>