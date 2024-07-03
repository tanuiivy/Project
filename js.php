<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<?php include_once("template/nav.php"); ?>
<body onload="DynamicTimer();" >
    <!--dispalying the variable-->
    <p id="grouopa"></p>
    <!--declare the variable-->
    <button type="button" onclick="document.getElementById('MyImg').src='images/bulb_on.png'">Turn On</button>

<img src="images/bulb_on.png" alt="" id="MyImg" style="width:500px;">

<button type="button" onclick="document.getElementById('MyImg').src='images/bulb_off.png'">Turn Off</button>
<br><br>

    <script>
        document.getElementById('grouopa').innerHTML="This is my first JS code";
    </script>
    <br><br>
    <?php date_default_timezone_set("Africa/Nairobi"); ?>
    Static timer:<?php print date("H:i:s"); ?>
    <br>
    Dynamic timer:<span id="Dtimer"></span>
    <script src="script.js"></script>
    <br><br>

    <script>
    document.write('Listen to me');
</script>
    <br>
    <!--js is a scripting language so only displays the solution -->
    <script>
    document.write(5+3);
</script>
    <br>
    <script>
       // window.alert('Your database is ready');
    </script>
    <!-- shows an alert when the page is reloaded -->
     <br>
     <!--information is not displayed on the user interface but one the console that you can get once you right click and select inspect -->
     <script>
        console.log('Add information here');
     </script>
     <br>
     <a href=" "onclick="return confirm('Are you sure?')" >Delete</a>
     <br>
     <!-- gives you the option to print the page -->
     <button type="button" onclick="window.print();">Print Page</button>
     <br>
     <script>
        let nickname= prompt('What is your nickname?');
        var firstname="Ivy";
        const MyAge=20;
        document.write(firstname + " whose nickname is " + nickname + " is " + MyAge + " years old.");

     </script>
</body>
</html>