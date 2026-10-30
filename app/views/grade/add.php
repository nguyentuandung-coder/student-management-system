<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm điểm mới - StudyHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .form-card {
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 16px;
            padding: 35px 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            max-width: 620px;
            margin: 0 auto;
        }

        .form-card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .form-icon-box {
            width: 72px;
            height: 72px;
            margin: 0 auto 16px;
            border-radius: 18px;
            background-color: #f1edff;
            color: #6938d3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 4px 12px rgba(105, 56, 211, 0.12);
        }

        .form-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: #64748b;
            margin: 0;
            line-height: 1.5;
        }

        .form-group-custom {
            margin-bottom: 20px;
        }

        .form-label-custom {
            display: block;
            font-size: 13.5px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #64748b;
            font-size: 17px;
            pointer-events: none;
            display: flex;
            align-items: center;
            z-index: 2;
        }

        .form-input-custom {
            width: 100%;
            height: 48px;
            padding: 0 16px 0 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            color: #111827;
            background-color: #ffffff;
            transition: all 0.2s ease;
            outline: none;
        }

        .form-input-custom::placeholder {
            color: #94a3b8;
            font-size: 13.5px;
        }

        .form-input-custom:focus {
            border-color: #6938d3;
            box-shadow: 0 0 0 3.5px rgba(105, 56, 211, 0.12);
        }

        .btn-submit-purple,
        .btn-cancel-custom {
            border-radius: 12px;
            padding: 12px 22px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-submit-purple {
            background-color: #6938d3;
            color: #ffffff;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(105, 56, 211, 0.28);
        }

        .btn-submit-purple:hover {
            background-color: #5428b6;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-cancel-custom {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .btn-cancel-custom:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <a href="?controller=home" class="logo">
                <div class="logo-icon"><i class="bi bi-mortarboard"></i></div>
                <div class="logo-text">
                    <h4>StudyHub</h4>
                    <p>ACADEMIC WORKSPACE</p>
                </div>
            </a>
            <p class="menu-title">HỆ THỐNG QUẢN LÝ</p>
            <nav class="menu-links">
                <a href="?controller=home" class="menu-link"><i class="bi bi-grid"></i><span>Trang chủ</span></a>
                <a href="?controller=student&action=index" class="menu-link"><i class="bi bi-people"></i><span>Quản lý sinh viên</span></a>
                <a href="?controller=subject&action=index" class="menu-link"><i class="bi bi-book"></i><span>Quản lý môn học</span></a>
                <a href="?controller=grade&action=index" class="menu-link active"><i class="bi bi-star"></i><span>Quản lý điểm</span></a>
            </nav>
            <div class="support-box">
                <div class="support-icon"><i class="bi bi-question-circle"></i></div>
                <div><strong>Hỗ trợ kỹ thuật</strong><p>Phòng đào tạo &amp; CNTT</p></div>
            </div>
        </aside>

        <div class="main-area">
            <header class="top-header">
                <h5 class="header-title">Quản lý điểm • Thêm mới</h5>
                <div class="header-right">
                    <div class="user-info">
                        <div class="text-end">
                            <strong><?= htmlspecialchars($_SESSION['user_name'] ?? 'Quản trị viên') ?></strong>
                            <p><?= (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student') ? 'Sinh viên' : ((isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'teacher') ? 'Giảng viên' : 'Quản trị hệ thống') ?></p>
                        </div>
                        <div class="user-icon" title="<?= htmlspecialchars($_SESSION['user_code'] ?? '') ?>"><i class="bi bi-person-fill"></i></div>
                        <a href="?controller=auth&action=logout" class="header-button text-danger text-decoration-none d-flex align-items-center justify-content-center ms-2" title="Đăng xuất" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')"><i class="bi bi-box-arrow-right fs-5"></i></a>
                    </div>
                </div>
            </header>

            <main class="content">
                <div class="mb-3">
                    <a href="?controller=grade&action=index" class="btn btn-sm btn-outline-secondary" style="border-radius: 8px;">
                        <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách điểm
                    </a>
                </div>

                <div class="form-card">
                    <div class="form-card-header">
                        <div class="form-icon-box"><i class="bi bi-journal-plus"></i></div>
                        <h3 class="form-title">Thêm điểm mới</h3>
                        <p class="form-subtitle">Nhập mã sinh viên, môn học và điểm cần ghi nhận</p>
                    </div>

                    <?php if (!empty($errorMessage)): ?>
                        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($errorMessage); ?></div>
                    <?php endif; ?>

                    <form action="?controller=addGrade" method="POST">
                        <div class="form-group-custom">
                            <label for="student_code" class="form-label-custom">Mã sinh viên <span class="text-danger">*</span></label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" class="form-input-custom" id="student_code" name="student_code"
                                    value="<?= htmlspecialchars($studentCode ?? ''); ?>"
                                    placeholder="Nhập mã sinh viên đã tồn tại" required>
                            </div>
                        </div>

                        <div class="form-group-custom">
                            <label for="subject_id" class="form-label-custom">ID môn học <span class="text-danger">*</span></label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="bi bi-book"></i></span>
                                <input type="number" class="form-input-custom" id="subject_id" name="subject_id"
                                    min="1" value="<?= htmlspecialchars((string)($subject_id ?? '')); ?>" placeholder="Nhập ID môn học đã tồn tại" required>
                            </div>
                        </div>

                        <div class="form-group-custom">
                            <label for="score" class="form-label-custom">Điểm <span class="text-danger">*</span></label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="bi bi-award"></i></span>
                                <input type="number" class="form-input-custom" id="score" name="score"
                                    min="0" max="10" step="0.01" value="<?= htmlspecialchars((string)($scoreInput ?? '')); ?>" placeholder="Nhập điểm từ 0 đến 10" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-2">
                            <a href="?controller=grade&action=index" class="btn-cancel-custom">
                                <i class="bi bi-x-circle"></i><span>Hủy bỏ</span>
                            </a>
                            <button type="submit" name="btn_create" class="btn-submit-purple">
                                <i class="bi bi-check2-circle"></i><span>Lưu điểm</span>
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
