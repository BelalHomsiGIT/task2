<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
<?php 
    $nameErr=$emailErr=$pwrdErr=$cnfpwrdErr="";
    $name=$email=$pwrd=$cnfpwrd="";
    $namef=$emailf=$pwrdf=$cnfpwrdf=false;

    function correctInput($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    function chkLength($str,$l){
        return strlen($str)<$l;
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name= correctInput($_POST['uname']);
        $email= correctInput($_POST['email']);
        $pwrd= $_POST['pwd'];
        $cnfpwrd= $_POST['cnfpwd'];

        if(empty($name)){
            $nameErr="Name is required";
        }elseif(chkLength($name,3)){
            $nameErr="Must be more than 3 chars";
        }else{
            $namef=true;
        }
        if(empty($email)){
            $emailErr="Email is required";
        }else{
            $emailf=true;
        }
        if(empty($pwrd)){
            $pwrdErr="Password is required";
        }elseif(chkLength($pwrd,8)){
            $pwrdErr="Must be more than 8 chars";
        }else{
            $pwrdf=true;
        }
        if(empty($cnfpwrd)){
            $cnfpwrdErr="Rewrite same Passwrd";
        }elseif($cnfpwrd != $pwrd){
            $cnfpwrdErr="Matching failed, try again.";
        }else{
            $cnfpwrdf=true;
        }
    }
?>

<div class="container">
    <p class="task2"> PHP - Task 2 - Form Validation</p>
    <div class="row">      
        
        <div class="mx-auto col register">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="frm">
            <div class="title mb-4">
                <h3>Register</h3>
                <p>It's free and hardly takes more than 30 seconds.</p>
            </div>

            <div class="form-floating">           
                <input type="text" class="form-control" id="floatingPassword" placeholder="Name" name="uname" value="<?php echo $name ?>">
                <label for="floatingInput">Name</label>
            </div>
            <div class="err"><span class="text-danger"><?php echo $nameErr ?></span></div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?php echo $email ?>">
                <label for="floatingInput">Email address</label>                
            </div>
            <div class="err"><span class="text-danger"><?php echo $emailErr ?></span></div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd" value="<?php echo $pwrd ?>">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="err"><span class="text-danger"><?php echo $pwrdErr ?></span></div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cnfpwd">
                <label for="floatingPassword">Confirm Password</label>                
            </div>
            <div class="err"><span class="text-danger"><?php echo $cnfpwrdErr ?></span></div>
                
            <div class="trailer">
                <button type="submit" class="btn btn-primary">Register Now</button>
                <p>By clicking th Register Now,you agree to our <br>
                    <span class="spn">Teams </span> and <span class="spn">Privacy Policy</span>. 
                </p>    
            </div>          

        </form>
        </div>
    </div>
</div>

<?php 
    if ($namef && $emailf && $pwrdf && $cnfpwrdf){
        echo "<h4>Congratulation:</h4>";
        echo "Name : $name & Email : $email ";
        echo '<style type="text/css">
        #ok {
            display: block;
        }
        </style>';
    }
?>

<form action="welcome.php" method="post" class="pass-form">
    <input type="text" name="passname" value="<?php echo $name ?>" >
    <input type="submit" id="ok" name="ok" value="Click" class="btn-primary ok">
</form>
</body>
</html>