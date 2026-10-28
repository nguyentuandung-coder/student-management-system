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

    <style>
        :root {
            --primary-purple: #6938d3;
            --primary-purple-hover: #5428b6;
            --primary-purple-light: #f1edff;
            --text-dark: #121826;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --card-radius: 24px;
        }

        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f9fe 0%, #edf0fb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            color: var(--text-dark);
            margin: 0;
        }

        .auth-container {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
        }

        /* Top Brand Logo */
        .brand-header {
            text-align: center;
            margin-bottom: 22px;
        }

        .brand-logo-link {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-dark);
        }

        .brand-logo-icon {
            width: 44px;
            height: 44px;
            background-color: var(--primary-purple);
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(105, 56, 211, 0.25);
        }

        .brand-logo-text {
            text-align: left;
        }

        .brand-logo-text h3 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        .brand-logo-text span {
            font-size: 11px;
            font-weight: 700;
            color: var(--primary-purple);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Card Container */
        .auth-card {
            background: #ffffff;
            border-radius: var(--card-radius);
            padding: 32px 32px 36px;
            box-shadow: 0 10px 35px rgba(23, 32, 51, 0.06), 0 2px 6px rgba(23, 32, 51, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        /* Top Tab Pill Switcher */
        .auth-tabs {
            background-color: #f1f3f9;
            border-radius: 14px;
            padding: 5px;
            display: flex;
            gap: 4px;
            margin-bottom: 28px;
        }

        .auth-tab-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 14px;
            border: none;
            background: transparent;
            color: #555e75;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            user-select: none;
        }

        .auth-tab-btn i {
            font-size: 16px;
        }

        .auth-tab-btn.active {
            background-color: #ffffff;
            color: var(--primary-purple);
            box-shadow: 0 2px 8px rgba(105, 56, 211, 0.08), 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .auth-tab-btn:hover:not(.active) {
            color: var(--primary-purple);
        }

        /* Title & Subtitle */
        .auth-header {
            margin-bottom: 24px;
        }

        .auth-title {
            font-size: 23px;
            font-weight: 700;
            margin: 0 0 6px 0;
            color: #111827;
            letter-spacing: -0.02em;
        }

        .auth-subtitle {
            font-size: 13.5px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13.5px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 7px;
        }

        .forgot-link {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--primary-purple);
            text-decoration: none;
            transition: color 0.15s;
        }

        .forgot-link:hover {
            color: var(--primary-purple-hover);
            text-decoration: underline;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-custom .input-icon-left {
            position: absolute;
            left: 14px;
            color: #4b5563;
            font-size: 18px;
            pointer-events: none;
            display: flex;
            align-items: center;
            z-index: 2;
        }

        .input-group-custom .form-control-custom {
            width: 100%;
            height: 48px;
            padding: 0 42px 0 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 13.5px;
            color: #111827;
            background-color: #ffffff;
            transition: all 0.2s ease;
            outline: none;
        }

        .input-group-custom .form-control-custom::placeholder {
            color: #94a3b8;
            font-size: 13px;
        }

        .input-group-custom .form-control-custom:focus {
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 3.5px rgba(105, 56, 211, 0.12);
        }

        .input-group-custom .toggle-password {
            position: absolute;
            right: 12px;
            color: #64748b;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 6px;
            border-radius: 6px;
            transition: color 0.15s;
            z-index: 2;
            background: none;
            border: none;
        }

        .input-group-custom .toggle-password:hover {
            color: var(--primary-purple);
        }

        /* Checkbox */
        .form-check-custom {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 18px 0 22px 0;
        }

        .form-check-custom input[type="checkbox"] {
            width: 17px;
            height: 17px;
            margin-top: 2px;
            border-radius: 4px;
            border: 1.5px solid #cbd5e1;
            cursor: pointer;
            accent-color: var(--primary-purple);
            flex-shrink: 0;
        }

        .form-check-custom label {
            font-size: 13px;
            color: #4b5563;
            cursor: pointer;
            line-height: 1.45;
            user-select: none;
            margin: 0;
        }

        /* Primary Submit Button */
        .btn-submit {
            width: 100%;
            height: 48px;
            background-color: var(--primary-purple);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 14px rgba(105, 56, 211, 0.28);
        }

        .btn-submit:hover {
            background-color: var(--primary-purple-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(105, 56, 211, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Divider */
        .auth-divider {
            display: flex;
            align-items: center;
            margin: 24px 0 20px 0;
            text-align: center;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .auth-divider span {
            padding: 0 12px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        /* Social / SSO Buttons */
        .sso-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .btn-sso {
            height: 44px;
            background-color: #ffffff;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-sso:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #1e293b;
        }

        /* Footer Link */
        .auth-footer {
            text-align: center;
            margin-top: 20px;
        }

        .back-home-link {
            font-size: 13px;
            color: #64748b;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.15s;
        }

        .back-home-link:hover {
            color: var(--primary-purple);
        }

        /* Animated Tab switching */
        .tab-content-panel {
            display: none;
            animation: fadeIn 0.25s ease-in-out;
        }

        .tab-content-panel.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="auth-container">

    <!-- Brand Header -->
    <div class="brand-header">
        <a href="?controller=home" class="brand-logo-link">
            <div class="brand-logo-icon">
                <i class="bi bi-mortarboard"></i>
            </div>
            <div class="brand-logo-text">
                <h3>StudyHub</h3>
                <span>Academic Workspace</span>
            </div>
        </a>
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
                    <div class="form-label">
                        <label for="login_password" style="margin: 0;">Mật khẩu</label>
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
        <a href="?controller=home" class="back-home-link">
            <i class="bi bi-arrow-left"></i>
            <span>Quay về trang chủ StudyHub</span>
        </a>
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
