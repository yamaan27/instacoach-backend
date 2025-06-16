# 🏋️ Instacoach PHP Backend

Instacoach is a backend system for a sports coaching marketplace built with PHP and MySQL. It provides RESTful APIs for managing user accounts, coach availability, session bookings, and session reviews.

This backend is designed using pure PHP (no frameworks), making it perfect for PHP learners and developers who want to understand the internals of building scalable backend systems.

---

## 📌 Features

- 👥 **User Authentication** (Signup/Login with role-based access: `coach` or `client`)
- 📆 **Coach Availability Management**
- 📅 **Session Booking System** (Client can book available slots with coaches)
- ⭐ **Session Review System** (Client can review sessions)
- 🛡️ **Validation & Error Handling**
- 📁 Organized code structure with separate controllers, models, and routing

---

## 🛠️ Tech Stack

- **Backend Language**: PHP 8+
- **Database**: MySQL
- **Web Server**: PHP's built-in server (`php -S`)
- **API Format**: RESTful + JSON

---

## 📁 Folder Structure

instacoach/
├── config/
│ └── database.php # Database connection setup
│
├── controllers/
│ ├── AuthController.php # Register/Login logic
│ ├── AvailabilityController.php
│ ├── SessionController.php
│ └── ReviewController.php
│
├── models/
│ ├── User.php
│ ├── Availability.php
│ ├── Session.php
│ └── Review.php
│
├── public/
│ └── index.php # Main entry point (router)
│
├── routes/
│ └── api.php # API routes
│
└── sql/
└── schema.sql # SQL dump to create the DB

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/instacoach.git
cd instacoach
2. Import the Database
Open your MySQL client (phpMyAdmin or CLI)

Create a new database: instacoach

Import the SQL schema:

mysql -u root -p instacoach < sql/schema.sql
Replace root with your MySQL username if different.

3. Configure the Database
Edit config/database.php if needed:

$host = 'localhost';
$db   = 'instacoach';
$user = 'root';
$pass = '';
4. Start the PHP Server

php -S localhost:8000 -t public
5. Test the APIs
Use Postman, curl, or any API client to test endpoints.

🧪 API Endpoints
🔐 Authentication
✅ Register
POST /register

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "123456",
  "role": "coach" // or "client"
}
🔑 Login
POST /login

{
  "email": "john@example.com",
  "password": "123456"
}
📆 Availability
➕ Add Availability
POST /availability/add

{
  "coach_id": 1,
  "date": "2025-06-18",
  "time": "10:00:00"
}
🔍 Get Availability
GET /availability/{coach_id}/{YYYY-MM-DD}

📅 Sessions
📌 Book a Session
POST /session/book

{
  "coach_id": 1,
  "client_id": 2,
  "date": "2025-06-20",
  "time": "14:00:00"
}
📋 List Sessions for User
GET /session/{user_id}/{role}

role = coach or client

⭐ Reviews
📝 Submit Review
POST /review/submit

{
  "session_id": 1,
  "reviewer_id": 2,
  "rating": 5,
  "comment": "Amazing session!"
}
🔍 Get Reviews for Coach
GET /review/coach/{coach_id}

✅ Todo / Improvements
 Token-based authentication (JWT)

 Admin panel

 Email notifications

 Session approval system

🤝 Contributing
Contributions are welcome! If you'd like to add features or improve code, feel free to fork and make a pull request.

