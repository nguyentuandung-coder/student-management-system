<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới - StudyHub</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS giao dien chung StudyHub -->
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .form-card {
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 16px;
            padding: 35px 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            max-width: 760px;
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

        .form-input-custom:focus-visible {
            outline: none;
        }

        .btn-submit-purple {
            background-color: #6938d3;
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(105, 56, 211, 0.28);
        }

        .btn-submit-purple:hover {
            background-color: #5428b6;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(105, 56, 211, 0.35);
        }

        .btn-cancel-custom {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 12px 22px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-cancel-custom:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 576px) {
            .form-card {
                padding: 24px 18px;
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

            <!-- Ho tro -->
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

                <h5 class="header-title">Quản lý sinh viên • Thêm mới</h5>

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

                <!-- Nut quay lai -->
                <div class="mb-3">
                    <a href="?controller=student&action=index"
                        class="btn btn-sm btn-outline-secondary"
                        style="border-radius: 8px;">
                        <i class="bi bi-arrow-left me-1"></i>
                        Quay lại danh sách sinh viên
                    </a>
                </div>


                <!-- FORM CARD -->
                <div class="form-card">

                    <div class="form-card-header">

                        <div class="form-icon-box">
                            <i class="bi bi-person-plus"></i>
                        </div>

                        <h3 class="form-title">Thêm sinh viên mới</h3>

                        <p class="form-subtitle">
                            Nhập thông tin sinh viên để bổ sung vào hệ thống StudyHub.
                        </p>

                    </div>


                    <form action="?controller=addStudent" method="POST">

                        <!-- Ma sinh vien -->
                        <div class="form-group-custom">
                            <label for="student_code" class="form-label-custom">
                                Mã sinh viên <span class="text-danger">*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-upc-scan"></i>
                                </span>

                                <input type="text"
                                    class="form-input-custom"
                                    id="student_code"
                                    name="student_code"
                                    placeholder="Ví dụ: SV001"
                                    maxlength="20"
                                    required>
                            </div>
                        </div>


                        <!-- Ho va ten -->
                        <div class="form-group-custom">
                            <label for="full_name" class="form-label-custom">
                                Họ và tên <span class="text-danger">*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input type="text"
                                    class="form-input-custom"
                                    id="full_name"
                                    name="full_name"
                                    placeholder="Nhập họ và tên sinh viên"
                                    maxlength="100"
                                    required>
                            </div>
                        </div>


                        <!-- Email -->
                        <div class="form-group-custom">
                            <label for="email" class="form-label-custom">
                                Email
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input type="email"
                                    class="form-input-custom"
                                    id="email"
                                    name="email"
                                    placeholder="Ví dụ: sinhvien@example.com"
                                    maxlength="100">
                            </div>
                        </div>


                        <!-- So dien thoai -->
                        <div class="form-group-custom">
                            <label for="phone" class="form-label-custom">
                                Số điện thoại
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-telephone"></i>
                                </span>

                                <input type="tel"
                                    class="form-input-custom"
                                    id="phone"
                                    name="phone"
                                    placeholder="Nhập số điện thoại"
                                    maxlength="20">
                            </div>
                        </div>


                        <!-- Lop -->
                        <div class="form-group-custom">
                            <label for="class_name" class="form-label-custom">
                                Lớp <span class="text-danger">*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-building"></i>
                                </span>

                                <input type="text"
                                    class="form-input-custom"
                                    id="class_name"
                                    name="class_name"
                                    placeholder="Ví dụ: 66HTTT1"
                                    maxlength="50"
                                    required>
                            </div>
                        </div>


                        <!-- Ngay sinh -->
                        <div class="form-group-custom">
                            <label for="date_of_birth" class="form-label-custom">
                                Ngày sinh
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-calendar-date"></i>
                                </span>

                                <input type="date"
                                    class="form-input-custom"
                                    id="date_of_birth"
                                    name="date_of_birth">
                            </div>
                        </div>


                        <!-- Gioi tinh -->
                        <div class="form-group-custom">
                            <label for="gender" class="form-label-custom">
                                Giới tính <span class="text-danger">*</span>
                            </label>

                            <div class="input-wrapper">
                                <span class="input-icon">
                                    <i class="bi bi-gender-ambiguous"></i>
                                </span>

                                <select class="form-input-custom"
                                    id="gender"
                                    name="gender"
                                    required>
                                    <option value="">-- Chọn giới tính --</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>


                        <!-- Action buttons -->
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-2">

                            <a href="?controller=student&action=index"
                                class="btn-cancel-custom">
                                <i class="bi bi-x-circle"></i>
                                <span>Hủy bỏ</span>
                            </a>

                            <button type="submit"
                                name="btn_create"
                                class="btn-submit-purple">
                                <i class="bi bi-check2-circle"></i>
                                <span>Lưu sinh viên</span>
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
