<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product Photo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Product Photo</h2>
        <form action="addphoto.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photos[]" multiple required>
            <select name="product_id" required>
                
                <?php
                // Include your connection and fetch product data
                include('cons.php');
                
                // Assuming you have a table named 'products' with columns 'id' and 'name'
                $sql = "SELECT product_id, product_name FROM product";
                $result = mysqli_query($conn, $sql);
                
                // Display options for each product
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                }
                ?>
            </select>
            <br>
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
</body>
</html>
