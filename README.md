# 🎬 Movie Manager

Movie Manager is a Laravel web application that allows users to browse movies, add them to favorites, and leave comments. The admin panel provides management of movies and users.

---

## 🚀 Installation & Setup

Follow these steps to get the project running locally:

1. **Clone the repository**
```bash
git clone <YOUR_REPOSITORY_URL>
cd <YOUR_PROJECT_FOLDER>

2. **Install PHP dependencies**
```bash
composer install
3. **Install Node.js dependencies and build frontend assets**
```bash
npm install
npm run dev

4. **Configure environment variables**
Copy the example .env file and update database credentials:
```bash
cp .env.example .env

5. **Generate application key**
```bash
php artisan key:generate

6. Start the local development server
```bash
php artisan serve
Open your browser and go to http://127.0.0.1:8000
