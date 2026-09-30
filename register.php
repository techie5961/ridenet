<?php
// signup.php - EARNIFY Registration Page
// No actual database logic - pure frontend demo
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Join Earnify · Sign Up</title>
    <link rel="icon" type="image/png" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link href="fonts/fonts.css" rel="stylesheet">
    <style>
        /* ============================================================
           ROOT VARIABLES — EARNIFY BRAND COLORS
           ============================================================ */
        :root {
            --primary-colour: #06140c;
            --secondary-colour: #0b2416;
            --accent: #f26522;
            --gold: #ffd700;
            --primary-background: #06140c;
            --secondary-background: #0b2416;
            --primary-text: #ffffff;
            --secondary-text: #a3c2b0;
            --border: rgba(24, 74, 45, 0.4);
            --white: #ffffff;
            --font-primary: 'Inter', -apple-system, sans-serif;
            --font-secondary: 'Inter', -apple-system, sans-serif;
            --color-primary-green: #008751;
            --color-primary-green-glow: #00ff66;
            --color-accent-orange: #f26522;
            --glow-orange: 0 0 24px rgba(242, 101, 34, 0.5);
            --glow-green: 0 0 28px rgba(0, 255, 102, 0.25);
        }

        /* ============================================================
           RESET & BASE
           ============================================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            background: var(--primary-colour);
            color: var(--primary-text);
            font-family: var(--font-secondary);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        img { max-width: 100%; display: block; }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        /* ============================================================
           UTILITY
           ============================================================ */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .text-center { text-align: center; }
        .gold { color: var(--gold); }
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .justify-between { justify-content: space-between; }
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }
        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 0.75rem; }
        .mt-4 { margin-top: 1rem; }
        .mt-5 { margin-top: 1.25rem; }
        .mt-6 { margin-top: 1.5rem; }
        .mt-8 { margin-top: 2rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .text-sm { font-size: 0.875rem; }
        .text-xs { font-size: 0.75rem; }
        .text-center { text-align: center; }
        .w-full { width: 100%; }
        .relative { position: relative; }
        .absolute { position: absolute; }

        /* ============================================================
           TOPBAR
           ============================================================ */
        .topbar {
            position: relative;
            z-index: 30;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
        }
        .brand img { height: 3rem; width: auto; }
        .public-nav {
            display: none;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
        }
        .public-nav__link {
            color: var(--secondary-text);
            border-radius: 9999px;
            align-items: center;
            min-height: 2.8rem;
            padding-inline: 1.2rem;
            font-size: 0.95rem;
            font-weight: 500;
            display: inline-flex;
            transition: all 0.25s cubic-bezier(0.16,1,0.3,1);
        }
        .public-nav__link:hover,
        .public-nav__link.is-active {
            color: #fff;
            background: rgba(255,255,255,0.08);
        }
        .public-nav__link.is-active { color: var(--gold); }
        .public-nav__cta {
            color: #fff;
            background: var(--accent);
            border-radius: 9999px;
            align-items: center;
            gap: 0.55rem;
            min-height: 2.8rem;
            margin-left: 0.35rem;
            padding-inline: 1.15rem;
            font-size: 0.95rem;
            font-weight: 600;
            display: inline-flex;
            transition: all 0.3s;
            box-shadow: var(--glow-orange);
        }
        .public-nav__cta:hover {
            transform: scale(1.04);
            box-shadow: 0 4px 30px rgba(242, 101, 34, 0.5);
        }
        .menu-button {
            color: #fff;
            background: rgba(255,255,255,0.08);
            border: none;
            border-radius: 9999px;
            place-items: center;
            width: 3rem;
            height: 3rem;
            font-size: 1.5rem;
            cursor: pointer;
            display: grid;
            transition: background 0.3s;
        }
        .menu-button:hover { background: rgba(255,255,255,0.15); }

        /* ============================================================
           SIGNUP FORM
           ============================================================ */
        .signup-section {
            padding: 2rem 1rem 4rem;
            flex: 1;
            display: flex;
            align-items: center;
            min-height: calc(100vh - 200px);
        }
        .signup__inner {
            max-width: 28rem;
            margin: 0 auto;
            width: 100%;
        }
        .signup__card {
            background: rgba(11, 36, 22, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: 2rem;
            padding: 2.5rem 2rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .signup__header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .signup__header .icon {
            font-size: 3rem;
            color: var(--gold);
            display: block;
            margin-bottom: 0.5rem;
        }
        .signup__header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: -0.04em;
            line-height: 1.1;
        }
        .signup__header p {
            color: var(--secondary-text);
            font-size: 0.95rem;
            margin-top: 0.4rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--secondary-text);
            margin-bottom: 0.4rem;
        }
        .form-group label .required {
            color: var(--accent);
            margin-left: 0.2rem;
        }
        .form-group .input-wrapper {
            position: relative;
        }
        .form-group .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-text);
            font-size: 1.1rem;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 3rem;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            border-radius: 1rem;
            color: #fff;
            font-size: 1rem;
            font-family: var(--font-secondary);
            transition: all 0.3s;
            outline: none;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212,175,55,0.15);
            background: rgba(255,255,255,0.08);
        }
        .form-group input::placeholder {
            color: var(--secondary-text);
            opacity: 0.6;
        }
        .form-group select {
            padding-right: 1rem;
            appearance: none;
            cursor: pointer;
        }
        .form-group select option {
            background: var(--primary-colour);
            color: #fff;
        }
        .form-group .input-wrapper .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--secondary-text);
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0.25rem;
            transition: color 0.3s;
        }
        .form-group .input-wrapper .toggle-password:hover {
            color: #fff;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group--checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-top: 0.5rem;
        }
        .form-group--checkbox input[type="checkbox"] {
            width: 1.2rem;
            height: 1.2rem;
            margin-top: 0.15rem;
            accent-color: var(--gold);
            flex-shrink: 0;
            cursor: pointer;
        }
        .form-group--checkbox label {
            font-size: 0.85rem;
            color: var(--secondary-text);
            line-height: 1.4;
            cursor: pointer;
        }
        .form-group--checkbox label a {
            color: var(--gold);
            font-weight: 500;
            transition: color 0.3s;
        }
        .form-group--checkbox label a:hover {
            color: #fff;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: var(--accent);
            border: none;
            border-radius: 1rem;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: var(--glow-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(242, 101, 34, 0.6);
        }
        .btn-submit:active {
            transform: translateY(0);
        }

        .signup__footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--secondary-text);
            font-size: 0.95rem;
        }
        .signup__footer a {
            color: var(--gold);
            font-weight: 600;
            transition: color 0.3s;
        }
        .signup__footer a:hover {
            color: #fff;
        }

        .signup__benefits {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }
        .signup__benefits .benefit {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--secondary-text);
        }
        .signup__benefits .benefit i {
            color: var(--gold);
            font-size: 1rem;
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        .footer {
            background: rgba(0,0,0,0.3);
            color: #fff;
            padding: 2rem 1rem 2.6rem;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }
        .footer__inner {
            max-width: 28rem;
            margin-inline: auto;
            text-align: center;
        }
        .footer__brand {
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            display: flex;
        }
        .footer__logo {
            object-fit: contain;
            width: auto;
            height: 2.5rem;
        }
        .footer__intro {
            color: var(--secondary-text);
            max-width: 22rem;
            margin: 0.75rem auto 0;
            font-size: 0.9rem;
            line-height: 1.33;
        }
        .footer__links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1rem;
        }
        .footer__link {
            color: var(--secondary-text);
            font-size: 0.85rem;
            transition: color 0.3s;
        }
        .footer__link:hover { color: #fff; }
        .footer__copy {
            color: var(--secondary-text);
            font-size: 0.75rem;
            margin-top: 1.5rem;
            opacity: 0.5;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (min-width: 768px) {
            .public-nav { display: flex; }
            .menu-button { display: none; }
            .signup-section { padding: 3rem 2rem 5rem; }
            .signup__inner { max-width: 32rem; }
            .signup__card { padding: 3rem 2.5rem; }
            .signup__header h1 { font-size: 2.6rem; }
            .footer__inner { max-width: 72rem; }
        }

        @media (max-width: 480px) {
            .signup__card { padding: 1.5rem; }
            .form-row { grid-template-columns: 1fr; }
            .signup__benefits { grid-template-columns: 1fr; }
            .signup__header h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    TOPBAR
    ============================================================ -->
    <header class="topbar container">
        <a href="index.php" class="brand">
            <img src="./images/app-logo.png" alt="EARNIFY">
        </a>

        <nav class="public-nav" aria-label="Public navigation">
            <a href="index.php" class="public-nav__link">Home</a>
            <a href="index.php#features" class="public-nav__link">Features</a>
            <a href="index.php#tiers" class="public-nav__link">Pricing Tiers</a>
            <a href="index.php#empowerment" class="public-nav__link">Empowerment</a>
            <a href="index.php#legitimacy" class="public-nav__link">Legitimacy</a>
            <a href="signup.php" class="public-nav__cta">
                <i class="ri-user-add-line"></i>
                <span>Join Us Now</span>
            </a>
        </nav>

        <button type="button" class="menu-button" aria-label="Open menu" id="menuToggle">
            <i class="ri-menu-line"></i>
        </button>
    </header>

    <!-- ============================================================
    SIGNUP FORM
    ============================================================ -->
    <section class="signup-section">
        <div class="signup__inner">

            <div class="signup__card">
                <div class="signup__header">
                    <span class="icon"><i class="ri-user-add-line"></i></span>
                    <h1>Create Your <span class="gold">Earnify</span> Account</h1>
                    <p>Start earning today — it's free and easy</p>
                </div>

                <form id="signupForm" method="POST" action="#">
                    <!-- Full Name -->
                    <div class="form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="ri-user-line"></i>
                            <input type="text" name="fullname" placeholder="e.g. John Doe" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email Address <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="ri-mail-line"></i>
                            <input type="email" name="email" placeholder="you@example.com" required>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label>Phone Number <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="ri-phone-line"></i>
                            <input type="tel" name="phone" placeholder="+234 800 000 0000" required>
                        </div>
                    </div>

                    <!-- Country + Currency Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Country <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="ri-global-line"></i>
                                <select name="country" required>
                                    <option value="">Select</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="GH">Ghana</option>
                                    <option value="KE">Kenya</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Currency <span class="required">*</span></label>
                            <div class="input-wrapper">
                                <i class="ri-money-dollar-circle-line"></i>
                                <select name="currency" required>
                                    <option value="">Select</option>
                                    <option value="NGN">₦ NGN</option>
                                    <option value="USD">$ USD</option>
                                    <option value="EUR">€ EUR</option>
                                    <option value="GBP">£ GBP</option>
                                    <option value="XAF">FCFA XAF</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label>Password <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="ri-lock-line"></i>
                            <input type="password" name="password" id="password" placeholder="Min 8 characters" required minlength="8">
                            <button type="button" class="toggle-password" id="togglePassword" aria-label="Toggle password visibility">
                                <i class="ri-eye-line"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label>Confirm Password <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <i class="ri-lock-2-line"></i>
                            <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm your password" required minlength="8">
                        </div>
                    </div>

                    <!-- Referral Code (optional) -->
                    <div class="form-group">
                        <label>Referral Code <span style="color:var(--secondary-text);font-weight:400;font-size:0.8rem;">(optional)</span></label>
                        <div class="input-wrapper">
                            <i class="ri-gift-line"></i>
                            <input type="text" name="referral" placeholder="Enter referral code if you have one">
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="form-group--checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            I agree to the <a href="#">Terms of Service</a> and 
                            <a href="#">Privacy Policy</a>. I understand that I must be at least 18 years old.
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-submit mt-4">
                        <i class="ri-rocket-2-line"></i> Create Account
                    </button>
                </form>

                <!-- Benefits -->
                <div class="signup__benefits">
                    <span class="benefit"><i class="ri-checkbox-circle-fill"></i> Free registration</span>
                    <span class="benefit"><i class="ri-checkbox-circle-fill"></i> No hidden fees</span>
                    <span class="benefit"><i class="ri-checkbox-circle-fill"></i> 24/7 withdrawal</span>
                    <span class="benefit"><i class="ri-checkbox-circle-fill"></i> Instant rewards</span>
                </div>

                <div class="signup__footer">
                    Already have an account? <a href="login.php">Log in here</a>
                </div>
            </div>

        </div>
    </section>

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__brand">
                <img src="./images/app-logo.png" alt="EARNIFY" class="footer__logo">
            </div>
            <p class="footer__intro">
                Earnify – the digital earning and youth empowerment platform.
                Safe, fast, and secure earnings for everyone.
            </p>
            <div class="footer__links">
                <a href="index.php" class="footer__link">Home</a>
                <a href="index.php#features" class="footer__link">Features</a>
                <a href="index.php#tiers" class="footer__link">Pricing Tiers</a>
                <a href="index.php#empowerment" class="footer__link">Empowerment</a>
                <a href="index.php#legitimacy" class="footer__link">Legitimacy</a>
                <a href="login.php" class="footer__link">Login</a>
            </div>
            <p class="footer__copy">
                &copy; 2026 Earnify · All rights reserved
            </p>
        </div>
    </footer>

    <!-- ============================================================
    MOBILE DRAWER
    ============================================================ -->
    <div class="public-drawer" id="mobileDrawer">
        <button type="button" class="public-drawer__backdrop" id="drawerBackdrop" aria-label="Close menu"></button>
        <aside class="public-drawer__panel">
            <div class="public-drawer__header">
                <a href="index.php" class="brand">
                    <img src="images/app-logo.png?v=1.1" alt="EARNIFY">
                </a>
                <button type="button" class="public-drawer__close" id="drawerClose" aria-label="Close menu">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <nav class="public-drawer__nav">
                <a href="index.php" class="public-drawer__link is-active">
                    <span class="public-drawer__link-icon"><i class="ri-home-5-line"></i></span>
                    <span>Home</span>
                </a>
                <a href="index.php#features" class="public-drawer__link">
                    <span class="public-drawer__link-icon"><i class="ri-star-line"></i></span>
                    <span>Features</span>
                </a>
                <a href="index.php#tiers" class="public-drawer__link">
                    <span class="public-drawer__link-icon"><i class="ri-crown-line"></i></span>
                    <span>Pricing Tiers</span>
                </a>
                <a href="index.php#empowerment" class="public-drawer__link">
                    <span class="public-drawer__link-icon"><i class="ri-graduation-cap-line"></i></span>
                    <span>Empowerment</span>
                </a>
                <a href="index.php#legitimacy" class="public-drawer__link">
                    <span class="public-drawer__link-icon"><i class="ri-shield-check-line"></i></span>
                    <span>Legitimacy</span>
                </a>
                <a href="signup.php" class="public-drawer__cta">
                    <span class="public-drawer__cta-icon"><i class="ri-user-add-line"></i></span>
                    <span>Join Us Now</span>
                </a>
            </nav>
        </aside>
    </div>

    <!-- ============================================================
    JAVASCRIPT
    ============================================================ -->
    <script>
        // ============================================
        // MOBILE DRAWER
        // ============================================
        const menuToggle = document.getElementById('menuToggle');
        const drawer = document.getElementById('mobileDrawer');
        const drawerClose = document.getElementById('drawerClose');
        const drawerBackdrop = document.getElementById('drawerBackdrop');

        function openDrawer() {
            drawer.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            drawer.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        if (menuToggle) menuToggle.addEventListener('click', openDrawer);
        if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
        if (drawerBackdrop) drawerBackdrop.addEventListener('click', closeDrawer);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeDrawer();
        });

        // ============================================
        // PASSWORD TOGGLE
        // ============================================
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').className = type === 'password' ? 'ri-eye-line' : 'ri-eye-off-line';
            });
        }

        // ============================================
        // FORM SUBMISSION (demo)
        // ============================================
        const signupForm = document.getElementById('signupForm');

        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('terms');

            if (password !== confirmPassword) {
                alert('Passwords do not match. Please try again.');
                return;
            }

            if (!terms.checked) {
                alert('Please agree to the Terms of Service and Privacy Policy.');
                return;
            }

            // Simulate successful registration
            alert('🎉 Account created successfully! Welcome to Earnify.\n\nYou will receive a confirmation email shortly.');

            // In a real implementation, you would submit the form data via AJAX or standard POST
            // this.submit();
        });

        console.log('🚀 EARNIFY – Sign up page loaded');
    </script>

    <style>
        /* drawer styles (minimal) */
        .public-drawer {
            position: fixed;
            inset: 0;
            z-index: 2000;
            pointer-events: none;
        }
        .public-drawer__backdrop {
            opacity: 0;
            backdrop-filter: blur(4px);
            background: rgba(2,6,23,0.65);
            transition: opacity 0.3s;
            position: absolute;
            inset: 0;
            border: none;
            cursor: pointer;
        }
        .public-drawer__panel {
            background: linear-gradient(180deg, rgba(6,20,12,0.98) 0%, rgba(0,0,0,0.99) 100%);
            flex-direction: column;
            gap: 2rem;
            width: min(24rem, 100%);
            height: 100%;
            margin-left: auto;
            padding: 2rem 2rem 2.5rem;
            transition: transform 0.45s cubic-bezier(0.16,1,0.3,1);
            display: flex;
            position: relative;
            transform: translateX(100%);
            border-left: 1px solid var(--border);
        }
        .public-drawer.is-open { pointer-events: auto; }
        .public-drawer.is-open .public-drawer__backdrop { opacity: 1; }
        .public-drawer.is-open .public-drawer__panel { transform: translateX(0); }
        .public-drawer__header {
            border-bottom: 1px solid var(--border);
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1.2rem;
            display: flex;
        }
        .public-drawer__close {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.8rem;
            cursor: pointer;
            opacity: 0.8;
            transition: transform 0.25s, opacity 0.25s;
        }
        .public-drawer__close:hover {
            opacity: 1;
            transform: rotate(90deg);
        }
        .public-drawer__nav {
            gap: 0.35rem;
            margin-top: 0.5rem;
            display: grid;
        }
        .public-drawer__link {
            color: var(--secondary-text);
            font-size: 1.45rem;
            font-weight: 600;
            line-height: 1.2;
            font-family: var(--font-primary);
            letter-spacing: -0.02em;
            border-radius: 0.75rem;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            margin-inline: -0.85rem;
            padding: 0.8rem 0.85rem;
            display: flex;
            transition: all 0.3s;
        }
        .public-drawer__link:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
            padding-left: 1.25rem;
        }
        .public-drawer__link.is-active {
            color: var(--gold);
            background: rgba(212,175,55,0.06);
            padding-left: 1.25rem;
        }
        .public-drawer__link-icon {
            color: rgba(255,255,255,0.8);
            background: rgba(255,255,255,0.05);
            border-radius: 9999px;
            flex-shrink: 0;
            place-items: center;
            width: 2.15rem;
            height: 2.15rem;
            font-size: 1rem;
            display: grid;
        }
        .public-drawer__cta {
            color: #fff;
            background: var(--accent);
            border-radius: 1rem;
            align-items: center;
            gap: 0.9rem;
            width: 100%;
            margin-top: 1.1rem;
            padding: 0.95rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            display: inline-flex;
            justify-content: center;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            box-shadow: var(--glow-orange);
        }
        .public-drawer__cta:hover { transform: scale(1.02); }
        .public-drawer__cta-icon { font-size: 1.1rem; }
    </style>

</body>
</html>