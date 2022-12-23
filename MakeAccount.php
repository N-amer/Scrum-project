<?php
session_start();
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";

try {
    $conectie = new PDO("mysql:host=$servername;dbname=jarvisvault", $username, $password);

    $conectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$h1class = "<h1 class='h11'>";
$h1 = "</h1>";
$stmt = $conectie->query("SELECT * FROM passwordmanager WHERE id = '" . $_SESSION['id'] . "'");
$row = $stmt->fetch();

if (isset($_POST["submit3"]) & !empty($_POST["submit3"])) {
    $password =  $_POST["password1"];
    $title = $_POST["title1"];
    $name = $_POST["name1"];
    $gebruikersnaam = $_SESSION['id'];

    $sql = "INSERT INTO  `passwordmanager` (title, username, password, gebruikersnaam) VALUES (:title,  :name, :password, :gebruikersnaam)";

    $stmt = $conectie->prepare($sql);

    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);


    $stmt->execute();
    echo $h1class . "Your account has been saved! Go to *Dashboard* to see it." . $h1;
}

$gebruikers = 'SELECT * FROM gebruikers_accounts';
$gebruiker = $conectie->query($gebruikers);
if (!$_SESSION['id']) {
    header("Location: LoginPage.php");
}

if (isset($_POST["submit"])) {
    header("Location: logout.php");
}

if (isset($_POST["submit2"])) {
    $len = 8;
    $randomPass = "";
    $valid = "abcdefghijklmnopqrstuvwxyz1234567890^$!@#^*";
    while (0 < $len--) {
        $randomPass .= $valid[random_int(0, strlen($valid) - 1)];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
    <style>
        body {
            background-size: 400% 400%;
            min-height: 100vh;
            font-family: 'Inconsolata', monospace;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*I am a Comment Ok??*/
        input {
            font-size: larger;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 5px;
        }

        .message {
            display: flex;
            justify-content: center;
            padding-top: 25px;
        }

        .form {
            background: linear-gradient(-45deg, #8390A2, #DD2F6E, #1D2231);
            background-size: 400% 400%;
            padding: 30px;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            max-width: 385px;
            flex-direction: column;
        }

        button {
            padding: 10px;
            margin: 10px;
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

        section {
            background-color: white;
            padding: 15px;
            border: solid black 3px;
            max-width: 385px;
            margin-top: 150px;
            box-shadow: rgba(0, 0, 0, 0.40) 0px 5px 15px;
        }

        h1 {
            padding: 10px;
        }

        .logout {
            display: flex;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding: 0 20px;
            border-radius: 2px;
            border: 1px solid #999;
        }

        .logout:hover {
            border: solid 5px lime;
            background-color: lime;
        }

        .white {
            color: white;
        }

        #visible {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            color: #F1F5F9;
        }

        main {
            margin-top: -250px;
            padding-right: 600px;
            padding-left: 600px;
            background: #F1F5F9;
            min-height: calc(100vh - 90px);
        }

        #form2 {
            padding-right: 5px;
        }

        .generator {
            padding-left: 50px;
            padding-right: 50px;
        }

        input[name="submit"]:hover {
            box-shadow: inset 150px 0 0 lightgreen;
            transition: ease-out 1s;
            font-size: 14px;
            border: solid lightgreen 5px;
            padding: 15px;
        }

        input[name="submit2"]:hover {
            box-shadow: inset 150px 0 0 lightgreen;
            transition: ease-out 1s;
            font-size: 14px;
            border: solid lightgreen 5px;
            padding: 15px;
        }
    </style>
</head>
<?php

$sttt = $conectie->query("SELECT * FROM gebruikers_accounts WHERE id = '" . $_SESSION['id'] . "'");
$row = $sttt->fetch();
?>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class=" lab la-accusoft"></span>JarvisVault</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class=""><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href='contactpage.php' class=""><span class="las la-phone"></span>
                        <span>Contact</span></a>
                </li>
                <li>
                    <a href="info.php"><span class="las la-question"></span>
                        <span>Info</span></a>
                </li>
                <li>
                    <a href="Form.php" class="activ"><span class="active"></span>
                        <span>WW Aanmaken</span></a>
                </li>
                <li>
                    <a href="editPassword.php"><span class=""></span>
                        <span>WW wijzigen</span></a>
                </li>
                <li>
                    <a href="notes.php"><span></span>
                        <span>Notes</span></a>
                </li>
            </ul>
            <form action="index.php" method="post"><input type="submit" name="submit" value="Uitloggen!" class="logout"></form>
        </div>
    </div>

    <body>
        <div class="main-content">
            <header>
                <h1>
                    WW Aanmaken
                </h1>
                <div class="user-wrapper">
                    <img src="gebruiker.png" width="40" height="40px" alt="">
                    <span class="vergroten_tekst"><?php echo $row['username']; ?></span>
                </div>
            </header>
            <main>
                <h1>Welkom op het wachtwoord aanmaker paneel!</h1>
                <section>
                    <form action="Form.php" method="post" autocomplete="on" class="form">
                        <input type="text" placeholder="titel" name="title1" required>
                        <input type="text" placeholder="name" name="name1" autocomplete="name" required>
                        <input type="password" placeholder="password" name="password1" id="password2" value="<?php echo (@$randomPass) ?>" required>
                        <div id="visible"><input type="checkbox" onclick="show()"> Wachtwoord zien</div>
                        <input type="submit" name="submit3">
                    </form>
                    <form action="Form.php" method="POST" class="generator">
                        <input type="submit" name="submit2" id="submit2" value="Random Generator">
                    </form>
                </section>
                <script>
                    function show() {
                        var x = document.getElementById("password2");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
        </div>
        </div>
        </main>
        </div>
        </div>
    </body>

</html>