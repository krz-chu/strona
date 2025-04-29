<!DOCTYPE html>
<html lang="pl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP strona</title>
    <link rel="stylesheet" href="a/styl.css">
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
                <a href="index.php" target="_self">Main</a><br>
                <a href="a/a.php" target="_self">Sklepik</a><br>
                <a href="a/b.php" target="_self">Kalkulator BMI</a><br>
                <a href="a/c.php" target="_self">Zostaw wiadomość</a><br>
                <a href="a/d.php" target="_self">FUN</a><br>
                <div style="position: relative; height: 75%;">
                    </b><a href="https://pl.wikipedia.org/wiki/Komunikacja_interpersonalna#:~:text=J%C4%99zyk%3A%20%C5%BCargon%2C-,brak%20precyzji,-(my%C5%9Blenie)%2C%20odmiana%20spo%C5%82eczna" target="_self" style="font-size: small;position: absolute; bottom: 0;">tu można dać więcej, ale prompt <b>"strona z użyciem PHP"</b> nie jest optymalnym przekazaniem informacj względem czego chesz 💀</a><b>
                </div>    
            </b>
        </section>
        <section id="prawy">
            <h3>✨Moja strona czy coś✨</h3>
            <p>Kliknij se tam po lewo, wybierz coś</p>
            <?php
                //baza create + insert
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
                $conn->query("CREATE TABLE IF NOT EXISTS produkty (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    produkt VARCHAR(50),
                    ilosc int(11),
                    cena float(11,2)
                )");
                $result1 = $conn->query("SELECT * FROM produkty");
                if($result1->num_rows == 0) {
                    $conn->query("INSERT INTO produkty (produkt, ilosc, cena) VALUES 
                    ('kawa', 3, 60),
                    ('jabłko', 2, 2),
                    ('łyżeczka', 3, 10),
                    ('herbata', 22, 15),
                    ('banan', 5, 30),
                    ('mleko', 2, 5),
                    ('chleb', 1, 3),
                    ('masło', 1, 7),
                    ('ser', 2, 12),
                    ('szynka', 1, 15),
                    ('pomidor', 4, 2),
                    ('ogórek', 3, 2),
                    ('jajka', 10, 8),
                    ('cukier', 1, 4),
                    ('mąka', 1, 3),
                    ('olej', 1, 6),
                    ('sok pomarańczowy', 2, 4),
                    ('woda mineralna', 6, 1),
                    ('makaron', 2, 3),
                    ('ryż', 1, 4),
                    ('ketchup', 1, 5),
                    ('musztarda', 1, 3),
                    ('czekolada', 3, 6),
                    ('ciastka', 2, 7),
                    ('płatki śniadaniowe', 1, 9),
                    ('kubek', 1, 40)");
                }
                $conn->query("CREATE TABLE IF NOT EXISTS wiadomosci (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50),
                    message TEXT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
            ?>
        </section>
    </section>
    <footer>
        <p>wykonawca:Krzysztof Pelc, wszelkie prawa zastrzeżone</p>
    </footer>
</body>
</html>
