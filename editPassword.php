<!-- BACK END -->
<?php
session_start();
/*Nooman's database server - verander dit naar je eigen DB server*/
$host = 'localhost';
$db = 'jarvisvault';
$username = 'bit_academy';
$password = 'bit_academy';
$id = 0;
try {
    $conn = new PDO("mysql:host=$host;dbname=jarvisvault", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $datas = $conn->query("SELECT * FROM passwordmanager")->fetch();
    // get value from database
    $content = "SELECT * FROM passwordmanager WHERE gebruikersnaam = '" . $_SESSION['id'] . "'";
    $content = $conn->query($content);

    if (isset($_POST['editPassword']) && (!empty($_POST["password"]))) {
        $truemessage = "<h2> Wachtwoord is gewijzigd! </h2>";
        $falsemessage = "<h2> Je moet iets invullen! </h2>";
        // var_dump("eses");
        $datas = $conn->query("SELECT * FROM passwordmanager")->fetch();
        // get value from database
        $content = "SELECT * FROM passwordmanager WHERE gebruikersnaam = '" . $_SESSION['id'] . "'";
        $content = $conn->query($content);
        $title = $_POST['title'];
        $password = $_POST['password'];
        $update = $conn->prepare("UPDATE `passwordmanager` SET password = :password
        WHERE `title`=:title");
        $update->bindParam(':password', $password);
        $update->bindParam(':title', $title);
        $update->execute();
    }

    $gebruikers = 'SELECT * FROM gebruikers_accounts';
    $gebruiker = $conn->query($gebruikers);
    if (!$_SESSION['id']) {
        header("Location: LoginPage.php");
    }
?>
    <!-- FRONT END -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="style.css">
        <title>Wijzigen</title>
        <!-- De Style -->
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: montserrat;
                height: 100vh;
                overflow: hidden;
                background-color: white;
            }

            .labelDiv {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                border-radius: 10px;
                padding: 40px;
                background: #F0FFF0;
                box-shadow: rgba(0, 0, 0, 0.40) 0px 5px 15px;
            }

            .texts {
                position: absolute;
                top: 200px;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 40px;
            }

            .content {
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            input[type="checkbox"] {
                padding-left: 20px;
            }

            input[name="editPassword"]:hover {
                box-shadow: inset 155px 0 0 lightgreen;
                transition: ease-out 1s;
                font-size: 14px;
                border: solid lightgreen 5px;
                padding: 15px;
            }

            input {
                display: flex;
                justify-content: center;
                flex-direction: column;
            }
        </style>
    </head>
    <?php

    $id2 = $conn->query("SELECT * FROM gebruikers_accounts WHERE id = '" . $_SESSION['id'] . "'");
    $row = $id2->fetch();
    ?>

    <body>
        </div>
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class=" lab la-accusoft"></span>JarvisVault</h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php"><span class="las la-igloo"></span>
                            <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="contactpage.php"><span class="las la-phone"></span>
                            <span>Contact</span></a>
                    </li>
                    <li>
                        <a href="info.php"><span class="las la-question"></span>
                            <span>Info</span></a>
                    </li>
                    <li>
                        <a href="Form.php"><span></span>
                            <span>WW Aanmaken</span></a>
                    </li>
                    <li>
                        <a href="editPassword.php" class="active"><span class=""></span>
                            <span>WW wijzigen</span></a>
                    </li>
                    <li>
                        <a href="notes.php"><span class=""></span>
                            <span>Notes</span></a>
                    </li>
                </ul>
                <form action="index.php" method="post"><input type="submit" name="submit" value="Uitloggen!" class="logout"></form>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h2 class="white">
                    WW Wijzigen
                </h2>
                <div class="user-wrapper">
                    <img src="gebruiker.png" width="40" height="40px" alt="">
                    <span class="vergroten_tekst"><?php echo @$row['username']; ?></span>
                </div>
            </header>
            <main>
                <div class="content">
                    <div class="texts">
                        <h1>Wijzig je wachtwoord</h1>
                        <h2><?php if (isset($truemessage)) {
                                echo $truemessage;
                            } else {
                                echo @$falsemessage;
                            } ?></h2>
                    </div>
                    <form action="#" method="POST">
                        <div class="labelDiv">
                            <label for="title">Titel</label>
                            <br>
                            <select name="title" id="title">
                                <?php while ($row = $content->fetch()) { ?>
                                    <option value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <br>
                            <label for="password">Nieuw wachtwoord</label>
                            <input type="password" name="password" id="password"><br>
                            <div id="visible"><input type="checkbox" onclick="myFunction()"> Wachtwoord zien</div>
                            <br>
                            <br>
                            <input type="submit" name="editPassword" value="Wijzigen doorgeven">
                        </div>
                    </form>
            </main>
        </div>
    </body>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    </html>
    <!-- FINAL TOUCH -->
<?php
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} ?>