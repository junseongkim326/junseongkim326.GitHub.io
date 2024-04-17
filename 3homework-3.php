<!DOCTYPE html>
<html lang="ko">
<head>
    <title>피보나치 수열</title>
</head>
<body>
    <h1>피보나치 수열</h1>
    <form method="post">
        <label for="number">1이상 100이하의 정수를 입력하시오:</label><br>
        <input type="number" id="number" name="number" min="1" max="100" required><br>
        <button type="submit">피보나치 수열 생성 및 비례 출력</button>
    </form>
    <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST["number"];
            if ($n >= 1 && $n <= 100) {
                $fibonacci = array();
                $fibonacci[1] = 1;
                $fibonacci[2] = 1;
                for ($i = 3; $i <= $n; $i++) {
                    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
                }
                echo "<table border='1'>";
                echo "<tr><th>i</th><th>fi</th><th>fi+1</th><th>fi+1 / fi</th></tr>";
                for ($i = 1; $i <= $n; $i++) {
                    $ratio = isset($fibonacci[$i + 1]) ? $fibonacci[$i + 1] / $fibonacci[$i] : "";
                    echo "<tr><td>$i</td><td>{$fibonacci[$i]}</td><td>" . (isset($fibonacci[$i + 1]) ? $fibonacci[$i + 1] : "") . "</td><td>$ratio</td></tr>";
                }
                echo "</table>";
            } else {
                echo "입력된 숫자가 유효하지 않습니다. 1 이상 100 이하의 값을 입력하세요.";
            }
        }
        ?>
    </p>
</body>
</html>