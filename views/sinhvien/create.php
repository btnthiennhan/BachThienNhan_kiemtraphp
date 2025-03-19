<!DOCTYPE html>
<html>
<head>
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="/kiemtra/public/css/style.css">
</head>
<body>
    <h2>Thêm sinh viên mới</h2>
    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" required><br>
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" required><br>
        <label>Giới Tính:</label>
        <input type="text" name="GioiTinh"><br>
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh"><br>
        <label>Hình:</label>
        <input type="text" name="Hinh"><br>
        <label>Mã Ngành:</label>
        <select name="MaNganh" required>
            <option value="">Chọn mã ngành</option>
            <?php foreach ($nganhHoc as $nganh) { ?>
                <option value="<?php echo $nganh['MaNganh']; ?>"><?php echo $nganh['MaNganh'] . ' - ' . $nganh['TenNganh']; ?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="Thêm">
    </form>
</body>
</html>