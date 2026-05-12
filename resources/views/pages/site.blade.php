<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Home</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ============================================
           HERO - MONSTERCAT-INSPIRED CYBERPUNK
           ============================================ */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 0;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                repeating-linear-gradient(0deg, transparent, transparent 60px, rgba(56, 189, 248, 0.035) 60px, rgba(56, 189, 248, 0.035) 61px),
                repeating-linear-gradient(90deg, transparent, transparent 60px, rgba(168, 85, 247, 0.035) 60px, rgba(168, 85, 247, 0.035) 61px);
            z-index: 1;
            animation: gridScroll 25s linear infinite;
        }

        @keyframes gridScroll {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }

        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            z-index: 1;
            pointer-events: none;
        }
        .hero-orb-1 {
            width: 600px; height: 600px;
            background: rgba(168, 85, 247, 0.1);
            top: -15%; left: -10%;
            animation: orbFloat 10s ease-in-out infinite alternate;
        }
        .hero-orb-2 {
            width: 500px; height: 500px;
            background: rgba(56, 189, 248, 0.08);
            bottom: -15%; right: -10%;
            animation: orbFloat 12s ease-in-out infinite alternate-reverse;
        }
        .hero-orb-3 {
            width: 300px; height: 300px;
            background: rgba(34, 211, 238, 0.06);
            top: 40%; left: 55%;
            animation: orbPulse 7s ease-in-out infinite;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(60px, -40px) scale(1.1); }
        }
        @keyframes orbPulse {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.3); }
        }

        .hero-left {
            position: relative;
            z-index: 3;
            padding: 140px 0 100px 0;
            flex: 1;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            background: rgba(168, 85, 247, 0.12);
            border: 1px solid rgba(168, 85, 247, 0.25);
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--neon-purple);
            margin-bottom: 28px;
        }

        .hero-label .pulse-dot {
            width: 7px; height: 7px;
            background: var(--neon-purple);
            border-radius: 50%;
            animation: dotPulse 1.5s ease-in-out infinite;
        }

        @keyframes dotPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.6); }
        }

        .hero-section h1 {
            font-size: 6rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 10%, var(--neon-purple) 45%, var(--neon-blue) 75%, var(--neon-cyan) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 8px;
            margin-bottom: 12px;
            line-height: 1;
            position: relative;
        }

        .hero-section h1::before,
        .hero-section h1::after {
            content: attr(data-text);
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, #fff 10%, var(--neon-purple) 45%, var(--neon-blue) 75%, var(--neon-cyan) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-section h1::before {
            animation: glitch1 4s infinite;
            clip-path: polygon(0 0, 100% 0, 100% 40%, 0 40%);
        }
        .hero-section h1::after {
            animation: glitch2 4s infinite;
            clip-path: polygon(0 60%, 100% 60%, 100% 100%, 0 100%);
        }

        @keyframes glitch1 {
            0%, 88%, 100% { transform: translate(0); }
            90% { transform: translate(-4px, 2px); }
            92% { transform: translate(4px, -1px); }
            94% { transform: translate(-2px, 1px); }
        }
        @keyframes glitch2 {
            0%, 88%, 100% { transform: translate(0); }
            90% { transform: translate(4px, -2px); }
            92% { transform: translate(-4px, 1px); }
            94% { transform: translate(2px, -1px); }
        }

        .hero-sub {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.35);
            letter-spacing: 4px;
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .hero-sub span {
            color: var(--neon-blue);
            font-weight: 600;
        }

        .hero-neon-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue), transparent);
            margin-bottom: 35px;
            border-radius: 2px;
            box-shadow: 0 0 20px var(--glow-purple);
        }

        .hero-cta-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* Right: featured release card */
        .hero-right {
            position: relative;
            z-index: 3;
            padding: 140px 0 100px 60px;
            flex: 0 0 400px;
        }

        .hero-featured-card {
            background: rgba(10, 10, 20, 0.7);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.5), 0 0 60px rgba(168, 85, 247, 0.08);
            transition: all 0.4s;
            text-decoration: none;
            display: block;
        }

        .hero-featured-card:hover {
            border-color: rgba(168, 85, 247, 0.4);
            box-shadow: 0 30px 80px rgba(0,0,0,0.6), 0 0 80px rgba(168, 85, 247, 0.15);
            transform: translateY(-5px);
        }

        .hero-featured-art {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            overflow: hidden;
        }

        .hero-featured-art img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .hero-featured-card:hover .hero-featured-art img {
            transform: scale(1.05);
        }

        .hero-featured-art-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(5, 5, 15, 0.95) 100%);
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .hero-featured-play {
            width: 54px; height: 54px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            border: none;
            color: #fff;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 0 40px var(--glow-purple);
            margin-left: auto;
        }

        .hero-featured-play:hover {
            transform: scale(1.12);
            box-shadow: 0 0 60px var(--glow-purple);
        }

        .hero-featured-info {
            padding: 18px 20px 20px;
        }

        .hero-featured-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--neon-cyan);
            margin-bottom: 8px;
        }

        .hero-featured-info h3 {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .hero-featured-info p {
            color: rgba(255,255,255,0.45);
            font-size: 13px;
            margin: 0;
        }

        .hero-waveform {
            display: flex;
            align-items: center;
            gap: 3px;
            height: 28px;
            margin-top: 14px;
        }

        .hero-waveform span {
            display: block;
            width: 3px;
            border-radius: 3px;
            background: linear-gradient(180deg, var(--neon-blue), var(--neon-purple));
            animation: waveAnim 1.2s ease-in-out infinite;
        }

        .hero-waveform span:nth-child(2) { animation-delay: 0.1s; }
        .hero-waveform span:nth-child(3) { animation-delay: 0.2s; }
        .hero-waveform span:nth-child(4) { animation-delay: 0.3s; }
        .hero-waveform span:nth-child(5) { animation-delay: 0.4s; }
        .hero-waveform span:nth-child(6) { animation-delay: 0.3s; }
        .hero-waveform span:nth-child(7) { animation-delay: 0.2s; }
        .hero-waveform span:nth-child(8) { animation-delay: 0.1s; }
        .hero-waveform span:nth-child(9) { animation-delay: 0.0s; }
        .hero-waveform span:nth-child(10) { animation-delay: 0.15s; }
        .hero-waveform span:nth-child(11) { animation-delay: 0.25s; }
        .hero-waveform span:nth-child(12) { animation-delay: 0.35s; }

        @keyframes waveAnim {
            0%, 100% { height: 4px; }
            50% { height: 24px; }
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.25);
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .scroll-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(180deg, rgba(168, 85, 247, 0.6), transparent);
            animation: scrollLine 2s ease-in-out infinite;
        }

        @keyframes scrollLine {
            0% { transform: scaleY(0); transform-origin: top; }
            50% { transform: scaleY(1); transform-origin: top; }
            51% { transform-origin: bottom; }
            100% { transform: scaleY(0); transform-origin: bottom; }
        }

        /* ============================================
           TICKER MARQUEE
           ============================================ */
        .ticker-section {
            border-top: 1px solid rgba(168, 85, 247, 0.12);
            border-bottom: 1px solid rgba(168, 85, 247, 0.12);
            background: rgba(168, 85, 247, 0.04);
            padding: 14px 0;
            overflow: hidden;
            white-space: nowrap;
        }

        .ticker-track {
            display: inline-flex;
            gap: 60px;
            animation: tickerScroll 30s linear infinite;
        }

        @keyframes tickerScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .ticker-item {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.25);
        }

        .ticker-dot {
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--neon-purple);
            flex-shrink: 0;
        }

        .ticker-accent { color: var(--neon-blue); }

        /* ============================================
           NEW RELEASES CARD GRID
           ============================================ */
        .releases-section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .section-header-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 50px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .section-header-left h2 {
            font-size: 2.4rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin: 0 0 6px;
            line-height: 1;
        }

        .section-header-left p {
            color: var(--text-muted);
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }

        .section-neon-bar {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue));
            border-radius: 3px;
            margin-top: 12px;
            box-shadow: 0 0 15px var(--glow-purple);
        }

        .view-all-link {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--neon-blue);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 50px;
            transition: all 0.3s;
        }

        .view-all-link:hover {
            color: #fff;
            border-color: var(--neon-blue);
            background: rgba(56, 189, 248, 0.08);
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.15);
        }

        .releases-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .release-card {
            background: rgba(10, 10, 20, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: block;
            backdrop-filter: blur(10px);
        }

        .release-card:hover {
            transform: translateY(-8px);
            border-color: rgba(168, 85, 247, 0.3);
            box-shadow: 0 20px 50px rgba(0,0,0,0.4), 0 0 40px rgba(168, 85, 247, 0.1);
        }

        .release-art {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            overflow: hidden;
        }

        .release-art img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .release-card:hover .release-art img {
            transform: scale(1.08);
        }

        .release-art-overlay {
            position: absolute;
            inset: 0;
            background: rgba(5, 5, 15, 0.5);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s;
        }

        .release-card:hover .release-art-overlay {
            opacity: 1;
        }

        .release-play-btn {
            width: 50px; height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            border: none;
            color: #fff;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 0 40px var(--glow-purple);
            transform: scale(0.8);
            transition: transform 0.3s;
        }

        .release-card:hover .release-play-btn {
            transform: scale(1);
        }

        .release-art-badge {
            position: absolute;
            top: 10px; left: 10px;
            padding: 4px 10px;
            background: rgba(168, 85, 247, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #fff;
        }

        .release-info {
            padding: 14px 16px 16px;
        }

        .release-genre-tag {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--neon-cyan);
            margin-bottom: 6px;
            display: block;
        }

        .release-title {
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .release-artist {
            color: rgba(255,255,255,0.4);
            font-size: 12px;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ============================================
           CHANNEL CARDS (Monstercat label-inspired)
           ============================================ */
        .channels-section {
            padding: 80px 0;
            position: relative;
            z-index: 1;
        }

        .channel-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 50px;
        }

        .channel-card {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            text-decoration: none;
            display: block;
            transition: all 0.4s;
        }

        .channel-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
        }

        .channel-bg {
            position: absolute;
            inset: 0;
            transition: transform 0.6s ease;
        }

        .channel-card:hover .channel-bg { transform: scale(1.06); }

        .channel-card:nth-child(1) .channel-bg {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.85) 0%, rgba(56, 189, 248, 0.5) 60%, rgba(5, 5, 15, 0.9) 100%),
                        repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.02) 10px, rgba(255,255,255,0.02) 11px);
        }
        .channel-card:nth-child(2) .channel-bg {
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.85) 0%, rgba(34, 211, 238, 0.5) 60%, rgba(5, 5, 15, 0.9) 100%),
                        repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.02) 10px, rgba(255,255,255,0.02) 11px);
        }
        .channel-card:nth-child(3) .channel-bg {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.85) 0%, rgba(168, 85, 247, 0.5) 60%, rgba(5, 5, 15, 0.9) 100%),
                        repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.02) 10px, rgba(255,255,255,0.02) 11px);
        }

        .channel-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 30%, rgba(5, 5, 15, 0.85) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 28px;
        }

        .channel-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
        }

        .channel-name {
            font-size: 1.6rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 6px;
            line-height: 1;
        }

        .channel-desc {
            font-size: 12px;
            color: rgba(255,255,255,0.5);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0;
        }

        .channel-arrow {
            position: absolute;
            top: 24px; right: 24px;
            width: 40px; height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.6);
            font-size: 14px;
            transition: all 0.3s;
        }

        .channel-card:hover .channel-arrow {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }

        /* ============================================
           FEATURED ARTISTS GRID
           ============================================ */
        .artists-section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .artists-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-top: 50px;
        }

        .artist-card {
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
        }

        .artist-card:hover { transform: translateY(-8px); }

        .artist-avatar-wrap {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(168, 85, 247, 0.2);
            margin-bottom: 14px;
            transition: all 0.4s;
        }

        .artist-card:hover .artist-avatar-wrap {
            border-color: var(--neon-purple);
            box-shadow: 0 0 40px var(--glow-purple);
        }

        .artist-avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .artist-card:hover .artist-avatar-wrap img { transform: scale(1.1); }

        .artist-card-name {
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .artist-card-genre {
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ============================================
           STATS STRIP
           ============================================ */
        .stats-section {
            position: relative;
            z-index: 1;
            background: linear-gradient(180deg, transparent, rgba(168, 85, 247, 0.04), transparent);
            border-top: 1px solid rgba(168, 85, 247, 0.1);
            border-bottom: 1px solid rgba(168, 85, 247, 0.1);
        }

        .stats-inner {
            display: flex;
        }

        .stat-item {
            flex: 1;
            text-align: center;
            padding: 60px 20px;
            position: relative;
            transition: background 0.3s;
        }

        .stat-item:hover { background: rgba(168, 85, 247, 0.04); }

        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0; top: 30%; bottom: 30%;
            width: 1px;
            background: linear-gradient(180deg, transparent, rgba(168, 85, 247, 0.25), transparent);
        }

        .stat-number {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
            display: block;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }

        /* ============================================
           FEATURES - WHAT WE DO
           ============================================ */
        .features-section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: rgba(10, 10, 20, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 18px;
            padding: 44px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            height: 100%;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
            opacity: 0;
            transition: 0.4s;
        }

        .feature-card:hover::before { opacity: 1; }

        .feature-card:hover {
            transform: translateY(-12px);
            border-color: rgba(168, 85, 247, 0.25);
            box-shadow: 0 25px 60px rgba(0,0,0,0.4), 0 0 50px rgba(168, 85, 247, 0.07);
        }

        .feature-icon-wrap {
            width: 80px; height: 80px;
            background: rgba(168, 85, 247, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 32px;
            color: var(--neon-purple);
            border: 1px solid rgba(168, 85, 247, 0.15);
            transition: all 0.4s;
            position: relative;
        }

        .feature-icon-wrap::after {
            content: '';
            position: absolute;
            width: 100%; height: 100%;
            border-radius: 50%;
            border: 1px solid rgba(56, 189, 248, 0.15);
            animation: ringPulse 3s ease-in-out infinite;
        }

        @keyframes ringPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0; }
        }

        .feature-card:hover .feature-icon-wrap {
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            box-shadow: 0 0 40px var(--glow-purple);
        }

        .feature-card h4 {
            color: #fff;
            font-weight: 800;
            font-size: 1.15rem;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 13.5px;
            line-height: 1.8;
            margin: 0;
        }

        /* ============================================
           CTA BANNER
           ============================================ */
        .cta-section {
            padding: 100px 0;
            text-align: center;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% 50%, rgba(168, 85, 247, 0.07), transparent),
                radial-gradient(ellipse 60% 40% at 30% 50%, rgba(56, 189, 248, 0.05), transparent);
        }

        .cta-eyebrow {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--neon-purple);
            margin-bottom: 20px;
            position: relative;
        }

        .cta-section h2 {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 4px;
            position: relative;
        }

        .cta-section p {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 40px;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
            position: relative;
        }

        .cta-divider {
            width: 1px;
            height: 60px;
            background: linear-gradient(180deg, transparent, rgba(168, 85, 247, 0.4), transparent);
            margin: 0 auto 60px;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 1200px) {
            .releases-grid { grid-template-columns: repeat(3, 1fr); }
            .artists-grid { grid-template-columns: repeat(4, 1fr); }
        }

        @media (max-width: 992px) {
            .hero-section { flex-direction: column; }
            .hero-right { flex: none; padding: 0 0 80px; }
            .releases-grid { grid-template-columns: repeat(2, 1fr); }
            .channel-row { grid-template-columns: 1fr; }
            .artists-grid { grid-template-columns: repeat(3, 1fr); }
            .hero-section h1 { font-size: 3.8rem; letter-spacing: 5px; }
            .stats-inner { flex-wrap: wrap; }
            .stat-item { flex: 0 0 50%; }
            .stat-item:nth-child(2)::after { display: none; }
        }

        @media (max-width: 768px) {
            .hero-section h1 { font-size: 2.6rem; letter-spacing: 3px; }
            .releases-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .artists-grid { grid-template-columns: repeat(3, 1fr); }
            .section-header-left h2 { font-size: 1.8rem; }
            .cta-section h2 { font-size: 2.2rem; letter-spacing: 2px; }
            .hero-right { display: none; }
            .hero-cta-group { justify-content: center; }
            .hero-left { text-align: center; padding: 140px 0 80px; }
            .hero-neon-line { margin: 0 auto 35px; }
            .hero-label { justify-content: center; display: flex; }
        }

        @media (max-width: 576px) {
            .hero-section h1 { font-size: 2rem; letter-spacing: 2px; }
            .releases-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
            .artists-grid { grid-template-columns: repeat(2, 1fr); }
            .stat-item { flex: 0 0 100%; }
            .stat-item::after { display: none !important; }
            .channel-row { gap: 12px; }
        }
    </style>
</head>
<body>
    <!-- Page Background Image -->
    <div class="page-bg-wrap">
        <img src="{{ asset('assets/bg-images/riding-to-synthwave-beach-sy-2560x1440.jpg') }}" class="page-bg-img" alt="">
    </div>

    <div class="bg-grid"></div>
    <div class="bg-gradient"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('musics') }}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('artists') }}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('details') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-section">
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-orb hero-orb-3"></div>

        <div class="container" style="display:flex;align-items:center;min-height:100vh;gap:40px;flex-wrap:wrap;position:relative;z-index:3;">
            <!-- Left branding -->
            <div class="hero-left">
                <div class="hero-label animate__animated animate__fadeInDown">
                    <span class="pulse-dot"></span>
                    Now Releasing
                </div>
                <h1 data-text="Tentacit" class="animate__animated animate__fadeInUp">Tentacit</h1>
                <h1 data-text="Records" class="animate__animated animate__fadeInUp animate__delay-1s"
                    style="-webkit-text-fill-color:transparent;background:linear-gradient(135deg,rgba(168,85,247,0.35),rgba(56,189,248,0.25));-webkit-background-clip:text;font-size:3.5rem;letter-spacing:12px;margin-top:-10px;">Records</h1>
                <div class="hero-neon-line"></div>
                <p class="hero-sub animate__animated animate__fadeIn animate__delay-1s">
                    Discover &bull; Create &bull; <span>Inspire</span>
                </p>
                <div class="hero-cta-group animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="{{ route('musics') }}" class="btn-tentacit"><i class="fas fa-headphones me-2"></i>Explore Music</a>
                    <a href="{{ route('artists') }}" class="btn-tentacit-outline"><i class="fas fa-users me-2"></i>Our Artists</a>
                </div>
            </div>

            <!-- Right: featured track card -->
            @if(isset($newestSongs) && count($newestSongs) > 0)
            @php $featuredSong = $newestSongs->first(); @endphp
            <div class="hero-right animate__animated animate__fadeInRight animate__delay-1s">
                <a href="{{ route('song_info', $featuredSong->id) }}" class="hero-featured-card">
                    <div class="hero-featured-art">
                        <img src="{{ $featuredSong->image ? asset('song-images/' . $featuredSong->image) : asset('images/TentacitV1.1.png') }}"
                             alt="{{ $featuredSong->songname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                        <div class="hero-featured-art-overlay">
                            <div class="hero-featured-play"><i class="fas fa-play" style="margin-left:3px;"></i></div>
                        </div>
                    </div>
                    <div class="hero-featured-info">
                        <div class="hero-featured-badge"><i class="fas fa-bolt"></i> Latest Drop</div>
                        <h3>{{ $featuredSong->songname }}</h3>
                        <p>{{ $featuredSong->author }}</p>
                        <div class="hero-waveform">
                            <span style="height:6px;"></span>
                            <span style="height:14px;"></span>
                            <span style="height:20px;"></span>
                            <span style="height:10px;"></span>
                            <span style="height:22px;"></span>
                            <span style="height:16px;"></span>
                            <span style="height:8px;"></span>
                            <span style="height:18px;"></span>
                            <span style="height:24px;"></span>
                            <span style="height:12px;"></span>
                            <span style="height:20px;"></span>
                            <span style="height:6px;"></span>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>

        <div class="scroll-indicator">
            <div class="scroll-line"></div>
            <span>Scroll</span>
        </div>
    </section>

    <!-- TICKER -->
    <div class="ticker-section">
        <div class="ticker-track">
            @php
                $tItems = ['New Releases','Featured Artists','Electronic','Synthwave','Drum & Bass','Lo-Fi','Cyberpunk','Ambient','Future Bass','Chillwave'];
                $allT = array_merge($tItems, $tItems);
            @endphp
            @foreach($allT as $ti)
            <span class="ticker-item">
                <span class="ticker-dot"></span>
                <span class="{{ in_array($ti, ['New Releases','Featured Artists']) ? 'ticker-accent' : '' }}">{{ $ti }}</span>
            </span>
            @endforeach
        </div>
    </div>

    <!-- NEW RELEASES -->
    <section class="releases-section" id="releases">
        <div class="container">
            <div class="section-header-row">
                <div class="section-header-left">
                    <h2>New Releases</h2>
                    <p>Fresh tracks, straight to you</p>
                    <div class="section-neon-bar"></div>
                </div>
                <a href="{{ route('musics') }}" class="view-all-link">View All <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="releases-grid">
                @forelse($newestSongs as $song)
                <a href="{{ route('song_info', $song->id) }}" class="release-card">
                    <div class="release-art">
                        <img src="{{ $song->image ? asset('song-images/' . $song->image) : asset('images/TentacitV1.1.png') }}"
                             alt="{{ $song->songname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                        <div class="release-art-overlay">
                            <div class="release-play-btn"><i class="fas fa-play" style="margin-left:3px;"></i></div>
                        </div>
                        <span class="release-art-badge">New</span>
                    </div>
                    <div class="release-info">
                        @if($song->genre)<span class="release-genre-tag">{{ $song->genre }}</span>@endif
                        <p class="release-title">{{ $song->songname }}</p>
                        <p class="release-artist">{{ $song->author }}</p>
                    </div>
                </a>
                @empty
                <div style="grid-column:1/-1;text-align:center;padding:60px 0;">
                    <p style="color:var(--text-muted);text-transform:uppercase;letter-spacing:2px;font-size:13px;">No releases yet &mdash; check back soon.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- BROWSE BY VIBE (channel cards) -->
    <section class="channels-section">
        <div class="container">
            <div class="section-header-row">
                <div class="section-header-left">
                    <h2>Browse by Vibe</h2>
                    <p>Pick your sonic universe</p>
                    <div class="section-neon-bar"></div>
                </div>
            </div>
            <div class="channel-row">
                <a href="{{ route('musics') }}" class="channel-card">
                    <div class="channel-bg"></div>
                    <div class="channel-overlay">
                        <div class="channel-icon">&#9889;</div>
                        <div class="channel-name">Electric</div>
                        <p class="channel-desc">High energy &amp; hard-hitting beats</p>
                    </div>
                    <div class="channel-arrow"><i class="fas fa-arrow-right" style="font-size:12px;"></i></div>
                </a>
                <a href="{{ route('musics') }}" class="channel-card">
                    <div class="channel-bg"></div>
                    <div class="channel-overlay">
                        <div class="channel-icon">&#127754;</div>
                        <div class="channel-name">Liquid</div>
                        <p class="channel-desc">Smooth, melodic &amp; atmospheric</p>
                    </div>
                    <div class="channel-arrow"><i class="fas fa-arrow-right" style="font-size:12px;"></i></div>
                </a>
                <a href="{{ route('musics') }}" class="channel-card">
                    <div class="channel-bg"></div>
                    <div class="channel-overlay">
                        <div class="channel-icon">&#127756;</div>
                        <div class="channel-name">Cosmic</div>
                        <p class="channel-desc">Cinematic, ambient &amp; deep</p>
                    </div>
                    <div class="channel-arrow"><i class="fas fa-arrow-right" style="font-size:12px;"></i></div>
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURED ARTISTS -->
    <section class="artists-section">
        <div class="container">
            <div class="section-header-row">
                <div class="section-header-left">
                    <h2>Featured Artists</h2>
                    <p>The voices behind the music</p>
                    <div class="section-neon-bar" style="background:linear-gradient(90deg,var(--neon-blue),var(--neon-cyan));box-shadow:0 0 15px rgba(56,189,248,0.4);"></div>
                </div>
                <a href="{{ route('artists') }}" class="view-all-link">All Artists <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="artists-grid">
                @forelse($admiredArtists as $artist)
                <a href="{{ route('artist_info', $artist->id) }}" class="artist-card">
                    <div class="artist-avatar-wrap">
                        <img src="{{ $artist->image ? asset('artist-profile-images/' . $artist->image) : asset('images/TentacitV1.1.png') }}"
                             alt="{{ $artist->artistname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                    </div>
                    <p class="artist-card-name">{{ $artist->artistname }}</p>
                    @if($artist->genre)<p class="artist-card-genre">{{ $artist->genre }}</p>@endif
                </a>
                @empty
                <div style="grid-column:1/-1;text-align:center;padding:40px 0;">
                    <p style="color:var(--text-muted);text-transform:uppercase;letter-spacing:2px;font-size:13px;">Artists coming soon.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-inner">
                <div class="stat-item">
                    <span class="stat-number">{{ $artistCount ?? 0 }}+</span>
                    <span class="stat-label">Artists Signed</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ $songCount ?? 0 }}+</span>
                    <span class="stat-label">Tracks Released</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">&#8734;</span>
                    <span class="stat-label">Possibilities</span>
                </div>
            </div>
        </div>
    </section>

    <!-- WHAT WE DO -->
    <section class="features-section">
        <div class="container">
            <div class="section-header-row" style="justify-content:center;text-align:center;flex-direction:column;align-items:center;">
                <div class="section-header-left" style="text-align:center;">
                    <h2>What We Do</h2>
                    <p>Empowering artists to build their music careers</p>
                    <div class="section-neon-bar" style="margin:12px auto 0;"></div>
                </div>
            </div>
            <div class="row g-4 mt-2">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrap"><i class="fas fa-handshake"></i></div>
                        <h4>Artist Development</h4>
                        <p>We nurture talent from the ground up, providing the resources and guidance needed to turn musical passion into a thriving career.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrap" style="background:rgba(56,189,248,0.08);color:var(--neon-blue);border-color:rgba(56,189,248,0.15);">
                            <i class="fas fa-globe-americas"></i>
                        </div>
                        <h4>Global Distribution</h4>
                        <p>Get your music on Spotify, Apple Music, YouTube Music, and all major streaming platforms worldwide.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrap" style="background:rgba(34,211,238,0.08);color:var(--neon-cyan);border-color:rgba(34,211,238,0.15);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Rights Management</h4>
                        <p>We handle the business side so you can focus on what matters most — creating incredible music.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="cta-divider"></div>
        <div class="container" style="position:relative;z-index:1;">
            <span class="cta-eyebrow">Join the movement</span>
            <h2>Ready to Make<br>Your Mark?</h2>
            <p>Join Tentacit Records and let's create something extraordinary together. Your music deserves to be heard.</p>
            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('details') }}" class="btn-tentacit"><i class="fas fa-info-circle me-2"></i>Learn More</a>
                <a href="{{ route('artists') }}" class="btn-tentacit-outline"><i class="fas fa-star me-2"></i>Meet the Artists</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="social-links mb-4">
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Spotify"><i class="fab fa-spotify"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="SoundCloud"><i class="fab fa-soundcloud"></i></a>
                <a href="#" aria-label="Discord"><i class="fab fa-discord"></i></a>
            </div>
            <div style="display:flex;gap:30px;justify-content:center;margin-bottom:20px;flex-wrap:wrap;">
                <a href="{{ route('musics') }}" style="color:rgba(255,255,255,0.3);font-size:12px;text-decoration:none;text-transform:uppercase;letter-spacing:2px;transition:color 0.2s;" onmouseover="this.style.color='#a855f7'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">Music</a>
                <a href="{{ route('artists') }}" style="color:rgba(255,255,255,0.3);font-size:12px;text-decoration:none;text-transform:uppercase;letter-spacing:2px;transition:color 0.2s;" onmouseover="this.style.color='#a855f7'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">Artists</a>
                <a href="{{ route('details') }}" style="color:rgba(255,255,255,0.3);font-size:12px;text-decoration:none;text-transform:uppercase;letter-spacing:2px;transition:color 0.2s;" onmouseover="this.style.color='#a855f7'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">About</a>
            </div>
            <p>&copy; {{ date('Y') }} Tentacit Records. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Stagger-in animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, parseInt(entry.target.dataset.delay) || 0);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08 });

        document.querySelectorAll('.release-card, .artist-card, .channel-card, .feature-card').forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.55s ease, transform 0.55s ease';
            el.dataset.delay = (i % 4) * 75;
            observer.observe(el);
        });
    </script>
</body>
</html>
