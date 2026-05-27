# Skincare Shop Website

A Laravel + MySQL skincare ecommerce website with Front Office and Admin Dashboard.

---

# Technologies Used

- Laravel 13
- PHP 8.3
- MySQL
- Bootstrap 5
- HTML/CSS
- Docker

---

# Website Links

## Front Website

http://127.0.0.1:8000/

## Login

http://127.0.0.1:8000/login

## Register

http://127.0.0.1:8000/register

## Admin Dashboard

http://127.0.0.1:8000/admin/dashboard

---

# Admin Account

Email:
[slenarrt.admin1223@group3.com]

Password:
Slenarrt520

---

# User Features

- View skincare products
- Search products
- Filter by category
- Filter by price
- Product details page
- Add to cart
- Wishlist
- Checkout

---

# Admin Features

- Admin dashboard
- Add products
- Edit products
- Delete products
- Manage categories
- Manage orders

---

# Installation

## Clone Project

```bash
git clone https://github.com/T8eara/skincare-shop.git
```

---

# Enter Project

```bash
cd skincare-shop
```

## Install Dependencies

```bash
composer install
npm install
```

---

## Environment Setup

Copy .env.example

```bash
cp .env.example .env
```

Generate app key

```bash
php artisan key:generate
```

---

# Database Setup

Create database:

```text
skincare_db
```

Update .env:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=skincare_db
DB_USERNAME=root
DB_PASSWORD=root123
```

# Run migration:

```bash
php artisan migrate
```

---

# Storage Link

```bash
php artisan storage:link
```

## Docker

Start Docker containers:

```bash
docker compose up -d
```

# Start Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

# Notes!!!

- Register creates a normal user account.
- Use admin account above to access admin dashboard.
- Admin can manage products, categories, and orders.

---

# Project Preview

Frontend Ecommerce Website + Admin Dashboard for skincare products.
