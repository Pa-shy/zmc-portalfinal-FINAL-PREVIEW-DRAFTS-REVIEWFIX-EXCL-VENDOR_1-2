<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZMC Digital Services</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #1a3a1a;
            --bg-dark-2: #0d2810;
            --zmc-green: #2d5a27;
            --zmc-green-light: #3d7a35;
            --zmc-yellow: #c9a227;
            --zmc-orange: #ea580c;
            --card-bg: rgba(255, 255, 255, 0.08);
            --card-border: rgba(255, 255, 255, 0.15);
            --text-main: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.7);
        }
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: url('{{ asset("zmc_building.png") }}') no-repeat top center fixed;
            background-size: cover;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at top right, rgba(45, 90, 39, 0.45) 0%, rgba(13, 40, 16, 0.6) 100%);
            z-index: -1;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
        }

        .brand img {
            height: 65px;
            margin-bottom: 15px;
            filter: drop-shadow(0 0 15px rgba(250, 204, 21, 0.15));
        }

        .welcome-hero { margin-bottom: 35px; text-align: right; }

        .welcome-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--zmc-yellow);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
            display: block;
        }

        .header-title {
            font-size: 36px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -1px;
            margin: 0;
            color: #ffffff;
        }

        .header-title span.zimbabwe { color: #fff; }
        .header-title span.media { color: #4caf50; }
        .header-title span.commission { color: #fff; }

        .instruction {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 10px;
            letter-spacing: 0.5px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            width: 100%;
        }

        .portal-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 45px 35px;
            border-radius: 8px; /* Slightly softer corners for premium feel */
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            backdrop-filter: blur(25px); /* Increased blur for glassmorphism effect */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-decoration: none;
            color: inherit;
            width: 100%;
            cursor: pointer;
            text-align: left;
        }

        .portal-card:hover {
            border-color: var(--zmc-yellow);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        }

        .portal-card h2 {
            font-size: 20px;
            font-weight: 800;
            text-transform: uppercase;
            margin: 0 0 12px;
            letter-spacing: 1.5px;
            color: var(--zmc-yellow);
        }

        .portal-card p {
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .portal-type {
            font-size: 36px;
            font-weight: 900;
            margin: 15px 0;
            color: var(--text-main);
            letter-spacing: -1px;
        }

        .portal-type span {
            font-size: 10px;
            color: var(--zmc-yellow);
            text-transform: uppercase;
            display: block;
            letter-spacing: 4px;
            margin-bottom: -5px;
            font-weight: 700;
        }

        .btn {
            padding: 14px 30px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            border-radius: 2px;
            transition: all 0.2s ease;
            letter-spacing: 2px;
            display: inline-block;
            border: 1px solid var(--zmc-yellow);
            background: var(--zmc-yellow);
            color: #1a3a1a;
            width: fit-content;
        }

        .portal-card:hover .btn {
            background: transparent;
            color: var(--zmc-yellow);
        }

        .feature-bar {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        .feature-bar span i {
            color: var(--zmc-green);
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .grid { grid-template-columns: 1fr; }
            .header-title { font-size: 28px; }
            .container { padding-top: 60px; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="brand">
        <img src="{{ asset('zimbabwe_media_commission_transparent_edges.png') }}" alt="ZMC Logo">
    </div>

    <div class="welcome-hero">
        <span class="welcome-name">Public Access</span>
        <h1 class="header-title"><span class="zimbabwe">ZIMBABWE</span> <span class="media">MEDIA</span> <span class="commission">COMMISSION</span></h1>
        <p class="instruction">Choose a service stream below to continue (you will be asked to login/signup).</p>
    </div>

    <div class="grid">
        <!-- Media Practitioner / Journalist -->
        <form method="POST" action="{{ route('public.choose_portal') }}">
            @csrf
            <input type="hidden" name="portal" value="journalist">
            <button type="submit" class="portal-card" style="border:none;">
                <div>
                    <h2>Accreditation</h2>
                    <p>Apply for new press cards, renewals, replacements, and manage your journalist profile.</p>
                </div>
                <div class="portal-type">
                    <span>Stream</span>
                    MEDIA PRACTITIONER / JOURNALIST
                </div>
                <div class="btn">Continue</div>
            </button>
        </form>

        <!-- Mass Media -->
        <form method="POST" action="{{ route('public.choose_portal') }}">
            @csrf
            <input type="hidden" name="portal" value="mass_media">
            <button type="submit" class="portal-card" style="border:none;">
                <div>
                    <h2>Registration</h2>
                    <p>Register and manage a media house, renewals, payments, and regulatory notices.</p>
                </div>
                <div class="portal-type">
                    <span>Stream</span>
                    MEDIA HOUSE
                </div>
                <div class="btn">Continue</div>
            </button>
        </form>
    </div>

    <div class="feature-bar">
        <span><i class="ri-checkbox-circle-fill"></i> Secure</span>
        <span><i class="ri-checkbox-circle-fill"></i> Tracking</span>
        <span><i class="ri-checkbox-circle-fill"></i> Verified</span>
        <span><i class="ri-checkbox-circle-fill"></i> 24/7 Access</span>
    </div>
</div>

</body>
</html>
