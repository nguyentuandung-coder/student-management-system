<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Môn học - StudyHub</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Giao dien chung StudyHub -->
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .page-banner {
            background: linear-gradient(120deg, #ffffff, #f6f1ff);
            border: 1px solid #eeeeF8;
            border-radius: 16px;
            padding: 24px 28px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .page-banner-title h2 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 6px;
            color: #172033;
        }

        .page-banner-title p {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }

        .table-card {
            background-color: #ffffff;
            border: 1px solid #eeeeF5;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(20, 20, 60, 0.03);
            overflow: hidden;
        }

        .table-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f3f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-card-title {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .badge-count {
            background-color: #f1edff;
            color: #6938d3;
            font-size: 12px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .table-custom {
            width: 100%;
            margin-bottom: 0;
        }

        .table-custom th {
            background-color: #f8fafc;
            color: #475569;
            font-size: 12.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .table-custom td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #1e293b;
        }

        .table-custom tbody tr:hover {
            background-color: #faf9ff;
        }

        .badge-code {
            background-color: #ede9fe;
            color: #5b21b6;
            font-weight: 700;
            font-size: 13px;
            padding: 4px 10px;
            border-radius: 8px;
            display: inline-block;
        }

        .badge-credits {
            background-color: #fef3c7;
            color: #92400e;
            font-weight: 700;
            font-size: 12.5px;
            padding: 4px 10px;
            border-radius: 8px;
            display: inline-block;
        }

        .btn-action-edit {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background-color: #eff6ff;
            color: #2563eb;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid #dbeafe;
        }

        .btn-action-edit:hover {
            background-color: #2563eb;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-action-delete {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background-color: #fef2f2;
            color: #dc2626;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid #fee2e2;
        }

        .btn-action-delete:hover {
            background-color: #dc2626;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-add-subject {
            background-color: #6938d3;
            color: #ffffff;
            font-size: 13.5px;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(105, 56, 211, 0.25);
        }

        .btn-add-subject:hover {
            background-color: #5428b6;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(105, 56, 211, 0.35);
        }

        .empty-table-state {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-table-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background-color: #f1edff;
            color: #6938d3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 16px;
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

                <a href="?controller=student&action=index" class="menu-link">
                    <i class="bi bi-people"></i>
                    <span>Quản lý sinh viên</span>
                </a>

                <a href="?controller=subject&action=index" class="menu-link active">
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


        <!-- KHU VUC NOI DUNG (MAIN AREA) -->
        <div class="main-area">

            <!-- HEADER -->
            <header class="top-header">

                <h5 class="header-title">Quản lý môn học</h5>

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

                <!-- Page Banner -->
                <div class="page-banner">
                    <div class="page-banner-title">
                        <h2>Danh mục Môn học</h2>
                        <p>Quản lý danh sách các môn học, số tín chỉ và thông tin đào tạo của nhà trường</p>
                    </div>

                    <a href="?controller=addSubject" class="btn-add-subject">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Thêm môn học mới</span>
                    </a>
                </div>

                <!-- Table Card -->
                <div class="table-card">

                    <div class="table-card-header">
                        <h4 class="table-card-title">
                            <i class="bi bi-journal-text text-primary"></i>
                            <span>Danh sách môn học</span>
                            <span class="badge-count"><?= !empty($subjects) ? count($subjects) : 0 ?> môn</span>
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 70px; text-align: center;">ID</th>
                                    <th style="width: 160px;">Mã môn học</th>
                                    <th>Tên môn học</th>
                                    <th style="width: 140px; text-align: center;">Số tín chỉ</th>
                                    <th style="width: 110px; text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($subjects)): ?>
                                    <?php foreach ($subjects as $subject): ?>
                                        <tr>
                                            <td style="text-align: center; color: #64748b; font-weight: 600;">
                                                #<?= $subject->getId(); ?>
                                            </td>
                                            <td>
                                                <span class="badge-code"><?= htmlspecialchars($subject->getCode()); ?></span>
                                            </td>
                                            <td>
                                                <span style="font-weight: 600; color: #0f172a;">
                                                    <?= htmlspecialchars($subject->getName()); ?>
                                                </span>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge-credits">
                                                    <i class="bi bi-award me-1"></i><?= $subject->getCredits(); ?> Tín chỉ
                                                </span>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="d-inline-flex gap-2">
                                                    <a href="?controller=editSubject&id=<?= $subject->getId() ?>" class="btn-action-edit" title="Chỉnh sửa môn học">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="?controller=deleteSubject&id=<?= $subject->getId() ?>" class="btn-action-delete" title="Xóa môn học">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="empty-table-state">
                                                <div class="empty-table-icon">
                                                    <i class="bi bi-journal-x"></i>
                                                </div>
                                                <h5 style="font-weight: 700; color: #1e293b; margin-bottom: 6px;">Chưa có môn học nào</h5>
                                                <p style="color: #64748b; font-size: 13.5px; max-width: 420px; margin: 0 auto 18px;">
                                                    Hiện tại cơ sở dữ liệu chưa có môn học nào. Hãy thêm môn học đầu tiên để bắt đầu quản lý.
                                                </p>
                                                <a href="?controller=addSubject" class="btn-add-subject">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                    <span>Thêm môn học ngay</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
