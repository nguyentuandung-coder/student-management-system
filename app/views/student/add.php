<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên - StudyHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #7c3aed;
            --primary-soft: #ede9fe;
            --text: #1f2037;
            --muted: #8b8ca7;
            --bg: #f3f2f8;
            --sidebar-w: 250px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: "Segoe UI", Roboto, Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-w);
            background: #fff;
            border-right: 1px solid #ecebf5;
            padding: 20px 14px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 22px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand-name {
            font-weight: 700;
            font-size: 18px;
            line-height: 1.1;
        }

        .brand-sub {
            font-size: 10px;
            letter-spacing: 1px;
            color: var(--primary);
            text-transform: uppercase;
        }

        .menu-title {
            font-size: 11px;
            letter-spacing: 1px;
            color: var(--muted);
            text-transform: uppercase;
            padding: 10px 10px 8px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 4px;
            border-radius: 12px;
            color: #5b5c78;
            text-decoration: none;
            font-size: 15px;
        }

        .menu-link:hover {
            background: #f6f4ff;
            color: var(--primary);
        }

        .menu-link.active {
            background: var(--primary-soft);
            color: var(--primary);
            font-weight: 600;
        }

        /* ---------- Main ---------- */
        .main {
            margin-left: var(--sidebar-w);
        }

        .topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #ecebf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 700;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            text-align: right;
            line-height: 1.2;
        }

        .user-role {
            font-size: 12px;
            color: var(--muted);
            font-weight: 400;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            padding: 28px;
        }

        .card-box {
            max-width: 760px;
            background: #fff;
            border-radius: 16px;
            padding: 30px 32px;
            box-shadow: 0 2px 12px rgba(80, 60, 160, 0.06);
        }

        .tag {
            display: inline-block;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 6px 12px;
            border-radius: 999px;
            margin-bottom: 12px;
        }

        .card-box h3 {
            font-weight: 700;
            margin-bottom: 4px;
        }

        .card-sub {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 14px;
            border-color: #e2e0ef;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
        }

        .btn-main {
            background: var(--primary);
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .btn-main:hover {
            background: #6d28d9;
            color: #fff;
        }

        .btn-soft {
            background: var(--primary-soft);
            border: none;
            color: var(--primary);
            border-radius: 10px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .btn-soft:hover {
            background: #ddd6fe;
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .content {
                padding: 16px;
            }

            .card-box {
                padding: 22px 18px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
            <div>
                <div class="brand-name">StudyHub</div>
                <div class="brand-sub">Academic Workspace</div>
            </div>
        </div>

        <div class="menu-title">Hệ thống quản lý</div>

        <a href="?controller=home" class="menu-link">
            <i class="bi bi-grid"></i> Trang chủ
        </a>
        <a href="?controller=home" class="menu-link active">
            <i class="bi bi-people"></i> Quản lý sinh viên
        </a>
        <a href="?controller=subject&action=index" class="menu-link">
            <i class="bi bi-book"></i> Quản lý môn học
        </a>
        <a href="?controller=grade&action=index" class="menu-link">
            <i class="bi bi-star"></i> Quản lý điểm
        </a>
    </aside>

    <!-- Main -->
    <div class="main">

        <div class="topbar">
            <h5>Thêm sinh viên</h5>

            <div class="user-box">
                <div class="user-name">
                    Quản trị viên
                    <div class="user-role">Quản trị hệ thống</div>
                </div>
                <div class="avatar"><i class="bi bi-person-fill"></i></div>
            </div>
        </div>

        <div class="content">
            <div class="card-box">

                <span class="tag"><i class="bi bi-person-plus-fill me-1"></i> Sinh viên mới</span>
                <h3>Thêm sinh viên mới</h3>
                <div class="card-sub">Nhập đầy đủ thông tin để tạo hồ sơ sinh viên trong hệ thống.</div>

                <form action="?controller=student&action=store" method="post">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="student_code" class="form-label">Mã sinh viên</label>
                            <input type="text" class="form-control" id="student_code" name="student_code"
                                maxlength="20" placeholder="Nhập mã sinh viên" required>
                        </div>

                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                maxlength="100" placeholder="Nhập họ và tên" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                maxlength="100" placeholder="Nhập email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                maxlength="20" placeholder="Nhập số điện thoại" required>
                        </div>

                        <div class="col-md-6">
                            <label for="class_name" class="form-label">Lớp</label>
                            <input type="text" class="form-control" id="class_name" name="class_name"
                                maxlength="50" placeholder="Nhập tên lớp" required>
                        </div>

                        <div class="col-md-3">
                            <label for="date_of_birth" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>

                        <div class="col-md-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>

                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-main" name="btn_create">
                            <i class="bi bi-check-circle me-1"></i> Lưu sinh viên
                        </button>
                        <a href="?controller=home" class="btn btn-soft">
                            <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
