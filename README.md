
# Play Spots - Project Setup Guide

This project is built with **Laravel** on the backend and **Blade** for the frontend. Below are the steps to set up the project locally, including details on how to implement OTP-based mobile authentication before booking.

## Steps to Set Up the Project

### 1. Clone the Repository

First, clone the repository from GitHub:

```bash
git clone https://github.com/naveedmojo99/play_spots.git
```

### 2. Install Dependencies

Navigate into the project folder and run:

```bash
composer update
```

This will install all necessary dependencies for the Laravel project.

### 3. Configure Environment Settings

Copy the `.env.example` file to create your `.env` file:

```bash
cp .env.example .env
```

Open the `.env` file and add your database connection details. For example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=playspots
DB_USERNAME=root
DB_PASSWORD=
```

Make sure to update other necessary credentials like mail settings, API keys, etc., based on your environment.

### 4. Generate Application Key

Generate a new application key by running:

```bash
php artisan key:generate
```

This will update the `APP_KEY` in your `.env` file.

### 5. Migrate and Seed the Database

Run the following command to set up your database schema and seed initial data:

```bash
php artisan migrate:fresh --seed
```

This will create all required tables and populate them with sample data.

### 6. Serve the Application

Start the Laravel development server:

```bash
php artisan serve
```

Your application will be available at `http://127.0.0.1:8000/`.

### 7. Access the Application

The main route of the application is the **Venues** page, which is accessible at:

```bash
http://127.0.0.1:8000/venues
```

### 8. OTP Authentication for Booking

Before a user can make a booking, an OTP (One Time Password) is generated and sent to the user's mobile number. The OTP is stored in the `otp` table in the database.

The user must enter the OTP, which is verified before proceeding with authentication.

- User's **mobile number** and **name** are stored in the `users` table after successful OTP verification.
- Once OTP is verified, the user is authenticated and can proceed with the booking process.

### Notes:

- The frontend is built using **Blade**, and values are passed into the Blade files via controllers.
- No APIs are used; all values are managed via traditional Laravel controller logic and Blade views.
