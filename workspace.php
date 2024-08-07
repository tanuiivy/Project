<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean & Brain Cafe</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/workspace.css">
</head>
<body>
<?php include_once("template/nav.php"); ?>
<?php
require_once("includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workspaceType = mysqli_real_escape_string($conn, $_POST["workspaceType"]);
    $startDate = mysqli_real_escape_string($conn, $_POST["startDate"]);
    $endDate = mysqli_real_escape_string($conn, $_POST["endDate"]);
    $numPeople = mysqli_real_escape_string($conn, $_POST["numPeople"]);

    $sql = "INSERT INTO bookings (workspaceType, startDate, endDate, numPeople)
            VALUES ('$workspaceType', '$startDate', '$endDate', '$numPeople')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Booking successful!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<h1>WORKSPACE</h1>
<div class="container">
    <div class="content-section">
        <div class="card">
            <img src="images/desk space.jpg" alt="Desk Space">
            <h2>DESK SPACE</h2>
            <p>The desk space package gives you the space to work in our beautifully designed and productive shared office facilities.</p>
        </div>
        <div class="card">
            <img src="images/private office.jpg" alt="Private Office">
            <h2>PRIVATE OFFICE</h2>
            <p>The private offices are fully furnished to suit teams of all sizes. Simply choose how many desks you need and your team will be ready to start from Day One.</p>
        </div>
        <div class="card">
            <img src="images/meeting room.jpg" alt="Meeting Room">
            <h2>MEETING ROOM</h2>
            <p>We have all sizes of Meeting Rooms as well as Event and Conference Spaces for more than 100 people. All rooms are fitted with the latest technology and AV systems with a dedicated events team on hand to help you host the perfect function.</p>
        </div>
    </div>
</div>
<div class="booking-container">
    <div class="booking-form">
        <h2>Book Your Workspace</h2>
        <form id="bookingForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="workspaceType">Workspace Type:</label>
            <select id="workspaceType" name="workspaceType" required>
                <option value="desk">Desk Space</option>
                <option value="private">Private Office</option>
                <option value="meeting">Meeting Room</option>
            </select>

            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" required>

            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" required>

            <label for="numPeople">Number of People:</label>
            <input type="number" id="numPeople" name="numPeople" min="1" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
<?php include_once("template/footer.php"); ?>
</body>
</html>

