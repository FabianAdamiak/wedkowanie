<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <?php 
    $con = new mysqli("localhost", "root", "", "wedkowanie");
    ?>
    <div class="baner"><h1>Portal dla wędkarzy</h1></div>
    <div class="lewe">
        <div class="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                $sql = "SELECT r.nazwa, l.akwen, l.wojewodztwo FROM `ryby` AS `r` JOIN lowisko AS `l` ON r.id = l.Ryby_id WHERE `rodzaj` = 3;";
                $res = $con->query($sql);
                while($row = $res->fetch_assoc()){
                    echo "<li>".$row["nazwa"]." pływa w rzece ".$row["akwen"].", ".$row["wojewodztwo"]."</li>";
                }
            ?>
            </ol>
        </div>
        <div class="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $sql = "SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE `styl_zycia` = 1;";
                $res = $con->query($sql);
                while($row = $res->fetch_assoc()){
                    echo "<tr><td>".$row["id"]."</td><td>".$row["nazwa"]."</td><td>".$row["wystepowanie"]."</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <p><a href="kwerendy.txt" target="_blank">Pobierz kwerendy</a></p>
    </div>
    <div class="stopka">Stronę wykonał: Fabian Adamiak</div>
    <?php
    $con->close();
    ?>
</body>
</html>