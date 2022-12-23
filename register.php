<?php
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$test1 = "<h3>";
$test2 = "</h3>";
try {
    $conectie = new PDO("mysql:host=$servername;dbname=jarvisvault", $username, $password);

    $conectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $password1 =  $_POST["password1"];
    $password2 =  $_POST["password2"];

    if ($password1 == $password2) {
        $sql = "INSERT INTO  `gebruikers_accounts` (username, PASSWORD) 
        VALUES (:name, :password1)";

        $stmt = $conectie->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password1', $password1);

        $stmt->execute();
        echo $test1, "Je wachtwoord is correct!", $test2;
        header("Location: LoginPage.php");
    } else {
        echo $test1, "Je wachtwoord moet overeen komen!", $test2;
    }
};

if (isset($_POST["submit2"])) {
    $len = 8;
    $randomPass = "";
    $valid = "abcdefghijklmnopqrstuvwxyz1234567890^$!@#^*";
    while (0 < $len--) {
        $randomPass .= $valid[random_int(0, strlen($valid) - 1)];
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>register form</title>
    <style>
        body {
            color: black;
            background-size: 400% 400%;
            min-height: 100vh;
            font-family: 'Inconsolata', monospace;
            overflow: hidden;
            display: flex;
            color: black;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: linear-gradient(90deg, #C7C5F4, #776BCC);
        }

        input {
            font-size: larger;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 5px;
        }

        form {
            background: linear-gradient(90deg, #5D54A4, #7C78B8);
            background-size: 400% 400%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 75%;
            max-height: 75%;
            flex-direction: column;
        }

        input[type="text"] {
            margin: 25px;
            border: solid black 3px;
        }

        input[type="text"]:focus {
            background-color: lightcoral;
        }

        input[type="password"] {
            margin: 25px;
            border: solid black 3px;
        }

        input[type="password"]:focus {
            background-color: lightcoral;
        }

        h1 {
            color: black;
            padding: 10px;
        }

        input[name="submit"]:hover {

            box-shadow: inset 140px 0 0 lightgreen;
            transition: ease-out 0.5s;
            font-size: 14px;
            border: solid lightgreen 5px;
            padding: 15px;
        }

        .big {
            font-size: x-large;
            font-family: monospace;
        }

        p {
            color: black;
            font-size: 15px;
        }

        #visible {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h1>Sign Up!</h1>
    <form action="register.php" method="POST" autocomplete="on">
        <label for="name">Username:</label>
        <input type="text" placeholder="Username" name="name" required>
        <label for="name">create password:</label>
        <input type="password" placeholder="Password" name="password1" id="password1" value="<?php echo (@$randomPass) ?>" required>
        <label for="name">Confirm password:</label>
        <input type="password" placeholder="Confirm Password" name="password2" id="password2" value="<?php echo (@$randomPass) ?>" required>
        <input type="submit" name="submit">
        <div id="visible"><input type="checkbox" onclick="show()"> Wachtwoord zien</div>
        <p>Already have a account go to: <a href="LoginPage.php">Log in!</a> </p>
    </form>
    <form action="register.php" method="POST" class="generator">
        <input type="submit" name="submit2" id="submit2" value="Random Generator">
    </form>
    <script>
        function show() {
            var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }


        }
    </script>
</body>

</html>