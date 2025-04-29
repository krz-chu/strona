<!DOCTYPE html>
<html lang="pl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP skelp</title>
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
            <h3>SKLEP</h3>
            <?php
                $conn = mysqli_connect("localhost", "root", "","dlaphpstrona");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //dodaj
                if(isset($_POST["produkt"]) && isset($_POST["ilosc"]) && isset($_POST["cena"])) {
                    if(!empty($_POST["produkt"]) && !empty($_POST["ilosc"]) && !empty($_POST["cena"])) {
                        $produkt = $_POST["produkt"];
                        $ilosc = $_POST["ilosc"];
                        $cena = $_POST["cena"];
                        $stmt = $conn->prepare("INSERT INTO produkty (produkt, ilosc, cena) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss", $produkt, $ilosc, $cena);
                        $stmt->execute();
                        echo "produkt dodany";
                        header("Location: ".$_SERVER['PHP_SELF']);
                        exit;
                    }
                    else {
                        echo "<p>wypełnij wszystkie pola</p>";
                    }
                }        
                // kup
                if (isset($_POST["produkt"]) && isset($_POST["ilosc"])) {
                    if (!empty($_POST["produkt"]) && !empty($_POST["ilosc"])) {
                        $produkt = $_POST["produkt"];
                        $ilosc = $_POST["ilosc"];           
                        $stmt = $conn->prepare("SELECT * FROM produkty WHERE produkt = ?");
                        $stmt->bind_param("s", $produkt);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $cena = $row['cena'];
                            $a = $ilosc * $cena;
                            if ($ilosc <= $row['ilosc']) {
                                $conn->query("UPDATE produkty SET ilosc = ilosc - $ilosc WHERE produkt = '$produkt'");
                            }
                        }
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit;
                    }
                }
                
            ?>            
            <table border="1">
                <tr> 
                    <td> 
                        <div id="sklep">  
                            <?php
                                
                                $result = $conn->query("SELECT * FROM produkty ORDER BY cena DESC");

                                echo "<h3>Produkty w sklepie</h3>";
                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<p><b>{$row['produkt']}</b>: {$row['ilosc']} szt. za {$row['cena']}</p>";
                                    }
                                }
                            ?>
                        </div>
                    </td>                 
                    <td>
                        <h3>Dodaj produkt</h3>
                        <form action="a.php" method="post">
                            <label for="produkt">Produkt:</label> <input type="text" name="produkt" id="produkt"><br>
                            <label for="ilosc">Ilość:</label> <input type="number" name="ilosc" id="ilosc"><br>
                            <label for="cena">Cena:</label> <input type="number" name="cena" id="cena"><br>
                            <button type="submit">Dodaj</button>
                        </form>
                    </td>                
                    <td>
                        <h3>Kup produkt</h3>
                        <form action="a.php" method="post">
                            <label for="produkt">Produkt:</label> 
                            <select name="produkt" id="produkt">
                                <?php
                                $result2 = $conn->query("SELECT * FROM produkty ORDER BY cena DESC");
                                while($row = $result2->fetch_assoc()) {
                                    echo "<option value=\"{$row['produkt']}\">{$row['produkt']}</option>";
                                }
                                ?>
                            </select><br>
                            <label for="ilosc">Ilość:</label> <input type="number" name="ilosc" id="ilosc"><br>
                            <button type="submit">Kup</button>
                        </form>
                    </td>                                               
                </tr>
            </table>
            <?php
                $conn->close(); 
            ?>
        </section>
    </section>
    <footer>
        <p>wykonawca:Krzysztof Pelc, wszelkie prawa zastrzeżone</p>
    </footer>
</body>
</html>
