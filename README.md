# 🎬 Movie Manager

Movie Manager is a Laravel web application that allows users to browse movies, add them to favorites, and leave comments. The admin panel provides management of movies and users.

---

## 🚀 Installation & Setup

Follow these steps to get the project running locally:

 # 1. Clone repository
```laravel
git clone <YOUR_REPOSITORY_URL>
cd <YOUR_PROJECT_FOLDER>
```
 # 2. Install dependecies
```laravel
composer install
```
 # 3. Install Node.js dependencies and build frontend assets
```laravel
npm install
npm run dev
```
 # 4. Configure environment variables
Copy the example .env file and update database credentials:
```laravel
cp .env.example .env
```
# 5. Generate application key
```laravel
php artisan key:generate
```
#  6. Run migrations and seeders
```laravel
php artisan migrate --seed
```
# 7. Start the local development server
```laravel
php artisan serve
```
