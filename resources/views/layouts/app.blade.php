<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        /* Tambahan variabel CSS untuk enhancement */
        :root {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-accent: #f1f5f9;
            --border-light: #e2e8f0;
            --border-medium: #cbd5e1;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --primary-light: #eff6ff;
            --primary-dark: #1d4ed8;
            --success: #10b981;
            --success-light: #d1fae5;
            --success-text: #047857;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --error: #ef4444;
            --error-light: #fee2e2;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            
            /* Enhanced variables */
            --gradient-primary: linear-gradient(135deg, var(--primary), var(--primary-dark));
            --gradient-success: linear-gradient(135deg, var(--success), #059669);
            --gradient-warning: linear-gradient(135deg, var(--warning), #d97706);
            --gradient-error: linear-gradient(135deg, var(--error), #dc2626);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
            line-height: 1.6;
        }

        .wrap {
            display: flex;
            min-height: 100vh;
        }

        /* Enhanced Sidebar dengan animasi lebih smooth */
        aside {
            width: 280px;
            background: var(--bg-secondary);
            border-right: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-sm);
            position: relative;
            z-index: 100;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-light);
            background: var(--gradient-primary);
            color: white;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        .sidebar-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .sidebar-header:hover::before {
            opacity: 1;
        }

        .sidebar-title {
            font-size: 22px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .sidebar-subtitle {
            font-size: 14px;
            opacity: 0.9;
            margin: 4px 0 0 0;
            font-weight: 400;
            position: relative;
            z-index: 1;
        }

        .menu {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .menu-section {
            margin-bottom: 24px;
        }

        .menu-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            padding: 0 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: var(--radius-md);
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 14px;
            transition: var(--transition-smooth);
            position: relative;
            margin-bottom: 4px;
            overflow: hidden;
        }

        .menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .menu a:hover::before {
            left: 100%;
        }

        .menu a svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .menu a:hover {
            background: var(--bg-accent);
            color: var(--text-primary);
            transform: translateX(4px);
        }

        .menu a:hover svg {
            transform: scale(1.1);
            color: var(--primary);
        }

        .menu a.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            box-shadow: var(--shadow-sm);
        }

        .menu a.active::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--primary);
            border-radius: 0 2px 2px 0;
        }

        /* Enhanced Main Content dengan background pattern subtle */
        main {
            flex: 1;
            padding: 32px;
            background: 
                radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 85% 30%, rgba(16, 185, 129, 0.03) 0%, transparent 20%),
                var(--bg-primary);
            overflow-y: auto;
            position: relative;
        }

        .main-header {
            margin-bottom: 32px;
            position: relative;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.025em;
            background: linear-gradient(135deg, var(--text-primary), var(--text-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-description {
            color: var(--text-secondary);
            font-size: 16px;
            margin: 0;
            position: relative;
            padding-left: 16px;
        }

        .page-description::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* Enhanced Cards dengan hover effects */
        .card {
            background: var(--bg-secondary);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-light);
            position: relative;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
            position: relative;
        }

        /* Enhanced Table dengan striped rows */
        .table-container {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            background: var(--bg-secondary);
            transition: var(--transition-smooth);
        }

        .table-container:hover {
            box-shadow: var(--shadow-md);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-secondary);
        }

        th {
            background: var(--bg-accent);
            padding: 16px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border-light);
            white-space: nowrap;
            cursor: pointer;
            position: relative;
            user-select: none;
            transition: var(--transition-smooth);
        }

        th.sortable:hover {
            background: var(--border-light);
            color: var(--text-primary);
        }

        th.sortable::after {
            content: '↕';
            margin-left: 8px;
            opacity: 0.5;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        th.sort-asc::after {
            content: '↑';
            opacity: 1;
            color: var(--primary);
        }

        th.sort-desc::after {
            content: '↓';
            opacity: 1;
            color: var(--primary);
        }

        td {
            padding: 16px;
            border-bottom: 1px solid var(--border-light);
            color: var(--text-primary);
            transition: var(--transition-smooth);
        }

        tr:nth-child(even) {
            background: rgba(241, 245, 249, 0.5);
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background: var(--primary-light);
            transform: scale(1.002);
        }

        tr:hover td {
            color: var(--primary-dark);
        }

        /* Enhanced Buttons dengan gradient effects */
        .toolbar {
            display: flex;
            gap: 16px;
            align-items: center;
            justify-content: space-between;
            margin: 24px 0;
            flex-wrap: wrap;
        }

        .toolbar-left,
        .toolbar-right {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition-bounce);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .btn:active {
            transform: translateY(0) scale(1);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-hover), var(--primary-dark));
        }

        .btn-secondary {
            background: var(--bg-secondary);
            color: var(--text-secondary);
            border: 1px solid var(--border-medium);
        }

        .btn-secondary:hover {
            background: var(--bg-accent);
            color: var(--text-primary);
            border-color: var(--primary);
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .actions .btn {
            padding: 8px 12px;
            font-size: 12px;
        }

        .btn-blue {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-yellow {
            background: var(--gradient-warning);
            color: white;
        }

        .btn-red {
            background: var(--gradient-error);
            color: white;
        }

        /* Enhanced Form Elements dengan floating labels effect */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        input[type="search"],
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            padding: 12px 16px;
            border: 1px solid var(--border-medium);
            border-radius: var(--radius-md);
            background: var(--bg-secondary);
            color: var(--text-primary);
            font-size: 14px;
            transition: var(--transition-smooth);
            font-family: inherit;
            width: 100%;
        }

        input[type="search"]:focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            transform: translateY(-1px);
        }

        input[type="search"] {
            width: 320px;
            max-width: 100%;
        }

        /* Enhanced Alerts dengan icons animasi */
        .alert {
            padding: 16px 20px;
            border-radius: var(--radius-md);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            border-left: 4px solid transparent;
        }

        .alert:hover {
            transform: translateX(4px);
            box-shadow: var(--shadow-md);
        }

        .alert-success {
            background: var(--success-light);
            color: var(--success-text);
            border-left-color: var(--success);
        }

        .alert-success::before {
            content: "✓";
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background: var(--success);
            color: white;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 700;
            animation: bounceIn 0.5s ease;
        }

        /* Enhanced Dialog/Modal dengan backdrop blur */
        dialog {
            border: none;
            border-radius: var(--radius-xl);
            padding: 0;
            box-shadow: var(--shadow-xl);
            width: 540px;
            max-width: 90vw;
            background: var(--bg-secondary);
            animation: modalSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        dialog::backdrop {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
        }

        dialog .dlg {
            padding: 24px;
        }

        dialog .footer {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding: 20px 24px;
            border-top: 1px solid var(--border-light);
            background: var(--bg-accent);
            border-radius: 0 0 var(--radius-xl) var(--radius-xl);
        }

        /* Mobile Sidebar Toggle enhancement */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 12px;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: var(--transition-bounce);
        }

        .sidebar-toggle:hover {
            transform: scale(1.1) rotate(90deg);
        }

        .sidebar-toggle svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }

        /* Stats Dashboard dengan animasi counter */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--bg-secondary);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition-bounce);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-icon.blue {
            background: var(--primary-light);
            color: var(--primary);
        }

        .stat-icon.green {
            background: var(--success-light);
            color: var(--success);
        }

        .stat-icon.orange {
            background: var(--warning-light);
            color: var(--warning);
        }

        .stat-icon.red {
            background: var(--error-light);
            color: var(--error);
        }

        .stat-content {
            flex: 1;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 4px;
            color: var(--text-primary);
            transition: var(--transition-smooth);
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-secondary);
            margin: 0;
        }

        /* Enhanced Search and Filter */
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            color: var(--text-muted);
            pointer-events: none;
            transition: var(--transition-smooth);
        }

        .search-input:focus + .search-icon {
            color: var(--primary);
            transform: scale(1.1);
        }

        .search-input {
            padding-left: 40px;
        }

        .filter-container {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-select {
            min-width: 160px;
        }

        /* Animasi kustom */
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes modalSlideIn {
            from { 
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Enhanced Responsive Design */
        @media (max-width: 1024px) {
            aside {
                width: 260px;
            }

            main {
                padding: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }

            aside {
                position: fixed;
                top: 0;
                left: -280px;
                height: 100vh;
                z-index: 999;
                transition: var(--transition-smooth);
                width: 280px;
            }

            aside.open {
                left: 0;
                box-shadow: var(--shadow-xl);
            }

            main {
                padding: 80px 16px 16px;
                width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .toolbar-left,
            .toolbar-right {
                justify-content: stretch;
                width: 100%;
            }

            input[type="search"] {
                width: 100%;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }

            .actions {
                flex-wrap: wrap;
            }

            .card {
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-select {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .sidebar-header {
                padding: 20px 16px;
            }

            .menu {
                padding: 12px;
            }

            .menu a {
                padding: 12px;
            }

            main {
                padding: 70px 12px 12px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            th,
            td {
                padding: 12px 8px;
                font-size: 13px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-value {
                font-size: 20px;
            }
        }

        /* Loading States dan Micro-interactions yang lebih smooth */
        .loading {
            opacity: 0.6;
            pointer-events: none;
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid var(--primary-light);
            border-top: 2px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Scrollbar Styling yang lebih halus */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-accent);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-medium);
            border-radius: 4px;
            transition: var(--transition-smooth);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }

        /* Empty State dengan ilustrasi */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
            animation: slideInLeft 0.5s ease;
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            opacity: 0.7;
            transition: var(--transition-smooth);
        }

        .empty-state:hover svg {
            transform: scale(1.1) rotate(5deg);
            opacity: 0.9;
        }

        .empty-state h3 {
            margin: 0 0 12px;
            font-size: 20px;
            font-weight: 600;
        }

        .empty-state p {
            margin: 0;
            font-size: 14px;
            max-width: 400px;
            margin: 0 auto;
        }

        /* Notification badge */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
            height: 20px;
            padding: 0 6px;
            background: var(--error);
            color: white;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
            margin-left: auto;
            animation: pulse 2s infinite;
        }

        /* Progress bar */
        .progress-bar {
            width: 100%;
            height: 4px;
            background: var(--border-light);
            border-radius: 2px;
            overflow: hidden;
            margin: 10px 0;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        /* Chip/tag elements */
        .chip {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            background: var(--bg-accent);
            color: var(--text-secondary);
            border-radius: 16px;
            font-size: 12px;
            font-weight: 500;
            margin: 2px;
        }

        .chip.primary {
            background: var(--primary-light);
            color: var(--primary);
        }

        .chip.success {
            background: var(--success-light);
            color: var(--success-text);
        }

        .chip.warning {
            background: var(--warning-light);
            color: var(--warning);
        }

        .chip.error {
            background: var(--error-light);
            color: var(--error);
        }
    </style>
    @stack('head')
</head>

<body>
    <div class="wrap">
        <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <aside id="sidebar">
            <header class="sidebar-header">
                <h1 class="sidebar-title">Arsip Surat</h1>
                <p class="sidebar-subtitle">Sistem Manajemen Dokumen</p>
            </header>

            <nav class="menu">
                <div class="menu-section">
                    <div class="menu-label">Utama</div>
                    <a href="{{ route('archives.index') }}"
                        class="{{ request()->routeIs('archives.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                        <span>Arsip Surat</span>
                    </a>

                    <a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                        <span>Kategori Surat</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-label">Informasi</div>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                        <span>About</span>
                    </a>
                </div>
            </nav>
        </aside>

        <main>
            <div class="main-header">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>

            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
            
            // Add animation class
            sidebar.style.animation = sidebar.classList.contains('open') 
                ? 'slideInLeft 0.3s ease' 
                : 'none';
        }

        // Enhanced sidebar functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.sidebar-toggle');

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768 && sidebar.classList.contains('open')) {
                    if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });

            // Handle window resize with debounce
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('open');
                    }
                }, 250);
            });

            // Enhanced table sorting with animation
            const sortableHeaders = document.querySelectorAll('th.sortable');
            sortableHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const table = this.closest('table');
                    const columnIndex = Array.from(this.parentNode.children).indexOf(this);
                    const isAscending = this.classList.contains('sort-asc');

                    // Add loading animation
                    table.classList.add('loading');
                    
                    setTimeout(() => {
                        // Remove sorting classes from all headers
                        sortableHeaders.forEach(h => {
                            h.classList.remove('sort-asc', 'sort-desc');
                        });

                        // Set new sorting direction
                        this.classList.toggle('sort-asc', !isAscending);
                        this.classList.toggle('sort-desc', isAscending);

                        // Sort table rows
                        sortTable(table, columnIndex, !isAscending);
                        
                        // Remove loading animation
                        table.classList.remove('loading');
                    }, 300);
                });
            });

            // Enhanced search functionality with debounce
            const searchInput = document.querySelector('input[type="search"]');
            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        const searchTerm = this.value.toLowerCase();
                        const table = document.querySelector('table');

                        if (table) {
                            const rows = table.querySelectorAll('tbody tr');
                            let visibleCount = 0;

                            rows.forEach(row => {
                                const text = row.textContent.toLowerCase();
                                const isVisible = text.includes(searchTerm);
                                row.style.display = isVisible ? '' : 'none';
                                
                                if (isVisible) {
                                    visibleCount++;
                                    row.style.animation = 'slideInLeft 0.3s ease';
                                }
                            });

                            // Show empty state if no results
                            showEmptyState(visibleCount === 0);
                        }
                    }, 300);
                });
            }

            // Add hover effects to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Animate stats cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'slideInLeft 0.6s ease';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.stat-card').forEach(card => {
                observer.observe(card);
            });
        });

        // Enhanced table sorting function
        function sortTable(table, columnIndex, ascending) {
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                const aText = a.cells[columnIndex].textContent.trim();
                const bText = b.cells[columnIndex].textContent.trim();

                // Try to compare as numbers if possible
                const aNum = parseFloat(aText.replace(/[^\d.-]/g, ''));
                const bNum = parseFloat(bText.replace(/[^\d.-]/g, ''));

                if (!isNaN(aNum) && !isNaN(bNum)) {
                    return ascending ? aNum - bNum : bNum - aNum;
                }

                // Try to compare as dates
                const aDate = new Date(aText);
                const bDate = new Date(bText);
                if (!isNaN(aDate) && !isNaN(bDate)) {
                    return ascending ? aDate - bDate : bDate - aDate;
                }

                // Otherwise compare as strings
                return ascending ?
                    aText.localeCompare(bText) :
                    bText.localeCompare(aText);
            });

            // Remove existing rows with fade out effect
            rows.forEach(row => {
                row.style.opacity = '0';
                row.style.transition = 'opacity 0.3s ease';
                setTimeout(() => tbody.removeChild(row), 300);
            });

            // Add sorted rows with fade in effect
            setTimeout(() => {
                rows.forEach((row, index) => {
                    row.style.opacity = '0';
                    tbody.appendChild(row);
                    setTimeout(() => {
                        row.style.opacity = '1';
                        row.style.animation = `slideInLeft 0.3s ease ${index * 0.05}s both`;
                    }, 10);
                });
            }, 300);
        }

        // Empty state functionality
        function showEmptyState(show) {
            let emptyState = document.querySelector('.empty-state');
            const table = document.querySelector('table');
            
            if (show && !emptyState) {
                emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                    <h3>Tidak ada data ditemukan</h3>
                    <p>Coba ubah kata kunci pencarian atau filter untuk melihat hasil</p>
                `;
                
                if (table) {
                    table.parentNode.appendChild(emptyState);
                }
            } else if (!show && emptyState) {
                emptyState.remove();
            }
        }

        // Utility function for smooth scrolling
        function smoothScrollTo(element, duration = 500) {
            const target = typeof element === 'string' 
                ? document.querySelector(element) 
                : element;
                
            if (!target) return;

            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            let startTime = null;

            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const timeElapsed = currentTime - startTime;
                const run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            }

            function ease(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }

            requestAnimationFrame(animation);
        }
    </script>

    @stack('scripts')
</body>

</html>