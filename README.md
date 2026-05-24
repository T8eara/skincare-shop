# Skincare Shop Website

A dynamic skincare ecommerce website built with Laravel, MySQL, Bootstrap, and Docker.

---

## Features

### Front Office

- Product listing
- Product detail page
- Search products
- Filter by category
- Filter by price
- Shopping cart
- Wishlist
- Checkout system
- Order history

### Admin Dashboard

- Manage products
- Manage categories
- Manage orders
- Dashboard statistics

### Authentication

- Login/Register system
- Protected admin routes

---

## Technologies Used

- Laravel 13
- PHP 8.3
- MySQL
- Bootstrap 5
- Docker

---

## Database Setup

Database name:

```bash
skincare_db
```

Import database or run migrations:

```bash
php artisan migrate
```

---

## Installation Steps

### 1. Clone Project

```bash
git clone https://github.com/T8eara/skincare-shop.git
```

### 2. Enter Project

```bash
cd skincare-shop
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Copy Environment File

```bash
cp .env.example .env
```

### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Run Migration

```bash
php artisan migrate
```

### 7. Storage Link

```bash
php artisan storage:link
```

### 8. Start Server

```bash
php artisan serve
```

---

## Docker

Start Docker containers:

```bash
docker compose up -d
```

---

## Admin Login

Register a user account first.

Then access:

```bash
/admin/dashboard
```

---

## Author

Student Final Project - Royal University of Phnom Penh
