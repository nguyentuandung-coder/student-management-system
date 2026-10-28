<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin môn học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .form-box {
            max-width: 480px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="form-box">
            <h3 class="text-center text-uppercase text-success mb-4 fw-bold">Cập nhật môn học</h3>

            <form action="?controller=editSubject&id=<?= $subject->getId() ?>" method="post">
                <div class="mb-3">
                    <label for="code" class="form-label fw-semibold">Mã môn học</label>
                    <input type="text" class="form-control" id="code" name="code" value="<?= htmlspecialchars($subject->getCode()) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Tên môn học</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($subject->getName()) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="credits" class="form-label fw-semibold">Số tín chỉ</label>
                    <input type="number" class="form-control" id="credits" name="credits" min="1" max="10" value="<?= htmlspecialchars($subject->getCredits()) ?>" required>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary" name="btn_update">
                        <i class="bi bi-save me-1"></i> Cập nhật thay đổi
                    </button>
                    <a href="?controller=home" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
