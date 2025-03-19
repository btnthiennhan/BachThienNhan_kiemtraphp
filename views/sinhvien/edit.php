<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="/kiemtra/public/css/style.css">
</head>
<body>
    <h2>Sửa thông tin sinh viên</h2>
    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" value="<?php echo $sinhVien['MaSV']; ?>" readonly><br>
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" value="<?php echo $sinhVien['HoTen']; ?>" required><br>
        <label>Giới Tính:</label>
        <input type="text" name="GioiTinh" value="<?php echo $sinhVien['GioiTinh']; ?>"><br>
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh" value="<?php echo $sinhVien['NgaySinh']; ?>"><br>
        <label>Hình:</label>
        <input type="text" name="Hinh" value="<?php echo $sinhVien['Hinh']; ?>"><br>
        <label>Mã Ngành:</label>
        <select name="MaNganh" required>
            <option value="">Chọn mã ngành</option>
            <?php foreach ($nganhHoc as $nganh) { ?>
                <option value="<?php echo $nganh['MaNganh']; ?>" <?php if ($nganh['MaNganh'] == $sinhVien['MaNganh']) echo 'selected'; ?>>
                    <?php echo $nganh['MaNganh'] . ' - ' . $nganh['TenNganh']; ?>
                </option>
            <?php } ?>
        </select><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>