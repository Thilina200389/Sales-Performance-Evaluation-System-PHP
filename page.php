<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Performance Evaluation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
   
    <style>
      :root {
        --primary: #2F835F;           /* Deep Sage Green */
        --primary-light: #D3F0D1;     /* Pale Mint Green */
        --dark: #29321A;             /* Dark Olive Gray */
        --accent-purple: #E9C8E7;     /* Soft Lavender Pink */
        --bg: #f8fbf8;                /* Very light green tint */
        --text-muted: #556B4F;
        --card-shadow: 0 4px 15px rgba(47, 131, 95, 0.1);
      }

      body {
        font-family: 'Inter', sans-serif;
        background: var(--bg);
        min-height: 100vh;
        color: #333;
      }

      /* === LOGIN PAGE === */
      .login-wrapper {
        min-height: 100vh; display: flex; align-items: center; justify-content: center;
        background: radial-gradient(circle at top left, #076833 0%, #d3f0d1 40%, #462a73 100%);
      }
      .login-box {
          background: rgba(255, 255, 255, 0.65);           /* Very light glass */
          padding: 3.4rem 3rem;
          border-radius: 1.8rem;
          box-shadow: 
            0 20px 50px rgba(47, 131, 95, 0.08),
            0 0 0 1px rgba(211, 240, 209, 0.25);
          backdrop-filter: blur(20px);                     /* Stronger blur = silkier glass */
          -webkit-backdrop-filter: blur(20px);
          border: 1px solid rgba(255, 255, 255, 0.4);
          width: 100%;
          max-width: 460px;
          position: relative;
          overflow: hidden;
        }

        /* Subtle floating inner highlight */
        .login-box::after {
          content: '';
          position: absolute;
          top: -50%;
          left: -50%;
          width: 200%;
          height: 200%;
          background: radial-gradient(circle, rgba(211, 240, 209, 0.15) 0%, transparent 70%);
          pointer-events: none;
          animation: slowRotate 30s linear infinite;
        }

        @keyframes slowRotate {
          from { transform: rotate(0deg); }
          to   { transform: rotate(360deg); }
        }
      .login-header h3 { color: var(--dark); font-weight: 700; }
      .btn-login {
        background: var(--primary);
        border: none;
        padding: 0.8rem;
        font-weight: 600;
        transition: all 0.3s;
      }
      .btn-login:hover {
        background: #246b4d;
        transform: translateY(-2px);
      }

      /* === DASHBOARD LAYOUT === */
      .wrapper { display: flex; width: 100%; min-height: 100vh; }
      .sidebar {
        min-width: 260px;
        max-width: 260px;
        background: var(--dark);
        color: #d0e0d0;
        transition: all 0.3s;
      }
      .sidebar-header { padding: 2rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
      .sidebar-brand { font-weight: 700; font-size: 1.2rem; color: #fff; text-decoration: none; }
      .sidebar-menu { padding: 1.5rem 1rem; flex-grow: 1; display: flex; flex-direction: column; }
      .sidebar-btn {
        color: rgba(255,255,255,0.75);
        text-decoration: none;
        padding: 0.8rem 1rem;
        display: flex;
        align-items: center;
        border-radius: 0.5rem;
        margin-bottom: 0.5rem;
        transition: all 0.2s;
      }
      .sidebar-btn:hover, .sidebar-btn.active {
        background: rgba(255,255,255,0.1);
        color: #fff;
      }
      .sidebar-btn i { margin-right: 10px; }

      .role-badge {
        background: rgba(211, 240, 209, 0.2);
        padding: 1rem;
        border-radius: 0.5rem;
        border-left: 4px solid var(--primary);
        margin-bottom: 2rem;
      }

      .main-panel {
        width: 100%;
        padding: 2rem;
        overflow-y: auto;
        background: var(--bg);
      }
      .page-title { font-weight: 700; font-size: 1.75rem; color: var(--dark); }

      /* === CARDS === */
      .stat-card {
        background: #fff;
        border: none;
        border-radius: 0.75rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s;
        height: 100%;
      }
      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(47, 131, 95, 0.18);
      }
      .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
      }
      .icon-green   { background: #e1f0e8; color: var(--primary); }
      .icon-light   { background: var(--primary-light); color: var(--primary); }
      .icon-purple  { background: #f3e8f5; color: #9a6f9a; }
      .icon-dark    { background: #3a4a3a; color: #D3F0D1; }

      .stat-title { color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; }
      .stat-value { font-size: 1.6rem; font-weight: 700; color: var(--dark); }

      .progress { height: 8px; border-radius: 4px; background: #e9ecef; }
      .progress-bar { background: var(--primary); }

      @media (max-width: 992px) {
        .wrapper { flex-direction: column; }
        .sidebar { min-width: 100%; min-height: auto; }
        .main-panel { padding: 1.5rem; }
      }
    </style>
</head>
<body>

  <!-- LOGIN SCREEN -->
  <div class="login-wrapper" id="loginBoxContainer">
    <div class="login-box">
      <div class="text-center login-header mb-5">
        <!-- YOUR LOGO HERE -->
        <img src="logo.png" alt="Life Backup Logo" class="mb-4 rounded-circle shadow-sm" style="height: 110px; border: 4px solid white;">

        <h3 class="fw-bold" style="color: #29321A;">Life Backup</h3>
        <p class="text-muted">Sales Performance Evaluation System</p>
      </div>
      <p class="text-muted" style="font-size: 0.7rem;">Enter your credentials to access the portal</p>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="agentCode" placeholder="Agent Code">
        <label for="agentCode">Agent Code</label>
      </div>
      <div class="form-floating mb-4">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <button class="btn btn-login w-100 text-uppercase text-white fw-semibold" id="loginBtn">Log In</button>
      <div id="alert" class="mt-3"></div>
    </div>
  </div>

  <!-- DASHBOARD CONTAINER -->
  <div id="main" style="display:none;"></div>

  <script>
    // GLOBAL ROUTING
    function handleRouting() {
      var hash = window.location.hash.substring(1) || 'login';
      if (hash === 'login') {
        showLogin();
        return;
      }
      var role = sessionStorage.getItem('spes_role');
      if (role && hash === role) showDashboard(role);
      else window.location.hash = 'login';
    }

    function showLogin() {
      $('#main').hide().empty();
      $('#loginBoxContainer').fadeIn();
      $('#agentCode').val(''); $('#password').val(''); $('#alert').empty();
    }

    function showDashboard(role) {
      $('#loginBoxContainer').hide();
      $('#main').hide().html(renderDashboard(role)).fadeIn();
    }

    function signOut() {
      sessionStorage.removeItem('spes_role');
      window.location.hash = 'login';
    }

    $(document).ready(function() {
      handleRouting();
      $(window).on('hashchange', handleRouting);

      $('#loginBtn').on('click', function() {
        var agentCode = $('#agentCode').val().trim();
        var password = $('#password').val();
        if (!agentCode || !password) {
          $('#alert').html('<div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> All fields required.</div>');
          return;
        }
        $.post('login.php', {agentCode, password}, function(data) {
          try {
            var res = JSON.parse(data);
            if (res.success) {
              sessionStorage.setItem('spes_role', res.role);
              window.location.hash = res.role;
            } else {
              $('#alert').html('<div class="alert alert-danger"><i class="bi bi-x-circle"></i> Invalid credentials.</div>');
            }
          } catch(e) {
            $('#alert').html('<div class="alert alert-danger">Server error.</div>');
          }
        });
      });
    });

    // CARD HELPER
    function createCard(title, goal, achieved, percent, colorClass = 'icon-green', icon = 'bi-clipboard-data') {
      return `
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card stat-card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <div class="stat-title">${title}</div>
                  <div class="stat-value">${achieved} <span class="text-muted fs-6 fw-normal">/ ${goal}</span></div>
                </div>
                <div class="stat-icon ${colorClass}">
                  <i class="bi ${icon}"></i>
                </div>
              </div>
              <div class="mt-4">
                <div class="progress">
                  <div class="progress-bar" style="width: ${percent}"></div>
                </div>
                <div class="d-flex justify-content-between mt-2 text-muted small">
                  <span>Completion</span>
                  <span class="fw-bold text-success">${percent}</span>
                </div>
              </div>
            </div>
          </div>
        </div>`;
    }

    // DASHBOARD RENDERER
    function renderDashboard(role) {
      let displayRole = role.replace('_', ' ').replace(/\w\S*/g, w => w.charAt(0).toUpperCase() + w.slice(1));
      let title = displayRole + " Dashboard";

      const sidebar = `
        <div class="wrapper">
          <nav class="sidebar">
            <div class="sidebar-header text-center py-4" style="background: var(--dark);">
                 <div class="d-inline-block">
                     <img src="logo.png" alt="Life Backup" class="mb-3" style="height: 60px; width: auto; border-radius: 8px;">
                     <div class="text-white fw-bold fs-4 mb-1">Life Backup</div>
                     <small class="text-white-50 d-block" style="font-size: 0.8rem; letter-spacing: 0.5px;"> Sales Performance Evaluation System </small>
                 </div>
            </div>
            <div class="sidebar-menu">
              <div class="role-badge">
                <div class="small text-white-50 text-uppercase">Current View</div>
                <div class="text-white fw-bold">${title}</div>
              </div>
              <div class="mt-auto pt-4 border-top border-secondary">
                <a href="javascript:void(0)" onclick="signOut()" class="sidebar-btn text-danger">
                  <i class="bi bi-box-arrow-right"></i> Log Out
                </a>
              </div>
            </div>
          </nav>
          <div class="main-panel">
            <div class="page-header mb-5">
              <h2 class="page-title">${title}</h2>
              <p class="text-muted">Welcome back! Here's your performance overview.</p>
            </div>
            <div class="row g-4">`;

      let content = '';
      if (role === 'manager') {
        content = `
          ${createCard('Recruit Sales Agents', '250', '218', '87%', 'icon-green', 'bi-people')}
          ${createCard('Recruit Team Leaders', '45', '41', '91%', 'icon-light', 'bi-person-check')}
          ${createCard('Recruit LIA', '120', '98', '82%', 'icon-purple', 'bi-person-plus')}
          ${createCard('Recruit Sales Supervisors', '28', '24', '86%', 'icon-light', 'bi-person-video2')}
          ${createCard('New Policies Issued', '1248', '1087', '87%', 'icon-green', 'bi-file-earmark-text')}
          ${createCard('Premium Collected', '42700000', '36800000', '86%', 'icon-light', 'bi-graph-up-arrow')}`;
      } else if (role === 'supervisor') {
        content = `
          ${createCard('Team Sales', '90', '57', '63%', 'icon-green', 'bi-graph-up')}
          ${createCard('New Policies', '36', '21', '58%', 'icon-purple', 'bi-file-text')}
          ${createCard('Premium Collection', '5.4M', '3.1M', '57%', 'icon-light', 'bi-cash-stack')}`;
      } else if (role === 'team_leader') {
        content = `
          ${createCard('Team Sales', '42', '19', '45%', 'icon-green', 'bi-cart-check')}
          ${createCard('Active Agents', '18', '13', '72%', 'icon-purple', 'bi-people-fill')}`;
      } else if (role === 'agent') {
        content = `
          ${createCard('Your Sales', '18', '12', '67%', 'icon-green', 'bi-bag-check')}
          ${createCard('Premium Collected', '1.8M', '0.9M', '50%', 'icon-light', 'bi-wallet2')}`;
      } else if (role === 'advisor') {
        content = `${createCard('Policies Sold', '12', '8', '67%', 'icon-purple', 'bi-shield-check')}`;
      } else if (role === 'cashier') {
        content = `
        ${createCard("Today's Invoices", '35', '22', '63%', 'icon-light', 'bi-receipt')}
          <form id="invoiceForm" class="p-3 border bg-white rounded-4">
            <h5 class="mb-4 text-muted fw-bold">Invoice Details</h5>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Branch Code</label>
                <select class="form-select" required>
                  <option value="">Select</option>
                  <option value="B001">B001</option>
                  <option value="B002">B002</option>
                  <option value="B003">B003</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Supervisor Code</label>
                <select class="form-select" required>
                  <option value="">Select</option>
            <option value="S100">S100</option>
            <option value="S200">S200</option>
            <option value="S300">S300</option>
                </select>
              </div>
              </div>
              <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Team Leader Code</label>
                <select class="form-select" required>
                  <option value="">Select</option>
            <option value="TL01">TL01</option>
            <option value="TL02">TL02</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Sales Agent Code</label>
                <select class="form-select" required>
                  <option value="">Select</option>
            <option value="A500">A5000</option>
            <option value="A600">A6000</option>
            <option value="A700">A7000</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Invoice Date</label>
                <input type="date" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Policy Number</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Premium Amount</label>
                <input type="number" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Payment Frequency</label>
                <select class="form-select" required>
                  <option value="">Choose...</option>
                  <option value="monthly">Monthly</option>
                  <option value="quarterly">Quarterly</option>
                  <option value="annual">Annual</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Agent Signature</label>
                <select class="form-select" required>
                  <option value="">Select</option>
            <option value="Signed">Signed</option>
            <option value="Not Signed">Not Signed</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Cash Handed Over Date</label>
                <input type="date" class="form-control" required>
              </div>
            </div>
            <div class="text-end mt-4">
              <button type="submit" class="btn btn-dark px-4">Save</button>
            </div>
          </form>
        `;
    }else {content = `<div class="col-12"><div class="alert alert-info">No dashboard available for this role.</div></div>`;}
      return sidebar + content + `</div></div></div>`;
    }
    $(document).on('submit', '#invoiceForm', function(e) {
  e.preventDefault();
  alert('Invoice saved! (Demo)');
});

  </script>
</body>
</html>