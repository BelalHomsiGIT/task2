<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if( $_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['ok']) ){
            echo "<h2>" . "Welcome " .  strtoupper($_POST['passname']) . "</h2>";
        }else{
            echo "Access denied.";
            header('Refresh:5; url=form.php');
            exit;
        }
    ?>
    
    
</body>
</html>