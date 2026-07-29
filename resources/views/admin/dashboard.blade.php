<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotpot Enterprise Admin - Professional Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
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
            --danger: #d50000;
            --info: #00bcd4;
            --light: #f5f5f5;
            --dark: #212121;
            --text: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.4);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: var(--text);
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }

        /* Sidebar Navigation */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: rgba(26, 35, 126, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: var(--shadow-lg);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            border: 2px solid var(--primary);
        }

        .sidebar-brand i {
            font-size: 2rem;
        }

        .sidebar-brand h1 {
            font-size: 1.3rem;
            font-weight: 700;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--text);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--primary);
            padding-left: 24px;
            box-shadow: var(--shadow);
        }

        .sidebar-menu i {
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
        }

        /* Header */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-left h2 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .user-profile i {
            font-size: 1.5rem;
        }

        /* Buttons */
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--text);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-success {
            background: var(--success);
            color: var(--dark);
        }

        .btn-success:hover {
            background: #00a844;
        }

        .btn-warning {
            background: var(--warning);
            color: var(--dark);
        }

        .btn-warning:hover {
            background: #ff8500;
        }

        .btn-danger {
            background: var(--danger);
            color: var(--text);
        }

        .btn-danger:hover {
            background: #b71c1c;
        }

        .btn-info {
            background: var(--info);
            color: var(--dark);
        }

        .btn-info:hover {
            background: #00acc1;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        .btn-logout {
            background: var(--danger);
            color: white;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .stat-label {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--success);
        }

        /* Filters Section */
        .filters-section {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-size: 0.9rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .filter-group input,
        .filter-group select {
            padding: 10px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.05);
            color: var(--text);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.1);
        }

        /* Table Styles */
        .table-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: rgba(0, 0, 0, 0.3);
        }

        th {
            padding: 18px;
            text-align: left;
            font-weight: 700;
            font-size: 0.95rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        td {
            padding: 15px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.95rem;
        }

        tbody tr {
            transition: all 0.3s;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Status Badge */
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-success {
            background: rgba(0, 200, 83, 0.3);
            color: var(--success);
        }

        .badge-pending {
            background: rgba(255, 152, 0, 0.3);
            color: #ffb74d;
        }

        .badge-cancelled {
            background: rgba(213, 0, 0, 0.3);
            color: #ff5252;
        }

        /* Action Buttons in Table */
        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        /* Charts & Calendar */
        .chart-section {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .chart-section h3 {
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        canvas {
            max-height: 400px;
        }

        #calendar {
            background: white;
            color: var(--dark);
            border-radius: 12px;
            padding: 20px;
        }

        .fc {
            background: white;
            color: var(--dark);
        }

        .fc th,
        .fc td {
            border-color: #e0e0e0;
        }

        /* Sections */
        section {
            display: none;
        }

        section.active {
            display: block;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            width: 90%;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .modal-header h2 {
            font-size: 1.5rem;
        }

        .modal-close {
            background: none;
            border: none;
            color: var(--text);
            font-size: 1.8rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .modal-close:hover {
            transform: rotate(90deg);
        }

        /* Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: none;
            animation: slideDown 0.3s;
        }

        .alert.show {
            display: block;
        }

        .alert-success {
            background: rgba(0, 200, 83, 0.2);
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        .alert-error {
            background: rgba(213, 0, 0, 0.2);
            color: #ff5252;
            border-left: 4px solid #ff5252;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .top-header {
                flex-direction: column;
                gap: 15px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
                justify-content: center;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 10px;
            }
        }

        /* Print Styles */
        @media print {
            .sidebar,
            .top-header,
            .filters-section,
            .action-buttons,
            .btn:not(.print) {
                display: none !important;
            }

            .main-content {
                margin-left: 0;
            }
        }

        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }

        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid var(--success);
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

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-fire"></i>
            <h1> Chhorng HotPot</h1>
        </div>

        <ul class="sidebar-menu">
            <li><a href="#" onclick="showSection('dashboard')" class="active">
                <i class="fas fa-chart-line"></i> Dashboard
            </a></li>
           <li>
    <a href="{{ route('kitchen') }}" class="nav-link">
        <i class="fas fa-fire"></i> Kitchen
    </a>
</li>
            <li><a href="#" onclick="showSection('orders')">
                <i class="fas fa-list"></i> Orders
            </a></li>
            <li><a href="#" onclick="showSection('analytics')">
                <i class="fas fa-chart-bar"></i> Analytics
            </a></li>
            <li>
    <a href="#" onclick="showSection('user')">
        <i class="fas fa-user-plus"></i> User Entry
    </a>
</li>

<li>
    <a href="#" onclick="showSection('staff')">
        <i class="fas fa-user-tie"></i> Staff
    </a>
</li>
            <li><a href="#" onclick="showSection('settings')">
                <i class="fas fa-cogs"></i> Settings
            </a></li>
        </ul>

        <div style="margin-top: 40px; padding-top: 20px; border-top: 2px solid rgba(255, 255, 255, 0.2);">
            <a href="#" onclick="logout()" class="btn btn-logout btn-block">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Header -->
        <div class="top-header">
            <div class="header-left">
                <h2><i class="fas fa-fire"></i> HotPot Enterprise Admin</h2>
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <i class="fas fa-user-circle"></i>
                    <span id="userName">Admin</span>
                </div>
                <span id="currentTime" style="font-size: 0.9rem; opacity: 0.8;"></span>
            </div>
        </div>

        <!-- Alert Messages -->
        <div id="alertBox" class="alert"></div>

        <!-- DASHBOARD SECTION -->
        <section id="dashboard" class="active">
            <h2 style="margin-bottom: 20px;">Dashboard Overview</h2>

            <!-- Stats Grid -->
            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Total Revenue Today</div>
                    <div class="stat-value" id="totalRevenueToday">$0.00</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-value" id="totalOrders">0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">✅</div>
                    <div class="stat-label">Completed Orders</div>
                    <div class="stat-value" id="completedOrders">0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⏳</div>
                    <div class="stat-label">Pending Orders</div>
                    <div class="stat-value" id="pendingOrders">0</div>
                </div>
            </div>

            <!-- Quick Filters -->
            <div class="filters-section">
                <h3 style="margin-bottom: 15px;">Quick Filters</h3>
                <div class="filter-row">
                    <button class="btn btn-primary" onclick="filterByStatus('daily')">
                        <i class="fas fa-calendar-day"></i> Daily
                    </button>
                    <button class="btn btn-primary" onclick="filterByStatus('weekly')">
                        <i class="fas fa-calendar-week"></i> Weekly
                    </button>
                    <button class="btn btn-primary" onclick="filterByStatus('monthly')">
                        <i class="fas fa-calendar"></i> Monthly
                    </button>
                    <button class="btn btn-info" onclick="exportPDF()">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </button>
                    <button class="btn btn-success" onclick="exportExcel()">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                </div>
            </div>

            <!-- Charts -->
            <div class="chart-section">
                <h3>Revenue Trend</h3>
                <canvas id="revenueChart"></canvas>
            </div>

            <!-- Calendar -->
            <div class="chart-section">
                <h3>Order Calendar</h3>
                <div id="calendar"></div>
            </div>
        </section>

        <!-- ORDERS SECTION -->
        <section id="orders">
            <h2 style="margin-bottom: 20px;">Orders Management</h2>

            <!-- Filters -->
            <div class="filters-section">
                <div class="filter-row">
                    <div class="filter-group">
                        <label>From Date:</label>
                        <input type="date" id="fromDate" onchange="filterOrders()">
                    </div>
                    <div class="filter-group">
                        <label>To Date:</label>
                        <input type="date" id="toDate" onchange="filterOrders()">
                    </div>
                    <div class="filter-group">
                        <label>Status:</label>
                        <select id="statusFilter" onchange="filterOrders()">
                            <option value="">All Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>&nbsp;</label>
                        <button class="btn btn-warning" onclick="resetFilters()">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Table</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="orderTable"></tbody>
                </table>
            </div>
        </section>

        <!-- ANALYTICS SECTION -->
        <section id="analytics">
            <h2 style="margin-bottom: 20px;">Analytics & Reports</h2>

            <div class="chart-section">
                <h3>Daily Revenue</h3>
                <canvas id="dailyChart"></canvas>
            </div>

            <div class="chart-section">
                <h3>Top Items</h3>
                <canvas id="itemsChart"></canvas>
            </div>

            <div class="chart-section">
                <h3>Order Status Distribution</h3>
                <canvas id="statusChart"></canvas>
            </div>
        </section>
                  <!-- USER SECTION -->
<section id="user">
    <h2 style="margin-bottom: 20px;">User Entry</h2>

    <button class="btn btn-success" onclick="openUserModal()" style="margin-bottom: 20px;">
        <i class="fas fa-user-plus"></i> Add User
    </button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTable"></tbody>
        </table>
    </div>
</section>
        <!-- STAFF SECTION -->
        <section id="staff">
            <h2 style="margin-bottom: 20px;">Staff Management</h2>

            <button class="btn btn-success" onclick="openAddStaffModal()" style="margin-bottom: 20px;">
                <i class="fas fa-plus"></i> Add Staff Member
            </button>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="staffTable"></tbody>
                </table>
            </div>
        </section>

        <!-- SETTINGS SECTION -->
        <section id="settings">
            <h2 style="margin-bottom: 20px;">Settings</h2>

            <div class="filters-section">
                <h3 style="margin-bottom: 20px;">Business Settings</h3>

                <div class="filter-row">
                    <div class="filter-group">
                        <label>Restaurant Name:</label>
                        <input type="text" id="restaurantName" value="Hotpot Enterprise">
                    </div>
                    <div class="filter-group">
                        <label>Tax Rate (%):</label>
                        <input type="number" id="taxRate" value="10" min="0" max="100">
                    </div>
                </div>

                <div class="filter-row">
                    <div class="filter-group">
                        <label>Currency:</label>
                        <select id="currency">
                            <option>USD $</option>
                            <option>EUR €</option>
                            <option>GBP £</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Email Notifications:</label>
                        <select id="notifications">
                            <option>Enabled</option>
                            <option>Disabled</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" onclick="saveSettings()" style="margin-top: 15px;">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </div>
        </section>
    </div>

    <!-- Receipt Modal -->
    <div id="receiptModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Order Receipt</h2>
                <button class="modal-close" onclick="closeModal('receiptModal')">×</button>
            </div>
            <div id="receiptContent" style="color: var(--text);"></div>
            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button class="btn btn-primary btn-block" onclick="printReceipt()">
                    <i class="fas fa-print"></i> Print
                </button>
                <button class="btn btn-secondary btn-block" onclick="downloadReceiptPDF()">
                    <i class="fas fa-download"></i> Download PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Add Staff Modal -->
    <div id="staffModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Staff Member</h2>
                <button class="modal-close" onclick="closeModal('staffModal')">×</button>
            </div>
            <div style="color: var(--text);">
                <div class="filter-group">
                    <label>Name:</label>
                    <input type="text" id="staffName" class="filter-input">
                </div>
                <div class="filter-group">
                    <label>Position:</label>
                    <select id="staffPosition">
                        <option>Chef</option>
                        <option>Waiter</option>
                        <option>Manager</option>
                        <option>Cashier</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Email:</label>
                    <input type="email" id="staffEmail" class="filter-input">
                </div>
                <div class="filter-group">
                    <label>Phone:</label>
                    <input type="tel" id="staffPhone" class="filter-input">
                </div>
                <button class="btn btn-success btn-block" onclick="addStaffMember()">
                    <i class="fas fa-check"></i> Add Staff
                </button>
            </div>
        </div>
    </div>

    <!-- Audio Notification -->
    <audio id="notifySound">
        <source src="https://www.soundjay.com/buttons/sounds/button-09.mp3" type="audio/mpeg">
    </audio>

    <script>
        /* =====================================================
   GLOBAL VARIABLES
===================================================== */

let allOrders = [];
const taxRate = 0.1;

/* =====================================================
   TELEGRAM SERVICE (PRO VERSION)
   Hotpot POS Notification System
===================================================== */

const TELEGRAM_CONFIG = {
    BOT_TOKEN: "8673713476:AAHynsQTbezB9wT5noC0xRK_8Sn7mXgJqkI", // REPLACE WITH YOUR BOT TOKEN
    CHAT_ID: "7824502341",
    API_URL: "https://api.telegram.org"
};


/* =====================================================
   CORE TELEGRAM SENDER
===================================================== */

async function sendTelegram(message) {

    const url =
        `${TELEGRAM_CONFIG.API_URL}/bot8673713476:AAHynsQTbezB9wT5noC0xRK_8Sn7mXgJqkI/sendMessage`;

    try {

        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                chat_id: TELEGRAM_CONFIG.CHAT_ID,
                text: message,
                parse_mode: "HTML"
            })
        });

        const result = await response.json();

        if (!result.ok) {
            throw new Error(result.description);
        }

        console.log("✅ Telegram message sent");

        return true;

    } catch (error) {
        console.error("❌ Telegram Error:", error.message);
        return false;
    }
}


/* =====================================================
   FORMAT ORDER MESSAGE
===================================================== */

function buildOrderMessage(order) {

    return `
🔥 <b>HOTPOT NEW ORDER</b>

👤 <b>Customer:</b> ${order.customer}
📞 <b>Phone:</b> ${order.phone}
🍽 <b>Table:</b> ${order.table}

🧾 <b>Order ID:</b> ${order.id}
📦 <b>Items:</b> ${order.items.length}
💰 <b>Total:</b> $${order.total.toFixed(2)}

📊 Status: ${order.status}
⏰ ${order.time}
`;
}


/* =====================================================
   NOTIFY NEW ORDER
===================================================== */

async function notifyNewOrder(order) {

    const message = buildOrderMessage(order);

    const sent = await sendTelegram(message);

    if (sent) {
        console.log("📢 Order notification delivered");
    }
}

async function confirmOrder(){

    if(cart.length === 0){
        alert("Cart empty");
        return;
    }

    let totalAmount =
        cart.reduce((sum,item)=>sum+(item.price*item.qty),0);

    let newOrder = {
        id: "ORD"+Date.now(),
        table: tableNumber,
        customer: customerName,
        phone: customerPhone,
        items: cart,
        total: totalAmount,
        status:"Pending",
        time: new Date().toLocaleString()
    };

    await notifyNewOrder(newOrder); // ✅ ONLY THIS SENDS MESSAGE
}


/* =====================================================
   RECEIPT PRINT ALERT
===================================================== */

async function notifyReceiptPrinted(order) {

    const message = `
🖨 <b>RECEIPT PRINTED</b>

Order: ${order.id}
Customer: ${order.customer}
Total: $${order.total.toFixed(2)}
`;

    await sendTelegram(message);
}


/* =====================================================
   VIEW RECEIPT + AUTO QR
===================================================== */

function viewReceipt(index){

    const order = allOrders[index];

    const subtotal = order.total / (1 + taxRate);
    const tax = subtotal * taxRate;

    let html = `
    <div id="printReceiptArea"
        style="border:2px solid #c62828;padding:20px;border-radius:10px">

        <h2 style="text-align:center;">🔥 CHHORNG HOTPOT</h2>
        <h3 style="text-align:center;">PAYMENT RECEIPT</h3>

        <hr>

        <p><b>Order:</b> ${order.id}</p>
        <p><b>Table:</b> ${order.table}</p>
        <p><b>Date:</b> ${new Date(order.time).toLocaleString()}</p>

        <hr>

        <ul>
            ${order.items.map(item=>`
                <li>
                    ${item.name} x${item.qty}
                    - $${(item.price*item.qty).toFixed(2)}
                </li>
            `).join("")}
        </ul>

        <hr>

        <p>Subtotal: $${subtotal.toFixed(2)}</p>
        <p>Tax 10%: $${tax.toFixed(2)}</p>
        <h3>Total: $${order.total.toFixed(2)}</h3>

        <hr>

        <h4 style="text-align:center">💳 QR Payment</h4>

        <div id="qrPayment" style="text-align:center"></div>

        <p style="text-align:center">
            Scan & Pay:
            <b>$${order.total.toFixed(2)}</b>
        </p>

    </div>
    `;

    document.getElementById("receiptContent").innerHTML = html;
    document.getElementById("receiptModal").classList.add("active");

    /* AUTO CREATE QR */
    setTimeout(()=>{
        const qrData = generateKHQR(order);

        new QRCode(document.getElementById("qrPayment"),{
            text: qrData,
            width:200,
            height:200
        });
    },100);
}


/* =====================================================
   KHQR GENERATOR (SIMULATION)
===================================================== */

function generateKHQR(order){

    const merchantName="CHHORNG HOTPOT";
    const merchantCity="PHNOM PENH";
    const currency="840";
    const amount=order.total.toFixed(2);

    return "000201"+
        "010212"+
        "52045812"+
        "5303"+currency+
        "54"+amount.length.toString().padStart(2,'0')+amount+
        "5802KH"+
        "59"+merchantName.length.toString().padStart(2,'0')+merchantName+
        "60"+merchantCity.length.toString().padStart(2,'0')+merchantCity+
        "62070503"+order.id+
        "6304";
}


/* =====================================================
   AUTO PRINT RECEIPT (AFTER TELEGRAM)
===================================================== */

async function printReceipt(index){

    const order = allOrders[index];

    await sendTelegram(`
🖨 <b>RECEIPT PRINTED</b>

Order: ${order.id}
Total: 💲${order.total}
Time: ${new Date().toLocaleString()}
`);

    setTimeout(()=>{

        const content =
            document.getElementById("printReceiptArea").innerHTML;

        const win = window.open("", "", "width=400,height=600");

        win.document.write(`
            <html>
            <body>${content}</body>
            </html>
        `);

        win.document.close();
        win.print();
        win.close();

    },500);
}


/* =====================================================
   NEW ORDER TELEGRAM
===================================================== */

async function notifyNewOrder(order){

await sendTelegram(`
🛒 <b>NEW ORDER</b>

Order ID: ${order.id}
Table: ${order.table}
Items: ${order.items.length}
Total: 💲${order.total}
Status: ${order.status}
`);
}


/* =====================================================
   PAYMENT UPLOAD ALERT
===================================================== */

async function notifyPayment(order){

await sendTelegram(`
💳 <b>PAYMENT UPLOADED</b>

Order: ${order.id}
Waiting for approval.
`);
}


/* =====================================================
   APPROVE ORDER
===================================================== */

async function approveOrder(index){

    allOrders[index].status="Completed";

    localStorage.setItem(
        "hotpotOrders",
        JSON.stringify(allOrders)
    );

    await sendTelegram(`
✅ <b>ORDER APPROVED</b>

Order: ${allOrders[index].id}
Revenue: 💲${allOrders[index].total}
`);

    loadOrdersTable();
}


/* =====================================================
   LOAD ORDER TABLE
===================================================== */

function loadOrdersTable(){

    const table=document.getElementById("orderTable");
    table.innerHTML="";

    if(allOrders.length===0){
        table.innerHTML=
        "<tr><td colspan='7'>No orders</td></tr>";
        return;
    }

    allOrders.forEach((order,index)=>{

        table.innerHTML+=`
        <tr>
            <td>${order.id}</td>
            <td>${order.table}</td>
            <td>$${order.total}</td>
            <td>${order.status}</td>
            <td>
                <button onclick="viewReceipt(${index})">
                    View
                </button>

                <button onclick="printReceipt(${index})">
                    Print
                </button>

                <button onclick="approveOrder(${index})">
                    Approve
                </button>
            </td>
        </tr>`;
    });
}
        // Check Authentication
        if (!localStorage.getItem("adminLogin")) {
            window.location.href = "{{ route('login') }}";
        }

        // Global Variables
       // let allOrders = [];
       // let taxRate = 10;
        let currentChart = null;
        let currentCalendar = null;
        let revenueChart = null;
        let dailyChart = null;
        let itemsChart = null;
        let statusChart = null;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadOrders();
            updateDashboard();
            initializeCharts();
            loadStaff();
            updateClock();
            setInterval(updateClock, 1000);
            setInterval(loadOrders, 3000);
        });

        // Update Clock
        function updateClock() {
            const now = new Date();
            document.getElementById('currentTime').textContent = now.toLocaleTimeString();
        }

        // Load Orders
        function loadOrders() {
            allOrders = JSON.parse(localStorage.getItem("hotpotOrders")) || [];
            updateDashboard();
            loadOrdersTable();
        }

        // Load Orders Table
        function loadOrdersTable() {
            const table = document.getElementById("orderTable");
            table.innerHTML = "";

            if (allOrders.length === 0) {
                table.innerHTML = "<tr><td colspan='7' style='text-align:center'>No orders found</td></tr>";
                return;
            }

            allOrders.forEach((order, index) => {
                const statusClass = order.status === 'Completed' ? 'badge-success' :
                                   order.status === 'Pending' ? 'badge-pending' : 'badge-cancelled';

                table.innerHTML += `
                    <tr>
                        <td><strong>${order.id}</strong></td>
                        <td>Table ${order.table}</td>
                        <td>${order.items.length} items</td>
                        <td>$${order.total.toFixed(2)}</td>
                        <td><span class="badge ${statusClass}">${order.status}</span></td>
                        <td>${new Date(order.time).toLocaleTimeString()}</td>
                        <td>
                            <div class="action-buttons">
                                ${order.status === 'Pending' ?
                                    `<button class="btn btn-success btn-small" onclick="completeOrder(${index})">
                                        <i class="fas fa-check"></i> Complete
                                    </button>` : ''}
                                <button class="btn btn-info btn-small" onclick="viewReceipt(${index})">
                                    <i class="fas fa-receipt"></i> 🖨 Print Receipt
                                </button>
                                <button class="btn btn-warning btn-small" onclick="printInvoice(${index})">
                                    <i class="fas fa-print"></i> Print
                                </button>
                                <button class="btn btn-danger btn-small" onclick="deleteOrder(${index})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
        }

        // Update Dashboard
        function updateDashboard() {
            const today = new Date().toDateString();
            const todayOrders = allOrders.filter(o => new Date(o.time).toDateString() === today);
            const completedOrders = allOrders.filter(o => o.status === 'Completed');
            const pendingOrders = allOrders.filter(o => o.status === 'Pending');

            let todayRevenue = 0;
            todayOrders.forEach(o => {
                if (o.status === 'Completed') {
                    todayRevenue += o.total;
                }
            });

            document.getElementById('totalRevenueToday').textContent = `$${todayRevenue.toFixed(2)}`;
            document.getElementById('totalOrders').textContent = allOrders.length;
            document.getElementById('completedOrders').textContent = completedOrders.length;
            document.getElementById('pendingOrders').textContent = pendingOrders.length;
        }

        // Initialize Charts
        function initializeCharts() {
            // Revenue Chart
            const revenueCtx = document.getElementById("revenueChart");
            if (revenueCtx) {
                revenueChart = new Chart(revenueCtx, {
                    type: "line",
                    data: {
                        labels: [],
                        datasets: [{
                            label: "Revenue",
                            data: [],
                            borderColor: "#c62828",
                            backgroundColor: "rgba(198, 40, 40, 0.1)",
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: { color: "white" }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { color: "white" }
                            },
                            x: {
                                ticks: { color: "white" }
                            }
                        }
                    }
                });
                updateRevenueChart();
            }

            // Daily Chart
            const dailyCtx = document.getElementById("dailyChart");
            if (dailyCtx) {
                dailyChart = new Chart(dailyCtx, {
                    type: "bar",
                    data: {
                        labels: [],
                        datasets: [{
                            label: "Daily Revenue",
                            data: [],
                            backgroundColor: "#00c853"
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: { color: "white" }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { color: "white" }
                            },
                            x: {
                                ticks: { color: "white" }
                            }
                        }
                    }
                });
                updateDailyChart();
            }

            // Items Chart
            const itemsCtx = document.getElementById("itemsChart");
            if (itemsCtx) {
                itemsChart = new Chart(itemsCtx, {
                    type: "doughnut",
                    data: {
                        labels: [],
                        datasets: [{
                            data: [],
                            backgroundColor: ["#c62828", "#ff9800", "#00c853", "#00bcd4", "#9c27b0"]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: { color: "white" }
                            }
                        }
                    }
                });
                updateItemsChart();
            }

            // Status Chart
            const statusCtx = document.getElementById("statusChart");
            if (statusCtx) {
                statusChart = new Chart(statusCtx, {
                    type: "pie",
                    data: {
                        labels: ["Completed", "Pending", "Cancelled"],
                        datasets: [{
                            data: [0, 0, 0],
                            backgroundColor: ["#00c853", "#ff9800", "#d50000"]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: { color: "white" }
                            }
                        }
                    }
                });
                updateStatusChart();
            }

            // Calendar
            const calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                if (currentCalendar) {
                    currentCalendar.destroy();
                }

                currentCalendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: allOrders.map(o => ({
                        title: `$${o.total}`,
                        start: new Date(o.time)
                    }))
                });
                currentCalendar.render();
            }
        }

        // Update Charts
        function updateRevenueChart() {
            const daily = {};
            allOrders.forEach(o => {
                const date = new Date(o.time).toLocaleDateString();
                if (!daily[date]) daily[date] = 0;
                if (o.status === 'Completed') daily[date] += o.total;
            });

            if (revenueChart) {
                revenueChart.data.labels = Object.keys(daily).slice(-7);
                revenueChart.data.datasets[0].data = Object.values(daily).slice(-7);
                revenueChart.update();
            }
        }

        function updateDailyChart() {
            const hours = {};
            allOrders.forEach(o => {
                const hour = new Date(o.time).getHours();
                if (!hours[hour]) hours[hour] = 0;
                if (o.status === 'Completed') hours[hour] += o.total;
            });

            if (dailyChart) {
                dailyChart.data.labels = Object.keys(hours).map(h => h + ":00");
                dailyChart.data.datasets[0].data = Object.values(hours);
                dailyChart.update();
            }
        }

        function updateItemsChart() {
            const items = {};
            allOrders.forEach(o => {
                o.items.forEach(item => {
                    items[item.name] = (items[item.name] || 0) + item.qty;
                });
            });

            if (itemsChart) {
                itemsChart.data.labels = Object.keys(items).slice(0, 5);
                itemsChart.data.datasets[0].data = Object.values(items).slice(0, 5);
                itemsChart.update();
            }
        }

        function updateStatusChart() {
            const completed = allOrders.filter(o => o.status === 'Completed').length;
            const pending = allOrders.filter(o => o.status === 'Pending').length;
            const cancelled = allOrders.filter(o => o.status === 'Cancelled').length;

            if (statusChart) {
                statusChart.data.datasets[0].data = [completed, pending, cancelled];
                statusChart.update();
            }
        }

        // Section Navigation
        function showSection(sectionId) {
            document.querySelectorAll('section').forEach(s => s.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');

            document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
            event.target.classList.add('active');

            // Update charts when switching to analytics
            if (sectionId === 'analytics') {
                setTimeout(() => {
                    updateRevenueChart();
                    updateDailyChart();
                    updateItemsChart();
                    updateStatusChart();
                }, 100);
            }
        }

        // Order Actions
        function completeOrder(index) {
            allOrders[index].status = "Completed";
            localStorage.setItem("hotpotOrders", JSON.stringify(allOrders));
            showAlert(`Order ${allOrders[index].id} completed!`, 'success');
            loadOrders();
        }

        function deleteOrder(index) {
            if (confirm("Are you sure you want to delete this order?")) {
                allOrders.splice(index, 1);
                localStorage.setItem("hotpotOrders", JSON.stringify(allOrders));
                showAlert("Order deleted successfully!", 'success');
                loadOrders();
            }
        }

        function viewReceipt(index) {

    const order = allOrders[index];

    const subtotal = order.total / 1.1;
    const tax = subtotal * 0.1;

    let html = `
        <div id="printReceiptArea"
        style="border:2px solid #c62828;padding:20px;border-radius:10px">

            <h2 style="text-align:center;">🔥 CHHORNG HOTPOT</h2>
            <h3 style="text-align:center;">PAYMENT RECEIPT</h3>

            <hr>

            <p><strong>Order:</strong> ${order.id}</p>
            <p><strong>Table:</strong> ${order.table}</p>
            <p><strong>Date:</strong> ${new Date(order.time).toLocaleString()}</p>

            <hr>

            <ul>
                ${order.items.map(item => `
                    <li>
                        ${item.name} x${item.qty}
                        - $${(item.price * item.qty).toFixed(2)}
                    </li>
                `).join("")}
            </ul>

            <hr>

            <p>Subtotal: $${subtotal.toFixed(2)}</p>
            <p>Tax 10%: $${tax.toFixed(2)}</p>

            <h3>Total: $${order.total.toFixed(2)}</h3>

            <hr>

            <h4 style="text-align:center">💳 QR Payment</h4>

            <!-- ✅ YOUR REAL QR -->
            <div style="text-align:center;margin:15px 0;">
                <img src="assets/images/aba-qr.png"
                     style="width:220px;border-radius:12px;">
            </div>

            <p style="text-align:center;font-size:13px;">
                Please enter amount:
                <strong>$${order.total.toFixed(2)}</strong>
            </p>

        </div>
    `;

    document.getElementById("receiptContent").innerHTML = html;
    document.getElementById("receiptModal").classList.add("active");
    // ===============================
// TELEGRAM CONFIG
// ===============================
const TELEGRAM_BOT_TOKEN = "8673713476:AAHynsQTbezB9wT5noC0xRK_8Sn7mXgJqkI";
const TELEGRAM_CHAT_ID = "7824502341";
async function sendTelegram(message) {

    const url =
        `https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage`;

    try {
        await fetch(url, {
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify({
                chat_id: 7824502341,
                text: message,
                parse_mode: "HTML"
            })
        });

        console.log("✅ Telegram Sent");

    } catch (error) {
        console.error("Telegram Error:", error);
    }
}
async function notifyNewOrder(order){
//SEND TELEGRAM ABOUT ORDER
const msg = `
🛒🔥 <b>HOTPOT NEW ORDER</b>
━━━━━━━━━━━━━━━━━━

🧾 <b>Order ID:</b> ${order.id}

👤 <b>Customer:</b> ${order.customer}
📞 <b>Phone:</b> ${order.phone}
🍽 <b>Table:</b> ${order.table}

📦 <b>Items:</b> ${order.items.length}
💰 <b>Total:</b> $${order.total.toFixed(2)}

📊 <b>Status:</b> ${order.status}
⏰ <b>Date:</b> ${order.time}

━━━━━━━━━━━━━━━━━━
🍲 Please prepare order
`;

await sendTelegram(msg);
}
notifyNewOrder(order);
async function printReceipt(index){

    const order = allOrders[index];

    await sendTelegram(`
🖨 <b>RECEIPT PRINTED</b>

Order: ${order.id}
Total: 💲${order.total}
Time: ${new Date().toLocaleString()}
`);

    setTimeout(()=>{
        window.print();
    },500);
}
async function notifyPayment(order){

await sendTelegram(`
💳 <b>PAYMENT UPLOADED</b>

Order: ${order.id}
Customer sent payment proof.
Waiting for admin approval.
`);
}
async function approveOrder(index){

    allOrders[index].status = "Completed";

    await sendTelegram(`
✅ <b>ORDER APPROVED</b>

Order: ${allOrders[index].id}
Status: COMPLETED
Revenue Added: 💲${allOrders[index].total}
`);

    loadOrdersTable();
}
}

    document.getElementById("receiptContent").innerHTML = html;
    document.getElementById("receiptModal").classList.add("active");

    // 🔥 AUTO CREATE KHQR
    setTimeout(() => {

        const qrData = generateKHQR(order);

        const qrBox = document.getElementById("qrPayment");
        qrBox.innerHTML = "";

        new QRCode(qrBox, {
            text: qrData,
            width: 200,
            height: 200,
            correctLevel: QRCode.CorrectLevel.H
        });

    }, 100);


        // =============================
// KHQR PAYMENT DATA GENERATOR
// =============================
function generateKHQR(order) {

    const merchantName = "CHHORNG HOTPOT";
    const merchantCity = "PHNOM PENH";
    const currency = "840"; // USD (116 = KHR)
    const amount = order.total.toFixed(2);

    // KHQR-like payload (simulation format)
    const khqrPayload =
        "000201" +                 // Payload format
        "010212" +                 // Static QR
        "52045812" +               // Merchant category
        "5303" + currency +        // Currency
        "54" + amount.length.toString().padStart(2,'0') + amount +
        "5802KH" +
        "59" + merchantName.length.toString().padStart(2,'0') + merchantName +
        "60" + merchantCity.length.toString().padStart(2,'0') + merchantCity +
        "62" +
        ("05" + order.id.length.toString().padStart(2,'0') + order.id) +
        "6304";

    return khqrPayload;
}

        function printInvoice(index) {
            const order = allOrders[index];
            const win = window.open("");
            win.document.write(`
                <h2>Hotpot Invoice</h2>
                <p>Order: ${order.id}</p>
                <p>Table: ${order.table}</p>
                <p>Date: ${new Date(order.time).toLocaleString()}</p>
                <ul>${order.items.map(item => `<li>${item.name} x${item.qty}</li>`).join("")}</ul>
                <h3>Total: $${order.total.toFixed(2)}</h3>
            `);
            win.print();
        }

        function printReceipt() {
            window.print();
        }

        function downloadReceiptPDF() {
            const element = document.getElementById('receiptContent');
            html2pdf().set({
                margin: 10,
                filename: 'receipt.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
            }).save();
        }

        // Filter Orders
        function filterOrders() {
            const from = document.getElementById('fromDate').value;
            const to = document.getElementById('toDate').value;
            const status = document.getElementById('statusFilter').value;

            let filtered = allOrders;

            if (from) {
                filtered = filtered.filter(o => new Date(o.time) >= new Date(from));
            }

            if (to) {
                filtered = filtered.filter(o => new Date(o.time) <= new Date(to + 'T23:59:59'));
            }

            if (status) {
                filtered = filtered.filter(o => o.status === status);
            }

            const table = document.getElementById("orderTable");
            table.innerHTML = "";

            if (filtered.length === 0) {
                table.innerHTML = "<tr><td colspan='7' style='text-align:center'>No orders found</td></tr>";
                return;
            }

            filtered.forEach((order, index) => {
                const statusClass = order.status === 'Completed' ? 'badge-success' :
                                   order.status === 'Pending' ? 'badge-pending' : 'badge-cancelled';

                const realIndex = allOrders.indexOf(order);
                table.innerHTML += `
                    <tr>
                        <td><strong>${order.id}</strong></td>
                        <td>Table ${order.table}</td>
                        <td>${order.items.length} items</td>
                        <td>$${order.total.toFixed(2)}</td>
                        <td><span class="badge ${statusClass}">${order.status}</span></td>
                        <td>${new Date(order.time).toLocaleTimeString()}</td>
                        <td>
                            <div class="action-buttons">
                                ${order.status === 'Pending' ?
                                    `<button class="btn btn-success btn-small" onclick="completeOrder(${realIndex})">
                                        <i class="fas fa-check"></i> Complete
                                    </button>` : ''}
                                <button class="btn btn-info btn-small" onclick="viewReceipt(${realIndex})">
                                    <i class="fas fa-receipt"></i> Receipt
                                </button>
                                <button class="btn btn-warning btn-small" onclick="printInvoice(${realIndex})">
                                    <i class="fas fa-print"></i> Print
                                </button>
                                <button class="btn btn-danger btn-small" onclick="deleteOrder(${realIndex})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
        }

        function resetFilters() {
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            document.getElementById('statusFilter').value = '';
            loadOrdersTable();
        }

        // Filter by Status (Quick Buttons)
        function filterByStatus(type) {
            const today = new Date();
            let startDate = new Date();

            if (type === 'daily') {
                startDate.setHours(0, 0, 0, 0);
            } else if (type === 'weekly') {
                startDate.setDate(today.getDate() - 7);
            } else if (type === 'monthly') {
                startDate.setDate(today.getDate() - 30);
            }

            const filtered = allOrders.filter(o => new Date(o.time) >= startDate);
            updateDashboardCharts(filtered);
            showAlert(`Showing ${type} data`, 'success');
        }

        function updateDashboardCharts(orders) {
            if (revenueChart) {
                const daily = {};
                orders.forEach(o => {
                    const date = new Date(o.time).toLocaleDateString();
                    if (!daily[date]) daily[date] = 0;
                    if (o.status === 'Completed') daily[date] += o.total;
                });

                revenueChart.data.labels = Object.keys(daily);
                revenueChart.data.datasets[0].data = Object.values(daily);
                revenueChart.update();
            }
        }

        // Export Functions
        function exportPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();

            doc.setFillColor(198, 40, 40);
            doc.rect(0, 0, pageWidth, 30, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(20);
            doc.text('Hotpot Revenue Report', pageWidth / 2, 20, { align: 'center' });

            doc.setTextColor(0, 0, 0);
            doc.setFontSize(12);
            let y = 40;

            doc.text('Order Details:', 10, y);
            y += 10;

            allOrders.forEach(o => {
                doc.text(`${o.id} | Table ${o.table} | $${o.total.toFixed(2)} | ${o.status}`, 10, y);
                y += 8;
                if (y > pageHeight - 20) {
                    doc.addPage();
                    y = 20;
                }
            });

            let totalRevenue = allOrders.filter(o => o.status === 'Completed').reduce((a, b) => a + b.total, 0);
            y += 10;
            doc.setFontSize(14);
            doc.text(`Total Revenue: $${totalRevenue.toFixed(2)}`, 10, y);

            doc.save('hotpot-report.pdf');
            showAlert('PDF exported successfully!', 'success');
        }

        function exportExcel() {
            let csv = "Order ID,Table,Items,Total,Status,Date\n";
            allOrders.forEach(o => {
                const itemsStr = o.items.map(i => i.name).join(' | ');
                csv += `"${o.id}",${o.table},"${itemsStr}",${o.total},"${o.status}","${new Date(o.time).toLocaleString()}"\n`;
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "hotpot-report.csv";
            link.click();
            showAlert('Excel exported successfully!', 'success');
        }

        // Staff Management
        function loadStaff() {
            const staff = JSON.parse(localStorage.getItem('hotpotStaff')) || [];
            const table = document.getElementById('staffTable');
            table.innerHTML = '';

            if (staff.length === 0) {
                table.innerHTML = '<tr><td colspan="6" style="text-align:center">No staff members added</td></tr>';
                return;
            }

            staff.forEach((member, index) => {
                table.innerHTML += `
                    <tr>
                        <td>${member.name}</td>
                        <td>${member.position}</td>
                        <td>${member.email}</td>
                        <td>${member.phone}</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>
                            <button class="btn btn-danger btn-small" onclick="removeStaff(${index})">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        function openAddStaffModal() {
            document.getElementById('staffModal').classList.add('active');
        }

        function addStaffMember() {
            const name = document.getElementById('staffName').value;
            const position = document.getElementById('staffPosition').value;
            const email = document.getElementById('staffEmail').value;
            const phone = document.getElementById('staffPhone').value;

            if (!name || !email || !phone) {
                showAlert('Please fill in all fields', 'error');
                return;
            }

            const staff = JSON.parse(localStorage.getItem('hotpotStaff')) || [];
            staff.push({ name, position, email, phone });
            localStorage.setItem('hotpotStaff', JSON.stringify(staff));

            document.getElementById('staffName').value = '';
            document.getElementById('staffEmail').value = '';
            document.getElementById('staffPhone').value = '';

            closeModal('staffModal');
            loadStaff();
            showAlert('Staff member added successfully!', 'success');
        }

        function removeStaff(index) {
            if (confirm('Remove this staff member?')) {
                const staff = JSON.parse(localStorage.getItem('hotpotStaff')) || [];
                staff.splice(index, 1);
                localStorage.setItem('hotpotStaff', JSON.stringify(staff));
                loadStaff();
                showAlert('Staff member removed!', 'success');
            }
        }

        // Settings
        function saveSettings() {
            const settings = {
                restaurantName: document.getElementById('restaurantName').value,
                taxRate: document.getElementById('taxRate').value,
                currency: document.getElementById('currency').value,
                notifications: document.getElementById('notifications').value
            };

            localStorage.setItem('hotpotSettings', JSON.stringify(settings));
            taxRate = parseFloat(settings.taxRate);
            showAlert('Settings saved successfully!', 'success');
        }

        // Modal Functions
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
            }
        }

        // Alert
        function showAlert(message, type = 'success') {
            const alert = document.getElementById('alertBox');
            alert.textContent = message;
            alert.className = `alert show alert-${type}`;
            setTimeout(() => alert.classList.remove('show'), 3000);
        }

        // Logout
        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                localStorage.removeItem("adminLogin");
                window.location.href = "login";
            }
        }
    </script>

</body>
</html>
