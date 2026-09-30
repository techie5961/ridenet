<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>RideNet · Connecting Rides. Creating Wealth.</title>
    <link rel="icon" type="image/png" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link href="{{ asset('vitecss/fonts/fonts/fonts.css?v=20.4') }}" rel="stylesheet">

    <style>
        /* ============================================================
           ROOT VARIABLES - RIDENET
           ============================================================ */
        :root {
            --primary: #317318;
            --primary-light: #4eac2c;
            --primary-lighter: #82ff55;
            --primary-dark: #245313;
            --primary-darker: #14300b;

            --primary-colour: var(--primary-dark);
            --secondary-colour: var(--primary);
            --accent: var(--primary-lighter);
            --primary-background: var(--primary-dark);
            --secondary-background: var(--primary-darker);

            --primary-text: #ffffff;
            --secondary-text: rgba(255,255,255,0.7);
            --border: rgba(255,255,255,0.08);
            --white: #ffffff;

            --font-primary: 'Vite Sans Display','Inter', -apple-system, sans-serif;
            --font-secondary: 'Vite Sans Display','Inter', -apple-system, sans-serif;

            --color-primary-green: var(--primary);
            --color-primary-green-glow: var(--primary-lighter);
            --color-deep-green: var(--primary-darker);
            --color-light-green: var(--primary-light);
        }

        /* ============================================================
           RESET & BASE
           ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--primary-colour);
            color: var(--primary-text);
            font-family: var(--font-secondary);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        /* ============================================================
           UTILITY
           ============================================================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .text-center {
            text-align: center;
        }

        .gold {
            color: var(--accent);
        }

        .z-1 { z-index: 1; }
        .z-2 { z-index: 2; }
        .z-3 { z-index: 3; }
        .z-4 { z-index: 4; }
        .z-5 { z-index: 5; }

        .relative { position: relative; }
        .absolute { position: absolute; }
        .w-full { width: 100%; }
        .mx-auto { margin-inline: auto; }

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

        .text-sm { font-size: 0.875rem; }
        .text-xs { font-size: 0.75rem; }

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

        .brand img {
            height: 3rem;
            width: auto;
        }

        .public-nav {
            display: none;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
        }

        .public-nav__link {
            color: rgba(255,255,255,0.85);
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
            background: rgba(255,255,255,0.12);
        }

        .public-nav__link.is-active {
            color: var(--accent);
        }

        .public-nav__cta {
            color: var(--primary-colour);
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
        }

        .public-nav__cta:hover {
            transform: scale(1.04);
            box-shadow: 0 4px 20px rgba(130,255,85,0.3);
        }

        .menu-button {
            color: #fff;
            background: rgba(255,255,255,0.1);
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

        .menu-button:hover {
            background: rgba(255,255,255,0.18);
        }

        /* ============================================================
           HERO
           ============================================================ */
        .hero {
            background:
                linear-gradient(
                    180deg,
                    #000 0%,
                    rgba(20,48,11,0.45) 26%,
                    #000 100%
                ),
                var(--hero-bg-mobile, var(--primary-dark))
                center/cover no-repeat;
            min-height: 100svh;
            position: relative;
        }

        .hero__inner {
            flex-direction: column;
            max-width: 28rem;
            min-height: 100svh;
            margin-inline: auto;
            padding: 1.75rem 1.25rem 2rem;
            display: flex;
            position: relative;
        }

        .hero__content {
            margin-top: 6rem;
        }

        .hero__title {
            color: #fff;
            letter-spacing: -0.05em;
            font-weight: 900;
            line-height: 0.92;
            font-size: 3rem;
        }

        .hero__title .gold {
            background: linear-gradient(
                135deg,
                var(--primary-lighter),
                var(--primary-light)
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero__copy {
            color: rgba(255,255,255,0.88);
            margin-top: 1rem;
            font-size: 0.98rem;
            line-height: 1.35;
        }

        .hero__actions {
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1.8rem;
            display: flex;
        }

        .pill-button {
            border-radius: 9999px;
            justify-content: center;
            align-items: center;
            min-height: 3.3rem;
            padding-inline: 1.5rem;
            font-size: 1rem;
            font-weight: 700;
            display: inline-flex;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            gap: 0.5rem;
        }

        .pill-button--primary {
            color: #fff;
            background: var(--primary);
            box-shadow: 0 14px 30px rgba(49,115,24,0.3);
        }

        .pill-button--primary:hover {
            transform: translateY(-2px);
            background: var(--primary-light);
            box-shadow: 0 8px 30px rgba(78,172,44,0.4);
        }

        .pill-button--ghost {
            color: #fff;
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .pill-button--ghost:hover {
            background: rgba(255,255,255,0.15);
        }

        .pill-button--light {
            color: var(--primary-darker);
            background: #fff;
            box-shadow: 0 20px 45px rgba(0,0,0,0.24);
        }

        .pill-button--light:hover {
            transform: translateY(-2px);
            box-shadow: 0 24px 55px rgba(0,0,0,0.3);
        }

        .hero__badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .hero__badge {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.6);
            background: rgba(255,255,255,0.05);
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            border: 1px solid rgba(255,255,255,0.06);
        }

        .hero__badge i {
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* ============================================================
           HERO VISUAL
           ============================================================ */
        .hero__visual {
            min-height: 24rem;
            margin-top: auto;
            position: relative;
        }

        .hero-bubble {
            backdrop-filter: blur(12px);
            background: rgba(20,48,11,0.82);
            border: 1px solid rgba(130,255,85,0.15);
            border-radius: 1.25rem;
            padding: 0.8rem 0.95rem;
            position: absolute;
            box-shadow: 0 20px 42px rgba(0,0,0,0.24);
            animation: float 6s ease-in-out infinite;
        }

        .hero-bubble--chat {
            top: 1.2rem;
            left: 0;
            animation-delay: 0s;
        }

        .hero-bubble--call {
            top: 30%;
            right: 0;
            animation-delay: 2s;
        }

        .hero-bubble--earn {
            bottom: 6rem;
            left: 0;
            animation-delay: 4s;
        }

        .hero-bubble--secure {
            bottom: 0;
            right: 0;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }

        .hero-bubble__row {
            align-items: center;
            gap: 0.7rem;
            display: flex;
        }

        .hero-avatar {
            color: #fff;
            background: var(--primary);
            border-radius: 9999px;
            place-items: center;
            width: 2.6rem;
            height: 2.6rem;
            font-size: 0.95rem;
            font-weight: 700;
            display: grid;
            flex-shrink: 0;
        }

        .hero-bubble__title {
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1;
        }

        .hero-bubble__copy {
            color: rgba(255,255,255,0.78);
            margin-top: 0.25rem;
            font-size: 0.82rem;
        }

        .hero-bubble .gold-icon {
            color: var(--accent);
            font-size: 1.6rem;
        }

        .hero-bubble .bubble-value {
            font-weight: 700;
            color: var(--accent);
            font-size: 0.95rem;
        }

        /* ============================================================
           BANNER
           ============================================================ */
        .banner {
            background: var(--primary-colour);
            padding: 2rem 1rem 2.8rem;
        }

        .banner__container {
            max-width: 28rem;
            margin-inline: auto;
        }

        .banner__title {
            max-width: 21rem;
            font-family: var(--font-primary);
            letter-spacing: -0.05em;
            color: #fff;
            font-size: 2rem;
            font-weight: 600;
            line-height: 0.94;
        }

        .banner__inner {
            flex-direction: column;
            gap: 1.65rem;
            margin-top: 1.5rem;
            display: flex;
        }

        .banner__media {
            border-radius: 1.8rem;
            overflow: hidden;
            background: var(--primary-darker);
        }

        .banner__image {
            width: 100%;
            height: auto;
            display: block;
        }

        .banner__body {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            line-height: 1.42;
        }

        .banner__body p + p {
            margin-top: 0.85rem;
        }

        /* ============================================================
           RIDENET BRAND SECTION
           ============================================================ */
        .socialfi {
            text-align: center;
            background:
                linear-gradient(
                    #000 0%,
                    var(--primary-darker) 55%,
                    var(--primary) 100%
                );
            padding: 16rem 1.25rem 0;
            position: relative;
            overflow: hidden;
        }

        .socialfi__inner {
            max-width: 28rem;
            margin-inline: auto;
            padding-bottom: 11rem;
            position: relative;
        }

        .socialfi__card {
            backdrop-filter: blur(8px);
            z-index: 10;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(130,255,85,0.15);
            border-radius: 1.55rem;
            width: 7.9rem;
            padding: 0.9rem 0.78rem 0.85rem;
            position: absolute;
        }

        .socialfi__card--top {
            top: -8rem;
            right: 8rem;
            transform: rotate(12deg);
        }

        .socialfi__card--bottom {
            top: 11rem;
            left: 50%;
            transform: translate(-50%) rotate(-13deg);
        }

        .socialfi__card-avatar {
            color: #fff;
            background: var(--primary);
            border-radius: 9999px;
            place-items: center;
            width: 3rem;
            height: 3rem;
            margin-inline: auto;
            font-size: 1rem;
            font-weight: 700;
            display: grid;
        }

        .socialfi__card-name {
            margin-top: 0.55rem;
            font-size: 1.2rem;
            font-weight: 500;
            line-height: 1;
        }

        .socialfi__arrow-1 {
            width: 6rem;
            position: absolute;
            top: 1rem;
            right: 2rem;
            rotate: 56deg;
        }

        .socialfi__arrow-2 {
            width: 7rem;
            position: absolute;
            top: 8rem;
            left: 0;
            rotate: 10deg;
        }

        .socialfi__hash {
            position: absolute;
            top: -2rem;
            left: 3rem;
            font-size: 4rem;
            color: rgba(130,255,85,0.08);
        }

        .socialfi__text {
            font-family: var(--font-primary);
            letter-spacing: -0.07em;
            font-size: 5.8rem;
            font-weight: 800;
            line-height: 0.86;
            position: relative;
        }

        .socialfi__copy {
            color: rgba(255,255,255,0.88);
            margin: 6.5rem auto 0;
            font-size: 1rem;
            line-height: 1.32;
            max-width: 22rem;
        }

        .socialfi__cta {
            margin-top: 2.4rem;
        }

        /* ============================================================
           FEATURES
           ============================================================ */
        .features {
            background: var(--primary-colour);
            padding: 4.8rem 1.25rem 4rem;
        }

        .features__inner {
            max-width: 28rem;
            margin-inline: auto;
        }

        .features__title {
            font-family: var(--font-primary);
            letter-spacing: -0.05em;
            text-align: center;
            color: #fff;
            font-size: 3rem;
            font-weight: 700;
            line-height: 0.94;
        }

        .features__copy {
            text-align: center;
            color: rgba(255,255,255,0.7);
            margin-top: 0.35rem;
            font-size: 1rem;
        }

        .features__underline {
            background: var(--accent);
            border-radius: 9999px;
            width: 4rem;
            height: 0.25rem;
            margin: 1rem auto 0;
        }

        .feature-stack {
            gap: 1.25rem;
            margin-top: 2.6rem;
            display: grid;
        }

        .feature-card {
            border-radius: 2rem;
            overflow: hidden;
            background: rgba(20,48,11,0.65);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(130,255,85,0.08);
            padding: 2rem 1.5rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: rgba(130,255,85,0.25);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .feature-card__icon {
            font-size: 2.6rem;
            color: var(--accent);
            margin-bottom: 0.75rem;
            display: block;
        }

        .feature-card__icon i {
            background: rgba(130,255,85,0.1);
            padding: 0.75rem;
            border-radius: 1rem;
            display: inline-block;
        }

        .feature-card__heading {
            font-family: var(--font-primary);
            color: #fff;
            font-size: 1.4rem;
            font-weight: 700;
            line-height: 1.1;
        }

        .feature-card__text {
            color: rgba(255,255,255,0.7);
            margin-top: 0.6rem;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .feature-card__reward {
            display: inline-block;
            margin-top: 1rem;
            background: rgba(130,255,85,0.12);
            color: var(--accent);
            padding: 0.3rem 1.2rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(130,255,85,0.15);
        }

        .feature-card__button {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 1rem;
            color: var(--accent);
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .feature-card__button:hover {
            color: #fff;
            transform: translateX(4px);
        }

        .feature-card--dashboard {
            background: linear-gradient(
                135deg,
                rgba(78,172,44,0.2),
                rgba(20,48,11,0.65)
            );
        }

        .feature-card--voicevault {
            background: linear-gradient(
                135deg,
                rgba(20,48,11,0.8),
                rgba(78,172,44,0.2)
            );
        }

        .feature-card--lingua {
            background: rgba(20,48,11,0.7);
        }

        .feature-card--connection {
            background: linear-gradient(
                135deg,
                rgba(130,255,85,0.1),
                rgba(20,48,11,0.6)
            );
        }

        /* ============================================================
           TESTIMONIAL / RIDENET EXPLAINER
           ============================================================ */
        .testimonial {
            background: var(--primary-colour);
            padding: 4.4rem 1.25rem 2.5rem;
        }

        .testimonial__inner {
            max-width: 28rem;
            margin-inline: auto;
        }

        .testimonial__eyebrow {
            color: var(--accent);
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.1;
        }

        .testimonial__head {
            justify-content: space-between;
            align-items: flex-start;
            gap: 1.2rem;
            margin-top: 0.8rem;
            display: flex;
        }

        .testimonial__title {
            max-width: 16rem;
            font-family: var(--font-primary);
            letter-spacing: -0.04em;
            font-size: 2rem;
            font-weight: 600;
            line-height: 1.02;
            color: #fff;
        }

        .testimonial__nav {
            color: rgba(255,255,255,0.5);
            gap: 0.6rem;
            display: flex;
        }

        .testimonial__nav-button {
            background: rgba(255,255,255,0.06);
            border: none;
            border-radius: 9999px;
            place-items: center;
            width: 2.25rem;
            height: 2.25rem;
            font-size: 1.35rem;
            display: grid;
            cursor: pointer;
            color: #fff;
            transition: background 0.3s;
        }

        .testimonial__nav-button:hover {
            background: rgba(255,255,255,0.12);
        }

        .testimonial__stars {
            color: var(--accent);
            gap: 0.28rem;
            margin-top: 1.55rem;
            font-size: 1.1rem;
            display: flex;
        }

        .testimonial__quote {
            color: rgba(255,255,255,0.7);
            max-width: 22rem;
            margin-top: 1rem;
            font-size: 0.98rem;
            line-height: 1.38;
        }

        .testimonial__person {
            align-items: center;
            gap: 0.95rem;
            margin-top: 1.3rem;
            display: flex;
        }

        .testimonial__avatar {
            border-radius: 9999px;
            width: 3.3rem;
            height: 3.3rem;
            object-fit: cover;
        }

        .testimonial__avatar--fallback {
            color: #fff;
            background: var(--primary);
            place-items: center;
            font-size: 1rem;
            font-weight: 700;
            display: grid;
        }

        .testimonial__name {
            font-family: var(--font-primary);
            color: #fff;
            font-size: 1.13rem;
            font-weight: 600;
            line-height: 1;
        }

        .testimonial__role {
            color: rgba(255,255,255,0.5);
            margin-top: 0.2rem;
            font-size: 0.95rem;
        }

        /* ============================================================
           STATS
           ============================================================ */
        .stats {
            background: rgba(0,0,0,0.15);
            padding: 2rem 1.25rem 4.8rem;
        }

        .stats__inner {
            text-align: center;
            gap: 2.45rem;
            max-width: 28rem;
            margin-inline: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .stats__value {
            font-family: var(--font-primary);
            letter-spacing: -0.05em;
            color: var(--accent);
            font-size: 3.2rem;
            font-weight: 700;
            line-height: 0.9;
        }

        .stats__label {
            font-family: var(--font-primary);
            color: rgba(255,255,255,0.7);
            margin-top: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.05;
        }

        /* ============================================================
           FAQ
           ============================================================ */
        .faq {
            background: rgba(0,0,0,0.1);
            padding: 4.3rem 1rem 3rem;
        }

        .faq__inner {
            max-width: 28rem;
            margin-inline: auto;
        }

        .faq__eyebrow {
            color: var(--accent);
            font-size: 1rem;
            font-weight: 500;
        }

        .faq__title {
            max-width: 19rem;
            font-family: var(--font-primary);
            letter-spacing: -0.06em;
            color: #fff;
            margin-top: 0.35rem;
            font-size: 2rem;
            font-weight: 600;
            line-height: 0.9;
        }

        .faq__list {
            border-top: 1px solid rgba(255,255,255,0.06);
            margin-top: 2.6rem;
        }

        .faq__item {
            border-bottom: 1px solid rgba(255,255,255,0.06);
            padding-block: 1.5rem;
        }

        .faq__summary {
            cursor: pointer;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            list-style: none;
            display: flex;
        }

        .faq__summary::-webkit-details-marker {
            display: none;
        }

        .faq__question {
            max-width: 18rem;
            font-family: var(--font-primary);
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.08;
        }

        .faq__icon {
            color: #fff;
            background: rgba(255,255,255,0.06);
            border-radius: 9999px;
            flex-shrink: 0;
            place-items: center;
            width: 2.75rem;
            height: 2.75rem;
            font-size: 1.2rem;
            display: grid;
            transition: all 0.3s;
        }

        .faq__item[open] .faq__icon {
            color: var(--accent);
            background: rgba(130,255,85,0.15);
        }

        .faq__answer {
            color: rgba(255,255,255,0.7);
            max-width: 19rem;
            padding: 1.15rem 1.2rem 0 0.15rem;
            font-size: 0.98rem;
            line-height: 1.32;
        }

        /* ============================================================
           CTA
           ============================================================ */
        .cta {
            color: #fff;
            background: var(--primary-colour);
            padding: 3rem 1rem 3.5rem;
        }

        .cta__inner {
            max-width: 28rem;
            margin-inline: auto;
        }

        .cta__card {
            text-align: center;
            background: linear-gradient(
                40deg,
                rgba(20,48,11,0.8) 0%,
                rgba(78,172,44,0.18) 100%
            );
            border: 1px solid rgba(130,255,85,0.12);
            border-radius: 1.9rem;
            padding: 2.35rem 1.4rem 2.55rem;
            overflow: hidden;
        }

        .cta__title {
            font-family: var(--font-primary);
            letter-spacing: -0.05em;
            color: var(--white);
            font-size: 2rem;
            font-weight: 600;
            line-height: 0.98;
        }

        .cta__copy {
            color: rgba(255,255,255,0.88);
            max-width: 18rem;
            margin: 0.95rem auto 0;
            font-size: 1rem;
            line-height: 1.34;
        }

        .cta__action {
            margin-top: 2rem;
        }

        .cta__button {
            color: var(--primary-darker);
            background: var(--accent);
            width: 100%;
            max-width: 20rem;
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        .footer {
            background: rgba(0,0,0,0.3);
            color: #fff;
            padding: 2rem 1rem 2.6rem;
            border-top: 1px solid rgba(255,255,255,0.04);
        }

        .footer__inner {
            max-width: 28rem;
            margin-inline: auto;
        }

        .footer__brand {
            align-items: center;
            gap: 0.65rem;
            display: flex;
        }

        .footer__logo {
            object-fit: contain;
            width: auto;
            height: 3rem;
        }

        .footer__intro {
            color: rgba(255,255,255,0.92);
            max-width: 22rem;
            margin-top: 1.5rem;
            font-size: 1rem;
            line-height: 1.33;
        }

        .footer__group {
            margin-top: 2rem;
        }

        .footer__heading {
            font-family: var(--font-primary);
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 500;
            line-height: 1;
        }

        .footer__links {
            gap: 0.75rem;
            margin-top: 1.25rem;
            display: grid;
        }

        .footer__link {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
            transition: color 0.3s;
        }

        .footer__link:hover {
            color: #fff;
        }

        .footer__support-copy {
            color: rgba(255,255,255,0.92);
            max-width: 22rem;
            margin-top: 1.3rem;
            font-size: 1rem;
            line-height: 1.33;
        }

        .footer__support-highlight {
            color: var(--accent);
            display: block;
            margin-top: 0.3rem;
        }

        .footer__support-highlight i {
            margin-right: 0.4rem;
        }

        /* ============================================================
           MOBILE DRAWER
           ============================================================ */
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
            background: linear-gradient(
                180deg,
                rgba(36,83,19,0.97) 0%,
                rgba(0,0,0,0.98) 100%
            );
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
            border-left: 1px solid rgba(255,255,255,0.05);
        }

        .public-drawer.is-open {
            pointer-events: auto;
        }

        .public-drawer.is-open .public-drawer__backdrop {
            opacity: 1;
        }

        .public-drawer.is-open .public-drawer__panel {
            transform: translateX(0);
        }

        .public-drawer__header {
            border-bottom: 1px solid rgba(255,255,255,0.08);
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
            color: rgba(255,255,255,0.85);
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
            background: rgba(255,255,255,0.08);
            padding-left: 1.25rem;
        }

        .public-drawer__link.is-active {
            color: var(--accent);
            background: rgba(130,255,85,0.1);
            padding-left: 1.25rem;
        }

        .public-drawer__link-icon {
            color: rgba(255,255,255,0.92);
            background: rgba(255,255,255,0.08);
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
            background: var(--primary);
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
        }

        .public-drawer__cta:hover {
            transform: scale(1.02);
            background: var(--primary-light);
        }

        .public-drawer__cta-icon {
            font-size: 1.1rem;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (min-width: 768px) {
            .public-nav {
                display: flex;
            }

            .menu-button {
                display: none;
            }

            .hero__inner,
            .socialfi__inner,
            .features__inner,
            .testimonial__inner,
            .stats__inner,
            .faq__inner,
            .cta__inner,
            .footer__inner,
            .banner__container {
                max-width: 72rem;
            }

            .hero__inner {
                padding: 2.25rem 2rem 3rem;
            }

            .hero__content {
                max-width: 42rem;
                margin-top: 8rem;
            }

            .hero__title {
                font-size: 5rem;
            }

            .hero__copy {
                font-size: 1.18rem;
            }

            .hero__visual {
                min-height: 30rem;
            }

            .socialfi {
                padding: 16rem 2rem 0;
            }

            .socialfi__text {
                font-size: 10rem;
            }

            .socialfi__card {
                width: 9.2rem;
            }

            .socialfi__card--top {
                top: -7rem;
                right: 40%;
            }

            .socialfi__card--bottom {
                top: 21rem;
            }

            .socialfi__arrow-1 {
                width: 10rem;
                top: 1rem;
                right: 18rem;
                rotate: 56deg;
            }

            .socialfi__arrow-2 {
                z-index: 1;
                width: 12rem;
                top: 14rem;
                left: 17rem;
                rotate: 10deg;
            }

            .socialfi__hash {
                z-index: 1;
                font-size: 6rem;
                top: -2rem;
                left: 19rem;
            }

            .socialfi__copy {
                max-width: 31rem;
                font-size: 1.15rem;
            }

            .features {
                padding: 6rem 2rem;
            }

            .features__title {
                font-size: 4.4rem;
            }

            .feature-stack {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .banner {
                padding: 3rem 2rem 4.5rem;
            }

            .banner__container {
                max-width: 72rem;
            }

            .banner__title {
                max-width: 32rem;
                font-size: 4rem;
            }

            .banner__inner {
                display: grid;
                grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
                gap: 2.5rem;
                align-items: start;
                margin-top: 1.8rem;
            }

            .banner__inner--image-after .banner__media {
                order: 2;
            }

            .banner__inner--image-after .banner__content {
                order: 1;
            }

            .banner__body {
                max-width: 32rem;
                font-size: 1.05rem;
            }

            .testimonial {
                padding: 5.2rem 2rem 3rem;
            }

            .testimonial__title {
                max-width: 22rem;
                font-size: 3rem;
            }

            .testimonial__quote {
                max-width: 33rem;
                font-size: 1.08rem;
            }

            .stats {
                padding: 2rem 2rem 6rem;
            }

            .stats__inner {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }

            .stats__value {
                font-size: 5.2rem;
            }

            .faq__inner,
            .cta__inner,
            .footer__inner {
                max-width: 72rem;
            }

            .faq,
            .cta,
            .footer {
                padding-inline: 2rem;
            }

            .faq__title {
                max-width: 24rem;
                font-size: 4rem;
            }

            .faq__question {
                max-width: 28rem;
            }

            .faq__answer {
                max-width: 30rem;
            }

            .cta__card {
                padding-inline: 3rem;
            }

            .cta__copy {
                max-width: 24rem;
            }

            .cta__button {
                width: auto;
                min-width: 22rem;
            }

            .footer__intro,
            .footer__support-copy {
                max-width: 34rem;
            }

            .footer__inner {
                display: grid;
                grid-template-columns: 2fr 1fr 1.5fr;
                gap: 3rem;
            }

            .footer__group {
                margin-top: 0;
            }
        }

        @media (max-width: 767px) {
            .stats__inner {
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }

            .hero-bubble--call,
            .hero-bubble--earn,
            .hero-bubble--secure {
                display: none;
            }

            .hero__visual {
                min-height: 12rem;
            }

            .hero-bubble--chat {
                position: relative;
                top: auto;
                left: auto;
                margin-top: 1.5rem;
                display: inline-block;
            }

            .feature-stack {
                grid-template-columns: 1fr;
            }

            .socialfi__hash {
                display: none;
            }

            .socialfi__arrow-1,
            .socialfi__arrow-2 {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .hero__title {
                font-size: 2.4rem;
            }

            .stats__value {
                font-size: 2.2rem;
            }

            .stats__inner {
                grid-template-columns: 1fr 1fr;
                gap: 1.2rem;
            }

            .socialfi__text {
                font-size: 3.5rem;
            }

            .socialfi__card {
                width: 6rem;
                padding: 0.6rem 0.5rem;
            }

            .socialfi__card--top {
                top: -6rem;
                right: 2rem;
            }

            .socialfi__card--bottom {
                top: 8rem;
            }

            .socialfi__card-avatar {
                width: 2.2rem;
                height: 2.2rem;
                font-size: 0.8rem;
            }

            .socialfi__card-name {
                font-size: 0.9rem;
            }

            .banner__title {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body class="home-canvas antialiased">

<div class="home-shell min-h-screen">

    <!-- ============================================================
    HERO
    ============================================================ -->
    <section class="hero"
        style="--hero-bg-mobile: url('images/ridenet-hero-mobile.jpg'); --hero-bg-desktop: url('images/ridenet-hero-desktop.jpg');">

        <div class="hero__inner">

            <!-- TOPBAR -->
            <header class="topbar">
                <a href="{{ asset('/') }}" class="brand">
                    <img src="{{ asset(config('settings.logo')) }}" alt="RideNet">
                </a>

                <nav class="public-nav" aria-label="Public navigation">
                    <a href="#" class="public-nav__link is-active">Home</a>
                   <a href="{{ asset('earners/top') }}" class="public-nav__link">Top Earners</a>
                    <a href="#features" class="public-nav__link">Features</a>
                    <a href="#plans" class="public-nav__link">Plans</a>
                    <a href="#marketplace" class="public-nav__link">Marketplace</a>
                    <a href="#legitimacy" class="public-nav__link">Legitimacy</a>

                    <a href="{{ asset('register') }}" class="public-nav__cta">
                        <i class="ri-user-add-line"></i>
                        <span>Join RideNet</span>
                    </a>
                </nav>

                <button type="button"
                        class="menu-button"
                        aria-label="Open menu"
                        id="menuToggle">
                    <i class="ri-menu-line"></i>
                </button>
            </header>

            <!-- HERO CONTENT -->
            <div class="hero__content">

                <h1 class="hero__title">
                    More Than A <span class="gold">Ride.</span><br>
                    It's A <span class="gold">Movement.</span>
                </h1>

                <p class="hero__copy">
                    Connect riders with available drivers, discover opportunities,
                    complete tasks, earn rewards, and grow with the RideNet community.
                </p>

                <div class="hero__actions">
                    <a href="{{ asset('register') }}" class="pill-button pill-button--primary">
                        <i class="ri-rocket-2-line"></i>
                        Join RideNet Now
                    </a>

                    <a href="#features" class="pill-button pill-button--ghost">
                        <i class="ri-road-map-line"></i>
                        Explore RideNet
                    </a>
                </div>

                <div class="hero__badges">
                    <span class="hero__badge">
                        <i class="ri-car-line"></i>
                        Ride Connection
                    </span>

                    <span class="hero__badge">
                        <i class="ri-gift-line"></i>
                        Daily Rewards
                    </span>

                    <span class="hero__badge">
                        <i class="ri-store-3-line"></i>
                        Marketplace
                    </span>
                </div>
            </div>

            <!-- HERO VISUAL -->
            <div class="hero__visual">

                <div class="hero-bubble hero-bubble--chat">
                    <div class="hero-bubble__row">
                        <span class="hero-avatar">R</span>

                        <div>
                            <p class="hero-bubble__title">
                                Driver Connection
                            </p>

                            <p class="hero-bubble__copy">
                                Reward
                                <span class="bubble-value">₦1,500</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="hero-bubble hero-bubble--call">
                    <div class="hero-bubble__row">
                        <span class="gold-icon">
                            <i class="ri-map-pin-user-line"></i>
                        </span>

                        <div>
                            <p class="hero-bubble__title">
                                Ride Hunt
                            </p>

                            <p class="hero-bubble__copy">
                                Find. Connect. Earn.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="hero-bubble hero-bubble--earn">
                    <div class="hero-bubble__row">
                        <span class="gold-icon">
                            <i class="ri-camera-line"></i>
                        </span>

                        <div>
                            <p class="hero-bubble__title">
                                Snap &amp; Earn
                            </p>

                            <p class="hero-bubble__copy">
                                Post &amp; get rewarded
                            </p>
                        </div>
                    </div>
                </div>

                <div class="hero-bubble hero-bubble--secure">
                    <div class="hero-bubble__row">
                        <span class="gold-icon">
                            <i class="ri-calendar-check-line"></i>
                        </span>

                        <div>
                            <p class="hero-bubble__title">
                                Daily Check-In
                            </p>

                            <p class="hero-bubble__copy">
                                Check in. Earn daily.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 1 - MANAGER PLAN
    ============================================================ -->
    <section class="banner" id="plans">
        <div class="banner__container">

            <h2 class="banner__title">
                RideNet <span class="gold">Manager Plan</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{ asset('banners/7ff050a6-4588-4cd5-bbd2-9b3308e1ed5f.jpeg') }}"
                         alt="RideNet Manager Plan"
                         class="banner__image">
                </div>

              

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 2 - PREMIUM PLAN
    ============================================================ -->
    <section class="banner">
        <div class="banner__container">

            <h2 class="banner__title">
                RideNet <span class="gold">Premium Plan</span>
            </h2>

            <div class="banner__inner banner__inner--image-after">

              

                <div class="banner__media">
                    <img src="{{ asset('banners/686a0972-0d9a-46a3-b214-bd0cce6971f7.jpeg') }}"
                         alt="RideNet Premium Plan"
                         class="banner__image">
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    RIDENET BRAND SECTION
    ============================================================ -->
    <section class="socialfi">

        <div class="socialfi__inner">

            <img src="images/arrow-1.svg"
                 class="socialfi__arrow-1 z-2"
                 alt="arrow">

            <img src="images/arrow-2.svg"
                 class="socialfi__arrow-2"
                 alt="arrow">

            <span class="socialfi__hash z-5">#</span>



          


            <div style="display:flex;flex-direction:column;align-items:center;font-weight:900;">

                <span class="socialfi__text"
                      style="color:#fff;font-weight:900;">
                    RIDENET
                </span>

                <span class="socialfi__text"
                      style="color:var(--accent);font-weight:900;">
                    CONNECT
                </span>

                <span class="socialfi__text"
                      style="color:rgba(255,255,255,0.5);font-weight:900;">
                    EARN
                </span>

            </div>


            <p class="socialfi__copy">
                RideNet is a crowdsourced ride-dispatch platform connecting
                passengers with available drivers through registered users.
                Connect rides, complete activities, discover opportunities,
                and participate in the RideNet community.
            </p>


            <div class="socialfi__cta">

                <a href="{{ asset('register') }}" class="pill-button pill-button--light">
                    <i class="ri-user-add-line"></i>
                    Join RideNet Now
                </a>

            </div>

        </div>
    </section>


    <!-- ============================================================
    FEATURES
    ============================================================ -->
    <section class="features" id="features">

        <div class="features__inner">

            <div class="text-center">

                <h2 class="features__title">
                    RideNet <span class="gold">Features</span>
                </h2>

                <p class="features__copy">
                    Connect. Engage. Earn.
                </p>

                <div class="features__underline"></div>

            </div>


            <div class="feature-stack">

                <!-- DRIVER CONNECTION -->
                <article class="feature-card feature-card--dashboard">

                    <img
                        style="border-radius:10px;width:100%;margin:auto;pointer-events:none;object-fit:cover;"
                        src="{{ asset('banners/0E6F89E7-1026-4EC2-AC5F-594E96463424-compressed.jpeg') }}"
                        alt="RideNet Marketplace">

                    <h3 class="feature-card__heading">
                        Driver Connection
                    </h3>

                    <p class="feature-card__text">
                        Connect passengers with available drivers and earn
                        a reward for successful ride connections.
                    </p>

                    <span class="feature-card__reward">
                        <i class="ri-car-line"></i>
                        Up to ₦1,500
                    </span>

                    <br>

                    <a href="{{ asset('register') }}" class="feature-card__button">
                        Connect Now
                        <i class="ri-arrow-right-line"></i>
                    </a>

                </article>


                <!-- RIDE HUNT -->
                <article class="feature-card feature-card--voicevault">

                   <img
                        style="border-radius:10px;width:100%;margin:auto;pointer-events:none;object-fit:cover;"
                        src="{{ asset('banners/06F31358-D478-474C-B5CC-17D99A9B1CE1-compressed.jpeg') }}"
                        alt="RideNet Marketplace">

                    <h3 class="feature-card__heading">
                        Ride Hunt
                    </h3>

                    <p class="feature-card__text">
                        Find hidden drivers, complete Ride Hunt missions,
                        and collect the listed reward.
                    </p>

                    <span class="feature-card__reward">
                        <i class="ri-map-pin-search-line"></i>
                        Up to ₦1,200
                    </span>

                    <br>

                    <a href="{{ asset('register') }}" class="feature-card__button">
                        Play Ride Hunt
                        <i class="ri-arrow-right-line"></i>
                    </a>

                </article>


                <!-- SNAP & EARN -->
                <article class="feature-card feature-card--lingua">

                    <img
                        style="border-radius:10px;width:100%;margin:auto;pointer-events:none;object-fit:cover;"
                        src="{{ asset('banners/3A9EE844-52C2-4911-8BEB-BA76ABDBE29E-compressed.jpeg') }}"
                        alt="RideNet Marketplace">
                    <h3 class="feature-card__heading">
                        Snap &amp; Earn
                    </h3>

                    <p class="feature-card__text">
                        Post RideNet content on your Snapchat story,
                        promote RideNet, and get rewarded.
                    </p>

                    <span class="feature-card__reward">
                        <i class="ri-camera-line"></i>
                        Create &amp; Earn
                    </span>

                    <br>

                    <a href="{{ asset('register') }}" class="feature-card__button">
                        Snap Now
                        <i class="ri-arrow-right-line"></i>
                    </a>

                </article>


                <!-- MARKETPLACE -->
                <article class="feature-card feature-card--connection">

                    <img
                        style="border-radius:10px;width:100%;margin:auto;pointer-events:none;object-fit:cover;"
                        src="{{ asset('banners/0776CA54-6B2E-470F-A043-6B1C18BB3ABB-compressed.jpeg') }}"
                        alt="RideNet Marketplace">

                    <h3 class="feature-card__heading">
                        Marketplace
                    </h3>

                    <p class="feature-card__text">
                        Buy quality products, sell your products,
                        connect with trusted vendors, and grow.
                    </p>

                    <span class="feature-card__reward">
                        <i class="ri-store-3-line"></i>
                        Buy · Sell · Grow
                    </span>

                    <br>

                    <a href="{{ asset('register') }}" class="feature-card__button">
                        Explore Marketplace
                        <i class="ri-arrow-right-line"></i>
                    </a>

                </article>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 3 - GET PAID ON EVERY RIDE
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                Get Paid On <span class="gold">Every Ride</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{ asset('banners/c698ed24-0f87-4099-b9d5-2778079e1507.jpeg') }}"
                         alt="Get Paid On Every Ride"
                         class="banner__image">
                </div>

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            <strong>Connect riders to available rides.</strong>
                        </p>

                        <p>
                            Earn on every successful ride you connect
                            through RideNet.
                        </p>

                        <p>
                            Grow your opportunities by connecting more rides
                            and participating in the RideNet community.
                        </p>

                        <p>
                            <i class="ri-car-line"
                               style="color:var(--accent);"></i>
                            <strong>Manager Driver Connection:</strong> ₦1,500
                        </p>

                        <p>
                            <i class="ri-car-line"
                               style="color:var(--accent);"></i>
                            <strong>Premium Driver Connection:</strong> ₦750
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 4 - EASYBUY
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                RideNet <span class="gold">EasyBuy</span>
            </h2>

            <div class="banner__inner banner__inner--image-after">

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            <strong>BUY NOW, PAY LATER</strong>
                        </p>

                        <p>
                            Get what you want instantly with flexible
                            payment plans and fast approval.
                        </p>

                        <p>
                            Secure, safe and reliable payment options
                            designed around your needs.
                        </p>

                        <p>
                            <i class="ri-shield-check-line"
                               style="color:var(--accent);"></i>
                            No Hidden Fees · 100% Secure · Pay Over Time
                        </p>

                    </div>

                </div>

                <div class="banner__media">
                    <img src="{{ asset('banners/529cf616-a017-4ca5-aa7b-d17179c19dc7.jpeg') }}"
                         alt="RideNet EasyBuy"
                         class="banner__image">
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 5 - DAILY CHECK-IN
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                Check In Daily. <span class="gold">Earn Daily.</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{  asset('banners/a38cdf9c-41c6-4c4c-949c-4deaa756d3d2.jpeg') }}"
                         alt="RideNet Daily Check In"
                         class="banner__image">
                </div>

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            <strong>Daily Reward Bonuses</strong>
                        </p>

                        <p>
                            Keep your streak active and participate
                            consistently to unlock more opportunities.
                        </p>

                        <p>
                            <i class="ri-star-line"
                               style="color:var(--accent);"></i>
                            Loyalty Points
                        </p>

                        <p>
                            <i class="ri-fire-line"
                               style="color:var(--accent);"></i>
                            Streak Rewards
                        </p>

                        <p>
                            <i class="ri-gift-line"
                               style="color:var(--accent);"></i>
                            Surprise Gifts
                        </p>

                        <p>
                            <i class="ri-user-star-line"
                               style="color:var(--accent);"></i>
                            Active User Incentives
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 6 - MARKETPLACE
    ============================================================ -->
    <section class="banner" id="marketplace">

        <div class="banner__container">

            <h2 class="banner__title">
                Buy. Sell. <span class="gold">Grow.</span>
            </h2>

            <div class="banner__inner banner__inner--image-after">

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            Discover quality products from trusted vendors
                            and enjoy affordable prices.
                        </p>

                        <p>
                            List your products easily and reach potential buyers
                            through the RideNet Marketplace.
                        </p>

                        <p>
                            <strong>Top Categories</strong><br>
                            Electronics · Fashion · Home · Beauty
                        </p>

                        <p>
                            <i class="ri-shopping-bag-line"
                               style="color:var(--accent);"></i>
                            Featured products from ₦45,000
                        </p>

                    </div>

                </div>

                <div class="banner__media">
                    <img src="{{  asset('banners/548d87c7-be1d-49fc-9697-24315ae0532c.jpeg') }}"
                         alt="RideNet Marketplace"
                         class="banner__image">
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 7 - VOICE TALES
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                Plug In &amp; <span class="gold">Cash Out</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{ asset('banners/925bfa37-309f-4e58-b004-76b8d13f1829.jpeg') }}"
                         alt="RideNet Voice Tales"
                         class="banner__image">
                </div>

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            Listen to voice stories and earn while enjoying
                            the content.
                        </p>

                        <p>
                            <strong style="color:var(--accent);">
                                EARN UP TO $25 DAILY
                            </strong>
                        </p>

                        <p>
                            <i class="ri-mic-line"
                               style="color:var(--accent);"></i>
                            Speak &amp; Share
                        </p>

                        <p>
                            <i class="ri-headphone-line"
                               style="color:var(--accent);"></i>
                            Listen &amp; Enjoy
                        </p>

                        <p>
                            <i class="ri-money-dollar-circle-line"
                               style="color:var(--accent);"></i>
                            Earn &amp; Get Rewarded
                        </p>

                        <p>
                            Safe &amp; Secure · Real Rewards · Anytime, Anywhere
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </section>


   

    <!-- ============================================================
    BANNER 9 - WHAT IS RIDENET
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                What Is <span class="gold">RideNet?</span>
            </h2>

            <div class="banner__inner">

              

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            RideNet is a crowdsourced ride-dispatch platform
                            connecting passengers with available drivers
                            through registered users.
                        </p>

                        <p>
                            Members help match passengers with drivers
                            in real time.
                        </p>

                        <p>
                            Facilitators can earn a commission or reward
                            for successful matches.
                        </p>

                        <p>
                            <strong>
                                More rides. More opportunities.
                            </strong>
                        </p>

                        <p>
                            RideNet is built around a community model where
                            members participate and benefit from available opportunities.
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 10 - BOOK STORE
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                RideNet <span class="gold">Book Store</span>
            </h2>

            <div class="banner__inner banner__inner--image-after">

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            <strong>
                                Write Books and Sell on RideNet
                                at the Price of Your Choice.
                            </strong>
                        </p>

                        <p>
                            Become an author on the RideNet Book Store
                            and make your work available to readers.
                        </p>

                        <p>
                            <i class="ri-book-open-line"
                               style="color:var(--accent);"></i>
                            Commission per sale:
                            <strong>5%</strong>
                        </p>

                    </div>

                </div>

              

            </div>
        </div>
    </section>


    <!-- ============================================================
    BANNER 11 - CAC
    ============================================================ -->
    <section class="banner" id="legitimacy">

        <div class="banner__container">

            <h2 class="banner__title">
                We are <span class="gold">CAC Verified</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{ asset('banners/d9fdd3db-8162-4603-afbb-3a49f962d3d2.jpeg') }}"
                         alt="RideNet CAC Certificate"
                         class="banner__image">
                </div>

               

            </div>
        </div>
    </section>


 


    <!-- ============================================================
    BANNER 13 - RIDE HUNT
    ============================================================ -->
    <section class="banner">

        <div class="banner__container">

            <h2 class="banner__title">
                Find. Connect. <span class="gold">Earn.</span>
            </h2>

            <div class="banner__inner">

                <div class="banner__media">
                    <img src="{{ asset('banners/e8fdb624-c17b-4e46-acd9-25e8eb52571a.jpeg') }}"
                         alt="RideNet Ride Hunt"
                         class="banner__image">
                </div>

                <div class="banner__content">

                    <div class="banner__body">

                        <p>
                            Search for hidden drivers through Ride Hunt
                            challenges.
                        </p>

                        <p>
                            <strong>Mission:</strong>
                            Get 3 Drivers from Uyo correctly.
                        </p>

                        <p>
                            <strong>Reward:</strong>
                            <span style="color:var(--accent);">
                                ₦2,500
                            </span>
                        </p>

                        <p>
                            <i class="ri-gamepad-line"
                               style="color:var(--accent);"></i>
                            PLAY RIDE HUNT
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
    TESTIMONIAL / RIDENET MOVEMENT
    ============================================================ -->
    <section class="testimonial">

        <div class="testimonial__inner">

            <p class="testimonial__eyebrow">
                The RideNet Movement
            </p>

            <div class="testimonial__head">

                <h2 class="testimonial__title">
                    More Than A
                    <span class="gold">Ride.</span>
                    It's A
                    <span class="gold">Movement.</span>
                </h2>

                <div class="testimonial__nav" aria-hidden="true">

                    <button type="button"
                            class="testimonial__nav-button">
                        <i class="ri-arrow-left-line"></i>
                    </button>

                    <button type="button"
                            class="testimonial__nav-button">
                        <i class="ri-arrow-right-line"></i>
                    </button>

                </div>

            </div>


            <div class="testimonial__stars">
                <i class="ri-road-map-line"></i>
                <i class="ri-user-line"></i>
                <i class="ri-car-line"></i>
                <i class="ri-gift-line"></i>
                <i class="ri-community-line"></i>
            </div>


            <blockquote class="testimonial__quote">
                Connect. Engage. Earn. RideNet brings riders, drivers,
                facilitators, workers, vendors, creators and community
                members together through a growing digital platform.
            </blockquote>


            <div class="testimonial__person">

                <span class="testimonial__avatar testimonial__avatar--fallback">
                    R
                </span>

                <div>
                    <p class="testimonial__name">
                        RideNet
                    </p>

                    <p class="testimonial__role">
                        Connecting Rides. Creating Wealth.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- ============================================================
    STATS / REWARD MILESTONES
    ============================================================ -->
    <section class="stats">

        <div class="stats__inner">

            <article class="stats__item">
                <p class="stats__value">50</p>
                <p class="stats__label">
                    Rides<br>
                    ₦500K Fuel Bonus
                </p>
            </article>

            <article class="stats__item">
                <p class="stats__value">500</p>
                <p class="stats__label">
                    Rides<br>
                    Motorcycle Reward
                </p>
            </article>

            <article class="stats__item">
                <p class="stats__value">1.5K</p>
                <p class="stats__label">
                    Rides<br>
                    Car Reward
                </p>
            </article>

        </div>
    </section>


    <!-- ============================================================
    FAQ
    ============================================================ -->
    <section class="faq">

        <div class="faq__inner">

            <p class="faq__eyebrow">
                <i class="ri-question-line"></i>
                Your Questions? Answered
            </p>

            <h2 class="faq__title">
                Frequently Asked
                <span class="gold">Questions</span>
            </h2>


            <div class="faq__list">

                <details class="faq__item" open>

                    <summary class="faq__summary">

                        <span class="faq__question">
                            What is RideNet?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-subtract-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        RideNet is a crowdsourced ride-dispatch platform
                        connecting passengers with available drivers through
                        registered users.
                    </div>

                </details>


                <details class="faq__item">

                    <summary class="faq__summary">

                        <span class="faq__question">
                            How does Driver Connection work?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-add-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        Registered members can help connect passengers with
                        available drivers. Successful connections can qualify
                        for the applicable Driver Connection reward.
                    </div>

                </details>


                <details class="faq__item">

                    <summary class="faq__summary">

                        <span class="faq__question">
                            What is Ride Hunt?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-add-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        Ride Hunt is a RideNet challenge where users search
                        for hidden drivers and complete specific missions
                        for the listed reward.
                    </div>

                </details>


                <details class="faq__item">

                    <summary class="faq__summary">

                        <span class="faq__question">
                            When are RideNet withdrawals available?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-add-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        According to the RideNet withdrawal schedule supplied
                        for the platform, different reward categories have
                        specific withdrawal dates including Invitation Rewards,
                        Drivers Connect, Ride Hunt and other rewards.
                    </div>

                </details>


                <details class="faq__item">

                    <summary class="faq__summary">

                        <span class="faq__question">
                            How much is the Book Store commission?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-add-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        The supplied RideNet Book Store information states
                        a 5% commission fee per book sale.
                    </div>

                </details>


                <details class="faq__item">

                    <summary class="faq__summary">

                        <span class="faq__question">
                            What is RideNet EasyBuy?
                        </span>

                        <span class="faq__icon">
                            <i class="ri-add-line"></i>
                        </span>

                    </summary>

                    <div class="faq__answer">
                        EasyBuy is RideNet's buy-now-pay-later offering,
                        presented with flexible payment plans and fast
                        approval.
                    </div>

                </details>

            </div>
        </div>
    </section>


    <!-- ============================================================
    CTA
    ============================================================ -->
    <section class="cta">

        <div class="cta__inner">

            <div class="cta__card">

                <h2 class="cta__title">
                    Start Your
                    <span class="gold">RideNet Journey</span>
                </h2>

                <p class="cta__copy">
                    Connect rides, explore opportunities, participate in
                    RideNet activities, and become part of the movement.
                </p>

                <div class="cta__action">

                    <a href="{{ asset('register') }}"
                       class="pill-button pill-button--light cta__button">

                        <i class="ri-user-add-line"></i>
                        Join RideNet Now

                    </a>

                </div>

            </div>

        </div>
    </section>


    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="footer"
            style="--footer-bg-image:url('images/ridenet-footer.jpg');">

        <div class="footer__inner">

            <div>

                <div class="footer__brand">

                    <img src="{{ asset(config('settings.logo')) }}"
                         alt="RideNet"
                         class="footer__logo">

                </div>

                <div class="footer__intro">
                    RideNet — Connecting rides, creating opportunities,
                    and building a community around mobility,
                    activities, rewards and digital services.
                </div>

            </div>


            <div class="footer__group">

                <h3 class="footer__heading">
                    Quick Links
                </h3>

                <div class="footer__links">

                    <a href="#" class="footer__link">
                        Home
                    </a>
                     <a href="{{ asset('earners/top') }}" class="footer__link">
                        Top earners
                    </a>
                    <a href="#features" class="footer__link">
                        Features
                    </a>

                   

                    <a href="{{ asset('vendors') }}" class="footer__link">
                       Buy Coupon code
                    </a>

                    <a href="{{ asset('coupon/checker') }}" class="footer__link">
                        Coupon Checker
                    </a>

                    <a href="#legitimacy" class="footer__link">
                        Legitimacy
                    </a>

                </div>

            </div>


            <div class="footer__group">

                <h3 class="footer__heading">
                    RideNet
                </h3>

                <p class="footer__support-copy">

                    Connecting riders with available opportunities.

                    <span class="footer__support-highlight">
                        <i class="ri-car-line"></i>
                        Connect Rides
                    </span>

                    <span class="footer__support-highlight"
                          style="font-weight:400;color:rgba(255,255,255,0.5);">

                        <i class="ri-gift-line"></i>
                        Discover Rewards

                    </span>

                    <span class="footer__support-highlight"
                          style="font-weight:400;color:rgba(255,255,255,0.5);font-size:0.8rem;">

                        <i class="ri-community-line"></i>
                        Connect · Engage · Earn

                    </span>

                </p>

            </div>

        </div>
    </footer>

</div>


<!-- ============================================================
MOBILE DRAWER
============================================================ -->
<div class="public-drawer" id="mobileDrawer">

    <button type="button"
            class="public-drawer__backdrop"
            id="drawerBackdrop"
            aria-label="Close menu">
    </button>

    <aside class="public-drawer__panel">

        <div class="public-drawer__header">

            <a href="#" class="brand">

                <img src="{{ asset(config('settings.logo')) }}"
                     alt="RideNet">

            </a>

            <button type="button"
                    class="public-drawer__close"
                    id="drawerClose"
                    aria-label="Close menu">

                <i class="ri-close-line"></i>

            </button>

        </div>


        <nav class="public-drawer__nav">

            <a href="#"
               class="public-drawer__link is-active">

                <span class="public-drawer__link-icon">
                    <i class="ri-home-5-line"></i>
                </span>

                <span>Home</span>

            </a>

  <a href="{{ asset('earners/top') }}"
               class="public-drawer__link">

                <span class="public-drawer__link-icon">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 12H7V21H3V12ZM17 8H21V21H17V8ZM10 2H14V21H10V2Z"></path></svg>
                </span>

                <span>Top Earners</span>

            </a>
            <a href="#features"
               class="public-drawer__link">

                <span class="public-drawer__link-icon">
                    <i class="ri-star-line"></i>
                </span>

                <span>Features</span>

            </a>

   <a href="{{ asset('vendors') }}"
               class="public-drawer__link">

                <span class="public-drawer__link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.8902 11.724C2.12344 11.3741 2.63805 10.4294 2.83051 9.44973C2.88991 9.14734 2.91864 8.7863 2.95029 8.38865C3.04681 7.17585 3.17043 5.62254 4.27382 4.35447C5.73898 2.67063 7.95402 1.05783 11.4903 2.53943C14.7335 3.89826 15.2119 7.42121 14.9454 9.44973C14.9106 9.71486 14.8806 9.96973 14.851 10.221C14.7119 11.4023 14.5821 12.5039 14.0051 14.217C12.6935 15.5126 11.8037 15.9069 9.93474 15.9749L9.89915 15.9642C10.9842 14.1865 13.3146 8.20647 11.3174 6.08865C9.6151 4.28348 7.73281 5.12703 7.00446 5.77446C6.11668 6.43716 6.0445 7.39544 5.95402 8.59659C5.84065 10.1017 5.69855 11.988 3.88724 14.152L3.87465 14.1482C2.5892 13.5334 2.11823 13.0261 1.8902 11.724Z" fill="currentColor" fill-opacity="0.3" data-stroke="none" stroke="none"></path> <path d="M5.078 3.462C6.13 2.551 7.502 2 9 2C12.309 2 15 4.691 15 8C15 10.307 14.637 12.373 14.012 14.213" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M1.90802 11.703C2.94802 10.011 3.00002 8.32 3.00002 8C3.00002 7.088 3.20402 6.223 3.57002 5.448" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M11.87 10.142C11.592 12.376 10.887 14.302 9.91901 15.948" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M3.87201 14.14C5.09601 12.661 6.00001 10.666 6.00001 8C6.00001 6.343 7.34301 5 9.00001 5C10.524 5 11.783 6.137 11.975 7.608" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M6.55103 15.618C7.97503 13.744 9.00003 11.262 9.00003 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
                </span>

                <span>Buy Coupon code</span>

            </a>
          


         


            <a href="{{ asset('coupon/checker') }}"
               class="public-drawer__link">

                <span class="public-drawer__link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><rect x="3" y="3" width="9" height="9" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="3" y="20" width="9" height="9" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="27" y="20" width="2" height="2" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="16" y="27" width="2" height="2" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="20" y="3" width="9" height="9" stroke="currentColor" stroke-width="2" fill="none"></rect> <path d="M3 16H7" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M13 16H18M22 16V23H29M22 16H26M22 16H18M18 16V20H16" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M16 7V10" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M16 25V29H23V27" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M29.01 29H29" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <rect x="24" y="7" width="1" height="1" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="7" y="7" width="1" height="1" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="7" y="24" width="1" height="1" stroke="currentColor" stroke-width="2" fill="none"></rect></g>
</svg>
                </span>

                <span>Coupon Checker</span>

            </a>


            <a href="#legitimacy"
               class="public-drawer__link">

                <span class="public-drawer__link-icon">
                    <i class="ri-shield-check-line"></i>
                </span>

                <span>Legitimacy</span>

            </a>


            <a href="{{ asset('register') }}"
               class="public-drawer__cta">

                <span class="public-drawer__cta-icon">
                    <i class="ri-user-add-line"></i>
                </span>

                <span>Join RideNet</span>

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

    if (menuToggle) {
        menuToggle.addEventListener('click', openDrawer);
    }

    if (drawerClose) {
        drawerClose.addEventListener('click', closeDrawer);
    }

    if (drawerBackdrop) {
        drawerBackdrop.addEventListener('click', closeDrawer);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeDrawer();
        }
    });


    // ============================================
    // CLOSE DRAWER WHEN NAV LINK IS CLICKED
    // ============================================

    document.querySelectorAll('.public-drawer__link').forEach(link => {
        link.addEventListener('click', closeDrawer);
    });


    // ============================================
    // FAQ ICON TOGGLE
    // ============================================

    document.querySelectorAll('.faq__summary').forEach(summary => {

        summary.addEventListener('click', function() {

            const details = this.parentElement;
            const icon = this.querySelector('.faq__icon i');

            if (details.hasAttribute('open')) {
                icon.className = 'ri-add-line';
            } else {
                icon.className = 'ri-subtract-line';
            }

        });

    });


    // ============================================
    // TESTIMONIAL / MOVEMENT NAV
    // ============================================

    document.querySelectorAll('.testimonial__nav-button').forEach(btn => {

        btn.addEventListener('click', function() {

            console.log('RideNet navigation clicked');

        });

    });


    console.log('🚗 RIDENET – Connecting Rides. Creating Wealth.');

</script>

</body>
</html>

