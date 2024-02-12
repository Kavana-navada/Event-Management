
<!-- <!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="lo.css">
    <style>
           * {
    padding: 0%;
    margin: 0%;
    font-family: sans-serif;
    box-sizing: border-box;
}
 
body {
    margin: 0%;
    padding: 0%;
    background-image: url("pic/bg1.jpg");
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
}

nav {
    left: 0%;
    top: 0%;
    width: 100%;
    height: 100px;
    position: fixed;
    background: transparent;
    box-sizing: border-box;
    display: flex;
    align-items: center;
}

img {
    height: 75px;
    width: 75px;
    border: 2px solid rgb(220, 215, 215);
    border-radius: 10px;
    margin: 1%;
}


span {
    color:rgb(152, 114, 18);
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-size: 35px;
    pointer-events: none;
}


.leaf {
    height: 350px;
    width: 350px;
    border-left-style: groove;
    border-right-style: groove;
    border-bottom-style: hidden;
    border-top-style: hidden;
    border-top-left-radius: 100px;
    border-bottom-right-radius: 100px;
    border-top-right-radius: 100px;
    border-bottom-left-radius: 100px;
    border-width: 5px;
    border-color: rgb(40, 37, 16);
    margin-left: 500px;
    background: linear-gradient(rgb(240, 214, 100), rgb(7, 9, 9));
    margin-top: 150px;
    margin: 250px;
}

.input-box {
    border: none;
    border-style: none;
    border-radius: 30px;
    box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.2),
                5px 5px 15px rgba(0, 0, 0, 0.5),
                inset -5px -5px 5px rgba(255, 255, 255, 0.2),
                inset 5px 5px 5px rgba(0, 0, 0, 0.1);
}

.middle form {
    width: 100%;
    padding: 0 50px;
}

h2 {
    font-size: 1.95em;
    color: rgb(60, 67, 17);
    text-align: center;
    text-shadow: 2px 2px 2px rgb(217, 209, 214);
    padding-top: 55px;
    padding-bottom: 10px;
}

.input-box {
    position: relative;
    margin: 15px 0;
}

.input-box input {
    width: 100%;
    height: 40px;
    background: transparent;
    border: 2px solid  rgb(60, 67, 17);
    border-radius: 30px;
    outline: none;
    transition: 0.5s ease;
    font-size: medium;
    color: rgb(4, 4, 4);
    padding: 0 15px;
}

.input-box label {
    color: rgb(7, 7, 8);
    position: absolute;
    top: 50%;
    left: 10%;
    transform: translateY(-50%);
    font-size: medium;
    pointer-events: none;
    transition: 0.3s ease;
    font-weight: bold;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: 1px;
    font-size: small;
    background-color: rgb(249, 243, 243);
    border-radius: 10px;
    padding: 0 8px;
    color: black;
}

.input-box input:focus,
.input-box input:valid {
    border-color: white;
}



.btn {
    width: 100%;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 30px;
    background-color:rgba(240, 214, 100, 0.788);
    font-size: large;
    color: black;
    font-weight: 600;
    box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.2),
                5px 5px 15px rgba(0, 0, 0, 0.5),
                inset -5px -5px 5px rgba(15, 14, 14, 0.1),
                inset 5px 5px 5px rgba(0, 0, 0, 0.1);

    margin-top: 15px;
}

.btn:hover {
    border-color: rgb(64, 59, 59);
    border: 2px solid rgb(10, 10, 10);
    color: rgb(17, 16, 16);
    cursor: pointer;
    font-size: x-large;
}
 
    </style>
</head>
<body>
    <div class="container">
        <nav id="navigationbar">
            <img src="pic/samcalogo.jpeg"> 
           <span>SEMAPHORE</span>           
        </nav>
        <div class="leaf">
            <div class="middle">   
                <h2><b>LOGIN</b></h2>
                <form action="semlogin.php" method="POST">
                    <div class="input-box">
                        <input type="text" id="user" name="user" class="form__input"  maxlength="20" required>
                        <label for="username" class="form__label">Username</label>
                    </div>
                    <div class="input-box"> 
                        <input type="password" id="password" name="password"  maxlength="15" required>
                        <label for="password">Password</label>
                    </div>
                   
                    <button type="submit" class="btn" value="login" name="login">Login</button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html> -->
<?php

 
    $us = $_POST['user'];
    $pass = $_POST['password'];

    @$con = new mysqli('localhost', 'root', '', 'ignite');

    $qry = "SELECT * FROM users WHERE username='$us'";
    $result = mysqli_query($con, $qry);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        if ($pass == $row['password']) {
            
            echo "<script>window.location.href='semteamreg.php';</script>";
            exit;
        } else {
            echo "<script>alert(' Wrong Password ');</script>";
            echo "<script>window.location.href='index.html';</script>";
        }
    }

   

    $qry = "SELECT * FROM users WHERE password='$pass'";
    $result = mysqli_query($con, $qry);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        if (!($us == $row['username'])) {
            echo "<script>alert(' Wrong username ');</script>";
            echo "<script>window.location.href='index.html';</script>";
        }
    }
else{
    echo "<script>alert('You are not an authenticated user');</script>";
    echo "<script>window.location.href='index.html';</script>";
}
   


    

?>

