<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-primary fw-bold">Danh Sách Sinh Viên</h1>
            <a href="index.php?controller=sinhvien&action=create" class="btn btn-primary btn-sm shadow-sm">
                <i class="fas fa-user-plus"></i> Thêm Sinh Viên
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Mã SV</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Hình</th>
                        <th>Mã Ngành</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinhViens as $sv) { ?>
                        <tr class="align-middle text-center">
                            <td><?php echo $sv['MaSV']; ?></td>
                            <td class="text-start"> <?php echo $sv['HoTen']; ?></td>
                            <td><?php echo $sv['GioiTinh']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($sv['NgaySinh'])); ?></td>
                            <td>
                                <img src="<?php echo $sv['Hinh']; ?>" class="rounded" width="50" height="50" alt="Hình SV">
                            </td>
                            <td><?php echo $sv['MaNganh']; ?></td>
                            <td>
                                <a href="index.php?controller=sinhvien&action=details&MaSV=<?php echo $sv['MaSV']; ?>" 
                                   class="btn btn-info btn-sm" title="Chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?controller=sinhvien&action=edit&MaSV=<?php echo $sv['MaSV']; ?>" 
                                   class="btn btn-warning btn-sm" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?controller=sinhvien&action=delete&MaSV=<?php echo $sv['MaSV']; ?>" 
                                   class="btn btn-danger btn-sm" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>