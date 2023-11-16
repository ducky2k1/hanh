<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn)
$conn = new mysqli('localhost', 'root', 'trinhduc2001', 'testphp2');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Xử lý dữ liệu tìm kiếm từ AJAX
$searchTerm = $_POST['search'];

// Truy vấn cơ sở dữ liệu để tìm kiếm
$sql = "SELECT * FROM user WHERE username LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Hiển thị kết quả
if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Id</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through each row in the result set
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
                <td>".$row['username']."</td>
                <td>".$row['password']."</td>
                <td>".$row['id']."</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No results found";
}

$conn->close();
?>
