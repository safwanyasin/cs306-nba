<html>
    <head>
        <title>All Players</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="navbar">
            <img src="https://cdn.freebiesupply.com/images/large/2x/nba-logo-transparent.png" width="30px" class=""/>
            <p>Add Player</p>
            <p>Delete Player</p>
            <p>Filter</p>
        </div>
        <div class="page">
            <div class="box">
                <div id="container" class="table-container" style="width: 100%">
                    <table class="all-players">
                        <tr class="table-head"> 
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

                            while($row = mysqli_fetch_assoc($result))
                            {
                            
                            $mysender = $row['player_name'];
                                $message = $row['nationality'];

                                echo "<tr>"  . "<th>" . $mysender . "</th>" . "<th>" . $message . "</th>" . "</tr>";
                            }

                        ?> 
                    </table>
                </div>
            </div>
        </div>
        
    </body>
</html>