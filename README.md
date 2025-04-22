<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Spots - Project Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        h2 {
            color: #333;
        }
        section {
            padding: 20px;
            margin: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        code {
            background-color: #f5f5f5;
            padding: 5px;
            border-radius: 3px;
            font-family: Consolas, monospace;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        .steps li {
            font-weight: bold;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Play Spots - Project Setup Guide</h1>
</header>

<section>
    <h2>Steps to Set Up the Project</h2>

    <h3>1. Clone the Repository</h3>
    <p>First, clone the repository from GitHub:</p>
    <pre><code>git clone https://github.com/naveedmojo99/play_spots.git</code></pre>

    <h3>2. Install Dependencies</h3>
    <p>Navigate into the project folder and run:</p>
    <pre><code>composer update</code></pre>
    <p>This will install all necessary dependencies for the Laravel project.</p>

    <h3>3. Configure Environment Settings</h3>
    <p>Copy the <code>.env.example</code> file to create your <code>.env</code> file:</p>
    <pre><code>cp .env.example .env</code></pre>
    <p>Open the <code>.env</code> file and add your database connection details. For example:</p>
    <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=playspots
DB_USERNAME=root
DB_PASSWORD=</code></pre>
    <p>Make sure to update other necessary credentials like mail settings, API keys, etc., based on your environment.</p>

    <h3>4. Generate Application Key</h3>
    <p>Generate a new application key by running:</p>
    <pre><code>php artisan key:generate</code></pre>
    <p>This will update the <code>APP_KEY</code> in your <code>.env</code> file.</p>

    <h3>5. Migrate and Seed the Database</h3>
    <p>Run the following command to set up your database schema and seed initial data:</p>
    <pre><code>php artisan migrate:fresh --seed</code></pre>
    <p>This will create all required tables and populate them with sample data.</p>

    <h3>6. Serve the Application</h3>
    <p>Start the Laravel development server:</p>
    <pre><code>php artisan serve</code></pre>
    <p>Your application will be available at <code>http://127.0.0.1:8000/</code>.</p>

    <h3>7. Access the Application</h3>
    <p>The main route of the application is the <strong>Venues</strong> page, which is accessible at:</p>
    <pre><code>http://127.0.0.1:8000/venues</code></pre>

    <h3>8. OTP Authentication for Booking</h3>
    <p>Before a user can make a booking, an OTP (One Time Password) is generated and sent to the user's mobile number. The OTP is stored in the <code>otp</code> table in the database.</p>
    <p>The user must enter the OTP, which is verified before proceeding with authentication.</p>
    <ul>
        <li>User's <strong>mobile number</strong> and <strong>name</strong> are stored in the <code>users</code> table after successful OTP verification.</li>
        <li>Once OTP is verified, the user is authenticated and can proceed with the booking process.</li>
    </ul>

    <h3>Notes:</h3>
    <ul>
        <li>The frontend is built using <strong>Blade</strong>, and values are passed into the Blade files via controllers.</li>
        <li>No APIs are used; all values are managed via traditional Laravel controller logic and Blade views.</li>
    </ul>
</section>

<footer>
    <p>&copy; 2025 Play Spots. All Rights Reserved.</p>
</footer>

</body>
</html>
