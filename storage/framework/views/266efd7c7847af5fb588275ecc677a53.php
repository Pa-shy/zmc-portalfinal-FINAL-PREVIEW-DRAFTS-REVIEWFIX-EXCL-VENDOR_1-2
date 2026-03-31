<!doctype html>
<html lang="<?php echo e(str_replace("_", "-", app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZMC Digital Services</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root {
            --gold: #facc15;
            --gold-dark: #d4a90a;
            --green-dark: #1b4332;
            --green-medium: #2d6a4f;
            --text-white: #ffffff;
            --text-light: rgba(255,255,255,0.85);
            --text-muted: rgba(255,255,255,0.6);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .bg-layer {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: #0a1f0d url('/zmc_building.png') no-repeat center center;
            background-size: cover;
            z-index: 0;
        }

        .bg-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(
                160deg,
                rgba(10, 31, 13, 0.88) 0%,
                rgba(27, 67, 50, 0.78) 40%,
                rgba(45, 106, 79, 0.68) 100%
            );
            z-index: 1;
        }

        .page-wrapper {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .brand {
            text-align: center;
            margin-bottom: 8px;
        }

        .brand img {
            height: 100px;
            width: 100px;
            background: white;
            padding: 8px;
            border-radius: 50%;
            object-fit: contain;
            box-shadow: 0 4px 24px rgba(0,0,0,0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header-label {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 12px;
            padding: 6px 16px;
            border: 1px solid rgba(250, 204, 21, 0.3);
            border-radius: 20px;
            background: rgba(250, 204, 21, 0.08);
        }

        .header-title {
            font-size: 36px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 12px;
            color: var(--text-white);
            line-height: 1.1;
        }

        .header-title .highlight-green { color: #66bb6a; }
        .header-title .highlight-gold { color: #ffffff; }

        .header-subtitle {
            font-size: 15px;
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            width: 100%;
            max-width: 900px;
            margin-bottom: 32px;
        }

        .portal-form {
            display: flex;
        }

        .portal-card {
            font-family: inherit;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 36px 32px 32px;
            cursor: pointer;
            text-align: left;
            color: var(--text-white);
            width: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .portal-card:hover {
            background: rgba(255, 255, 255, 0.10);
            border-color: var(--gold);
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(250, 204, 21, 0.2);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .card-icon.accreditation {
            background: rgba(102, 187, 106, 0.15);
            color: #81c784;
        }

        .card-icon.registration {
            background: rgba(250, 204, 21, 0.15);
            color: var(--gold);
        }

        .card-title {
            font-size: 20px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: var(--text-white);
        }

        .card-desc {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 24px;
            flex: 1;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-stream {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
        }

        .card-stream strong {
            display: block;
            font-size: 14px;
            color: var(--text-light);
            letter-spacing: 0;
            margin-top: 2px;
        }

        .card-arrow {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gold);
            color: var(--green-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .portal-card:hover .card-arrow {
            transform: translateX(3px);
            box-shadow: 0 4px 12px rgba(250, 204, 21, 0.4);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
        }

        .feature-item i {
            color: var(--gold);
            font-size: 14px;
        }

        .staff-link {
            position: fixed;
            bottom: 20px;
            right: 24px;
            z-index: 10;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            background: rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.2s ease;
        }

        .staff-link:hover {
            color: var(--gold);
            border-color: rgba(250, 204, 21, 0.3);
        }

        .staff-link i { margin-right: 4px; }

        @media (max-width: 768px) {
            .cards-grid { grid-template-columns: 1fr; max-width: 420px; }
            .header-title { font-size: 28px; }
            .page-wrapper { padding: 30px 16px; }
            .features { gap: 16px; }
            .portal-card { padding: 28px 24px 24px; }
        }

        @media (max-width: 480px) {
            .header-title { font-size: 22px; }
            .header-subtitle { font-size: 13px; }
        }
    </style>
</head>
<body class="landing-page">

<div class="bg-layer"></div>
<div class="bg-overlay"></div>

<div class="page-wrapper">
    <div class="brand">
        <img src="/zmc_logo.png" alt="ZMC Logo">
    </div>

    <div class="header">
        <div class="header-label">Digital Services Portal</div>
        <h1 class="header-title">
            Zimbabwe <span class="highlight-green">Media</span> <span class="highlight-gold">Commission</span>
        </h1>
        <p class="header-subtitle">Select a service stream below to get started with your application.</p>
    </div>

    <div class="cards-grid">
        <form method="POST" action="<?php echo e(route('public.choose_portal')); ?>" class="portal-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="portal" value="journalist">
            <button type="submit" class="portal-card">
                <div class="card-icon accreditation">
                    <i class="ri-id-card-line"></i>
                </div>
                <div class="card-title">Accreditation</div>
                <div class="card-desc">Apply for new press cards, renewals, replacements, and manage your media practitioner profile.</div>
                <div class="card-footer">
                    <div class="card-stream">
                        Stream
                        <strong>Media Practitioner</strong>
                    </div>
                    <div class="card-arrow">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </button>
        </form>

        <form method="POST" action="<?php echo e(route('public.choose_portal')); ?>" class="portal-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="portal" value="mass_media">
            <button type="submit" class="portal-card">
                <div class="card-icon registration">
                    <i class="ri-building-2-line"></i>
                </div>
                <div class="card-title">Registration</div>
                <div class="card-desc">Register and manage a media house, renewals, payments, and regulatory notices.</div>
                <div class="card-footer">
                    <div class="card-stream">
                        Stream
                        <strong>Media House</strong>
                    </div>
                    <div class="card-arrow">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </div>
            </button>
        </form>
    </div>

    <div class="features">
        <div class="feature-item"><i class="ri-shield-check-fill"></i> Secure</div>
        <div class="feature-item"><i class="ri-time-fill"></i> Real-time Tracking</div>
        <div class="feature-item"><i class="ri-verified-badge-fill"></i> Verified</div>
        <div class="feature-item"><i class="ri-24-hours-fill"></i> 24/7 Access</div>
    </div>
</div>

<a href="<?php echo e(route('staff.login')); ?>" class="staff-link">
    <i class="ri-lock-line"></i> Staff Portal
</a>

</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/home.blade.php ENDPATH**/ ?>