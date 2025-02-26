# Wardrobe Management System

A simple wardrobe management system built using **Vue 3** for the frontend and **Laravel 11** for the backend.

## Features
- Add, edit, and delete clothing items.
- Categorize clothing (Tops, Bottoms, Shoes, Accessories).
- Filter and search for clothing items.
- Responsive and user-friendly UI.

## Installation and Setup

### Prerequisites
Ensure you have the following installed:
- **Node.js** (Recommended: latest LTS)
- **pnpm** (Package manager for frontend dependencies)
- **PHP 8.2+**
- **Composer**
- **MySQL** or any supported database

### 1. Clone the Repository
```sh
git clone https://github.com/mithibe/nguo.git
cd nguo
```

## Backend (Laravel 11)
### 2. Set Up Laravel
```sh
cd nguo
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Configure Database
Edit the `.env` file and set up your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wardrobe_db
DB_USERNAME=root
DB_PASSWORD=your_password
```
Then, run migrations:
```sh
php artisan migrate
```

### 4. Start Laravel Server
```sh
php artisan serve
```
By default, the API will be available at `http://127.0.0.1:8000`.

## Frontend (Vue 3)
### 5. Set Up Vue 3
```sh
cd ../Nguo-frontend
pnpm install
```

### 6. Configure API Base URL
Ensure the correct API URL is set in your Vue app (e.g., `http://127.0.0.1:8000/api`).

### 7. Start the Frontend
```sh
pnpm run dev
```
This will start the development server, usually at `http://localhost:5173`.

## Usage
1. Open the frontend (`http://localhost:5173`) in your browser.
2. Add, edit, or delete clothing items.

## API Endpoints
| Method | Endpoint         | Description          |
|--------|----------------|----------------------|
| GET    | `/api/nguos`    | Fetch all clothing items |
| POST   | `/api/nguos`    | Add a new clothing item |
| PUT    | `/api/nguos/{id}` | Update an item |
| DELETE | `/api/nguos/{id}` | Delete an item |

## License
This project is open-source and free to use.

