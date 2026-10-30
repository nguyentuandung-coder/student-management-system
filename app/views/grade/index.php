<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý điểm - StudyHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- CSS Quan ly Diem -->
    <link rel="stylesheet" href="asset/css/grade.css">
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
                <a href="?controller=home" class="menu-link">
                    <i class="bi bi-grid"></i><span>Trang chủ</span>
                </a>
                <a href="?controller=student&action=index" class="menu-link">
                    <i class="bi bi-people"></i><span>Quản lý sinh viên</span>
                </a>
                <a href="?controller=subject&action=index" class="menu-link">
                    <i class="bi bi-book"></i><span>Quản lý môn học</span>
                </a>
                <a href="?controller=grade&action=index" class="menu-link active">
                    <i class="bi bi-star"></i><span>Quản lý điểm</span>
                </a>
            </nav>


        </aside>

        <div class="main-area">
            <header class="top-header">
                <h5 class="header-title">Quản lý điểm</h5>
                <div class="header-right">
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

            <main class="content">
                <div class="page-banner">
                    <div class="page-banner-title">
                        <h2>Quản lý điểm sinh viên</h2>
                        <p>Theo dõi điểm số theo sinh viên và môn học</p>
                    </div>
                    <a href="?controller=addGrade" class="btn-add-grade">
                        <i class="bi bi-plus-circle-fill"></i><span>Thêm điểm mới</span>
                    </a>
                </div>

                <div class="table-card">
                    <div class="table-card-header">
                        <h4 class="table-card-title">
                            <i class="bi bi-journal-check text-primary"></i>
                            <span>Danh sách điểm</span>
                            <span class="badge-count"><?= !empty($grades) ? count($grades) : 0 ?> điểm</span>
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th style="width: 75px; text-align: center;">ID</th>
                                    <th style="width: 140px;">Mã sinh viên</th>
                                    <th>Họ tên</th>
                                    <th style="width: 130px;">Lớp</th>
                                    <th>Môn học</th>
                                    <th style="width: 100px; text-align: center;">Điểm</th>
                                    <th style="width: 110px; text-align: center;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($grades)): ?>
                                    <?php foreach ($grades as $grade): ?>
                                        <tr>
                                            <td style="text-align: center; color: #64748b; font-weight: 600;">
                                                #<?= htmlspecialchars((string)$grade->getId()); ?>
                                            </td>
                                            <td>
                                                <span class="badge-code"><?= htmlspecialchars((string)$grade->getStudentCode()); ?></span>
                                            </td>
                                            <td style="font-weight: 600; color: #0f172a;">
                                                <?= htmlspecialchars((string)$grade->getName()); ?>
                                            </td>
                                            <td><?= htmlspecialchars((string)$grade->getClassName()); ?></td>
                                            <td><?= htmlspecialchars((string)$grade->getSubjectName()); ?></td>
                                            <td style="text-align: center;">
                                                <span class="badge-grade"><?= htmlspecialchars((string)$grade->getScore()); ?></span>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="d-inline-flex gap-2">
                                                    <a href="?controller=editGrade&id=<?= urlencode((string)$grade->getId()); ?>" class="btn-action-edit" title="Chỉnh sửa điểm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="?controller=deleteGrade&id=<?= urlencode((string)$grade->getId()); ?>" class="btn-action-delete" title="Xóa điểm">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="empty-table-state">
                                                <div class="empty-table-icon"><i class="bi bi-journal-x"></i></div>
                                                <h5 style="font-weight: 700; color: #1e293b; margin-bottom: 6px;">Chưa có điểm nào</h5>
                                                <p style="color: #64748b; font-size: 13.5px; max-width: 420px; margin: 0 auto 18px;">
                                                    Hiện tại chưa có điểm trong cơ sở dữ liệu. Hãy thêm điểm đầu tiên để bắt đầu quản lý.
                                                </p>
                                                <a href="?controller=addGrade" class="btn-add-grade">
                                                    <i class="bi bi-plus-circle-fill"></i><span>Thêm điểm ngay</span>
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