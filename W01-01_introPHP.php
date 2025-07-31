<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body>

    <h1>Welcome to PHP Basic</h1>
    <p>This is a simple PHP application.</p>

    <hr>

    <h1 style="color: red;">Basic PHP Syntax</h1>
    <pre>
        &lt;?php
            echo "Hello Woeld!";
        ?&gt;
    </pre>
    <h3>Result</h3>

    <dev style="color: blue;">
        <?php
        echo "Hello World <br>";
        print "<Aphirak style='color:Red;'>Aphirak</span>";
        ?>
    </dev>

    <hr>

    <h1 style="color: red;">PHP Variables</h1>
    <pre>
        &lt;?php
            echo "Hello Woeld!";
        ?&gt;
    </pre>
    <h3>Result</h3>
    <?php
    $greeting = "Hello, Woeld";
    echo "<span style='color:blue;'>" . $greeting . "</span>";
    ?>
    <hr>

    <h1 style="color: red;">Integer Variables Example</h1>

    <?php
    $age = 20;
    echo "<span style='color:blue;'>I am " . $age . " year old</span><br>";
    echo "<span style='color:blue;'>I am $age year old</span>";

    ?>

    <hr>

    <h1 style="color: red;">Calculate with Variables</h1>

    <?php
    $q = 5;
    $a = 4;
    $s = $q - $a;
    echo "<span style='color:blue;'>This sum of $q and $a is $s.</span><br>";

    ?>

    <hr>

    <h1 style="color: red;">คำนวนพื้นที่สามเหลี่ยม</h1>

    <?php
    $higt = 5;
    $beas = 10;
    $long = 0.5 * $higt * $beas;
    echo "<span style='color:blue;'>พื้นมราของสามเหลี่ยคือ $long ตารางหน่วย</span><br>";



    ?>

    <hr>

    <h1 style="color: red;">คำนวนอายุจากปีเกิด</h1>

    <?php
    $x = 2003;
    $y = 2025;
    $z = $y - $x;
    echo "<span style='color:blue;'>อายุของคุณคือ $z </span><br>";

    ?>

    <hr>

    <h1 style="color: blue;">IF-Else</h1>
    <!--เกณฑ์ผ่านการสอบต้องได้คะแนนมากกว่า60คะแนน-->


    <?php
    $score = 75;//เปลี่ยนค่าเพื่อทดสอยบ
    
    if ($score > 60) {
        echo "คะแนนของคุณคือ $score <br>";
        echo "ยินดีด้วยคุณ สอบผ่าน";
    } else {
        echo "เสียใจด้วยคุณ สอบไม่ผ่าน";
    }


    ?>

    <hr>

    <h1 style="color: blue;">Boolean Variavble</h1>
    <!--ตรวจสอบว่าเป็นนักศึกษาหรือไม่-->

    <?php
    echo "<h3>คุณเป็นนักเรียรใช่หรือไม่</h3>";
    $is_student = true; //เปลี่ยนค่าเป็น false เพื่อทดสอบ
    if (!$is_student) {
        echo "ไม่นักเรียน";
    } else {
        echo "ใช่นักเรียน";
    }

    ?>
    <!--===================================-->
    <hr>

    <h1 style="color: blue;">For Loop</h1>
    <h2>======Loor for======</h2>
    <h3>แสดงตัวเลข 1 ถึง 10</h3>

    <?php
    $sum = 0;
    for ($i = 5; $i <= 9; $i++) {
        $sum += $i;
        if ($i < 9) {
            echo "$i +";
        } else {
            echo "$i = $sum";
        }

    }
    echo "<br>ผลบวกของตัวเลข 5 ถึง 9 คือ $sum";

    ?>


    <!--=================While Loop==================-->
    <hr>
    <h2>======สูตรคูณแม่ 2======</h2>
    <?php
    $j = 1;                     //ค่าเริ่มต้น
    while ($j <= 12) {               //เงื่อนไข
        echo "2 x $j = " . (2 * $j) . "<br>";      //แสดงผล
        $j++; //เพิ่ม ลด ค่า
    }

    ?>

    <hr>
    <h2>======สูตรคูณแม่ 2 ใส่ตาราง======</h2>

    <table class="table tabel-bordered table-striped w-auto mx-auto text-center">
        <thead class="table-success">
            <tr>
                <th>ลำดับ</th>
                <th>สูตรคูณ</th>
                <th>ผลลัพธ์</th>
            </tr>
            </theads>
        <tbody>
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<tr>";
                echo "<td> $i </td>";
                echo "<td>2 X $i</td>";
                echo "<td>" . (2 * $i) . "</td>";
                echo "</tr>";


            }
            ?>

        </tbody>
        </tablec>

        <hr>
        <a href="index.php"></a>

</body>

</html>