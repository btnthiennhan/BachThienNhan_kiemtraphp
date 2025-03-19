<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary fw-bold">Sửa Thông Tin Sinh Viên</h1>
            <a href="index.php?controller=sinhvien" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>

        <!-- Hiển thị lỗi nếu có -->
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"> <?php echo $error; ?> </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Mã SV</label>
                        <input type="text" class="form-control" name="MaSV" value="<?php echo $sinhVien['MaSV']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ Tên</label>
                        <input type="text" class="form-control" name="HoTen" value="<?php echo $sinhVien['HoTen']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giới Tính</label>
                        <select class="form-select" name="GioiTinh" required>
                            <option value="Nam" <?php echo $sinhVien['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                            <option value="Nữ" <?php echo $sinhVien['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" name="NgaySinh" value="<?php echo $sinhVien['NgaySinh']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình Ảnh Hiện Tại</label>
                        <img src="<?php echo $sinhVien['Hinh']; ?>" class="rounded mb-2" width="100" height="100" alt="Hình SV">
                        <input type="file" class="form-control" name="Hinh" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã Ngành</label>
                        <select class="form-select" name="MaNganh" required>
                            <option value="">Chọn mã ngành</option>
                            <?php foreach ($nganhHoc as $nganh) { ?>
                                <option value="<?php echo $nganh['MaNganh']; ?>" <?php echo ($sinhVien['MaNganh'] == $nganh['MaNganh']) ? 'selected' : ''; ?>>
                                    <?php echo $nganh['MaNganh'] . ' - ' . $nganh['TenNganh']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
