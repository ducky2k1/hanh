
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['hovaten'];
    $genderValue = $_POST["gender"];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gioiTinh = [
        "0" => "Nam",
        "1" => "Nữ"
    ];
    $gender = isset($gioiTinh[$genderValue]) ? $gioiTinh[$genderValue] : "";
    $city = $_POST['thanhpho'];
    $quan = $_POST['quan'];
    $thanhPho = [
        "HN" => "Hà Nội",
        "HCM" => "Hồ Chí Minh"
    ];
    $nameCity = isset($thanhPho[$city]) ? $thanhPho[$city] : "";
    $content = $_POST['more-content'];


}
?>
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
        <form action="" method="post">
        <p id="error"></p>
            <div class="container-content">
                <label for="" style="width: 105px;">Họ và tên</label>
                <div class="ha">
                    <input type="text" name="hovaten" id="hovaten" value="<?php echo $username ?>">
                </div>
            </div>
            <!-- Input Box - Gender -->
            <div class="container-content">
                <label class="input-label">Giới tính</label>
                <div class="ha">
                    <input type="text" name="" id="" value="<?php echo $gender ?>">
                </div>
                <!-- <div class="radio-buttons-container" type="text" id="gioiTinhContainer"></div> -->
                <!-- Trường ẩn để lưu giới tính -->
                <!-- <input type="hidden" id="selectedGender" name="gender"> -->
            </div>

            <div class="container-content">
                <label for="">Ngày sinh</label>
                <div class="ha">
                    <input type="text" value="<?php echo $day ?>/<?php echo $month?>/<?php echo $year?>">
                </div>

            </div>

            <!-- Input Box - thành phố -->
            <div class="container-content">
                <label class="input-label">Địa chỉ</label>
                <div class="ha">
                    <input type="text" value="<?php echo $nameCity ?> - <?php echo $quan ?>">
                </div>

            </div>
            <div class="container-content">
                <label for="">Thông tin khác</label>
                <input type="text" value="<?php echo $content ?>">
            </div>
            <div class="button-container">
                <button type="submit" onclick="validate()">Đăng ký</button>
            </div>
        </form>
    </div>
</body>
<script src="./script.js"></script>

</html>