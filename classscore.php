<?php
$link = mysqli_connect("localhost", 'root', '','amusementpark');
$query = "CREATE TABLE IF NOT EXISTS `주문내역` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `고객명` VARCHAR(255),
    `입장권_어린이` INT,
    `입장권_어른` INT,
    `BIG3_어린이` INT,
    `BIG3_어른` INT,
    `자유이용권_어린이` INT,
    `자유이용권_어른` INT,
    `연간이용권_어린이` INT,
    `연간이용권_어른` INT,
    `총금액` INT
)";
mysqli_query($link, $query) or die('Table creation failed: ' . mysqli_error($link));
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>AmusementPark</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>

<div class="input-wrap">
    <form action="classscore.php" method="POST">
        <table>
            <tr>
                <td colspan="7">
                    <input type="text" name="name" placeholder="고객성명">
                </td>
            </tr>
            <tr>
                <th>NO</th>
                <th>구분</th>
                <th colspan="2">어린이</th>
                <th colspan="2">어른</th>
                <th>비고</th>
            </tr>
            <tr>
                <td>1</td>
                <td>입장권</td>
                <td>7,000</td>
                <td>
                    <select name="입장권_어린이">
                        <?php for($i = 0; $i <= 10; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>10,000</td>
                <td>
                    <select name="입장권_어른">
                        <?php for($i = 0; $i <= 10; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>입장</td>
            </tr>
            <tr>
    <td>2</td>
    <td>BIG3</td>
    <td>12,000</td>
    <td>
        <select name="BIG3_어린이">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>16,000</td>
    <td>
        <select name="BIG3_어른">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>입장+놀이3종</td>
</tr>
<tr>
    <td>3</td>
    <td>자유이용권</td>
    <td>21,000</td>
    <td>
        <select name="자유이용권_어린이">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>26,000</td>
    <td>
        <select name="자유이용권_어른">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>입장+놀이자유</td>
</tr>
<tr>
    <td>4</td>
    <td>연간이용권</td>
    <td>70,000</td>
    <td>
        <select name="연간이용권_어린이">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>90,000</td>
    <td>
        <select name="연간이용권_어른">
            <?php for($i = 0; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </td>
    <td>입장+놀이자유</td>
</tr>
        </table>
        <input type="submit" name="submit" value="합계">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $입장권_어린이 = $_POST['입장권_어린이'];
        $입장권_어른 = $_POST['입장권_어른'];
        $BIG3_어린이 = $_POST['BIG3_어린이'];
        $BIG3_어른 = $_POST['BIG3_어른'];
        $자유이용권_어린이 = $_POST['자유이용권_어린이'];
        $자유이용권_어른 = $_POST['자유이용권_어른'];
        $연간이용권_어린이 = $_POST['연간이용권_어린이'];
        $연간이용권_어른 = $_POST['연간이용권_어른'];
        $ticketPrices = [
            "입장권" => ["어린이" => 7000, "어른" => 10000],
            "BIG3" => ["어린이" => 12000, "어른" => 16000],
            "자유이용권" => ["어린이" => 21000, "어른" => 26000],
            "연간이용권" => ["어린이" => 70000, "어른" => 90000]
        ];
        $totalPrice = 0;
        $totalPrice += $ticketPrices["입장권"]["어린이"] * $입장권_어린이;
        $totalPrice += $ticketPrices["입장권"]["어른"] * $입장권_어른;
        $totalPrice += $ticketPrices["BIG3"]["어린이"] * $BIG3_어린이;
        $totalPrice += $ticketPrices["BIG3"]["어른"] * $BIG3_어른;
        $totalPrice += $ticketPrices["자유이용권"]["어린이"] * $자유이용권_어린이;
        $totalPrice += $ticketPrices["자유이용권"]["어른"] * $자유이용권_어른;
        $totalPrice += $ticketPrices["연간이용권"]["어린이"] * $연간이용권_어린이;
        $totalPrice += $ticketPrices["연간이용권"]["어른"] * $연간이용권_어른;
        echo "<p> $name 고객님 감사합니다</p>";
        if($입장권_어린이 > 0 || $입장권_어른 > 0){
            echo "<p>입장권 어린이 $입장권_어린이 매, 어른 $입장권_어른 매</p>";
        }
        if($BIG3_어린이 > 0 || $BIG3_어른 > 0){
            echo "<p>BIG3 어린이 $BIG3_어린이 매, 어른 $BIG3_어른 매</p>";
        }
        if($자유이용권_어린이 > 0 || $자유이용권_어른 > 0){
            echo "<p>자유이용권 어린이 $자유이용권_어린이 매, 어른 $자유이용권_어른 매</p>";
        }
        if($연간이용권_어린이 > 0 || $연간이용권_어른 > 0){
            echo "<p>연간이용권 어린이 $연간이용권_어린이 매, 어른 $연간이용권_어른 매</p>";
        }
        echo "<p>합계" . number_format($totalPrice) . "원입니다.</p>";

        $query = "INSERT INTO `주문내역` (`고객명`, `입장권_어린이`, `입장권_어른`, `BIG3_어린이`, `BIG3_어른`, `자유이용권_어린이`, `자유이용권_어른`, `연간이용권_어린이`, `연간이용권_어른`, `총금액`) 
        VALUES ('$name', '$입장권_어린이', '$입장권_어른', '$BIG3_어린이', '$BIG3_어른', '$자유이용권_어린이', '$자유이용권_어른', '$연간이용권_어린이', '$연간이용권_어른', '$totalPrice')";

        $result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
        mysqli_close($link);
    }
    
    ?>
</div>
</body>
</html>
