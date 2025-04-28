<!DOCTYPE html>
<html lang="pl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP mess</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💀</text></svg>">
 
 
</head>
<body>
    <header>
        <h1>Strona z PHP</h1>
    </header>
    <section id="d">
        <section id="lewy">
            <b>
                <h3>MENU</h3>
                <a href="../index.php" target="_self">Main</a><br>
                <a href="a.php" target="_self">Sklepik</a><br>
                <a href="b.php" target="_self">Kalkulator BMI</a><br>
                <a href="c.php" target="_self">Zostaw wiadomość</a><br>
                <a href="d.php" target="_self">FUN</a><br>
                <div style="position: relative; height: 75%;">
                    </b><a href="https://pl.wikipedia.org/wiki/Komunikacja_interpersonalna#:~:text=J%C4%99zyk%3A%20%C5%BCargon%2C-,brak%20precyzji,-(my%C5%9Blenie)%2C%20odmiana%20spo%C5%82eczna" target="_self" style="font-size: small;position: absolute; bottom: 0;">tu można dać więcej, ale prompt <b>"strona z użyciem PHP"</b> nie jest optymalnym przekazaniem informacj względem czego chesz 💀</a><b>
                </div> 
            </b>
        </section>
        <section id="prawy">
            <h3>
            <a href="https://www.foolproofme.org/articles/395-the-dangers-of-randomly-clicking-links" target="new"><img src="1cat.gif" style="float:right;" alt="GIF"></a>
            <?php
                $conn = mysqli_connect("localhost", "root", "");
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "CREATE DATABASE IF NOT EXISTS dlaphpstrona";
                if ($conn->query($sql) === TRUE) {} 
                else {
                    echo "Error creating database: " . $conn->error;
                }
                $conn->select_db("dlaphpstrona");
                $conn->query("CREATE TABLE IF NOT EXISTS wiadomosci (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50),
                    message TEXT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");

                
                $result = $conn->query("SELECT * FROM wiadomosci ORDER BY created_at DESC");

                echo "<h3>Najnowsze Wiadomości</h3>";
                echo "<div id=\"wiadomosci\">";
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<p><b>{$row['username']}</b>: {$row['message']} <i>({$row['created_at']})</i></p>";
                    }
                }else{
                    echo "<p>---brak wiadomości---</p>";
                }
                echo "</div>";
                if(isset($_POST["username"]) && isset($_POST["message"])) {
                    if(!empty($_POST["username"]) && !empty($_POST["message"])) {
                        $username = $_POST["username"];
                        $message = $_POST["message"];
                        $stmt = $conn->prepare("INSERT INTO wiadomosci (username, message) VALUES (?, ?)");
                        $stmt->bind_param("ss", $username, $message);
                        $stmt->execute();
                        echo "wiadomości zapisana";
                        header("Location: ".$_SERVER['PHP_SELF']);
                        exit;
                    }
                    else {
                        echo "<p>wypełnij wszystkie pola</p>";
                    }
                }
                $conn->close();
            ?>
            <br>    
            <form action="c.php" method="post">
                <label for="username">Użytkownik:</label> <input type="text" name="username" id="username"><br>
                <label for="message">Wiadomość:</label><br>
                <textarea name="message" id="message" rows="4" cols="50" required></textarea><br>
                <button type="submit"  >Dodaj wiadomość</button>
            </form>
            </h3>
            
        </section>
    </section>
    <footer>
        <p>wykonawca:Krzysztof wszelkie prawa zastrzeżone</p>
    </footer>
</body>
</html>
