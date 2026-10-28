<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyHub - Trang chủ</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f8fc;
            color: #172033;
        }

        /* Khung giao dien */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar ben trai */
        .sidebar {
            width: 270px;
            min-width: 270px;
            background-color: #ffffff;
            border-right: 1px solid #eeeeF5;
            display: flex;
            flex-direction: column;
            padding: 25px 18px;
        }

        /* Logo StudyHub */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px;
            margin-bottom: 45px;
            text-decoration: none;
            color: #172033;
        }

        .logo-icon {
            width: 46px;
            height: 46px;
            background-color: #6938d3;
            color: white;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
        }

        .logo-text h4 {
            font-size: 19px;
            font-weight: bold;
            margin: 0;
        }

        .logo-text p {
            font-size: 11px;
            color: #7545d5;
            font-weight: bold;
            margin: 3px 0 0;
        }

        /* Tieu de menu */
        .menu-title {
            font-size: 11px;
            color: #8b8b9b;
            font-weight: bold;
            margin: 0 0 12px 12px;
        }

        /* Cac muc dieu huong */
        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 5px;
            border-radius: 10px;
            text-decoration: none;
            color: #555567;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .menu-link:hover {
            background-color: #f1edff;
            color: #6938d3;
        }

        .menu-link.active {
            background-color: #eee8ff;
            color: #6938d3;
            font-weight: bold;
        }

        /* Khu vuc ho tro cuoi sidebar */
        .support-box {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #f0efff;
            padding: 15px 12px;
            border-radius: 12px;
        }

        .support-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background-color: #e2d9ff;
            color: #6938d3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .support-box strong {
            font-size: 13px;
        }

        .support-box p {
            font-size: 12px;
            color: #77778a;
            margin: 3px 0 0;
        }

        /* Phan noi dung ben phai */
        .main-area {
            flex: 1;
            min-width: 0;
        }

        /* Header tren cung */
        .top-header {
            height: 78px;
            background-color: #ffffff;
            border-bottom: 1px solid #eeeeF5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .header-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-button {
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 12px;
            background-color: #f0f2ff;
            color: #56566b;
            font-size: 18px;
        }

        .user-info {
            border-left: 1px solid #ddddE8;
            padding-left: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info strong {
            font-size: 13px;
        }

        .user-info p {
            font-size: 12px;
            color: #888899;
            margin: 3px 0 0;
        }

        .user-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #6938d3;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Noi dung trang chu */
        .content {
            padding: 30px 35px;
        }

        /* Banner chao mung */
        .welcome-box {
            background: linear-gradient(120deg, #ffffff, #f6f1ff);
            border: 1px solid #eeeeF8;
            border-radius: 16px;
            padding: 35px 40px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(20, 20, 60, 0.02);
        }

        .semester-badge {
            display: inline-block;
            background-color: #f0edff;
            color: #7044cd;
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .welcome-box h1 {
            font-size: 28px;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 8px;
        }

        .welcome-box p {
            color: #737386;
            font-size: 14px;
            line-height: 1.8;
            margin: 0;
            max-width: 750px;
        }

        /* Cac the thong ke */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 14px;
            padding: 24px;
            min-width: 0;
            box-shadow: 0 2px 4px rgba(20, 20, 60, 0.02);
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .stat-label {
            font-size: 11px;
            color: #858597;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 12px;
            background-color: #f0f2ff;
            color: #7044cd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .stat-description {
            color: #858597;
            font-size: 12px;
            margin-top: 18px;
        }

        /* Thanh trang thai */
        .progress-line {
            height: 6px;
            background-color: #eeebfa;
            border-radius: 10px;
            margin-top: 12px;
            overflow: hidden;
        }

        .progress-value {
            height: 100%;
            background-color: #7545d5;
            border-radius: 10px;
        }

        /* Khu vuc lam viec */
        .workspace {
            max-width: 760px;
            min-height: 390px;
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(20, 20, 60, 0.02);
        }

        .workspace-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .workspace-header h5 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .workspace-header p {
            color: #858597;
            font-size: 12px;
            margin: 0;
            line-height: 1.7;
        }

        .workspace-empty {
            text-align: center;
            padding: 55px 15px 35px;
        }

        .empty-icon {
            width: 78px;
            height: 78px;
            margin: 0 auto 25px;
            border-radius: 18px;
            background-color: #f0f2ff;
            color: #7044cd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
        }

        .workspace-empty h5 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .workspace-empty p {
            max-width: 460px;
            margin: 0 auto 22px;
            color: #858597;
            font-size: 13px;
            line-height: 1.8;
        }

        .btn-purple {
            background-color: #6938d3;
            color: white;
            border: 1px solid #6938d3;
            border-radius: 10px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-purple:hover {
            background-color: #5428b6;
            color: white;
        }

        .btn-light-purple {
            background-color: #f0f2ff;
            color: #393951;
            border-radius: 10px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-light-purple:hover {
            background-color: #e5e0ff;
            color: #6938d3;
        }

        .notice-box {
            background-color: #f7f7fc;
            border-radius: 10px;
            padding: 15px;
            margin-top: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #737386;
            font-size: 12px;
        }

        .notice-box i {
            color: #7044cd;
            font-size: 17px;
        }

        /* Hien thi tren man hinh nho */
        @media (max-width: 1000px) {
            .sidebar {
                width: 230px;
                min-width: 230px;
            }

            .content {
                padding: 25px 20px;
            }

            .top-header {
                padding: 0 20px;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 15px;
            }

            .logo {
                margin-bottom: 20px;
            }

            .menu-links {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 5px;
            }

            .menu-link {
                margin-bottom: 0;
                padding: 10px;
                font-size: 12px;
            }

            .support-box {
                display: none;
            }

            .top-header {
                height: auto;
                min-height: 65px;
                padding: 12px 15px;
            }

            .header-title {
                font-size: 15px;
            }

            .header-button {
                display: none;
            }

            .user-info {
                padding-left: 10px;
            }

            .user-info strong {
                font-size: 11px;
            }

            .content {
                padding: 15px;
            }

            .welcome-box {
                padding: 25px 20px;
            }

            .welcome-box h1 {
                font-size: 22px;
            }

            .workspace {
                padding: 20px 15px;
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

                <a href="?controller=home" class="menu-link active">
                    <i class="bi bi-grid"></i>
                    <span>Trang chủ</span>
                </a>

                <a href="?controller=student&action=index" class="menu-link">
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

                <h5 class="header-title">Trang chủ</h5>

                <div class="header-right">

                    <button type="button" class="header-button" title="Thông báo">
                        <i class="bi bi-bell"></i>
                    </button>

                    <button type="button" class="header-button" title="Lịch">
                        <i class="bi bi-calendar-event"></i>
                    </button>

                    <div class="user-info">
                        <div class="text-end">
                            <strong><?= htmlspecialchars($_SESSION['user_name'] ?? 'Quản trị viên') ?></strong>
                            <p><?= (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student') ? 'Sinh viên' : ((isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'teacher') ? 'Giảng viên' : 'Quản trị hệ thống') ?></p>
                        </div>

                        <div class="user-icon" title="<?= htmlspecialchars($_SESSION['user_code'] ?? '') ?>">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <a href="?controller=auth&action=logout" class="header-button text-danger text-decoration-none d-flex align-items-center justify-content-center ms-2" title="Đăng xuất" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                        </a>
                    </div>

                </div>

            </header>


            <!-- NOI DUNG CHINH -->
            <main class="content">

                <!-- Banner chao mung -->
                <section class="welcome-box">

                    <div class="semester-badge">
                        <i class="bi bi-circle-fill" style="font-size: 8px;"></i>
                        HỌC KỲ II • NĂM HỌC 2024–2025
                    </div>

                    <h1>Chào mừng đến với StudyHub — Không gian quản trị học tập</h1>

                    <p>
                        Nền tảng quản lý hồ sơ sinh viên, tiến độ đào tạo và kiểm soát
                        chất lượng điểm học tập tập trung. Mọi thông tin được tổ chức
                        rõ ràng, giúp việc quản lý thuận tiện hơn.
                    </p>

                </section>


                <!-- Cac the thong ke -->
                <section class="stats-row">

                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <p class="stat-label">TỔNG SỐ SINH VIÊN</p>
                                <h2 class="stat-number">--</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>

                        <p class="stat-description">
                            Thống kê số lượng sinh viên trong hệ thống
                        </p>

                        <div class="progress-line">
                            <div class="progress-value" style="width: 75%;"></div>
                        </div>
                    </div>


                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <p class="stat-label">TỔNG SỐ MÔN HỌC</p>
                                <h2 class="stat-number">--</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                        </div>

                        <p class="stat-description">
                            Danh sách môn học đang được quản lý
                        </p>

                        <div class="progress-line">
                            <div class="progress-value" style="width: 60%;"></div>
                        </div>
                    </div>


                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <p class="stat-label">ĐIỂM TRUNG BÌNH</p>
                                <h2 class="stat-number">--</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                        </div>

                        <p class="stat-description">
                            Thống kê kết quả học tập của sinh viên
                        </p>

                        <div class="progress-line">
                            <div class="progress-value" style="width: 50%;"></div>
                        </div>
                    </div>

                </section>


                <!-- Khu vuc lam viec -->
                <section class="workspace">

                    <div class="workspace-header">
                        <div>
                            <h5>Không gian làm việc hiện tại</h5>
                            <p>
                                Khu vực sẵn sàng hiển thị danh sách, biểu mẫu
                                hoặc thông tin quản lý.
                            </p>
                        </div>
                    </div>

                    <div class="workspace-empty">

                        <div class="empty-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </div>

                        <h5>Chào mừng bạn đến với StudyHub</h5>

                        <p>
                            Hãy chọn chức năng quản lý ở thanh điều hướng bên trái
                            để bắt đầu làm việc với dữ liệu sinh viên, môn học và điểm.
                        </p>

                        <div class="d-flex justify-content-center flex-wrap gap-2">

                            <a href="?controller=subject&action=index" class="btn-purple">
                                <i class="bi bi-book me-1"></i>
                                Quản lý môn học
                            </a>

                            <a href="?controller=grade&action=index" class="btn-light-purple">
                                <i class="bi bi-star me-1"></i>
                                Quản lý điểm
                            </a>

                        </div>

                    </div>

                    <div class="notice-box">
                        <i class="bi bi-info-circle"></i>

                        <span>
                            Gợi ý: Chọn một chức năng ở menu bên trái để chuyển
                            đến trang quản lý tương ứng.
                        </span>
                    </div>

                </section>

            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>