# TechMart

TechMart is an e-commerce web application designed for buying and selling technology products. Built with PHP and MySQL, it provides a user-friendly interface for customers and an admin panel for store management.

## Features

- **Product Catalog:** Browse products by categories, view details, and search.
- **User Authentication:** Register, log in, and manage user profiles.
- **Shopping Cart:** Add, update, or remove products from the cart.
- **Order Management:** Place orders, view order history, and track status.
- **Admin Dashboard:** Manage products, categories, users, and orders.
- **Responsive Design:** Works on desktops, tablets, and mobile devices.

## Technologies Used

- **Backend:** PHP (XAMPP stack)
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
- **Other:** jQuery, FontAwesome

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/techmart.git
    ```
2. **Copy to XAMPP htdocs:**
    Place the project folder in `C:/xampp/htdocs/`.

3. **Import the database:**
    - Open phpMyAdmin.
    - Create a new database (e.g., `techmart`).
    - Import the provided `.sql` file from the project.

4. **Configure database connection:**
    - Edit `config/db.php` and update database credentials if needed.

5. **Start XAMPP:**
    - Run Apache and MySQL.

6. **Access the application:**
    - Visit `http://localhost/techmart/` in your browser.

## Folder Structure

```
techmart/
├── admin/           # Admin panel files
├── assets/          # CSS, JS, images
├── config/          # Configuration files
├── includes/        # Reusable PHP components
├── pages/           # Main site pages
├── index.php        # Entry point
└── README.md
```

