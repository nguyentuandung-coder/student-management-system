<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận xóa sinh viên - StudyHub</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS giao diện chung StudyHub -->
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .delete-card {
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            max-width: 620px;
            margin: 0 auto;
            text-align: center;
        }

        .delete-icon-box {
            width: 76px;
            height: 76px;
            margin: 0 auto 20px;
            border-radius: 20px;
            background-color: #fee2e2;
            color: #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .delete-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .delete-desc {
            font-size: 13.5px;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .student-info-box {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: left;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 8px 0;
            border-bottom: 1px dashed #e2e8f0;
            font-size: 14px;
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: #64748b;
            font-weight: 500;
            flex-shrink: 0;
        }

        .info-value {
            color: #0f172a;
            font-weight: 600;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .badge-code {
            background-color: #e0e7ff;
            color: #4338ca;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .badge-class {
            background-color: #dbeafe;
            color: #1d4ed8;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .warning-note {
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #92400e;
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: left;
            margin-bottom: 26px;
        }

        .btn-confirm-delete {
            background-color: #dc2626;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 11px 24px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-confirm-delete:hover {
            background-color: #b91c1c;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
        }

        .btn-cancel {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 11px 22px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 576px) {
            .delete-card {
                padding: 25px 16px;
            }

            .info-row {
                align-items: flex-start;
            }

            .btn-confirm-delete,
            .btn-cancel {
                padding: 10px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <!-- Logo -->
            <a href="?controller=home" class="logo">
                <div class="logo-icon">
                    <i class="bi bi-mortarboard"></i>
                </div>

                <div class="logo-text">
                    <h4>StudyHub</h4>
                    <p>ACADEMIC WORKSPACE</p>
                </div>
            </a>

            <!-- Menu -->
            <p class="menu-title">HỆ THỐNG QUẢN LÝ</p>

            <nav class="menu-links">

                <a href="?controller=home" class="menu-link">
                    <i class="bi bi-grid"></i>
                    <span>Trang chủ</span>
                </a>

                <a href="?controller=student&action=index" class="menu-link active">
                    <i class="bi bi-people"></i>
                    <span>Quản lý sinh viên</span>
                </a>

                <a href="?controller=subject&action=index" class="menu-link">
                    <i class="bi bi-book"></i>
                    <span>Quản lý môn học</span>
                </a>

                <a href="?controller=grade&action=index" class="menu-link">
                    <i class="bi bi-star"></i>
                    <span>Quản lý điểm</span>
                </a>

            </nav>

            <!-- Hỗ trợ -->
            <div class="support-box">
                <div class="support-icon">
                    <i class="bi bi-question-circle"></i>
                </div>

                <div>
                    <strong>Hỗ trợ kỹ thuật</strong>
                    <p>Phòng đào tạo & CNTT</p>
                </div>
            </div>

        </aside>

        <!-- MAIN AREA -->
        <div class="main-area">

            <!-- HEADER -->
            <header class="top-header">

                <h5 class="header-title">Quản lý sinh viên • Xác nhận xóa</h5>

                <div class="header-right">

                    <button type="button" class="header-button" title="Thông báo">
                        <i class="bi bi-bell"></i>
                    </button>

                    <button type="button" class="header-button" title="Lịch">
                        <i class="bi bi-calendar-event"></i>
                    </button>

                    <div class="user-info">

                        <div class="text-end">
                            <strong>
                                <?= htmlspecialchars($_SESSION['user_name'] ?? 'Quản trị viên') ?>
                            </strong>

                            <p>
                                <?= (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student')
                                    ? 'Sinh viên'
                                    : ((isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'teacher')
                                        ? 'Giảng viên'
                                        : 'Quản trị hệ thống') ?>
                            </p>
                        </div>

                        <div class="user-icon" title="<?= htmlspecialchars($_SESSION['user_code'] ?? '') ?>">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <a href="?controller=auth&action=logout"
                            class="header-button text-danger text-decoration-none d-flex align-items-center justify-content-center ms-2"
                            title="Đăng xuất"
                            onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                        </a>

                    </div>

                </div>

            </header>

            <!-- CONTENT -->
            <main class="content">

                <!-- Nút quay lại -->
                <div class="mb-3">
                    <a href="?controller=student&action=index"
                        class="btn btn-sm btn-outline-secondary"
                        style="border-radius: 8px;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Quay lại danh sách sinh viên
                    </a>
                </div>

                <!-- Card xác nhận xóa -->
                <div class="delete-card">

                    <div class="delete-icon-box">
                        <i class="bi bi-trash3-fill"></i>
                    </div>

                    <h3 class="delete-title">Xác nhận xóa sinh viên?</h3>

                    <p class="delete-desc">
                        Bạn đang chuẩn bị xóa thông tin sinh viên khỏi hệ thống.
                        Vui lòng kiểm tra kỹ thông tin trước khi xác nhận.
                    </p>

                    <!-- Thông tin sinh viên -->
                    <div class="student-info-box">

                        <div class="info-row">
                            <span class="info-label">Mã định danh (ID):</span>
                            <span class="info-value">
                                #<?= htmlspecialchars((string) $student->getId()) ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Mã sinh viên:</span>
                            <span class="badge-code">
                                <?= htmlspecialchars($student->getStudentCode()) ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Họ và tên:</span>
                            <span class="info-value" style="font-size: 15px; color: #1e1b4b;">
                                <?= htmlspecialchars($student->getFullName()) ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value">
                                <?= htmlspecialchars($student->getEmail() ?? '') ?: 'Chưa cập nhật' ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Số điện thoại:</span>
                            <span class="info-value">
                                <?= htmlspecialchars($student->getPhone() ?? '') ?: 'Chưa cập nhật' ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Lớp:</span>
                            <span class="badge-class">
                                <?= htmlspecialchars($student->getClassName()) ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Ngày sinh:</span>
                            <span class="info-value">
                                <?= htmlspecialchars($student->getDateOfBirth() ?? '') ?: 'Chưa cập nhật' ?>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Giới tính:</span>
                            <span class="info-value">
                                <?= htmlspecialchars($student->getGender()) ?>
                            </span>
                        </div>

                    </div>

                    <!-- Cảnh báo -->
                    <div class="warning-note">
                        <i class="bi bi-exclamation-triangle-fill fs-5 text-warning flex-shrink-0"></i>

                        <div>
                            <strong>Lưu ý quan trọng:</strong>
                            Khi xóa sinh viên, các dữ liệu liên quan như điểm số học tập
                            có thể bị ảnh hưởng. Hãy kiểm tra các ràng buộc khóa ngoại
                            trong cơ sở dữ liệu trước khi thực hiện.
                        </div>
                    </div>

                    <!-- Form xác nhận xóa -->
                    <form action="?controller=deleteStudent&id=<?= urlencode((string) $student->getId()) ?>"
                        method="POST"
                        class="d-flex justify-content-center gap-2 flex-wrap">

                        <a href="?controller=student&action=index" class="btn-cancel">
                            <i class="bi bi-x-circle"></i>
                            <span>Hủy bỏ, giữ lại</span>
                        </a>

                        <button type="submit" name="btn_confirm_delete" class="btn-confirm-delete">
                            <i class="bi bi-trash3"></i>
                            <span>Xác nhận xóa vĩnh viễn</span>
                        </button>

                    </form>

                </div>

            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>