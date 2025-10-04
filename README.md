# 🎬 Movie Manager

Movie Manager is a Laravel web application that allows users to browse movies, add them to favorites, and leave comments. The admin panel provides management of movies and users.

---

## 🚀 Installation & Setup

Follow these steps to get the project running locally:

1. **Clone the repository**
```bash
git clone <YOUR_REPOSITORY_URL>
cd <YOUR_PROJECT_FOLDER>
Install PHP dependencies

bash

composer install
Install Node.js dependencies and build frontend assets

bash

npm install
npm run dev
Configure environment variables
Copy the example .env file and update database credentials:

bash
cp .env.example .env
Then edit .env and set your database connection:



DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movie_manager
DB_USERNAME=root
DB_PASSWORD=
Generate application key

bash

php artisan key:generate
Run migrations and seed the database (if seeds are provided)

bash

php artisan migrate --seed
Start the local development server

bash

php artisan serve
