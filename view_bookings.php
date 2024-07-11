<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings - Bean & Brain Cafe</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/products.css">
</head>
<body>
<?php include_once("template/nav.php"); ?>

<h1>View Bookings</h1>
<div class="container">
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Workspace Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of People</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("includes/db_connect.php");

            // Query to fetch bookings
            $query = "SELECT * FROM bookings ORDER BY startDate ASC";
            $result = $conn->query($query);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["workspaceType"] . "</td>";
                    echo "<td>" . $row["startDate"] . "</td>";
                    echo "<td>" . $row["endDate"] . "</td>";
                    echo "<td>" . $row["numPeople"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once("template/footer.php"); ?>
</body>
</html>
