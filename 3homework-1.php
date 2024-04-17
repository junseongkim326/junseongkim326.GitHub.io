<!DOCTYPE html>
<html lang="ko">
<head>
</head>
<body>
    <h1>Sum, Factorial</h1>
    <p>
        <?php
        $n = 30;
        $sum = 0;
        $prod = 1;

        echo "1부터 30까지의 숫자를 출력하고 전체 합과 곱을 구합니다.<br>";
        for ($i = 1; $i <= $n; $i++) {
            echo "$i ";
            $sum += $i;
            $prod *= $i;
        }

        echo "<br><br>1부터 30까지의 합: $sum<br>";
        echo "1부터 30까지의 곱: $prod<br>";
        ?>
    </p>
</body>
</html>
