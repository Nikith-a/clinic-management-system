# 🏥 Clinic Management System

A web-based Clinic Management System that digitalizes clinic operations — managing patients, doctors, and appointments through a secure role-based portal.

---

## 🔗 Live Preview

> Run locally using the steps below

---

## 👥 User Roles & Access

| Role         | Email                   | What They Can Do                                                            |
| ------------ | ----------------------- | --------------------------------------------------------------------------- |
| Admin        | admin@clinic.com        | Full access — manages doctors, schedules, patients, appointments, dashboard |
| Receptionist | receptionist@clinic.com | Books appointments, manages patients                                        |
| Patient      | Register normally       | Books appointments, views doctors by specialization                         |

---

## ✨ Features

- Role-based login — Admin, Receptionist, Patient
- Admin feeds doctor details and specializations
- Receptionist books appointments for walk-in patients
- Patients can browse doctors by specialization and book appointments online
- Anyone who books an appointment is automatically listed as a patient
- Dashboard with live stats — total patients, doctors, appointments, today's count
- Appointment status tracking — Pending, Completed, Cancelled
- Fully responsive UI

---

## 🛠️ Tech Stack

| Layer    | Technology                   |
| -------- | ---------------------------- |
| Frontend | Bootstrap 5, Bootstrap Icons |
| Backend  | Laravel 12, PHP 8.2          |
| Database | MySQL                        |
| Auth     | Laravel Breeze               |
| Server   | XAMPP (local)                |

---

## ⚙️ How to Run Locally

**Requirements:** PHP 8.2, Composer, MySQL, Node.js, XAMPP

```bash
# 1. Clone the repo
git clone https://github.com/Nikith-a/clinic-management-system.git
cd clinic-management-system

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database in .env
DB_DATABASE=clinic_db
DB_USERNAME=root
DB_PASSWORD=

# 5. Create database named clinic_db in phpMyAdmin

# 6. Run migrations and seed default users
php artisan migrate
php artisan db:seed

# 7. Start the server
php artisan serve
```

Visit `http://localhost:8000`

---

## 🔐 Default Login Credentials

| Role         | Email                   | Password        |
| ------------ | ----------------------- | --------------- |
| Admin        | admin@clinic.com        | admin123        |
| Receptionist | receptionist@clinic.com | receptionist123 |
| Patient      | Register a new account  | your choice     |

---

## 📁 Key Project Structure

```
├── app/
│   ├── Http/Controllers/     — PatientController, DoctorController, AppointmentController
│   ├── Http/Middleware/      — RoleMiddleware
│   └── Models/               — Patient, Doctor, Appointment, User
├── database/
│   ├── migrations/           — table definitions
│   └── seeders/              — default admin & receptionist accounts
├── resources/views/
│   ├── layouts/              — shared navbar layout
│   ├── patients/             — patient CRUD views
│   ├── doctors/              — doctor views (admin manages, others view only)
│   └── appointments/         — appointment CRUD views
└── routes/web.php            — all application routes
```

---
