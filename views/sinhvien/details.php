<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sinh viên</title>
    <link rel="stylesheet" href="/kiemtra/public/css/style.css">
</head>
<body>
    <h2>Chi tiết sinh viên</h2>
    <p><strong>Mã SV:</strong> <?php echo $sinhVien['MaSV']; ?></p>
    <p><strong>Họ Tên:</strong> <?php echo $sinhVien['HoTen']; ?></p>
    <p><strong>Giới Tính:</strong> <?php echo $sinhVien['GioiTinh']; ?></p>
    <p><strong>Ngày Sinh:</strong> <?php echo date('d/m/Y', strtotime($sinhVien['NgaySinh'])); ?></p>
    <p><strong>Hình:</strong> <img src="<?php echo $sinhVien['Hinh']; ?>" width="100"></p>
    <p><strong>Mã Ngành:</strong> <?php echo $sinhVien['MaNganh']; ?></p>
    <a href="index.php?controller=sinhvien&action=index">Quay lại</a>
</body>
</html>