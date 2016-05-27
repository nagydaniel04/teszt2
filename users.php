<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <a href="index.php">Back to form</a>
        <?php
        $servername = "localhost";
        $user = "root";
        $passw = "";
        $dbname = "user";
        $conn = mysqli_connect($servername, $user, $passw, $dbname);
        $li = "SELECT id, email,(SELECT name FROM counties WHERE id=county_id) AS county FROM `users`";
        $sqlli = mysqli_query($conn, $li);
        ?>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>County</th>
                <th>Editable</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($sqlli)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["county"]; ?></td>
                    <td><button onclick="<?php $fromusers = 1 ?>"><a href="index.php?id=<?php echo $row["id"]; ?>">Edit</a></button></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>