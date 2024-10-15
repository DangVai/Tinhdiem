<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điểm Của Em</title>
    <style>
        body {
            background-color: #DCDCDC;
            color: #000;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            background-color: #FFFFFF;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        input[type="number"],
        select {
            width: 100px;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"] {
            width: 120px;
            padding: 10px;
            margin: 10px;
            background-color: #F0F0F0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .result {
            font-size: 20px;
            color: red;
            margin-top: 20px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
        }

        button[type="reset"] {
            background-color: #dc3545;
            color: #fff;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <h2>BẢNG ĐIỂM CỦA EM</h2>
    <form method="POST" action="">
        <div>
            Học Kỳ 1: <input type="number" name="semester1" required min="0" max="10" step="0.1">
        </div>
        <div>
            Học Kỳ 2: <input type="number" name="semester2" required min="0" max="10" step="0.1">
        </div>
        <div>
            <span>Năm:</span>
            <select name="year" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div>
            kết quả: <input value="<?php echo (tinh()); ?>"></input>
            <p class="kp"><?php $i = tinh(); echo (loai($i)) ?></p>
        </div>
        <div>
            <button type="submit">OK</button>
            <button type="reset">Cancel</button>
        </div>
    </form>

    <?php
    function tinh()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $semester1 = isset($_POST['semester1']) ? floatval($_POST['semester1']) : 0;
            $semester2 = isset($_POST['semester2']) ? floatval($_POST['semester2']) : 0;
            $year = isset($_POST['year']) ? intval($_POST['year']) : 0;

 
            if ($year == 1 || $year == 2) {
                return ($semester1 + ($semester2 * 3)) / 4;
            } elseif ($year == 3 || $year == 4) {
                return ($semester1 + ($semester2 * 4)) / 5;
            }
        }
        return 0;
    }

    function loai($result)
    {
        if ($result >= 9) {
            return "Học sinh giỏi";
        } elseif ($result >= 7) {
            return "Học sinh khá";
        } elseif ($result >= 5) {
            return "Học sinh trung bình";
        } else {
            return "Học sinh yếu";
        }
    }
    ?>
</body>

</html>