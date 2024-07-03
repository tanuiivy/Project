<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean & Brain Cafe</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="products.css">
</head>
<body>
<?php
include_once("template/nav.php");
require_once("includes/db_connect.php");

// Check if DelID is set for deletion
if (isset($_GET["DelID"])) {
    $DelID = intval($_GET["DelID"]); // Ensure DelID is an integer
    echo "Deleting message with ID: $DelID<br>"; // Debug output
    // SQL to delete a record
    $del_mes = "DELETE FROM messages WHERE messageID = $DelID LIMIT 1";

    if ($conn->query($del_mes) === TRUE) {
        echo "Record with ID $DelID deleted successfully.<br>"; // Debug output
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


// Select messages
$select_msg = "SELECT * FROM messages ORDER BY datecreated DESC";
$sel_msg_res = $conn->query($select_msg);
$en = 0;
?>
<h1>MESSAGES</h1>
<div>
    <table class="product-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Subject Line</th>
                <th>Time</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
<?php
if ($sel_msg_res->num_rows > 0) {
    // Output data of each row
    while ($sel_msg_row = $sel_msg_res->fetch_assoc()) {
        $en++;
?>
            <tr>
                <td><?php echo $en; ?>.</td>
                <td><?php echo $sel_msg_row["sender_name"]; ?></td>
                <td><?php echo $sel_msg_row["sender_email"]; ?></td>
                <td><?php echo "<strong>" . $sel_msg_row["subject_line"] . '</strong> - ' . substr($sel_msg_row["text_message"], 0, 20) . '....'; ?></td>
                <td><?php echo date("d-M-Y H:i", strtotime($sel_msg_row["datecreated"])); ?></td>
                <td>[<a href="edit_msg.php?messageID=<?php echo $sel_msg_row["messageID"]; ?>">Edit</a>]
                    [<a href="view_messages.php?DelID=<?php echo $sel_msg_row["messageID"]; ?>"<a href=" "onclick="return confirm('This message will be deleted permanetly.Are you sure?')" >Delete</a>]</td>
            </tr>
<?php
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}
?>
        </tbody>
    </table>
</div>
<?php
// Close the database connection after all operations
$conn->close();
?>
</body>
</html>
