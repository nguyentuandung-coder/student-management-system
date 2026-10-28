<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Điểm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-4">

        <h3 class="text-center text-uppercase text-primary mb-4 fw-bold">
            Quản lý điểm sinh viên
        </h3>

        <div class="mb-3">
            <a href="?controller=addGrade" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Thêm điểm mới
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">

                <thead class="table-primary text-center">
                    <tr>
                        <th scope="col" style="width: 70px;">ID</th>
                        <th scope="col" style="width: 150px;">Mã sinh viên (ID)</th>
                        <th scope="col" style="width: 150px;">Mã môn học (ID)</th>
                        <th scope="col" style="width: 130px;">Điểm</th>
                        <th scope="col" style="width: 90px;">Sửa</th>
                        <th scope="col" style="width: 90px;">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($grades)): ?>

                        <?php foreach ($grades as $grade): ?>
                            <tr>
                                <th scope="row" class="text-center">
                                    <?= $grade->getId(); ?>
                                </th>

                                <td class="text-center">
                                    <?= $grade->getStudentId(); ?>
                                </td>

                                <td class="text-center">
                                    <?= $grade->getSubjectId(); ?>
                                </td>

                                <td class="text-center fw-bold">
                                    <?= htmlspecialchars((string)$grade->getScore()); ?>
                                </td>

                                <td class="text-center">
                                    <a href="?controller=editGrade&id=<?= $grade->getId(); ?>"
                                        class="text-primary fs-5"
                                        title="Chỉnh sửa">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a href="?controller=deleteGrade&id=<?= $grade->getId(); ?>"
                                        class="text-danger fs-5"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa điểm này không?')"
                                        title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Chưa có điểm nào trong cơ sở dữ liệu.
                            </td>
                        </tr>

                    <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>