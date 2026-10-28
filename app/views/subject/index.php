<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Môn học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center text-uppercase text-success mb-4 fw-bold">Quản lý môn học</h3>

        <div class="mb-3">
            <a href="?controller=addSubject" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Thêm môn học mới
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-success text-center">
                    <tr>
                        <th scope="col" style="width: 70px;">ID</th>
                        <th scope="col" style="width: 160px;">Mã môn học</th>
                        <th scope="col">Tên môn học</th>
                        <th scope="col" style="width: 130px;">Số tín chỉ</th>
                        <th scope="col" style="width: 90px;">Sửa</th>
                        <th scope="col" style="width: 90px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($subjects)): ?>
                        <?php foreach ($subjects as $subject): ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $subject->getId(); ?></th>
                                <td><strong><?= htmlspecialchars($subject->getCode()); ?></strong></td>
                                <td><?= htmlspecialchars($subject->getName()); ?></td>
                                <td class="text-center"><?= $subject->getCredits(); ?></td>
                                <td class="text-center">
                                    <a href="?controller=editSubject&id=<?= $subject->getId() ?>" class="text-primary fs-5" title="Chỉnh sửa">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="?controller=deleteSubject&id=<?= $subject->getId() ?>" class="text-danger fs-5" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học: <?= htmlspecialchars($subject->getName()) ?>?')" title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Chưa có môn học nào trong cơ sở dữ liệu.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>