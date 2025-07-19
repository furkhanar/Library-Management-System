# 📚 Diya Library Management System

A lightweight, user-friendly Library Management System built using **PHP**, **MySQL (with PDO)**, and **Bootstrap 5**. Designed to help administrators manage books, authors, members, categories, and issue records efficiently.

---

## 🚀 Features

- 🔐 Admin login system with password verification
- 📚 Manage:
  - 📖 Books
  - 👤 Authors
  - 🏷️ Categories
  - 🧑‍🤝‍🧑 Members
  - 📆 Book Issue and Return tracking
- 💰 Calculates overdue fines (₹10/day)
- 📱 Responsive design using Bootstrap
- 📁 Modular code structure (`header.php`, `footer.php`, `db.php`)

---

## 🛠️ Setup Instructions

### 1. 📦 Requirements

- PHP >= 7.2
- MySQL Server
- Web Server (XAMPP, WAMP, LAMP, etc.)

### 2. 🧾 Installation

#### A. Clone or Download
- Extract the project folder to your web server directory (e.g., `htdocs` in XAMPP).

#### B. Import Database
- Open **phpMyAdmin**.
- Create a database named `library`.
- Import the provided `.sql` file (if available) to create tables like `admins`, `books`, `members`, etc.

#### C. Configure Database Connection
Edit `db.php` with your database credentials:

```php
<?php
$pdo = new PDO("mysql:host=localhost;dbname=library", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>

🔐 Admin Login
Open browser:
http://localhost//MohammedFurkhanAr_FrontendInternTask/LibraryManagementSystem/login.php

Username: admin
Password: test123

💡 How to Use
Log in as admin

Use the sidebar/navbar to access:

📖 Books

🧑 Authors

🏷️ Categories

👥 Members

📘 Issue Records

Add new entries using provided forms

Track book issue & return dates

Overdue fines are calculated automatically (₹10/day)

🎨 UI Technologies
Bootstrap 5 (CDN)

PHP (Procedural + PDO)

MySQL (phpMyAdmin)

Responsive layout with Bootstrap grid system

🙏 Acknowledgment
First, we thank Allah ﷻ for giving us the strength to build this system.

📃 License
This project is free to use for learning and educational purposes. You may modify it as per your need.


