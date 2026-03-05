<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SD-Ploy Testing</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0a0f;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* Animated gradient background */
        .bg-gradient {
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% 0%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse 60% 50% at 80% 50%, rgba(236, 72, 153, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
            z-index: 0;
        }

        /* Floating grid lines */
        .grid-overlay {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 1;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }

        /* Floating orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 1;
            animation: float 8s ease-in-out infinite;
        }

        .orb-1 {
            width: 400px; height: 400px;
            background: rgba(99, 102, 241, 0.15);
            top: -100px; left: -100px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 350px; height: 350px;
            background: rgba(236, 72, 153, 0.12);
            bottom: -80px; right: -80px;
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .orb-3 {
            width: 250px; height: 250px;
            background: rgba(59, 130, 246, 0.1);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -5s;
            animation-duration: 12s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -20px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }

        /* Main content */
        .container {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 800px;
            padding: 2rem;
        }

        /* Badge */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 9999px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.25);
            font-size: 0.8rem;
            font-weight: 500;
            color: rgba(165, 160, 255, 0.9);
            margin-bottom: 2rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            animation: fadeInDown 0.8s ease-out;
        }

        .badge .dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #6366f1;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4); }
            50% { opacity: 0.7; box-shadow: 0 0 0 8px rgba(99, 102, 241, 0); }
        }

        /* Title */
        h1 {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .title-line-1 {
            display: block;
            color: rgba(255, 255, 255, 0.95);
        }

        .title-line-2 {
            display: block;
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .title-line-3 {
            display: block;
            color: rgba(255, 255, 255, 0.95);
        }

        /* Subtitle */
        .subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: rgba(255, 255, 255, 0.45);
            line-height: 1.6;
            max-width: 550px;
            margin: 0 auto 2.5rem;
            font-weight: 400;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        /* Terminal card */
        .terminal {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            max-width: 500px;
            margin: 0 auto;
            text-align: left;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        .terminal-header {
            display: flex;
            gap: 6px;
            margin-bottom: 1rem;
        }

        .terminal-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
        }

        .terminal-dot:nth-child(1) { background: #ef4444; }
        .terminal-dot:nth-child(2) { background: #eab308; }
        .terminal-dot:nth-child(3) { background: #22c55e; }

        .terminal-body {
            font-family: 'SF Mono', 'Fira Code', 'Cascadia Code', monospace;
            font-size: 0.85rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.6);
        }

        .terminal-body .prompt {
            color: #6366f1;
        }

        .terminal-body .command {
            color: rgba(255, 255, 255, 0.85);
        }

        .terminal-body .output {
            color: #22c55e;
        }

        .terminal-body .flag {
            color: #a855f7;
        }

        /* Cursor blink */
        .cursor {
            display: inline-block;
            width: 8px;
            height: 16px;
            background: #6366f1;
            margin-left: 2px;
            vertical-align: text-bottom;
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Footer */
        .footer {
            margin-top: 3rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease-out 0.8s both;
        }

        .footer a {
            color: rgba(99, 102, 241, 0.6);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: #6366f1;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Scanline effect */
        .scanline {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.3), transparent);
            z-index: 100;
            animation: scan 4s ease-in-out infinite;
        }

        @keyframes scan {
            0% { top: -2px; opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { top: 100vh; opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="scanline"></div>
    <div class="bg-gradient"></div>
    <div class="grid-overlay"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="container">
        <div class="badge">
            <span class="dot"></span>
            Testing Environment
        </div>

        <h1>
            <span class="title-line-1">This is the</span>
            <span class="title-line-2">Testing Application</span>
            <span class="title-line-3">for SD-Ploy Deployment Script</span>
        </h1>

        <p class="subtitle">
            A deployment verification endpoint used to confirm that the
            SD-Ploy automated deployment pipeline is working correctly.
        </p>

        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot"></div>
                <div class="terminal-dot"></div>
                <div class="terminal-dot"></div>
            </div>
            <div class="terminal-body">
                <div><span class="prompt">$</span> <span class="command">sd-ploy deploy</span> <span class="flag">--target</span> <span class="command">production</span></div>
                <div><span class="output">✓ Build successful</span></div>
                <div><span class="output">✓ Assets compiled</span></div>
                <div><span class="output">✓ Deployed to server</span></div>
                <div><span class="prompt">$</span> <span class="cursor"></span></div>
            </div>
        </div>

        <div class="footer">
            Powered by <a href="https://github.com/hehecoding" target="_blank">HeHe Coding</a> &middot; Laravel {{ app()->version() }}
        </div>
    </div>
</body>
</html>
