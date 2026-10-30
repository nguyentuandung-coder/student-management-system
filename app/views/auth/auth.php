<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - StudyHub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        <a href="?controller=auth&action=login" class="brand-logo-link">
            <div class="brand-logo-icon">
                <i class="bi bi-mortarboard"></i>
            </div>
            <div class="brand-logo-text">
                <h3>StudyHub</h3>
                <span>ACADEMIC WORKSPACE</span>
            </div>
        </a>
    </div>

    <!-- Main Auth Card -->
    <div class="auth-card">

        <div class="auth-header">
            <h2 class="auth-title">Đăng nhập</h2>
        </div>

        <!-- Flash Messages -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success d-flex align-items-center mb-3 py-2 px-3" role="alert" style="border-radius: 12px; font-size: 13.5px;">
                <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                <div><?= htmlspecialchars($success) ?></div>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger d-flex align-items-center mb-3 py-2 px-3" role="alert" style="border-radius: 12px; font-size: 13.5px;">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5 text-danger flex-shrink-0"></i>
                <div><?= htmlspecialchars($error) ?></div>
            </div>
        <?php endif; ?>

        <!-- Form Dang Nhap -->
        <form action="?controller=auth&action=login" method="POST" id="formLogin">
            
            <!-- Email / Tai khoan -->
            <div class="form-group">
                <label class="form-label" for="login_identifier">Email hoặc Tài khoản</label>
                <div class="input-group-custom">
                    <span class="input-icon-left"><i class="bi bi-person"></i></span>
                    <input type="text" 
                           class="form-control-custom" 
                           id="login_identifier" 
                           name="identifier" 
                           value="<?= htmlspecialchars($old['identifier'] ?? '') ?>" 
                           placeholder="admin@studyhub.edu.vn" 
                           required 
                           autofocus>
                </div>
            </div>

            <!-- Mat khau -->
            <div class="form-group">
                <div class="form-label-row">
                    <label for="login_password">Mật khẩu</label>
                    <a href="javascript:void(0)" onclick="alert('Vui lòng liên hệ quản trị viên để được cấp lại mật khẩu.')" class="forgot-link">Quên mật khẩu?</a>
                </div>
                <div class="input-group-custom">
                    <span class="input-icon-left"><i class="bi bi-lock"></i></span>
                    <input type="password" 
                           class="form-control-custom" 
                           id="login_password" 
                           name="password" 
                           placeholder="••••••••" 
                           required>
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('login_password', this)" title="Ẩn/Hiện mật khẩu">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Ghi nho dang nhap -->
            <div class="form-check-custom">
                <input type="checkbox" id="login_remember" name="remember" value="1" checked>
                <label for="login_remember">Ghi nhớ đăng nhập</label>
            </div>

            <!-- Nut Dang Nhap -->
            <button type="submit" class="btn-submit">
                <span>Đăng nhập</span>
                <i class="bi bi-arrow-right"></i>
            </button>
        </form>

    </div>

    <!-- Bottom Footer Links -->
    <div class="auth-footer">
        <span style="font-size: 13px; color: #64748b;">
            <i class="bi bi-shield-check me-1"></i> Hệ thống Quản trị StudyHub
        </span>
    </div>

</div>

<script>
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
