<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật điểm sinh viên</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .form-box {
            max-width: 480px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="form-box">

            <h3 class="text-center text-uppercase text-success mb-4 fw-bold">
                Cập nhật điểm sinh viên
            </h3>

            <form action="?controller=grade&action=update&id=<?= $grade->getId() ?>" method="post">

                <div class="mb-3">
                    <label for="student_id" class="form-label fw-semibold">
                        ID sinh viên
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="student_id"
                        name="student_id"
                        min="1"
                        value="<?= htmlspecialchars((string)$grade->getStudentId()) ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="subject_id" class="form-label fw-semibold">
                        ID môn học
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="subject_id"
                        name="subject_id"
                        min="1"
                        value="<?= htmlspecialchars((string)$grade->getSubjectId()) ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="score" class="form-label fw-semibold">
                        Điểm
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="score"
                        name="score"
                        min="0"
                        max="10"
                        step="0.01"
                        value="<?= htmlspecialchars((string)$grade->getScore()) ?>"
                        required>
                </div>

                <div class="d-grid gap-2 mt-4">

                    <button type="submit" class="btn btn-primary" name="btn_update">
                        <i class="bi bi-save me-1"></i>
                        Cập nhật thay đổi
                    </button>

                    <a href="?controller=grade&action=index" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Quay lại danh sách
                    </a>

                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>