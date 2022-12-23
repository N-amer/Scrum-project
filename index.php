<?php
session_start();
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jarvisvault", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
};

$id2 = $conn->query("SELECT * FROM gebruikers_accounts WHERE id = '" . $_SESSION['id'] . "'");
$row = $conn->query("SELECT * FROM passwordmanager WHERE gebruikersnaam = '" . $_SESSION['id'] . "'");
$naam = $id2->fetch();
echo $_SESSION['id'];

$gebruikers = 'SELECT * FROM gebruikers_accounts';
$gebruiker = $conn->query($gebruikers);
if (!$_SESSION['id']) {
    header("Location: LoginPage.php");
}

if (isset($_POST["submit"])) {
    header("Location: logout.php");
}

if (isset($_POST[""])) {
    # code...
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>JarvisVault</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            height: 100%;
            width: 100%;
        }

        .logout {
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding: 0 15px;
            border-radius: 4px;
            outline: none;
        }

        .logout:hover {
            background-color: lime;
            border: solid 5px lime;
        }

        #visible {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        input[type="password"] {
            border-width: 0px;
            border: none;
            outline: none;
            font-size: 25px;
        }

        .padding {
            padding: 20px;
        }

        .navbar {
            position: fixed;
            background-color: #f1f5f9;
            top: 0%;
        }

        input[type="password"] {
            border: none;
            border-width: 0px;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class=" lab la-accusoft"></span>JarvisVault</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="active"><span class="las la-igloo"></span>
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
                    <a href="Form.php"><span class=""></span>
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
    <div class="main-content">
        <header class="navbar">
            <h2>
                Dashboard
            </h2>
            <div class="user-wrapper">
                <img src="gebruiker.png" width="40px" height="40px" alt="">
                <span><?php echo $naam['username']; ?></span>
            </div>
        </header>
        <main>
            <div class="removelist">
                <a href=""><span class="" title="Add"> </a>
                <a href=""><span class="" title="Delete"> </a>
            </div>


            <?php foreach ($row as $rows) {
            ?>
                <div class="dashboard-cards padding">
                    <div class="card-single">
                        <div>
                            <a>
                                <h2>Titel: <?= $rows['title']; ?></h2>
                                <h2>Naam: <?= $rows['username']; ?></h2>
                                <h2>Wachtwoord: <input type="password" id="password" value=<?= $rows['password'] ?> readonly></h2>
                            </a>
                        </div>
                        <form action="index.php" method="POST">
                            <div>
                                <a href="editPassword.php"><span class="las la-pen" title="Edit">Edit</a>
                                <a href="RemoveContent.php?id=<?php echo $rows['id'] ?>"><span class="las la-dumpster" title="Delete">Delete</a>

                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>

    </div>
    </div>
    </main>
    </div>
    <script>
        var x = document.querySelectorAll("#password");
        x.forEach(function(x) {
            x.addEventListener('click', function() {

                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            })
        })
    </script>
</body>

</html>