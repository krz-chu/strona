<!DOCTYPE html>
<html lang="pl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP kalk</title>
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
                <p>Kalkulator BMI</p>
                <form action="b.php" method="post">
                    <label for="waga">Waga(kg)</label> <input type="number" name="waga" id="waga"><br>
                    <label for="wzrost">Wzrost(cm)</label> <input type="number" name="wzrost" id="wzrost"><br>
                    <button type="submit">kalkuluj</button>
                </form>
                <a href="https://www.foolproofme.org/articles/395-the-dangers-of-randomly-clicking-links" target="new"><img src="45RT.gif" style="float: right;" alt="GIF"></a>
                <?php
                    if(isset($_POST["waga"]) && isset($_POST["wzrost"])) {
                        if(!empty($_POST["waga"]) && !empty($_POST["wzrost"])) {
                            $waga = $_POST["waga"];
                            $wzrost = $_POST["wzrost"];
                            $wzrost = $wzrost/100;
                            $bmi = $waga/($wzrost*$wzrost);
                            if($bmi < 18.5) {
                                echo "<b><p style=\"color: yellow;\">Twoje BMI to: $bmi</p></b>";
                                echo "<p>Masz niedowage<br>Jedz wiencej!</p>";
                                echo "<img src=\"https://pbs.twimg.com/media/F5ODQX-aYAASuiM?format=jpg&amp;name=small\" alt=\"ŹLE1\">";
                            }
                            if($bmi > 25.0) {
                                echo "<b><p style=\"color: red;\">Twoje BMI to: $bmi</p></b>";
                                echo "<p>Masz nadwage<br>Jedz mniej!</p>";
                                echo "<img src=\"https://www.shutterstock.com/image-vector/chubby-emoji-emoticon-rubbing-his-260nw-2137522601.jpg\" alt=\"ŹLE2\">";
                            }   
                            if($bmi > 18.5 && $bmi < 25.0) {
                                echo "<b><p style=\"color: green;\">Twoje BMI to: $bmi</p></b>";
                                echo "<p>Twoje BMI jest wyśmienite</p>";
                                echo "<img src=\"https://bluemoji.io/cdn-proxy/646218c67da47160c64a84d5/66b3e5e1ccde70cabd67779a_84.png\" alt=\"OK\">";
                            }
                        }
                        else {
                            echo "<p>wypełnij ty nierozumie</p>";
                        }
                    }
                ?>
            </h3>

        </section>
    </section>
    <footer>
        <p>wykonawca:Krzysztof wszelkie prawa zastrzeżone</p>
    </footer>
</body>
</html>
