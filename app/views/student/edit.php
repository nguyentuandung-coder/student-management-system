<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sinh viên - StudyHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .form-card {
            max-width: 760px;
            margin: 0 auto;
            padding: 32px;
            background: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .form-card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .form-icon-box {
            width: 68px;
            height: 68px;
            margin: 0 auto 15px;
            border-radius: 18px;
            background: #f1edff;
            color: #6938d3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .form-title {
            font-size: 21px;
            font-weight: 700;
            color: #172033;
            margin-bottom: 7px;
        }

        .form-subtitle {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }

        .form-label-custom {
            display: block;
            margin-bottom: 7px;
            color: #1f2937;
            font-size: 13px;
            font-weight: 600;
        }

        .form-control-custom,
        .form-select-custom {
            width: 100%;
            min-height: 46px;
            padding: 10px 13px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #ffffff;
            color: #1e293b;
            font-size: 14px;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            border-color: #6938d3;
            outline: none;
            box-shadow: 0 0 0 3px rgba(105, 56, 211, 0.12);
        }

        .btn-submit-purple {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 20px;
            border: none;
            border-radius: 10px;
            background: #6938d3;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-submit-purple:hover {
            background: #5428b6;
            color: #ffffff;
        }

        .btn-cancel-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 20px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background: #f8fafc;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-cancel-custom:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 576px) {
            .form-card {
                padding: 22px 17px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <a href="?controller=home" class="logo">
                <div class="logo-icon">
                    <i class="bi bi-mortarboard"></i>
                </div>

                <div class="logo-text">
                    <h4>StudyHub</h4>
                    <p>ACADEMIC WORKSPACE</p>
                </div>
            </a>

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


        <!-- KHU VUC NOI DUNG -->
        <div class="main-area">

            <!-- HEADER -->
            <header class="top-header">

                <h5 class="header-title">Quản lý sinh viên • Chỉnh sửa</h5>

                <div class="header-right">

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

                        <div class="user-icon">
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


            <!-- NOI DUNG CHINH -->
            <main class="content">

                <div class="mb-3">
                    <a href="?controller=student&action=index"
                        class="btn btn-sm btn-outline-secondary"
                        style="border-radius: 8px;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Quay lại danh sách sinh viên
                    </a>
                </div>


                <!-- FORM CAP NHAT -->
                <div class="form-card">

                    <div class="form-card-header">

                        <div class="form-icon-box">
                            <i class="bi bi-person-gear"></i>
                        </div>

                        <h3 class="form-title">Cập nhật thông tin sinh viên</h3>

                        <p class="form-subtitle">
                            Chỉnh sửa thông tin sinh viên trong hệ thống StudyHub.
                        </p>

                    </div>


                    <form action="?controller=editStudent&id=<?= urlencode((string)$student->getId()) ?>"
                        method="POST">

                        <!-- Ma sinh vien -->
                        <div class="mb-3">
                            <label for="student_code" class="form-label-custom">
                                Mã sinh viên <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                class="form-control-custom"
                                id="student_code"
                                name="student_code"
                                value="<?= htmlspecialchars($student->getStudentCode() ?? '') ?>"
                                maxlength="20"
                                required>
                        </div>


                        <!-- Ho va ten -->
                        <div class="mb-3">
                            <label for="full_name" class="form-label-custom">
                                Họ và tên <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                class="form-control-custom"
                                id="full_name"
                                name="full_name"
                                value="<?= htmlspecialchars($student->getFullName() ?? '') ?>"
                                maxlength="100"
                                required>
                        </div>


                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label-custom">
                                Email
                            </label>

                            <input type="email"
                                class="form-control-custom"
                                id="email"
                                name="email"
                                value="<?= htmlspecialchars($student->getEmail() ?? '') ?>"
                                maxlength="100">
                        </div>


                        <!-- So dien thoai -->
                        <div class="mb-3">
                            <label for="phone" class="form-label-custom">
                                Số điện thoại
                            </label>

                            <input type="tel"
                                class="form-control-custom"
                                id="phone"
                                name="phone"
                                value="<?= htmlspecialchars($student->getPhone() ?? '') ?>"
                                maxlength="20">
                        </div>


                        <!-- Lop -->
                        <div class="mb-3">
                            <label for="class_name" class="form-label-custom">
                                Lớp <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                class="form-control-custom"
                                id="class_name"
                                name="class_name"
                                value="<?= htmlspecialchars($student->getClassName() ?? '') ?>"
                                maxlength="50"
                                required>
                        </div>


                        <!-- Ngay sinh -->
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label-custom">
                                Ngày sinh
                            </label>

                            <input type="date"
                                class="form-control-custom"
                                id="date_of_birth"
                                name="date_of_birth"
                                value="<?= htmlspecialchars($student->getDateOfBirth() ?? '') ?>">
                        </div>


                        <!-- Gioi tinh -->
                        <div class="mb-3">
                            <label for="gender" class="form-label-custom">
                                Giới tính <span class="text-danger">*</span>
                            </label>

                            <select class="form-select-custom"
                                id="gender"
                                name="gender"
                                required>

                                <option value="">-- Chọn giới tính --</option>

                                <option value="Nam"
                                    <?= $student->getGender() === 'Nam' ? 'selected' : '' ?>>
                                    Nam
                                </option>

                                <option value="Nữ"
                                    <?= $student->getGender() === 'Nữ' ? 'selected' : '' ?>>
                                    Nữ
                                </option>

                                <option value="Khác"
                                    <?= $student->getGender() === 'Khác' ? 'selected' : '' ?>>
                                    Khác
                                </option>

                            </select>
                        </div>


                        <!-- CAC NUT THAO TAC -->
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-2">

                            <a href="?controller=student&action=index"
                                class="btn-cancel-custom">
                                <i class="bi bi-x-circle"></i>
                                <span>Hủy bỏ</span>
                            </a>

                            <button type="submit"
                                name="btn_update"
                                class="btn-submit-purple">
                                <i class="bi bi-save"></i>
                                <span>Lưu thay đổi</span>
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