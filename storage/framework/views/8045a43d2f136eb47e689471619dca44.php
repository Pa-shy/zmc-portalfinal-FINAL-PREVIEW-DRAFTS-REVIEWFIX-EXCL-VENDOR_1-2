<!doctype html>
<html lang="<?php echo e(str_replace("_", "-", app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account | ZMC Online Portal</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root{
            --bg: #f0f7f0;
            --card: #ffffff;
            --border: #e2e8f0;
            --muted: #64748b;
            --text: #111827;
            --green: #2e7d32;
            --green-hover: #1b5e20;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            --radius: 16px;
        }

        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: 'Inter', sans-serif;
            background: url('<?php echo e(asset("zmc_building.png")); ?>') no-repeat center center fixed;
            background-size: cover;
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }
        body::before{
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(240, 247, 240, 0.92) 0%, rgba(220, 237, 220, 0.95) 100%);
            z-index: -1;
        }

        .wrap{ width: 100%; max-width: 480px; }

        /* BRAND SECTION */
        .brand{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            text-decoration: none;
        }
        .brand img {
            height: 40px; /* Adjust height to fit with text */
            width: auto;
        }
        .brand span{
            font-family: 'Roboto';
            font-weight: 900;
            font-size: 20px;
            color: var(--text);
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        .card{
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 40px;
        }

        .header{ text-align: center; margin-bottom: 28px; }
        .title{ margin: 0 0 8px; font-size: 26px; font-weight: 800; color: #111827; }
        .subtitle{ margin: 0; font-size: 14px; color: var(--muted); }

        /* FORM STYLING */
        .grid{ 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 15px; 
            margin-bottom: 20px;
        }

        .field{ margin-bottom: 20px; }
        label{ 
            display: block; 
            font-size: 13px; 
            font-weight: 700; 
            margin-bottom: 8px; 
            color: #111827;
        }

        .input-group{ position: relative; }
        .input{
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }
        .input:focus{ border-color: var(--green); }

        .toggle{
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--muted);
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .btn{
            width: 100%;
            height: 50px;
            background-color: var(--green);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .btn:hover{ background-color: var(--green-hover); }

        .divider{
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #94a3b8;
            font-size: 12px;
        }
        .divider::before, .divider::after{
            content: "";
            flex: 1;
            height: 1px;
            background: var(--border);
        }
        .divider span{ padding: 0 10px; }

        .footer-link{
            text-align: center;
            font-size: 14px;
            font-weight: 700;
        }
        .footer-link a{
            color: var(--green);
            text-decoration: none;
        }
        .footer-link a:hover{ text-decoration: underline; }

        .error{ color: var(--danger); font-size: 12px; margin-top: 5px; font-weight: 600; }

        @media (max-width: 480px){
            .grid{ grid-template-columns: 1fr; }
            .card{ padding: 25px; }
        }
    </style>
</head>

<body>
<div class="page">
    <div class="wrap">
        <?php
            $selectedPortal = session('public_selected_portal', 'journalist');
            $isMediaHouse = $selectedPortal === 'mass_media';
        ?>
        
        <div class="brand">
            <img src="<?php echo e(asset('zimbabwe_media_commission_transparent_edges.png')); ?>" alt="ZMC Logo">
            <span>ZMC PORTAL</span>
        </div>

        <div class="card">
            <div class="header">
                <h1 class="title">Create Account</h1>
                <p class="subtitle">One account for all ZMC digital services.</p>
            </div>

            <form method="POST" action="<?php echo e(route('auth.register.store')); ?>">

                <?php echo csrf_field(); ?>

                <?php if($isMediaHouse): ?>
                    <div class="field">
                        <label for="organization_name">Organization's Name</label>
                        <input id="organization_name" name="organization_name" type="text" class="input" value="<?php echo e(old('organization_name')); ?>" required autofocus>
                        <?php $__errorArgs = ['organization_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php else: ?>
                    <div class="grid">
                        <div>
                            <label for="first_name">Name</label>
                            <input id="first_name" name="first_name" type="text" class="input" value="<?php echo e(old('first_name')); ?>" required autofocus>
                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="last_name">Surname</label>
                            <input id="last_name" name="last_name" type="text" class="input" value="<?php echo e(old('last_name')); ?>" required>
                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="field">
                    <label for="email">Email Address</label>
                    <input id="email" name="email" type="email" class="input" value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid">
                    <div>
                        <label for="phone_country_code">Phone Country Code</label>
                        <select id="phone_country_code" name="phone_country_code" class="input">
                            <option value="">Select</option>
                            <option value="+263" <?php if(old('phone_country_code')=='+263'): echo 'selected'; endif; ?>>🇿🇼 +263 (Zimbabwe)</option>
                            <option value="+27" <?php if(old('phone_country_code')=='+27'): echo 'selected'; endif; ?>>🇿🇦 +27 (South Africa)</option>
                            <option value="+260" <?php if(old('phone_country_code')=='+260'): echo 'selected'; endif; ?>>🇿🇲 +260 (Zambia)</option>
                            <option value="+258" <?php if(old('phone_country_code')=='+258'): echo 'selected'; endif; ?>>🇲🇿 +258 (Mozambique)</option>
                            <option value="+1" <?php if(old('phone_country_code')=='+1'): echo 'selected'; endif; ?>>🇺🇸 +1 (US/Canada)</option>
                            <option value="+44" <?php if(old('phone_country_code')=='+44'): echo 'selected'; endif; ?>>🇬🇧 +44 (UK)</option>
                        </select>
                        <?php $__errorArgs = ['phone_country_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="phone_number">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="text" class="input" value="<?php echo e(old('phone_number')); ?>">
                        <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="input" required>
                        <button type="button" class="toggle" id="togglePwd"><i class="ri-eye-off-line"></i></button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="input" required>
                        <button type="button" class="toggle" id="togglePwd2"><i class="ri-eye-off-line"></i></button>
                    </div>
                </div>

                <button class="btn" type="submit">
                    <i class="ri-user-add-line"></i> Create Account
                </button>

                <div class="divider">
                    <span>Already have an account?</span>
                </div>

                <div class="footer-link">
                    <a href="<?php echo e(route('login')); ?>">Sign in to your account</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        function setupToggle(btnId, inputId) {
            const btn = document.getElementById(btnId);
            const input = document.getElementById(inputId);
            if (!btn || !input) return;
            btn.addEventListener('click', function () {
                const isPassword = input.getAttribute('type') === 'password';
                input.setAttribute('type', isPassword ? 'text' : 'password');
                btn.querySelector('i').className = isPassword ? 'ri-eye-line' : 'ri-eye-off-line';
            });
        }
        setupToggle('togglePwd', 'password');
        setupToggle('togglePwd2', 'password_confirmation');
    })();
</script>
</body>
</html><?php /**PATH /home/runner/workspace/resources/views/auth/register.blade.php ENDPATH**/ ?>