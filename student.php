
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body onload="generateRadioButtons()">
    <div class="container">
        <h3>Form đăng ký sinh viên</h3>
        <form action="./regit-student.php" method="post">
        <p id="error"></p>
            <div class="container-content">
                <label for="" style="width: 105px;">Họ và tên</label>
                <div class="ha">
                    <input type="text" name="hovaten" id="hovaten" required>
                </div>
            </div>
            <!-- Input Box - Gender -->
            <div class="container-content">
                <label class="input-label">Giới tính</label>
                <div class="radio-buttons-container" type="text" id="gioiTinhContainer"></div>
                <!-- Trường ẩn để lưu giới tính -->
                <input type="hidden" id="selectedGender" name="gender">
            </div>

            <div class="container-content">
                <label for="">Ngày sinh</label>
                <div class="ha">
                    <select name="year"  id="ngaysinh" required>
                            <option value="">Năm</option>
                            <?php
                            $currentYear = date("Y");
                            $startYear = $currentYear - 40;
                            $endYear = $currentYear - 15;

                            for ($year = $startYear; $year <= $endYear; $year++) {
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <select name="month" required id="ngaysinh">
                            <option value="">Tháng</option>
                            <?php
                            for ($month = 1; $month <= 12; $month++) {
                                $formattedMonth = sprintf("%02d", $month);
                                echo "<option value='$formattedMonth'>$formattedMonth</option>";
                            }
                            ?>
                        </select>
                        <select name="day" required id="ngaysinh">
                            <option value="">Ngày</option>
                            <?php
                            for ($day = 1; $day <= 31; $day++) {
                                $formattedDay = sprintf("%02d", $day);
                                echo "<option value='$formattedDay'>$formattedDay</option>";
                            }
                            ?>
                        </select>
                </div>

            </div>

            <!-- Input Box - thành phố -->
            <div class="container-content">
                <label class="input-label">Địa chỉ</label>
                <div class="ha">
                    <select id="thanhpho" name="thanhpho" required>
                        <option value="">Thành phố</option>
                        <?php
                        $departments = [
                            "HN" => "Hà Nội",
                            "HCM" => "Tp.Hồ Chí Minh"
                        ];

                        foreach ($departments as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }
                        ?>
                    </select>
                    <select id="quan" name="quan" required>
                        <label for="">Quận</label>
                        <option value=""></option>
                    </select>
                </div>

            </div>
            <div class="container-content">
                <label for="">Thông tin khác</label>
                <textarea name="more-content" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="button-container">
                <button type="submit" onclick="validate()">Đăng ký</button>
            </div>
        </form>
    </div>
</body>
<script src="./script.js"></script>
<script>
    // Lấy tham chiếu đến các phần tử DOM
    var thanhPhoSelect = document.getElementById("thanhpho");
    var quanSelect = document.getElementById("quan");

    // Bắt sự kiện khi người dùng thay đổi lựa chọn thành phố
    thanhPhoSelect.addEventListener("change", function() {
        // Xóa tất cả các quận đã chọn trước đó
        quanSelect.innerHTML = "<option value='0'></option>";

        // Lấy giá trị của thành phố đã chọn
        var thanhPhoValue = thanhPhoSelect.value;

        // Kiểm tra thành phố đã chọn và thêm các quận tương ứng
        switch (thanhPhoValue) {
            case "HN": // Hà Nội
                var hanoiQuan = ["Hoàng Mai", "Thanh Trì", "Nam Từ Liêm", "Hà Đông", "Cầu Giấy"];
                for (var i = 0; i < hanoiQuan.length; i++) {
                    var option = document.createElement("option");
                    option.value = hanoiQuan[i];
                    option.text = hanoiQuan[i];
                    quanSelect.appendChild(option);
                }
                break;

            case "HCM": // Tp.Hồ Chí Minh
                var hcmQuan = ["Quận 1", "Quận 2", "Quận 3", "Quận 7", "Quận 9"];
                for (var i = 0; i < hcmQuan.length; i++) {
                    var option = document.createElement("option");
                    option.value = hcmQuan[i];
                    option.text = hcmQuan[i];
                    quanSelect.appendChild(option);
                }
                break;

            default:
                break;
        }
    });
</script>

</html>