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
    <!-- CSS Quan ly Sinh vien -->
    <link rel="stylesheet" href="asset/css/student.css">
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
