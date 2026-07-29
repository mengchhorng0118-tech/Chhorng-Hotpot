<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Hotpot Enterprise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #c62828;
            --primary-dark: #8b0000;
            --secondary: #1a237e;
            --success: #00c853;
            --warning: #ff9800;
            --gold: #ffd700;
            --light: #f5f5f5;
            --dark: #212121;
        }

        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background: radial-gradient(circle at center, #2b1055 0%, #000000 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }

        /* Canvas for Fireworks */
        canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        /* Main Container */
        .container {
            position: relative;
            z-index: 10;
            text-align: center;
            animation: scaleIn 0.8s ease-out;
        }

        /* Scene - 3D Perspective */
        .scene {
            perspective: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Success Icon */
        .success-icon {
            font-size: 120px;
            color: var(--success);
            margin-bottom: 30px;
            animation: bounceIn 1s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            filter: drop-shadow(0 0 30px rgba(0, 200, 83, 0.6));
        }

        /* Main Title */
        .title {
            font-size: 72px;
            font-weight: 900;
            margin: 20px 0;
            background: linear-gradient(45deg, #ffd700, #ffae00, #fff5cc, #ffd700);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 4s ease infinite, float 3s ease-in-out infinite;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.4);
            transform-style: preserve-3d;
        }

        /* Subtitle */
        .subtitle {
            font-size: 24px;
            margin-top: 20px;
            color: #ffcc80;
            animation: fadeInDown 1s ease-out 0.3s both;
            font-weight: 500;
        }

        /* Order Details */
        .order-details {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 20px;
            padding: 30px;
            margin-top: 40px;
            max-width: 500px;
            animation: slideUp 1s ease-out 0.6s both;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 16px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #b0bec5;
            font-weight: 500;
        }

        .detail-value {
            color: var(--gold);
            font-weight: 700;
            font-size: 18px;
        }

        /* Receipt Download Section */
        .receipt-section {
            margin-top: 30px;
            animation: fadeIn 1s ease-out 0.9s both;
        }

        .receipt-section p {
            color: #b0bec5;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .receipt-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--warning), #ff6f00);
            color: white;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 152, 0, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(45deg, var(--primary), #ff6f00);
            color: white;
            z-index: 1;
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(198, 40, 40, 0.5);
        }

        .btn-outline {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            z-index: 1;
        }

        .btn-outline:hover {
            background: var(--gold);
            color: #2b1055;
            transform: translateY(-5px);
        }

        .btn-outline:hover i {
            transform: rotate(360deg);
        }

        .btn-menu {
            background: linear-gradient(45deg, var(--success), #00a844);
            color: white;
            z-index: 1;
            font-size: 18px;
            padding: 16px 40px;
        }

        .btn-menu:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(0, 200, 83, 0.6);
        }

        .btn-menu i {
            font-size: 20px;
        }

        .btn i {
            font-size: 18px;
            transition: all 0.3s ease;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
            animation: fadeIn 1s ease-out 1.2s both;
        }

        /* Return to Menu Button Container */
        .return-menu-container {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid rgba(255, 215, 0, 0.2);
            animation: slideUp 1s ease-out 1.5s both;
        }

        .return-menu-label {
            color: #b0bec5;
            font-size: 14px;
            margin-bottom: 12px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn-return-menu {
            background: linear-gradient(135deg, var(--success) 0%, #00a844 100%);
            color: white;
            font-size: 18px;
            padding: 18px 50px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 200, 83, 0.4);
            z-index: 1;
        }

        .btn-return-menu::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
            z-index: -1;
        }

        .btn-return-menu:hover::before {
            left: 100%;
        }

        .btn-return-menu:hover {
            transform: translateY(-8px) scale(1.08);
            box-shadow: 0 25px 60px rgba(0, 200, 83, 0.8),
                        inset 0 0 20px rgba(255, 255, 255, 0.2);
        }

        .btn-return-menu:active {
            transform: translateY(-4px) scale(1.04);
        }

        .btn-return-menu i {
            display: inline-block;
            margin-right: 12px;
            transition: all 0.3s ease;
            font-size: 20px;
        }

        .btn-return-menu:hover i {
            transform: translateX(-5px) rotate(-20deg);
        }

        /* Alternative Menu Button Styles */
        .btn-return-alt {
            background: linear-gradient(135deg, #ff9800 0%, #ff6f00 100%);
            color: white;
            font-size: 16px;
            padding: 14px 35px;
            border-radius: 40px;
            border: 2px solid transparent;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-return-alt:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 152, 0, 0.5);
        }

        /* Confetti */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: var(--gold);
            pointer-events: none;
        }

        /* Animations */
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                opacity: 1;
            }
            70% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: rotateY(0deg) translateY(0px);
            }
            50% {
                transform: rotateY(15deg) translateY(-20px);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }

        @keyframes confettiFall {
            to {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Loading Bar */
        .progress-bar {
            width: 300px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            margin: 30px auto 0;
            overflow: hidden;
            animation: slideUp 1s ease-out 1.5s both;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--warning), var(--gold), var(--warning));
            background-size: 200% 100%;
            animation: progressFill 3s ease-in-out;
        }

        @keyframes progressFill {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }

        /* Rating Stars */
        .rating-section {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 1s ease-out 1.8s both;
        }

        .rating-section h3 {
            color: #ffcc80;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .stars {
            display: flex;
            gap: 15px;
            justify-content: center;
            font-size: 40px;
            cursor: pointer;
        }

        .star {
            color: #666;
            transition: all 0.3s ease;
        }

        .star:hover,
        .star.active {
            color: var(--gold);
            transform: scale(1.2) rotate(360deg);
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.6));
        }

        /* Social Share */
        .social-share {
            margin-top: 30px;
            animation: fadeIn 1s ease-out 2s both;
        }

        .social-share h3 {
            color: #ffcc80;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 20px;
            color: var(--gold);
        }

        .social-icon:hover {
            background: var(--gold);
            color: #2b1055;
            transform: translateY(-5px) rotate(360deg);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .title {
                font-size: 48px;
            }

            .subtitle {
                font-size: 18px;
            }

            .success-icon {
                font-size: 80px;
            }

            .order-details {
                max-width: 90%;
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .btn-return-menu {
                width: 100%;
                padding: 16px 30px;
                font-size: 16px;
            }

            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .receipt-buttons {
                flex-direction: column;
            }

            .receipt-buttons .btn {
                width: 100%;
            }
        }

        /* Cursor Effect */
        .cursor-glow {
            position: fixed;
            width: 50px;
            height: 50px;
            border: 2px solid rgba(255, 215, 0, 0.5);
            border-radius: 50%;
            pointer-events: none;
            display: none;
            z-index: 999;
            animation: pulse 1s infinite;
        }

        .cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background: var(--gold);
            border-radius: 50%;
            pointer-events: none;
            display: none;
            z-index: 999;
        }

        /* Button pulse effect */
        .btn-return-menu::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            transform: translate(-50%, -50%) scale(1);
            z-index: -2;
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Canvas for Fireworks -->
    <canvas id="fireworks"></canvas>

    <!-- Cursor Effects -->
    <div class="cursor-glow"></div>
    <div class="cursor-dot"></div>

    <!-- Main Container -->
    <div class="container">
        <div class="scene">
            <!-- Success Icon -->
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>

            <!-- Title -->
            <h1 class="title">THANK YOU!</h1>

            <!-- Subtitle -->
            <p class="subtitle">
                Your order has been confirmed 🍲
            </p>

            <!-- Order Details -->
            <div class="order-details">
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-receipt"></i> Order ID:</span>
                    <span class="detail-value" id="orderID">ORD-2024-001</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-chair"></i> Table:</span>
                    <span class="detail-value" id="tableNum">5</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-list"></i> Items:</span>
                    <span class="detail-value" id="itemCount">4</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-dollar-sign"></i> Total Amount:</span>
                    <span class="detail-value" id="totalAmount">$85.50</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label"><i class="fas fa-clock"></i> Prep Time:</span>
                    <span class="detail-value">20-25 mins</span>
                </div>
            </div>

            <!-- Receipt Section -->
            <div class="receipt-section">
                <p>Would you like to download your receipt?</p>
                <div class="receipt-buttons">
                    <button class="btn btn-secondary" onclick="downloadPDF()">
                        <i class="fas fa-file-pdf"></i> Download PDF
                    </button>
                    <button href="/resources/views/customer/menu.blade.php" class="btn btn-outline" onclick="printReceipt()">
                        <i class="fas fa-print"></i> Print Receipt
                    </button>
                    <button href="/resources/views/customer/menu.blade.php" class="btn btn-outline" onclick="Returntomenu()">
                        <i class="fas fa-print"></i><!-- USING ANCHOR TAG (Recommended) -->
<a href="{{ route('menu') }}" class="btn btn-outline">
    <i class="fas fa-arrow-left"></i> Return to Menu
</a>
                    </button>
                </div>
            </div>

            <!-- Rating Section -->
            <div class="rating-section" id="ratingSection">
                <h3>Rate Your Experience</h3>
                <div class="stars" id="stars">
                    <span class="star" onclick="setRating(1)">★</span>
                    <span class="star" onclick="setRating(2)">★</span>
                    <span class="star" onclick="setRating(3)">★</span>
                    <span class="star" onclick="setRating(4)">★</span>
                    <span class="star" onclick="setRating(5)">★</span>
                </div>
            </div>

            <!-- Social Share -->
            <div class="social-share">
                <h3>Share with Friends</h3>
                <div class="social-icons">
                    <div class="social-icon" onclick="shareOn('facebook')" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-icon" onclick="shareOn('twitter')" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="social-icon" onclick="shareOn('whatsapp')" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="social-icon" onclick="shareOn('instagram')" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>

            <!-- RETURN TO MENU BUTTON -->
            <div class="return-menu-container">
                <span class="return-menu-label">Continue Shopping</span>
                <button class="btn-return-menu" onclick="goToMenu()">
                    <i class="fas fa-arrow-left"></i> Return to Menu
                </button>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-primary" onclick="newOrder()">
                    <i class="fas fa-plus"></i> New Order
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    </div>

    <script>
        // ==================== FIREWORKS EFFECT ====================
        const canvas = document.getElementById("fireworks");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];
        let confetti = [];

        // Firework Particle Class
        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.angle = Math.random() * 2 * Math.PI;
                this.speed = Math.random() * 6 + 2;
                this.radius = Math.random() * 3 + 1;
                this.life = 1;
                this.decay = Math.random() * 0.02 + 0.015;
                this.colors = ['#ffd700', '#ffae00', '#ff6f00', '#ff9800', '#fff5cc'];
                this.color = this.colors[Math.floor(Math.random() * this.colors.length)];
            }

            update() {
                this.x += Math.cos(this.angle) * this.speed;
                this.y += Math.sin(this.angle) * this.speed;
                this.speed *= 0.98;
                this.life -= this.decay;
                this.radius *= 0.96;
            }

            draw() {
                ctx.globalAlpha = this.life;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.globalAlpha = 1;
            }
        }

        // Confetti Class
        class Confetti {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.angle = Math.random() * 2 * Math.PI;
                this.speed = Math.random() * 5 + 2;
                this.width = Math.random() * 8 + 4;
                this.height = Math.random() * 6 + 3;
                this.rotation = Math.random() * 360;
                this.rotationSpeed = Math.random() * 10 + 5;
                this.life = 1;
                this.colors = ['#ffd700', '#ffae00', '#ff6f00', '#ff9800', '#00c853', '#00bcd4'];
                this.color = this.colors[Math.floor(Math.random() * this.colors.length)];
            }

            update() {
                this.x += Math.cos(this.angle) * this.speed;
                this.y += Math.sin(this.angle) * this.speed;
                this.speed *= 0.99;
                this.life -= 0.01;
                this.rotation += this.rotationSpeed;
            }

            draw() {
                ctx.globalAlpha = this.life;
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate((this.rotation * Math.PI) / 180);
                ctx.fillStyle = this.color;
                ctx.fillRect(-this.width / 2, -this.height / 2, this.width, this.height);
                ctx.restore();
                ctx.globalAlpha = 1;
            }
        }

        function createFirework() {
            let x = Math.random() * canvas.width;
            let y = Math.random() * (canvas.height / 2) + 100;

            for (let i = 0; i < 60; i++) {
                particles.push(new Particle(x, y));
            }

            // Add confetti
            for (let i = 0; i < 30; i++) {
                confetti.push(new Confetti(x, y));
            }
        }

        function animate() {
            ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Update and draw particles
            particles.forEach((p, index) => {
                p.update();
                p.draw();

                if (p.life <= 0) {
                    particles.splice(index, 1);
                }
            });

            // Update and draw confetti
            confetti.forEach((c, index) => {
                c.update();
                c.draw();

                if (c.life <= 0) {
                    confetti.splice(index, 1);
                }
            });

            requestAnimationFrame(animate);
        }

        // Start fireworks every 1.5 seconds
        setInterval(createFirework, 1500);
        animate();

        // ==================== CURSOR EFFECTS ====================
        const cursorGlow = document.querySelector('.cursor-glow');
        const cursorDot = document.querySelector('.cursor-dot');

        document.addEventListener('mousemove', (e) => {
            cursorGlow.style.left = e.clientX - 25 + 'px';
            cursorGlow.style.top = e.clientY - 25 + 'px';
            cursorDot.style.left = e.clientX - 4 + 'px';
            cursorDot.style.top = e.clientY - 4 + 'px';
        });

        // Show cursor effects on hover
        document.querySelectorAll('.btn, .btn-return-menu').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                cursorGlow.style.display = 'block';
                cursorDot.style.display = 'block';
            });
            btn.addEventListener('mouseleave', () => {
                cursorGlow.style.display = 'none';
                cursorDot.style.display = 'none';
            });
        });

        // ==================== ORDER DATA ====================
        function loadOrderData() {
            const orderData = JSON.parse(sessionStorage.getItem('currentOrder')) || {
                id: 'ORD-2024-' + Math.floor(Math.random() * 10000),
                table: 5,
                items: 4,
                total: 85.50
            };

            document.getElementById('orderID').textContent = orderData.id;
            document.getElementById('tableNum').textContent = orderData.table;
            document.getElementById('itemCount').textContent = orderData.items;
            document.getElementById('totalAmount').textContent = '$' + orderData.total.toFixed(2);
        }

        // ==================== FUNCTIONS ====================
        function setRating(rating) {
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });

            // Save rating
            localStorage.setItem('lastRating', rating);
        }

        function shareOn(platform) {
            const text = "Just enjoyed delicious hotpot at Hotpot Enterprise! 🍲";
            const url = window.location.href;

            let shareUrl = '';
            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`;
                    break;
                case 'instagram':
                    alert('Share on Instagram manually from your device');
                    return;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        }

        function downloadPDF() {
            alert('Downloading receipt as PDF...');
            // Implementation would use a library like jsPDF
        }

        function printReceipt() {
            window.print();
        }

        // ==================== RETURN TO MENU FUNCTION ====================
        function goToMenu() {
            // Add a brief animation before redirecting
            document.querySelector('.scene').style.animation = 'scaleOut 0.5s ease-in';
            setTimeout(() => {
                window.location.href = 'HotpotSoup';
            }, 300);
        }

        function newOrder() {
            sessionStorage.clear();
            goToMenu();
        }

        // Scale out animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes scaleOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }
                to {
                    opacity: 0;
                    transform: scale(0.8);
                }
            }
        `;
        document.head.appendChild(style);

        // ==================== INITIALIZE ====================
        document.addEventListener('DOMContentLoaded', () => {
            loadOrderData();

            // Auto-redirect after 60 seconds
            // setTimeout(() => {
            //     goToMenu();
            // }, 60000);
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                goToMenu();
            }
            if (e.key === 'Enter') {
                newOrder();
            }
        });
    </script>

</body>
</html>
