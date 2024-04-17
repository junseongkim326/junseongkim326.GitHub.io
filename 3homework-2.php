<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Sorting</title>
</head>
<body>
    <h1>Sorting</h1>
    <form method="post">
        <label for="number">10이상 100이하 정수 숫자 입력하기:</label><br>
        <input type="number" id="number" name="number" min="1" max="100" required><br>
        <button type="submit">랜덤한 정수 생성하고 정렬하기</button>
    </form>
    <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST["number"];
            if ($n >= 10 && $n <= 100) {
                $data = array();
                for ($i = 0; $i < $n; $i++) {
                    $data[$i] = rand(10, 100); 
                }

           
                echo "생성된 정수: " . implode(", ", $data) . "<br>";

                sort($data);
                echo "올림차순으로 정렬된 결과: " . implode(", ", $data);
            } else {
                echo "오류입니다. 10 이상 100 이하의 값을 입력하세요.";
            }
        }
        ?>
    </p>
</body>
</html>