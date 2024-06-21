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
      $select_msg = "SELECT * FROM  messages ORDER BY datecreated DESC";
      $sel_msg_res = $conn->query($select_msg);
      $en=0;
      if ( $sel_msg_res->num_rows > 0) {
        // output data of each row
        while($sel_msg_row =  $sel_msg_res->fetch_assoc()) {
            $en++;
?>
          <tr>
            <td><?php print $en; ?>.</td?>
            <td><?php print $sel_msg_row["sender_name"]; ?></td>
            <td><?php print $sel_msg_row["sender_email"]; ?></td>
            <td><?php print "<strong>" . $sel_msg_row["subject_line"] . ' </strong> - ' . substr($sel_msg_row["text_message"],0,20).'....' ; ?></td>
            <td><?php print date("d-M-Y H:i", strtotime($sel_msg_row["datecreated"])); ?></td>
            <td>[<a href="edit_msg.php ?messageID=<?php print $sel_msg_row["messageID"]; ?>" >Edit</a>] [Del]</td>
          </tr>


<?php
         
        }
      } else {
        echo "0 results";
      }
      $conn->close();
 
?>
</tbody>
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
          
     </table>
   </div>     
</body>
</html>