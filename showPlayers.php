<html>
    <head>
        <title>All Players</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="navbar">
            <img src="https://cdn.freebiesupply.com/images/large/2x/nba-logo-transparent.png" width="30px" class=""/>
            <a href="player_insertion.html" class="nav-link">Add Player</a>
            <a href="showPlayers.php" class="nav-link">Show Players</a>
            <a href="filter_options.html" class="nav-link">Filter</a>
        </div>
        <div class="page">
            <div class="box">
                <div id="container" class="table-container" style="width: 100%; padding: 0px;">

                    <table class="all-players">
                        <tr class="table-head"> 
                            <th>Player ID</th>
                            <th>Name</th> 
                            <th>Team ID</th> 
                            <th>Nationality</th>
                            <th>Age</th> 
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Active</th>
                            <th>Position</th>
                            <th>Rings Won</th>
                            <th>Rating</th>
                        </tr>
                        <?php

                            include "config.php";

                            $sql_statement = "SELECT * FROM Players";

                            $result = mysqli_query($db, $sql_statement);

                            $row_cnt = mysqli_num_rows($result);

                            if ($row_cnt == 0) {
                                echo "<td>" . "No results found" . "</td>";
                            } else {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $player_id = $row['player_id'];
                                    $player_name = $row['player_name']; 
                                    $team_id = $row['team_id']; 
                                    $nationality = $row['nationality']; 
                                    $player_age = $row['player_age'];
                                    $player_height = $row['player_height'];
                                    $player_weight = $row['player_weight'];
                                    $isActive = $row['isActive'];
                                    $player_pos = $row['player_pos'];
                                
                                    $rings_won = $row['rings_won'];
                                    $player_rating = $row['player_rating'];
                                    if ($isActive == 1) {
                                        $isActive = "Yes";
                                    } else {
                                        $isActive = "No";
                                    }

                                    echo "<tr>" . "<td>" . $player_id . "</td>" . "<td>" . $player_name . "</td>" . "<td>" . $team_id . "</td>" . "<td>" . $nationality . "</td>" . "<td>" . $player_age . "</td>" . "<td>" . $player_height . "</td>" . "<td>" . $player_weight . "</td>" . "<td>" . $isActive . "</td>" . "<td>" . $player_pos . "</td>" . "<td>" . $rings_won . "</td>" . "<td>" . $player_rating . "</td>" . "</tr>";
                                }
                            }

                        ?> 
                    </table>
                </div>
            </div>
        </div>
        <div class="delete-container">
            <form action="delete.php" method="POST" class="delete-options">
                <select name="player_ids" class="inputField select-delete">
                    <?php
                        $sql_command = "SELECT player_id, player_name, team_id FROM Players";

                        $myresult = mysqli_query($db, $sql_command);

                        while($id_rows = mysqli_fetch_assoc($myresult))
                        {
                            $player_id = $id_rows['player_id'];
                            $player_name = $id_rows['player_name'];
                            $team_id = $id_rows['team_id'];
                            echo "<option value=$player_id>". $player_name . " - " . $team_id . "</option>";
                        }

                    ?>
                </select>
                <button class="deleteButton">Delete Player</button>
            </form>
        </div>
    </body>
</html>