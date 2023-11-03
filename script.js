var gioiTinh = {
    0: "Nam",
    1: "Nữ",
};

function generateRadioButtons() {
    var radioButtons = "";
    for (var key in gioiTinh) {
        radioButtons +=
            "<input type='radio' name='gioiTinh' value='" +
            key +
            "' class='custom-radio' onclick='setSelectedGender(this.value)'>" +
            gioiTinh[key] +
            "<br>";
    }
    document.getElementById("gioiTinhContainer").innerHTML = radioButtons;
}

function setSelectedGender(value) {
    document.getElementById("selectedGender").value = value;
}

function validate() {
    var text = [];
    if (document.getElementById("hovaten").value == "") {
        text.push("Hãy nhập tên .");
    }
    if (document.getElementById("selectedGender").value == "") {
        text.push("Hãy chọn giới tính .");
    }
    if (document.getElementById("ngaysinh").value == 0) {
        text.push("Hãy chọn ngày sinh .");
    }
    if (document.getElementById("thanhpho").value == 0) {
        text.push("Hãy chọn thành phố .");
    }
    var errorElement = document.getElementById("error");
    errorElement.innerHTML = text.join("<br>").replace(/,/g, "");

}
