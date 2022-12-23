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
};
$stmt1 = $conectie->query("SELECT * FROM gebruikers_accounts WHERE id = '" . $_SESSION['id'] . "'");

$row = $stmt1->fetch();
$gebruiksaamas = $row['username'];

$stmts2 = "SELECT * FROM notes WHERE gebruikersnaam = '" . $row['username'] . "'";
$stmt2 = $conectie->prepare($stmts2);
$stmt2->execute();

$gebruikers = 'SELECT * FROM gebruikers_accounts';
$gebruiker = $conectie->query($gebruikers);
if (!$_SESSION['id']) {
    header("Location: LoginPage.php");
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $omschrijving = $_POST['omschrijving'];
    $gebruikersnaam = $row["username"];

    $sql = "INSERT INTO  `notes` (title, omschrijving, gebruikersnaam) VALUES (:title,  :omschrijving, :gebruikersnaam)";

    $stmt = $conectie->prepare($sql);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);

    $stmt->execute();
    header('Location: notes.php');


    $conn = mysqli_connect("localhost", "bit_academy", "bit_academy", "jarvisvault");
    if (!$conn) {
        die('Could not Connect My Sql:');
    }
    $sql = "DELETE FROM passwordmanager WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) {
        header('Location: notes.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Notes App in JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="notes.css">
    <style>
        body {
            background-color: white;
            height: 100%;
            width: 100%;
        }

        .navbar {
            position: fixed;
            background-color: #f1f5f9;
            top: 0%;
        }

        .padding {
            padding: 20px;
        }

        #form1 :hover {
            background-color: lime;
            border: solid 5px lime;
        }

        .details {
            padding: 10px;
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
                    <a href="Form.php"><span class=""></span>
                        <span>WW Aanmaken</span></a>
                </li>
                <li>
                    <a href="editPassword.php"><span class=""></span>
                        <span>WW wijzigen</span></a>
                </li>
                <li>
                    <a href="notes.php" class="active"><span></span>
                        <span>Notes</span></a>
                </li>
            </ul>
            <form action="index.php" method="post" id="form1"><input type="submit" name="submit" value="Uitloggen!"></form>
        </div>
    </div>
    <div class="main-content">
        <header class="navbar">
            <h2>
                Notes
            </h2>
            <div class="user-wrapper">
                <img src="gebruiker.png" width="40px" height="40px" alt="">
                <span><?php echo $row['username']; ?></span>
            </div>
        </header>
        <main>
            <div class="popup-box">
                <div class="popup">
                    <div class="content">
                        <header>
                            <p></p>
                            <i class="uil uil-times"></i>
                        </header>
                        <form action="" method="post" class="">
                            <div class="row title">
                                <label>Title</label>
                                <input type="text" spellcheck="false" class="titlee" name="title">
                            </div>
                            <div class="row description">
                                <label>Description</label>
                                <textarea spellcheck="false" name="omschrijving"></textarea>
                            </div>
                            <input type="submit" name="submit">

                        </form>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <li class="add-box">
                    <div class="icon"><i class="uil uil-plus"></i></div>
                    <p>Add new note</p>
                </li>
            </div>
            <?php

            while ($roow = $stmt2->fetch()) {
            ?>
                <div class="dashboard-cards details">
                    <div class="card-single">
                        <div>
                            <div class="details">
                                <p>Titel: <?php echo $roow['title']; ?></p>
                                <span>Omschrijving: <?php echo $roow['omschrijving']; ?></span>
                            </div>
                        </div>
                        <form action="accountslist.php" method="POST" class="notes-space">
                            <div>
                                <a href="RemoveContent-nots.php?id=<?php echo $roow['id'] ?>"><span class="las la-dumpster" title="Delete">Delete</a>
                                <span class="add-box" class="las la-pen" title="Delete">Edit</span>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>
        </main>
    </div>
    <script src="notes.js"></script>
</body>

</html>