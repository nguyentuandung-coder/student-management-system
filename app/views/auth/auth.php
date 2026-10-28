<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cổng Học Tập StudyHub - <?= ($activeTab === 'register') ? 'Đăng ký mới' : 'Đăng nhập' ?></title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Auth Custom CSS -->
    <link rel="stylesheet" href="asset/css/auth.css">
</head>
<body>

<div class="auth-container">

    <!-- Brand Header -->
    <div class="brand-header">
        <div class="brand-logo-link">
            <div class="brand-logo-icon">
                <i class="bi bi-mortarboard"></i>
            </div>
            <div class="brand-logo-text">
                <h3>StudyHub</h3>
                <span>Academic Workspace</span>
            </div>
        </div>
    </div>

    <!-- Main Auth Card -->
    <div class="auth-card">

        <!-- Top Switcher (Tabs) -->
        <div class="auth-tabs" role="tablist">
            <button type="button" 
                    class="auth-tab-btn <?= ($activeTab === 'login') ? 'active' : '' ?>" 
                    id="tabBtnLogin" 
                    onclick="switchAuthTab('login')">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Đăng nhập</span>
            </button>

            <button type="button" 
                    class="auth-tab-btn <?= ($activeTab === 'register') ? 'active' : '' ?>" 
                    id="tabBtnRegister" 
                    onclick="switchAuthTab('register')">
                <i class="bi bi-person-plus"></i>
                <span>Đăng ký mới</span>
            </button>
        </div>

        <!-- Flash Messages -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success d-flex align-items-center mb-4 py-2 px-3" role="alert" style="border-radius: 12px; font-size: 13.5px;">
                <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                <div><?= htmlspecialchars($success) ?></div>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger d-flex align-items-center mb-4 py-2 px-3" role="alert" style="border-radius: 12px; font-size: 13.5px;">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5 text-danger"></i>
                <div><?= htmlspecialchars($error) ?></div>
            </div>
        <?php endif; ?>

        <!-- ============================================== -->
        <!-- TAB 1: ĐĂNG KÝ MỚI (REGISTER)                -->
        <!-- ============================================== -->
        <div class="tab-content-panel <?= ($activeTab === 'register') ? 'active' : '' ?>" id="panelRegister">
            
            <div class="auth-header">
                <h2 class="auth-title">Tạo tài khoản học tập</h2>
                <p class="auth-subtitle">Điền thông tin để đăng ký tài khoản mới trên StudyHub</p>
            </div>

            <form action="?controller=auth&action=register" method="POST" id="formRegister" novalidate>
                
                <!-- Họ và tên -->
                <div class="form-group">
                    <label class="form-label" for="reg_fullname">Họ và tên</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-person"></i></span>
                        <input type="text" 
                               class="form-control-custom" 
                               id="reg_fullname" 
                               name="fullname" 
                               value="<?= htmlspecialchars($old['fullname'] ?? '') ?>" 
                               placeholder="VD: Nguyễn Văn An" 
                               required>
                    </div>
                </div>

                <!-- Mã sinh viên hoặc Email giáo vụ -->
                <div class="form-group">
                    <label class="form-label" for="reg_student_code">Mã sinh viên hoặc Mã giáo vụ</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-person-badge"></i></span>
                        <input type="text" 
                               class="form-control-custom" 
                               id="reg_student_code" 
                               name="student_code" 
                               value="<?= htmlspecialchars($old['student_code'] ?? '') ?>" 
                               placeholder="VD: SV20240981 hoặc GV001" 
                               required>
                    </div>
                </div>

                <!-- Email nhà trường -->
                <div class="form-group">
                    <label class="form-label" for="reg_email">Email học đường (@edu.vn)</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-envelope"></i></span>
                        <input type="email" 
                               class="form-control-custom" 
                               id="reg_email" 
                               name="email" 
                               value="<?= htmlspecialchars($old['email'] ?? '') ?>" 
                               placeholder="VD: sv.an@studyhub.edu.vn" 
                               required>
                    </div>
                </div>

                <!-- Lớp học / Khoa -->
                <div class="form-group">
                    <label class="form-label" for="reg_class_name">Lớp học / Đơn vị</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-mortarboard"></i></span>
                        <input type="text" 
                               class="form-control-custom" 
                               id="reg_class_name" 
                               name="class_name" 
                               value="<?= htmlspecialchars($old['class_name'] ?? '') ?>" 
                               placeholder="VD: 66HTTT1 hoặc CNTT">
                    </div>
                </div>

                <!-- Mật khẩu -->
                <div class="form-group">
                    <label class="form-label" for="reg_password">Mật khẩu</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-lock"></i></span>
                        <input type="password" 
                               class="form-control-custom" 
                               id="reg_password" 
                               name="password" 
                               placeholder="Tối thiểu 6 ký tự" 
                               required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('reg_password', this)" title="Ẩn/Hiện mật khẩu">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="form-group">
                    <label class="form-label" for="reg_confirm_password">Xác nhận mật khẩu</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" 
                               class="form-control-custom" 
                               id="reg_confirm_password" 
                               name="confirm_password" 
                               placeholder="Nhập lại mật khẩu" 
                               required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('reg_confirm_password', this)" title="Ẩn/Hiện mật khẩu">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Điều khoản sử dụng -->
                <div class="form-check-custom">
                    <input type="checkbox" id="reg_agree" name="agree_terms" value="1" checked required>
                    <label for="reg_agree">Tôi đồng ý với Điều khoản sử dụng và Chính sách của Cổng học tập</label>
                </div>

                <!-- Nút Submit Đăng Ký -->
                <button type="submit" class="btn-submit">
                    <span>Đăng ký tài khoản ngay</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

        </div>


        <!-- ============================================== -->
        <!-- TAB 2: ĐĂNG NHẬP (LOGIN)                      -->
        <!-- ============================================== -->
        <div class="tab-content-panel <?= ($activeTab === 'login') ? 'active' : '' ?>" id="panelLogin">

            <div class="auth-header">
                <h2 class="auth-title">Truy cập Cổng học tập</h2>
                <p class="auth-subtitle">Nhập thông tin xác thực do nhà trường cung cấp</p>
            </div>

            <form action="?controller=auth&action=login" method="POST" id="formLogin">
                
                <!-- Mã sinh viên hoặc Email giáo vụ -->
                <div class="form-group">
                    <label class="form-label" for="login_identifier">Mã sinh viên hoặc Email giáo vụ</label>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-person-badge"></i></span>
                        <input type="text" 
                               class="form-control-custom" 
                               id="login_identifier" 
                               name="identifier" 
                               value="<?= htmlspecialchars($old['identifier'] ?? '') ?>" 
                               placeholder="VD: SV20240981 hoặc gv.tran@studyhub.edu.vn" 
                               required>
                    </div>
                </div>

                <!-- Mật khẩu -->
                <div class="form-group">
                    <div class="form-label-row">
                        <label for="login_password">Mật khẩu</label>
                        <a href="javascript:void(0)" onclick="alert('Vui lòng liên hệ Văn phòng Đào tạo & Quản trị Hệ thống để cấp lại mật khẩu.')" class="forgot-link">Quên mật khẩu?</a>
                    </div>
                    <div class="input-group-custom">
                        <span class="input-icon-left"><i class="bi bi-lock"></i></span>
                        <input type="password" 
                               class="form-control-custom" 
                               id="login_password" 
                               name="password" 
                               placeholder="••••••••••••" 
                               required>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('login_password', this)" title="Ẩn/Hiện mật khẩu">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Ghi nhớ đăng nhập -->
                <div class="form-check-custom">
                    <input type="checkbox" id="login_remember" name="remember" value="1">
                    <label for="login_remember">Ghi nhớ đăng nhập trên thiết bị này</label>
                </div>

                <!-- Nút Submit Đăng Nhập -->
                <button type="submit" class="btn-submit">
                    <span>Vào không gian học tập</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>

    <!-- Bottom Footer Links -->
    <div class="auth-footer">
        <span style="font-size: 13px; color: #64748b;">
            <i class="bi bi-shield-check me-1"></i> Hệ thống xác thực & Quản lý đào tạo StudyHub
        </span>
    </div>

</div>

<script>
    // Chuyen doi Tab giua Dang ky va Dang nhap
    function switchAuthTab(tab) {
        const btnLogin = document.getElementById('tabBtnLogin');
        const btnRegister = document.getElementById('tabBtnRegister');
        const panelLogin = document.getElementById('panelLogin');
        const panelRegister = document.getElementById('panelRegister');

        if (tab === 'login') {
            btnLogin.classList.add('active');
            btnRegister.classList.remove('active');
            panelLogin.classList.add('active');
            panelRegister.classList.remove('active');
            document.title = 'Cổng Học Tập StudyHub - Đăng nhập';
        } else {
            btnRegister.classList.add('active');
            btnLogin.classList.remove('active');
            panelRegister.classList.add('active');
            panelLogin.classList.remove('active');
            document.title = 'Cổng Học Tập StudyHub - Đăng ký mới';
        }
    }

    // Toggle an/hien mat khau
    function togglePasswordVisibility(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (!input) return;

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>

</body>
</html>
