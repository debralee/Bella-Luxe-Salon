# Bella Luxe Salon

Bella Luxe Salon is a web application for managing and showcasing salon services online. It allows visitors to browse services pulled live from a database, register and log in as users, and gives administrators a dashboard to manage the service catalog.

## Live Demo

[https://webart01.com/Bella-Luxe-Salon/view/index.php](https://webart01.com/Bella-Luxe-Salon/view/index.php)

## Features

- Built using PHP, HTML, CSS, and JavaScript
- Fully responsive design
- Connects to a database for persistent storage
- Dynamic Services display (data is pulled directly from the database)
- User registration
- User login
- Passwords stored using secure hashing
- Validation on all input fields
- Error handling throughout the application
- Session management for logged-in users
- Admin Dashboard
  - Add a new service
  - Modify an existing service's name
  - Modify an existing service's price
  - Delete a service
- Service data resets each time a user logs out or a new user navigates to the website

## Tech Stack

- **Backend:** PHP
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL (or your database of choice)

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL (or compatible database server)
- A local server environment (e.g., XAMPP, WAMP, MAMP, or similar)

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/debralee/bella-luxe-salon.git
   ```
2. Move the project folder into your server's root directory (e.g., `htdocs` for XAMPP)
3. Import the provided SQL file into your database
   ```bash
   mysql -u your_username -p your_database_name < database/bella_luxe_salon.sql
   ```
4. Update the database connection settings in the config file (e.g., `config.php`) with your credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'bella_luxe_salon');
   ```
5. Start your local server and navigate to the project in your browser
   ```
   http://localhost/bella-luxe-salon
   ```

## Usage

- **Visitors** can browse the salon's services on the homepage, with details loaded dynamically from the database.
- **New users** can register for an account, with all fields validated before submission.
- **Registered users** can log in securely; passwords are hashed and sessions track logged-in status.
- **Admins** can log in to the Admin Dashboard to add, edit, or delete services, keeping the service catalog up to date.

## Project Structure

```
bella-luxe-salon/
├── admin/            # Admin dashboard files
├── assets/           # CSS, JavaScript, images
├── database/         # SQL schema/seed files
├── includes/         # Shared PHP includes (db connection, functions, etc.)
├── pages/            # Public-facing pages
├── config.php        # Database configuration
└── README.md
```

## Security Notes

- Passwords are never stored in plain text; they are hashed before saving to the database.
- All user input is validated and sanitized to help prevent SQL injection and XSS attacks.
- Sessions are used to manage authenticated state and protect admin-only routes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For questions or feedback, please open an issue in the [GitHub repository](https://github.com/debralee/bella-luxe-salon).
