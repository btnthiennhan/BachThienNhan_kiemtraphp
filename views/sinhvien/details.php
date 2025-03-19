<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary fw-bold">Chi Tiết Sinh Viên</h1>
            <a href="index.php?controller=sinhvien" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="<?php echo $sinhVien['Hinh']; ?>" class="rounded mb-3" width="200" height="200" alt="Hình SV">
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <strong>Mã SV:</strong> <?php echo $sinhVien['MaSV']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Họ Tên:</strong> <?php echo $sinhVien['HoTen']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Giới Tính:</strong> <?php echo $sinhVien['GioiTinh']; ?>
                        </div>
                        <div class="mb-3">
                            <strong>Ngày Sinh:</strong> <?php echo date('d/m/Y', strtotime($sinhVien['NgaySinh'])); ?>
                        </div>
                        <div class="mb-3">
                            <strong>Mã Ngành:</strong> <?php echo $sinhVien['MaNganh']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>