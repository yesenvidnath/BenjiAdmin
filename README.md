
# Benji Admin Frontend Repository

Welcome to the **Benji Admin Frontend Repository**! This repository contains the codebase for the administrative panel of the Benji application. Built with Laravel, it facilitates comprehensive management and configuration of the Benji ecosystem.

---

## Project Overview

The Benji Admin Frontend is a vital component of the Benji Application, enabling administrators to manage users, track activities, and configure system settings efficiently.

### Key Features:
- **User Management**: Admins can create, update, delete, and manage user roles and permissions.
- **System Configuration**: Access to global settings, API keys, and operational configurations.
- **Activity Monitoring**: Real-time dashboards to monitor user actions and system health.
- **Secure Authentication**: Admin authentication with Laravel Sanctum.
- **Integration with Backend APIs**: Seamless connectivity with the Benji backend.

---

## Project Structure

### Key Files and Directories:

- **routes/**: Contains route definitions for the admin panel.
- **resources/views/**: Laravel Blade templates for frontend rendering.
- **public/**: Assets for styling, images, and scripts.
- **app/Http/Controllers/**: Logic for handling admin-related requests.
- **config/**: Configuration files for application settings.

---

## Requirements

### Dependencies:
This project uses Laravel for the backend framework. Ensure the following are installed:

**Server Requirements:**
- PHP 8.1+
- Composer
- MySQL database
- Laravel Framework 10.10
- Node.js and npm (for frontend asset compilation)

---

## Environment Configuration

### Setting Up the Environment:
Ensure your `.env` file is configured correctly:

```env
APP_NAME=BenjiAdmin
APP_ENV=local
APP_KEY=base64:your_app_key_here
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=benji_admin
DB_USERNAME=root
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="admin@benji.com"
MAIL_FROM_NAME="Benji Admin"
```

---

## Getting Started

### Installation Steps:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yesenvidnath/BenjiAdmin.git
   cd BenjiAdmin
   ```

2. **Install PHP Dependencies:**
   ```bash
   composer install
   ```

3. **Set Up Environment Variables:**
   Create a `.env` file and configure it based on the example provided above.

4. **Run Database Migrations:**
   ```bash
   php artisan migrate
   ```

5. **Compile Frontend Assets:**
   ```bash
   npm install
   npm run dev
   ```

6. **Start the Application:**
   ```bash
   php artisan serve
   ```

---

## Contribution Guidelines

Contributions are welcome! Please follow these steps:

1. Fork the repository and create a new branch for your feature or bugfix.
2. Write clean, well-documented code.
3. Test your changes thoroughly before submitting.
4. Open a detailed pull request with a summary of your changes.

---

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

---

## Contact

For further inquiries or support:
- **Name**: K.K.Y. Vidnath
- **Email**: admin-support@benji.com

Thank you for contributing to the Benji Admin Frontend!
