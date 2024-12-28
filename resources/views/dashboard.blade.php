<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
      .bot-manage__title {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .bot-manage__card {
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .bot-manage__content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .bot-manage__option {
            text-align: center;
        }

        .bot-manage__send-btn {
            padding: 12px 24px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .bot-manage__send-btn:hover {
            background: #45a049;
        }

        .bot-manage__toggle {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .bot-manage__toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .bot-manage__toggle-slider {
            position: relative;
            width: 60px;
            height: 30px;
            background-color: #ccc;
            border-radius: 30px;
            transition: 0.4s;
        }

        .bot-manage__toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: 0.4s;
        }

        .bot-manage__toggle input:checked + .bot-manage__toggle-slider {
            background-color: #2196F3;
        }

        .bot-manage__toggle input:checked + .bot-manage__toggle-slider:before {
            transform: translateX(30px);
        }

        .bot-manage__toggle-label {
            font-size: 1rem;
            color: #333;
        }

        .bot-manage__message {
            margin-top: 1rem;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            display: none;
        }

        .bot-manage__message.success {
            background: #d4edda;
            color: #155724;
            display: block;
        }

        .bot-manage__message.error {
            background: #f8d7da;
            color: #721c24;
            display: block;
        }



        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: white;
        }
        .nav-link {
            color: #ecf0f1;
            padding: 15px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .nav-link:hover {
            background: #34495e;
            color: white;
        }
        .nav-link.active {
            background: #3498db;
            color: white;
        }
        .main-content {
            background: #f5f6fa;
            min-height: 100vh;
        }
        .chart-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .toggle-button {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        .toggle-button input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .custom-bg{

            background: #2c3e50 !important;
            color: white !important;
        }
    </style>
</head>
<body>
    <!-- Check Authentication -->
    <script>
        // Check if token exists
        const token = localStorage.getItem('api_token');
        if (!token) {
            window.location.href = '/login';
        }
    </script>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3">
                    <h4 class="text-center mb-4">Admin Panel</h4>
                    <div id="userInfo" class="text-center mb-4">
                        <!-- User info will be populated here -->
                    </div>
                    <div class="nav flex-column">
                        <a href="#home" class="nav-link active" data-bs-toggle="pill">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                        <a href="#professionals" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-user-tie me-2"></i> Professionals
                        </a>
                        <a href="#customers" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-users me-2"></i> Customers
                        </a>
                        <a href="#notifications" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-bell me-2"></i> Notifications
                        </a>
                        <a href="#payments" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-credit-card me-2"></i> Payments
                        </a>
                        <a href="#bot" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-robot me-2"></i> Manage Bot
                        </a>
                        <a href="#meetings" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-calendar me-2"></i> Meetings
                        </a>
                        <a href="#requests" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-tasks me-2"></i> Requests
                        </a>
                        <a href="#profile" class="nav-link" data-bs-toggle="pill">
                            <i class="fas fa-user me-2"></i> Profile
                        </a>
                        <a href="#" onclick="handleLogout()" class="nav-link">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                <div class="tab-content">
                    <!-- Home Tab -->
                    <div class="tab-pane fade show active" id="home">
                        <h2 class="mb-4">Dashboard Overview</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <h5>Total Users</h5>
                                    <h2 id="totalUsers">20</h2>
                                    <p class="text-success" id="usersGrowth">20%</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <h5>Revenue</h5>
                                    <h2 id="totalRevenue">Rs:200</h2>
                                    <p class="text-success" id="revenueGrowth">10%</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <h5>Active Sessions</h5>
                                    <h2 id="activeSessions">40</h2>
                                    <p id="sessionsGrowth">10%</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <h5>Pending Requests</h5>
                                    <h2 id="pendingRequests">2</h2>
                                    <p id="requestsGrowth">2%</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="usersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Tab -->
                    <div class="tab-pane fade" id="profile">
                        <h2>Admin Profile</h2>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img id="profileImage" class="rounded-circle mb-3" alt="Profile" style="width: 150px; height: 150px; object-fit: cover;">
                                        <h4 id="profileName">Loading...</h4>
                                        <p class="text-muted" id="profileType">Loading...</p>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>Profile Details</h5>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-4">User ID:</div>
                                            <div class="col-md-8" id="profileUserId">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Email:</div>
                                            <div class="col-md-8" id="profileEmail">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Phone:</div>
                                            <div class="col-md-8" id="profilePhone">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Address:</div>
                                            <div class="col-md-8" id="profileAddress">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Date of Birth:</div>
                                            <div class="col-md-8" id="profileDOB">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Bank Choice:</div>
                                            <div class="col-md-8" id="profileBank">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Member Since:</div>
                                            <div class="col-md-8" id="profileCreatedAt">Loading...</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">Last Updated:</div>
                                            <div class="col-md-8" id="profileUpdatedAt">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- customer Tab --}}
                    <div class="tab-pane fade" id="customers">
                        <h2>customers Manage</h2>

                    </div>

                    {{-- Professonal Tab --}}
                    <div class="tab-pane fade" id="professionals">
                        <h2 class="mb-4">Professionals Management</h2>

                        <!-- Loading Spinner -->
                        <div id="professionalsLoading" class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <!-- Error Alert -->
                        <div id="professionalsError" class="alert alert-danger d-none" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <span id="errorMessage">Error loading professionals data.</span>
                        </div>

                        <!-- Professionals Grid -->
                        <div class="row" id="professionalsGrid">
                            <!-- Professional cards will be inserted here -->
                        </div>

                        <!-- Professional Details Modal -->
                        <div class="modal fade" id="professionalModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Professional Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <img id="modalProfileImage" src="" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                                <h4 id="modalFullName"></h4>
                                                <span id="modalStatus" class="badge"></span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Professional Type:</div>
                                                    <div class="col-md-8" id="modalProfessionalType"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Charge per Hour:</div>
                                                    <div class="col-md-8" id="modalChargePerHour"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Email:</div>
                                                    <div class="col-md-8" id="modalEmail"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Phone:</div>
                                                    <div class="col-md-8" id="modalPhone"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Address:</div>
                                                    <div class="col-md-8" id="modalAddress"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Date of Birth:</div>
                                                    <div class="col-md-8" id="modalDob"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4 fw-bold">Bank Choice:</div>
                                                    <div class="col-md-8" id="modalBank"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Certificates Section -->
                                        <div class="mt-4">
                                            <h5 class="mb-3">Certificates</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="certificatesTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Certificate Name</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="certificatesTableBody">
                                                        <!-- Certificate rows will be inserted here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4 fw-bold">Status:</div>
                                            <div class="col-md-8">
                                                <select id="modalStatusSelect" class="form-select">
                                                    <option value="pending">Pending</option>
                                                    <option value="active">Active</option>
                                                    <option value="banned">Banned</option>
                                                    <option value="suspended">Suspended</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4 fw-bold">Charge per Hour:</div>
                                            <div class="col-md-8">
                                                <input type="number" id="modalChargePerHourInput" class="form-control" min="0" step="0.01">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 offset-md-4">
                                                <button id="updateStatusBtn" class="btn btn-primary mt-2">Update Status</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Send Notifications --}}
                    <div class="tab-pane fade" id="notifications">
                        <h2 class="mb-4">Notifications Manage</h2>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mb-4" id="notificationTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active custom-bg" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                                        type="button" role="tab" aria-controls="general" aria-selected="true">
                                    General Message
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link custom-bg" id="bulk-tab" data-bs-toggle="tab" data-bs-target="#bulk"
                                        type="button" role="tab" aria-controls="bulk" aria-selected="false">
                                    Bulk Message
                                </button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content">
                            <!-- General Message Tab -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">Send Message to All Users</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="generalNotifyForm" class="needs-validation" novalidate>
                                            <div class="mb-3">
                                                <label class="form-label">User Type</label>
                                                <select class="form-select" name="user_type" required>
                                                    <option value="">Select User Type</option>
                                                    <option value="Customer">Customer</option>
                                                    <option value="Professional">Professional</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Message Type</label>
                                                <select class="form-select" name="type" required>
                                                    <option value="">Select Message Type</option>
                                                    <option value="general">General</option>
                                                    <option value="meeting">Meeting</option>
                                                    <option value="alert">Alert</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Message</label>
                                                <textarea class="form-control" name="message" rows="3" required
                                                        placeholder="Enter your message here..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-paper-plane me-2"></i>Send to All
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Bulk Message Tab -->
                            <div class="tab-pane fade" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">Send Bulk Message</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="bulkNotifyForm" class="needs-validation" novalidate>
                                            <div class="mb-3">
                                                <label class="form-label">User Type</label>
                                                <select class="form-select" name="user_type" required>
                                                    <option value="">Select User Type</option>
                                                    <option value="Customer">Customer</option>
                                                    <option value="Professional">Professional</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Message Type</label>
                                                <select class="form-select" name="type" required>
                                                    <option value="">Select Message Type</option>
                                                    <option value="general">General</option>
                                                    <option value="meeting">Meeting</option>
                                                    <option value="alert">Alert</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Start User ID</label>
                                                        <input type="number" class="form-control" name="start_user_ID" required
                                                               placeholder="Enter start ID">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">End User ID</label>
                                                        <input type="number" class="form-control" name="end_user_ID" required
                                                               placeholder="Enter end ID">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Message</label>
                                                <textarea class="form-control" name="message" rows="3" required
                                                        placeholder="Enter your message here..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-paper-plane me-2"></i>Send Bulk Message
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bot Management --}}
                    <div class="tab-pane fade" id="bot">
                        <h2 class="bot-manage__title">Bot Manage</h2>

                        <div class="bot-manage__card">
                            <div class="bot-manage__content">
                                <div class="bot-manage__option">
                                    <button class="bot-manage__send-btn" onclick="sendToBotManually()">
                                        Send Information to Bot
                                    </button>
                                </div>

                                <div class="bot-manage__option">
                                    <label class="bot-manage__toggle">
                                        <input type="checkbox" id="autoFetchToggle" onchange="toggleAutoFetch(this)">
                                        <span class="bot-manage__toggle-slider"></span>
                                        <span class="bot-manage__toggle-label">AutoMateFetch</span>
                                    </label>
                                </div>
                            </div>
                            <div id="botResponseMessage" class="bot-manage__message"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Handle fetch admin info script --}}
    <script>
        // Check if token exists and redirects if not authenticated
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('auth_token');
            if (!token) {
                window.location.href = '/login';
                return;
            }

            // Call fetchUserProfile immediately after checking token
            fetchUserProfile();
            initializeCharts();
            initializeTooltips();
        });

        // Updated fetch user profile function
        async function fetchUserProfile() {
            try {
                const token = localStorage.getItem('auth_token');
                if (!token) {
                    throw new Error('No auth token found');
                }

                console.log('Fetching profile with token:', token); // For debugging

                const response = await fetch('http://127.0.0.1:8000/api/user-management-service/auth/profile/me', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                console.log('Response status:', response.status); // For debugging

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('Profile data received:', data); // For debugging

                if (data && data.user) {
                    updateProfileUI(data.user);
                } else {
                    throw new Error('Invalid response format');
                }

            } catch (error) {
                console.error('Error fetching profile:', error);
                handleAuthError(error);
            }
        }

        // Updated UI update function
        function updateProfileUI(userData) {
            try {
                // Format dates properly
                const formatDate = (dateString) => {
                    return new Date(dateString).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                };

                // Update profile image and name section
                const profileImage = document.getElementById('profileImage');
                if (profileImage) {
                    profileImage.src = userData.profile_image || 'https://via.placeholder.com/150';
                    profileImage.onerror = function() {
                        this.src = 'https://via.placeholder.com/150';
                    };
                }

                document.getElementById('profileName').textContent =
                    `${userData.first_name} ${userData.last_name}`;
                document.getElementById('profileType').textContent = userData.type;

                // Update all profile details
                const profileFields = {
                    'profileUserId': userData.user_ID,
                    'profileEmail': userData.email,
                    'profilePhone': userData.phone_number,
                    'profileAddress': userData.address,
                    'profileDOB': formatDate(userData.DOB),
                    'profileBank': userData.bank_choice,
                    'profileCreatedAt': formatDate(userData.created_at),
                    'profileUpdatedAt': formatDate(userData.updated_at)
                };

                // Update each field and handle any missing elements
                for (const [elementId, value] of Object.entries(profileFields)) {
                    const element = document.getElementById(elementId);
                    if (element) {
                        element.textContent = value || 'Not provided';
                        // Remove loading text
                        element.classList.remove('text-muted');
                    }
                }

                // Update sidebar user info
                const userInfo = document.getElementById('userInfo');
                if (userInfo) {
                    userInfo.innerHTML = `
                        <img src="${userData.profile_image}"
                            class="rounded-circle mb-2"
                            width="50"
                            height="50"
                            onerror="this.src='https://via.placeholder.com/50'">
                        <div class="text-white">${userData.first_name} ${userData.last_name}</div>
                        <small class="text-light">${userData.type}</small>
                    `;
                }

            } catch (error) {
                console.error('Error updating UI:', error);
                // Show error message to user
                const errorMessage = document.createElement('div');
                errorMessage.className = 'alert alert-danger';
                errorMessage.textContent = 'Error updating profile information';
                document.querySelector('.card-body').prepend(errorMessage);
            }
        }

        // Enhanced error handling
        function handleAuthError(error) {
            console.error('Authentication error:', error);

            // Show error message to user
            const errorMessage = document.createElement('div');
            errorMessage.className = 'alert alert-danger';
            errorMessage.textContent = 'Authentication failed. Please log in again.';
            document.querySelector('.card-body').prepend(errorMessage);

            // Clear token and redirect after a short delay
            setTimeout(() => {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            }, 2000);
        }
        // Initialize charts
        function initializeCharts() {
            // Revenue Chart
            const revenueChart = new Chart(document.getElementById('revenueChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [30000, 35000, 32000, 40000, 38000, 45000],
                        borderColor: '#3498db',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Monthly Revenue'
                        }
                    }
                }
            });

            // Users Chart
            const usersChart = new Chart(document.getElementById('usersChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'New Users',
                        data: [120, 150, 180, 90, 200, 220],
                        backgroundColor: '#2ecc71'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'New Users per Month'
                        }
                    }
                }
            });
        }

        // Initialize tooltips
        function initializeTooltips() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        }

        // On page load
        document.addEventListener('DOMContentLoaded', function() {
            fetchUserProfile();
            initializeCharts();
            initializeTooltips();
        });
    </script>

    {{-- Handle the Proffeosnal info --}}
    <script>
        // professionals.js
        document.addEventListener('DOMContentLoaded', function() {
            loadProfessionals();
        });

        async function loadProfessionals() {
            const loadingSpinner = document.getElementById('professionalsLoading');
            const errorAlert = document.getElementById('professionalsError');
            const grid = document.getElementById('professionalsGrid');

            try {
                loadingSpinner.classList.remove('d-none');
                errorAlert.classList.add('d-none');

                const token = localStorage.getItem('auth_token');
                if (!token) throw new Error('No auth token found');

                const response = await fetch('http://127.0.0.1:8000/api/Admin-Management-service/professionals/getall', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Failed to fetch professionals');

                const data = await response.json();
                renderProfessionals(data.data);

            } catch (error) {
                console.error('Error loading professionals:', error);
                errorAlert.classList.remove('d-none');
                errorAlert.querySelector('#errorMessage').textContent = error.message;
            } finally {
                loadingSpinner.classList.add('d-none');
            }
        }

        function renderProfessionals(professionals) {
            const grid = document.getElementById('professionalsGrid');
            grid.innerHTML = '';

            professionals.forEach(professional => {
                const card = createProfessionalCard(professional);
                grid.appendChild(card);
            });
        }

        function createProfessionalCard(professional) {
            const col = document.createElement('div');
            col.className = 'col-md-4 mb-4';

            const statusClass = professional.status === 'active' ? 'success' : 'warning';

            col.innerHTML = `
                <div class="card h-100">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="${professional.profile_image}"
                                class="rounded-circle"
                                style="width: 100px; height: 100px; object-fit: cover;"
                                onerror="this.src='https://via.placeholder.com/100'">
                            <h5 class="mt-2 mb-0">${professional.full_name}</h5>
                            <span class="badge bg-${statusClass} mb-2">${professional.status}</span>
                            <p class="text-muted">${professional.professional_type}</p>
                        </div>
                        <div class="small">
                            <p><i class="fas fa-envelope me-2"></i>${professional.email}</p>
                            <p><i class="fas fa-phone me-2"></i>${professional.phone_number}</p>
                            <p><i class="fas fa-certificate me-2"></i>${professional.certificates.length} Certificates</p>
                        </div>
                        <button class="btn btn-primary w-100" onclick="showProfessionalDetails(${JSON.stringify(professional).replace(/"/g, '&quot;')})">
                            View Details
                        </button>
                    </div>
                </div>
            `;

            return col;
        }

        async function updateProfessionalStatus(userId, newStatus, newChargePerHour) {
            try {
                const token = localStorage.getItem('auth_token');
                if (!token) throw new Error('No auth token found');

                const response = await fetch(`http://127.0.0.1:8000/api/Admin-Management-service/professionals/${userId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ status: newStatus,charge_per_hr: newChargePerHour  })
                });

                if (!response.ok) throw new Error('Failed to update status');

                // Reload professionals to reflect the change
                await loadProfessionals();

                // Close the modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('professionalModal'));
                modal.hide();

                // Show success message
                alert('Status updated successfully');

            } catch (error) {
                console.error('Error updating status:', error);
                alert('Failed to update status. Please try again.');
            }
        }

        function showProfessionalDetails(professional) {
            // Update modal content
            document.getElementById('modalProfileImage').src = professional.profile_image;
            document.getElementById('modalFullName').textContent = professional.full_name;
            document.getElementById('modalStatus').textContent = professional.status;
            document.getElementById('modalStatus').className = `badge bg-${professional.status === 'active' ? 'success' : 'warning'}`;
            document.getElementById('modalProfessionalType').textContent = professional.professional_type;
            document.getElementById('modalChargePerHour').textContent = `$${professional.charge_per_hour}`;
            document.getElementById('modalEmail').textContent = professional.email;
            document.getElementById('modalPhone').textContent = professional.phone_number;
            document.getElementById('modalAddress').textContent = professional.address;
            document.getElementById('modalDob').textContent = new Date(professional.dob).toLocaleDateString();
            document.getElementById('modalBank').textContent = professional.bank_choice;

            // Update certificates table
            const certificatesTableBody = document.getElementById('certificatesTableBody');
            certificatesTableBody.innerHTML = '';

            // Set the current status in the select element
            const statusSelect = document.getElementById('modalStatusSelect');
            statusSelect.value = professional.status;

            // Set the current charge per hour in the input
            const chargeInput = document.getElementById('modalChargePerHourInput');
            chargeInput.value = professional.charge_per_hour;

            // Add click event listener for the update button
            const updateButton = document.getElementById('updateStatusBtn');
            updateButton.onclick = () => {
                const newStatus = statusSelect.value;
                updateProfessionalStatus(professional.user_id, newStatus, professional.charge_per_hour);
            };



            if (professional.certificates.length === 0) {
                certificatesTableBody.innerHTML = `
                    <tr>
                        <td colspan="3" class="text-center">No certificates available</td>
                    </tr>
                `;
            } else {
                professional.certificates.forEach(cert => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${cert.certificate_name}</td>
                        <td>${new Date(cert.certificate_date).toLocaleDateString()}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="downloadCertificate('${cert.certificate_image}', '${cert.certificate_name}')">
                                <i class="fas fa-download me-1"></i> Download
                            </button>
                        </td>
                    `;
                    certificatesTableBody.appendChild(row);
                });
            }

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('professionalModal'));
            modal.show();
        }

        async function downloadCertificate(certificatePath, certificateName) {
            try {
                const token = localStorage.getItem('auth_token');
                const response = await fetch(`http://127.0.0.1:8000/api/storage/${certificatePath}`, {
                    method: 'GET',
                    credentials: 'include',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `${certificateName}.jpg`;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                a.remove();
            } catch (error) {
                console.error('Error downloading certificate:', error);
                alert('Failed to download certificate. Please try again.');
            }
        }


    </script>

    {{-- Handilng the Sned Notifications --}}
    <script>
        // Helper function to get auth token
        function getAuthToken() {
            const token = localStorage.getItem('auth_token');
            if (!token) throw new Error('No auth token found');
            return token;
        }

        // Form submission handlers
        document.getElementById('generalNotifyForm').addEventListener('submit', function(e) {
            e.preventDefault();

            try {
                const token = getAuthToken();
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Disable submit button and show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';

                fetch('http://127.0.0.1:8000/api/user-management-service/notify/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Message sent successfully!');
                    this.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error sending message: ' + error.message);
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send to All';
                });
            } catch (error) {
                console.error('Auth Error:', error);
                alert('Authentication error: ' + error.message);
            }
        });

        document.getElementById('bulkNotifyForm').addEventListener('submit', function(e) {
            e.preventDefault();

            try {
                const token = getAuthToken();
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Convert ID fields to numbers
                data.start_user_ID = parseInt(data.start_user_ID);
                data.end_user_ID = parseInt(data.end_user_ID);

                // Disable submit button and show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';

                fetch('http://127.0.0.1:8000/api/user-management-service/notify/send-bulk', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Bulk message sent successfully!');
                    this.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error sending bulk message: ' + error.message);
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send Bulk Message';
                });
            } catch (error) {
                console.error('Auth Error:', error);
                alert('Authentication error: ' + error.message);
            }
        });
    </script>

</body>
</html>
