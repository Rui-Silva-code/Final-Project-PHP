# CRUD-AUTHENTICATION – PHP & MySQL

## Portuguese [README](README_PT.md)

## Overview
Final project developed as part of a Web Development course, with the goal of demonstrating practical skills in back-end development using PHP and MySQL, as well as integration with the front-end.

The project includes user authentication, CRUD operations, and a basic, organized structure following initial best practices.

Status: Academic project / technical demonstration

---

## What this project demonstrates
- Back-end development with PHP (procedural / organized programming)
- PHP and MySQL integration using PDO
- Basic authentication implementation with PHP sessions
- Full CRUD operations
- Data validation on both front-end and back-end
- Structure of a small full-stack application
- Basic security and code organization best practices

---

## Technologies used
- PHP 7.4+
- MySQL / MariaDB
- HTML5, CSS3
- JavaScript (vanilla)
- Bootstrap 4/5

---

## Implemented features
- User login and logout (PHP sessions)
- CRUD operations for entities (e.g. users / products / posts)
- Basic form validation (JavaScript and PHP)
- Responsive layout using Bootstrap
- Basic separation between logic, presentation, and configuration

---

## Requirements
- PHP 7.4+ (PDO extension recommended)
- MySQL 5.7+ or MariaDB
- Local development environment (XAMPP / MAMP / LAMP / Docker)

---

## Local installation and execution
1. Clone the repository:
   ````bash
   git clone https://github.com/Rui-Silva-code/Final-Project-PHP.git

2. Create the configuration file:
   ````bash
   cp config.example.php config.php
   Edit config.php with your local database credentials.

3. Import the example database:
   ````bash
   mysql -u your_user -p database_name < sql/example_db.sql

4. Start the local server:
   ````bash
   php -S localhost:8000

5. Open in the browser:
   ````bash
   http://localhost:8000

---

## Project structure (summary)
   /css/                -> Stylesheets
   /imagens/            -> Images
   casopratico.sql      -> Database schema
   basedados.php        -> Database connection
   index.php            -> Entry point
   login.php            -> Login page
   processa_login.php   -> Login processing
   pagina_de_registro.html  -> Registry page
   processa_registro.php      -> Registry processing
   perfil_utilizador.php      -> User Profile
   perfil_admin.php      -> Admin Profile
   editar_*.php         -> Edit operations
   excluir_*.php        -> Delete operations

---

## Known limitations
- No automated tests implemented
- No password recovery or email functionality
- Some security aspects can be further improved

---

## Security and best practices
- Sensitive credentials are not committed to the repository
- Use of an example configuration file (config.example.php)
- Separation between code and sensitive data
- Prepared for future implementation of password_hash() and security improvements

---

## Next steps / future improvements
- Implement password_hash() and password_verify()
- Strengthen the use of prepared statements
- Move credentials to environment variables
- Add basic automated tests
- Improve code organization (simple MVC structure)

---

## Author
Rui Silva
GitHub: https://github.com/Rui-Silva-code
