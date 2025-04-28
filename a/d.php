<!DOCTYPE html>
<html lang="pl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP fun</title>
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
            <h3>Fajne fakty ot tobie:</h3>
            <div id="fun">
                <?php
                echo "<p>PHP wersja: " . phpversion() . "<br></p> ";
                echo "<p>Protokół połączenia: " . $_SERVER['SERVER_PROTOCOL'] . "<br></p>";
                echo "<p>Adres hosta: " . $_SERVER['SERVER_NAME'] . "<br></p>";
                echo "<p>Port: " . $_SERVER['SERVER_PORT'] . "<br></p>";
                echo "<p>Adres URI: " . $_SERVER['REQUEST_URI'] . "<br></p>"; 
                echo "<p>Adres IP:< " . $_SERVER['REMOTE_ADDR'] . "<br></p>";
                echo "<p>Przeglądarka: " . $_SERVER['HTTP_USER_AGENT'] . "<br></p>";
                echo "<p>Data: " . date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']) . "<br></p>";
                echo "<p>Ścieżka: " . $_SERVER['SCRIPT_FILENAME'] . "<br></p>";
                ?>
            </div>
            
        </section>
    </section>
    <footer>
        <p>wykonawca:Krzysztof wszelkie prawa zastrzeżone</p>
    </footer>
</body>
</html>
