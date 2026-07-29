<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaBook - Aquarium Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #00a8e8;
            --primary-dark: #0076b6;
            --secondary: #00c9ff;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f0f9ff;
            --dark: #0f172a;
            --border: #e0f2fe;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo i {
            font-size: 2rem;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
        }

        .btn-secondary:hover {
            background: #f0f9ff;
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Sections */
        section {
            display: none;
            animation: fadeIn 0.3s;
        }

        section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 4rem 0;
            color: var(--dark);
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.125rem;
            color: #475569;
            margin-bottom: 2rem;
        }

        /* Home Section */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 0.75rem;
            color: var(--primary);
        }

        /* Booking Section */
        .booking-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin: 2rem 0;
        }

        .booking-form,
        .booking-summary {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid var(--border);
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 168, 232, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Aquarium Selection */
        .aquarium-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .aquarium-card {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .aquarium-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow);
        }

        .aquarium-card.selected {
            border-color: var(--primary);
            background: #f0f9ff;
        }

        .aquarium-icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
        }

        .aquarium-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .aquarium-price {
            color: var(--primary);
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* Ticket Types */
        .ticket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .ticket-option {
            border: 2px solid var(--border);
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .ticket-option:hover {
            border-color: var(--primary);
            background: #f0f9ff;
        }

        .ticket-option.selected {
            border-color: var(--primary);
            background: #f0f9ff;
            box-shadow: var(--shadow);
        }

        .ticket-type {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .ticket-price {
            color: var(--primary);
            font-weight: bold;
        }

        /* Booking Summary */
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .summary-item.total {
            border: none;
            padding-top: 1rem;
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .price-breakdown {
            background: #f0f9ff;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Visitor Info */
        .visitor-form {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        .visitor-form h3 {
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        /* Special Offers */
        .offers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .offer-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .offer-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .offer-content {
            position: relative;
            z-index: 1;
        }

        .offer-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .offer-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .offer-desc {
            margin-bottom: 1rem;
            opacity: 0.95;
        }

        /* My Bookings */
        .bookings-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .bookings-table thead {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .bookings-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .bookings-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .bookings-table tbody tr:hover {
            background: #f0f9ff;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #7f1d1d;
        }

        /* Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .gallery-item {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            cursor: pointer;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
        }

        .gallery-info {
            background: white;
            padding: 1rem;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .contact-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6b7280;
        }

        .modal-close:hover {
            color: var(--dark);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            margin-top: 4rem;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            color: #cbd5e1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-right {
                flex-direction: column;
                width: 100%;
            }

            .booking-container {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 1.75rem;
            }

            .feature-grid,
            .gallery-grid,
            .offers-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Alert Messages */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .alert.active {
            display: block;
            animation: slideInDown 0.3s;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .alert-error {
            background: #fee2e2;
            color: #7f1d1d;
            border: 1px solid #fca5a5;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 4px solid var(--border);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-water"></i>
                <span>AquaBook</span>
            </div>
            <nav class="nav-right">
                <button class="btn btn-secondary" onclick="showSection('home')">
                    <i class="fas fa-home"></i> Home
                </button>
                <button class="btn btn-secondary" onclick="showSection('booking')">
                    <i class="fas fa-ticket-alt"></i> Book Now
                </button>
                <button class="btn btn-secondary" onclick="showSection('mybookings')">
                    <i class="fas fa-calendar-check"></i> My Bookings
                </button>
                <button class="btn btn-secondary" onclick="showSection('contact')">
                    <i class="fas fa-envelope"></i> Contact
                </button>
                <div class="user-info">
                    <i class="fas fa-user-circle" style="font-size: 1.5rem;"></i>
                    <span>Guest</span>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <!-- Alert Messages -->
        <div id="alertBox" class="alert"></div>

        <!-- Home Section -->
        <section id="home" class="active">
            <div class="hero">
                <h1>🐠 Welcome to AquaBook 🐠</h1>
                <p>Discover the wonders of marine life at our world-class aquarium</p>
                <button class="btn btn-primary btn-block" onclick="showSection('booking')" style="max-width: 300px; margin: 0 auto;">
                    <i class="fas fa-ticket-alt"></i> Book Your Visit Now
                </button>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏛️</div>
                    <h3>Multiple Locations</h3>
                    <p>Visit our beautiful aquariums across the city</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👨‍👩‍👧‍👦</div>
                    <h3>Family-Friendly</h3>
                    <p>Perfect for groups and family outings</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎫</div>
                    <h3>Easy Booking</h3>
                    <p>Quick and secure online ticket purchases</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Best Prices</h3>
                    <p>Group discounts and special offers available</p>
                </div>
            </div>

            <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; color: var(--dark);">Featured Aquariums</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <div class="gallery-image">🐠 🐡 🐟</div>
                    <div class="gallery-info">
                        <h4>Tropical Fish Zone</h4>
                        <p>Colorful tropical species</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image">🦀 🦞 🐙</div>
                    <div class="gallery-info">
                        <h4>Deep Sea Creatures</h4>
                        <p>Fascinating deep sea animals</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image">🐢 🦭 🦈</div>
                    <div class="gallery-info">
                        <h4>Marine Giants</h4>
                        <p>Meet the ocean's biggest inhabitants</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image">🌊 🐚 🦪</div>
                    <div class="gallery-info">
                        <h4>Coral Reef</h4>
                        <p>Stunning coral ecosystems</p>
                    </div>
                </div>
            </div>

            <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; color: var(--dark);">Special Offers</h2>
            <div class="offers-grid">
                <div class="offer-card">
                    <div class="offer-content">
                        <div class="offer-badge">🎉 SPECIAL</div>
                        <div class="offer-title">Family Pass</div>
                        <div class="offer-desc">Get 25% off for 4 or more tickets</div>
                        <button class="btn btn-secondary" onclick="showSection('booking')">Book Now</button>
                    </div>
                </div>
                <div class="offer-card">
                    <div class="offer-content">
                        <div class="offer-badge">👶 KIDS</div>
                        <div class="offer-title">Kids Under 5</div>
                        <div class="offer-desc">Free admission for children under 5</div>
                        <button class="btn btn-secondary" onclick="showSection('booking')">Book Now</button>
                    </div>
                </div>
                <div class="offer-card">
                    <div class="offer-content">
                        <div class="offer-badge">🎓 STUDENTS</div>
                        <div class="offer-title">Student Discount</div>
                        <div class="offer-desc">20% off with valid student ID</div>
                        <button class="btn btn-secondary" onclick="showSection('booking')">Book Now</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Booking Section -->
        <section id="booking">
            <div class="hero" style="padding: 2rem 0;">
                <h1>Book Your Aquarium Visit</h1>
                <p>Choose your perfect aquarium experience</p>
            </div>

            <div class="booking-container">
                <div class="booking-form">
                    <h3 style="margin-bottom: 2rem; color: var(--dark);">
                        <i class="fas fa-list"></i> Booking Details
                    </h3>

                    <!-- Step 1: Select Aquarium -->
                    <div class="form-group">
                        <label>Select Aquarium Location</label>
                        <div class="aquarium-grid">
                            <div class="aquarium-card" onclick="selectAquarium(this, 'Downtown Aquarium', 35)" data-price="35">
                                <div class="aquarium-icon">🏛️</div>
                                <div class="aquarium-name">Downtown</div>
                                <div class="aquarium-price">$35</div>
                            </div>
                            <div class="aquarium-card" onclick="selectAquarium(this, 'Beach Aquarium', 45)" data-price="45">
                                <div class="aquarium-icon">🏖️</div>
                                <div class="aquarium-name">Beach</div>
                                <div class="aquarium-price">$45</div>
                            </div>
                            <div class="aquarium-card" onclick="selectAquarium(this, 'Wildlife Aquarium', 50)" data-price="50">
                                <div class="aquarium-icon">🦁</div>
                                <div class="aquarium-name">Wildlife</div>
                                <div class="aquarium-price">$50</div>
                            </div>
                            <div class="aquarium-card" onclick="selectAquarium(this, 'Mega Aquarium', 60)" data-price="60">
                                <div class="aquarium-icon">🌊</div>
                                <div class="aquarium-name">Mega</div>
                                <div class="aquarium-price">$60</div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Select Ticket Type -->
                    <div class="form-group">
                        <label>Select Ticket Type</label>
                        <div class="ticket-grid">
                            <div class="ticket-option" onclick="selectTicketType(this, 'Adult', 1.0)">
                                <div class="ticket-type">Adult</div>
                                <div class="ticket-price">Full Price</div>
                            </div>
                            <div class="ticket-option" onclick="selectTicketType(this, 'Child (5-12)', 0.6)">
                                <div class="ticket-type">Child</div>
                                <div class="ticket-price">60% Off</div>
                            </div>
                            <div class="ticket-option" onclick="selectTicketType(this, 'Senior', 0.7)">
                                <div class="ticket-type">Senior</div>
                                <div class="ticket-price">30% Off</div>
                            </div>
                            <div class="ticket-option" onclick="selectTicketType(this, 'Student', 0.8)">
                                <div class="ticket-type">Student</div>
                                <div class="ticket-price">20% Off</div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Date and Time -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="visitDate">Visit Date</label>
                            <input type="date" id="visitDate" class="form-control" onchange="updateSummary()">
                        </div>
                        <div class="form-group">
                            <label for="visitTime">Visit Time</label>
                            <select id="visitTime" class="form-control" onchange="updateSummary()">
                                <option>Select Time</option>
                                <option>09:00 AM</option>
                                <option>11:00 AM</option>
                                <option>01:00 PM</option>
                                <option>03:00 PM</option>
                                <option>05:00 PM</option>
                                <option>07:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <!-- Step 4: Number of Tickets -->
                    <div class="form-group">
                        <label for="ticketCount">Number of Tickets</label>
                        <input type="number" id="ticketCount" class="form-control" value="1" min="1" max="10" onchange="updateSummary()">
                    </div>

                    <!-- Promo Code -->
                    <div class="form-group">
                        <label for="promoCode">Promo Code (Optional)</label>
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="text" id="promoCode" class="form-control" placeholder="Enter promo code">
                            <button class="btn btn-primary" onclick="applyPromo()">Apply</button>
                        </div>
                    </div>
                </div>

                <!-- Booking Summary -->
                <div class="booking-summary">
                    <h3 style="margin-bottom: 1.5rem; color: var(--dark);">
                        <i class="fas fa-receipt"></i> Order Summary
                    </h3>

                    <div class="price-breakdown">
                        <div class="summary-item">
                            <span>Aquarium:</span>
                            <span id="sumAquarium">Not selected</span>
                        </div>
                        <div class="summary-item">
                            <span>Ticket Type:</span>
                            <span id="sumTicketType">Not selected</span>
                        </div>
                        <div class="summary-item">
                            <span>Date:</span>
                            <span id="sumDate">Not selected</span>
                        </div>
                        <div class="summary-item">
                            <span>Time:</span>
                            <span id="sumTime">Not selected</span>
                        </div>
                        <div class="summary-item">
                            <span>Number of Tickets:</span>
                            <span id="sumTickets">1</span>
                        </div>
                        <div class="summary-item">
                            <span>Price per Ticket:</span>
                            <span id="sumPricePerTicket">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span id="sumSubtotal">$0.00</span>
                        </div>
                        <div class="summary-item" id="discountRow" style="display: none; color: var(--success);">
                            <span>Discount:</span>
                            <span id="sumDiscount">-$0.00</span>
                        </div>
                        <div class="summary-item total">
                            <span>Total:</span>
                            <span id="sumTotal">$0.00</span>
                        </div>
                    </div>

                    <button class="btn btn-success btn-block" onclick="proceedToVisitorInfo()">
                        <i class="fas fa-arrow-right"></i> Continue to Visitor Info
                    </button>
                    <button class="btn btn-secondary btn-block" style="margin-top: 0.5rem;" onclick="showSection('home')">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </div>
        </section>

        <!-- Visitor Info Section -->
        <section id="visitorinfo">
            <div class="visitor-form">
                <h2 style="margin-bottom: 2rem;">
                    <i class="fas fa-user"></i> Visitor Information
                </h2>

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name *</label>
                        <input type="text" id="firstName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name *</label>
                        <input type="text" id="lastName" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Zip Code</label>
                        <input type="text" id="zipcode" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" id="newsletter"> Subscribe to our newsletter for special offers
                    </label>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <button class="btn btn-primary" onclick="completeBooking()">
                        <i class="fas fa-check"></i> Complete Booking
                    </button>
                    <button class="btn btn-secondary" onclick="showSection('booking')">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                </div>
            </div>
        </section>

        <!-- My Bookings Section -->
        <section id="mybookings">
            <div class="hero" style="padding: 2rem 0;">
                <h1>My Bookings</h1>
                <p>Manage your aquarium reservations</p>
            </div>

            <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: var(--shadow);">
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Aquarium</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Tickets</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <!-- Bookings will be populated here -->
                    </tbody>
                </table>
                <p id="noBookingsMsg" style="text-align: center; color: #9ca3af; margin-top: 2rem;">
                    No bookings yet. <a href="#" onclick="showSection('booking')" style="color: var(--primary);">Book now!</a>
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact">
            <div class="hero" style="padding: 2rem 0;">
                <h1>Contact Us</h1>
                <p>Get in touch with our team</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Address</h3>
                    <p>123 Ocean Boulevard<br>Beach City, BC 12345<br>USA</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Phone</h3>
                    <p>+1 (555) 123-4567<br>+1 (555) 987-6543<br>Mon-Fri: 9AM-6PM</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>info@aquabook.com<br>support@aquabook.com<br>bookings@aquabook.com</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Hours</h3>
                    <p>Monday - Friday: 9AM - 9PM<br>Saturday - Sunday: 8AM - 10PM<br>Holidays: 10AM - 8PM</p>
                </div>
            </div>

            <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: var(--shadow); margin-top: 3rem;">
                <h3 style="margin-bottom: 1.5rem; color: var(--dark);">Send us a Message</h3>
                <form onsubmit="sendMessage(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactName">Name</label>
                            <input type="text" id="contactName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email</label>
                            <input type="email" id="contactEmail" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactSubject">Subject</label>
                        <input type="text" id="contactSubject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message</label>
                        <textarea id="contactMessage" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>About AquaBook</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Mission</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Book Tickets</a></li>
                        <li><a href="#">My Bookings</a></li>
                        <li><a href="#">Group Bookings</a></li>
                        <li><a href="#">Gift Cards</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 AquaBook. All rights reserved. | <a href="#" style="color: var(--secondary);">Privacy</a> | <a href="#" style="color: var(--secondary);">Terms</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Global Variables
        let bookings = JSON.parse(localStorage.getItem('bookings')) || [];
        let currentBooking = {
            aquarium: '',
            aquariumPrice: 0,
            ticketType: 'Adult',
            ticketMultiplier: 1.0,
            date: '',
            time: '',
            ticketCount: 1,
            promoDiscount: 0
        };

        // Show Section
        function showSection(sectionId) {
            document.querySelectorAll('section').forEach(section => {
                section.classList.remove('active');
            });
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.add('active');
                window.scrollTo(0, 0);
            }
            if (sectionId === 'mybookings') {
                loadBookings();
            }
        }

        // Select Aquarium
        function selectAquarium(element, name, price) {
            document.querySelectorAll('.aquarium-card').forEach(card => {
                card.classList.remove('selected');
            });
            element.classList.add('selected');
            currentBooking.aquarium = name;
            currentBooking.aquariumPrice = price;
            updateSummary();
        }

        // Select Ticket Type
        function selectTicketType(element, type, multiplier) {
            document.querySelectorAll('.ticket-option').forEach(option => {
                option.classList.remove('selected');
            });
            element.classList.add('selected');
            currentBooking.ticketType = type;
            currentBooking.ticketMultiplier = multiplier;
            updateSummary();
        }

        // Update Summary
        function updateSummary() {
            const date = document.getElementById('visitDate').value;
            const time = document.getElementById('visitTime').value;
            const ticketCount = parseInt(document.getElementById('ticketCount').value) || 1;

            currentBooking.date = date;
            currentBooking.time = time;
            currentBooking.ticketCount = ticketCount;

            const finalPrice = currentBooking.aquariumPrice * currentBooking.ticketMultiplier;
            const subtotal = finalPrice * ticketCount;
            const discount = subtotal * (currentBooking.promoDiscount / 100);
            const total = subtotal - discount;

            document.getElementById('sumAquarium').textContent = currentBooking.aquarium || 'Not selected';
            document.getElementById('sumTicketType').textContent = currentBooking.ticketType || 'Not selected';
            document.getElementById('sumDate').textContent = date || 'Not selected';
            document.getElementById('sumTime').textContent = time || 'Not selected';
            document.getElementById('sumTickets').textContent = ticketCount;
            document.getElementById('sumPricePerTicket').textContent = `$${finalPrice.toFixed(2)}`;
            document.getElementById('sumSubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('sumTotal').textContent = `$${total.toFixed(2)}`;

            if (discount > 0) {
                document.getElementById('discountRow').style.display = 'flex';
                document.getElementById('sumDiscount').textContent = `-$${discount.toFixed(2)}`;
            } else {
                document.getElementById('discountRow').style.display = 'none';
            }
        }

        // Apply Promo
        function applyPromo() {
            const promoCode = document.getElementById('promoCode').value.toUpperCase();
            const promoCodes = {
                'FAMILY25': 25,
                'STUDENT20': 20,
                'SUMMER30': 30,
                'AQUA10': 10
            };

            if (promoCodes[promoCode]) {
                currentBooking.promoDiscount = promoCodes[promoCode];
                showAlert(`Promo code applied! ${promoCodes[promoCode]}% discount`, 'success');
                updateSummary();
            } else {
                showAlert('Invalid promo code', 'error');
            }
        }

        // Proceed to Visitor Info
        function proceedToVisitorInfo() {
            if (!currentBooking.aquarium || !currentBooking.ticketType || !currentBooking.date || !currentBooking.time) {
                showAlert('Please fill in all booking details', 'error');
                return;
            }
            showSection('visitorinfo');
        }

        // Complete Booking
        function completeBooking() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            if (!firstName || !lastName || !email || !phone) {
                showAlert('Please fill in all required fields', 'error');
                return;
            }

            const finalPrice = currentBooking.aquariumPrice * currentBooking.ticketMultiplier;
            const subtotal = finalPrice * currentBooking.ticketCount;
            const discount = subtotal * (currentBooking.promoDiscount / 100);
            const total = subtotal - discount;

            const booking = {
                id: 'BK' + Date.now(),
                firstName,
                lastName,
                email,
                phone,
                aquarium: currentBooking.aquarium,
                ticketType: currentBooking.ticketType,
                date: currentBooking.date,
                time: currentBooking.time,
                tickets: currentBooking.ticketCount,
                total: total.toFixed(2),
                status: 'Confirmed',
                bookingDate: new Date().toLocaleDateString()
            };

            bookings.push(booking);
            localStorage.setItem('bookings', JSON.stringify(bookings));

            showAlert(`Booking confirmed! Confirmation sent to ${email}`, 'success');

            // Reset form
            resetBookingForm();
            setTimeout(() => showSection('mybookings'), 1500);
        }

        // Reset Booking Form
        function resetBookingForm() {
            document.getElementById('visitDate').value = '';
            document.getElementById('visitTime').value = '';
            document.getElementById('ticketCount').value = '1';
            document.getElementById('firstName').value = '';
            document.getElementById('lastName').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('address').value = '';
            document.getElementById('city').value = '';
            document.getElementById('zipcode').value = '';
            document.getElementById('promoCode').value = '';
            currentBooking = {
                aquarium: '',
                aquariumPrice: 0,
                ticketType: 'Adult',
                ticketMultiplier: 1.0,
                date: '',
                time: '',
                ticketCount: 1,
                promoDiscount: 0
            };
        }

        // Load Bookings
        function loadBookings() {
            const tbody = document.getElementById('bookingsTableBody');
            const noMsg = document.getElementById('noBookingsMsg');

            if (bookings.length === 0) {
                tbody.innerHTML = '';
                noMsg.style.display = 'block';
                return;
            }

            noMsg.style.display = 'none';
            tbody.innerHTML = bookings.map(booking => `
                <tr>
                    <td><strong>${booking.id}</strong></td>
                    <td>${booking.aquarium}</td>
                    <td>${booking.date}</td>
                    <td>${booking.time}</td>
                    <td>${booking.tickets}</td>
                    <td>$${booking.total}</td>
                    <td><span class="status-badge status-confirmed">${booking.status}</span></td>
                    <td>
                        <button class="btn btn-primary" style="padding: 0.3rem 0.6rem; font-size: 0.8rem;" onclick="viewBooking('${booking.id}')">
                            View
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // View Booking
        function viewBooking(bookingId) {
            const booking = bookings.find(b => b.id === bookingId);
            if (booking) {
                alert(`Booking Details:\n\nID: ${booking.id}\nName: ${booking.firstName} ${booking.lastName}\nAquarium: ${booking.aquarium}\nDate: ${booking.date}\nTime: ${booking.time}\nTickets: ${booking.tickets}\nTotal: $${booking.total}\nStatus: ${booking.status}`);
            }
        }

        // Send Message
        function sendMessage(event) {
            event.preventDefault();
            const name = document.getElementById('contactName').value;
            const email = document.getElementById('contactEmail').value;
            const subject = document.getElementById('contactSubject').value;
            const message = document.getElementById('contactMessage').value;

            showAlert(`Thank you ${name}! We'll respond to your message at ${email} soon.`, 'success');

            document.getElementById('contactName').value = '';
            document.getElementById('contactEmail').value = '';
            document.getElementById('contactSubject').value = '';
            document.getElementById('contactMessage').value = '';
        }

        // Show Alert
        function showAlert(message, type = 'success') {
            const alertBox = document.getElementById('alertBox');
            alertBox.textContent = message;
            alertBox.className = `alert active alert-${type}`;
            setTimeout(() => alertBox.classList.remove('active'), 3000);
        }

        // Set minimum date to today
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('visitDate').min = today;
            loadBookings();
        });
    </script>
</body>
</html>
