<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

$conn = new mysqli('localhost', 'root', 'trinhduc2001', 'testphp2');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$searchTerm = '%' . $_POST['search'] . '%';  // Thêm dấu % cho tìm kiếm gần đúng
$selectedRole = $_POST['role'];

if ($searchTerm == '%%' && $selectedRole != 'all') {
    // Nếu chỉ có vai trò được chọn, tìm kiếm theo vai trò
    $sql = "SELECT * FROM user WHERE role LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $selectedRole);
    $stmt->execute();
    $result = $stmt->get_result();
} elseif ($selectedRole == 'none') {
    // Nếu chỉ có tìm kiếm theo tên người dùng, tìm kiếm gần đúng
    $sql = "SELECT * FROM user WHERE username LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} elseif ($selectedRole == 'all') {
    // Nếu chỉ có tìm kiếm theo tên người dùng, tìm kiếm gần đúng
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Nếu cả hai đều có giá trị, tìm kiếm gần đúng cả hai
    $sql = "SELECT * FROM user WHERE username LIKE ? AND role LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $searchTerm, $selectedRole);
    $stmt->execute();
    $result = $stmt->get_result();
}




if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Id</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['username']."</td>
                <td>".$row['password']."</td>
                <td>".$row['id']."</td>
                <td>".$row['role']."</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No results found";
    error_log("No results found");
}

$stmt->close();
$conn->close();
?>
