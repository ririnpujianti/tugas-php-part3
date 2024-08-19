<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Usia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Masukkan Nama dan Usia Anda</h1>
        <form method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="age">Usia:</label>
            <input type="number" id="age" name="age" min="0" required>
            
            <input type="submit" value="Kategorikan Usia">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil input nama dan usia dari form
            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            $age = isset($_POST['age']) ? (int)$_POST['age'] : 0;

            // Menentukan kategori usia
            $category = '';
            if ($age >= 0 && $age <= 12) {
                $category = "Anak-anak";
            } elseif ($age >= 13 && $age <= 17) {
                $category = "Remaja";
            } elseif ($age >= 18 && $age <= 59) {
                $category = "Dewasa";
            } elseif ($age >= 60) {
                $category = "Lansia";
            } else {
                $category = "Usia tidak valid.";
            }

            echo "<p class='result'>Nama: $name</p>";
            echo "<p class='result'>Kategori usia: $category</p>";
        }
        ?>
    </div>
</body>
</html>