<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
    $name=$mail=$web=$gen="";
    $nameErr=$mailErr=$webErr=$genErr="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(empty($_POST['uname'])){
            $nameErr="Name required.";
        }else{
            $name=correctInput($_POST['uname']);
        }
        if(empty($_POST['email'])){
            $mailErr="email required.";
        }else{
            $mail=correctInput($_POST['email']);
        }
        if(empty($_POST['website'])){  
            $web="No website."    ;
        }else{
            $web=correctInput($_POST['website']);
        }
        if(empty($_POST['gender'])){
            $genErr="Gender required.";        
        }else{
            $gen=$_POST['gender'];
        }
    }
    function correctInput($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }    
?>
<h3>Form Validation</h3>
<p class="error">* required field</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    Name:<input type="text" name="uname" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr;?></span> <br>
    E-mail:<input type="text" name="email" value="<?php echo $mail; ?>">
    <span class="error">* <?php echo $mailErr;?></span> <br>
    Website:<input type="text" name="website" value="<?php echo $web; ?>"><br>
    Gender:
    femail<input type="radio" name="gender" value="female" <?php 
            if(isset($gen) && $gen=='female') echo "checked"; ?>>
    mail<input type="radio" name="gender" value="male" <?php 
            if(isset($gen) && $gen=='male') echo "checked"; ?>>
    other<input type="radio" name="gender" value="other" <?php 
            if(isset($gen) && $gen=='other') echo "checked"; ?>>
    <br>
    <input type="submit" name="send" value="send">
</form>
<?php
    echo "<h3>Inputs:</h3>";
    echo $name . "<br>";
    echo $mail . "<br>";
    echo $web . "<br>";
    echo $gen . "<br>";
?>
</body>
</html>