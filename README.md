# 🌾 SmartAgro — Intelligent Crop & Pesticide Management Platform

<p align="center">
  <strong>A modern web application for smart agriculture — empowering farmers with crop protection knowledge, pesticide identification, and agricultural resources.</strong>
</p>

<p align="center">
  <a href="https://smartagro-production.up.railway.app/">🌐 <strong>Live Demo: smartagro-production.up.railway.app</strong></a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13" />
  <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.4" />
  <img src="https://img.shields.io/badge/MongoDB-Atlas-47A248?style=for-the-badge&logo=mongodb&logoColor=white" alt="MongoDB" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-4.0-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS" />
  <img src="https://img.shields.io/badge/Vite-8.0-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite" />
  <img src="https://img.shields.io/website?url=https%3A%2F%2Fsmaragro-production.up.railway.app&style=for-the-badge&label=Status" alt="Website Status" />
</p>

---

## 📖 Table of Contents

- [About the Project](#-about-the-project)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Prerequisites](#-prerequisites)
- [Installation & Setup](#-installation--setup)
- [Environment Variables](#-environment-variables)
- [Running Locally](#-running-locally)
- [Deployment](#-deployment)
  - [Railway](#railway)
  - [Render](#render)
- [Database Schema](#-database-schema)
- [API Routes](#-api-routes)
- [Email Notifications](#-email-notifications)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🌱 About the Project

**SmartAgro** is a comprehensive agricultural management platform built with Laravel 13 and MongoDB. It provides farmers and agricultural enthusiasts with essential tools for crop protection, pesticide identification, and access to agricultural resources.

The platform focuses on four major crop categories — **Rice**, **Wheat**, **Corn**, and **Vegetables** — offering detailed information about pesticides, detection methods, organic alternatives, and best practices for sustainable farming.

---

## ✨ Features

### 🔐 Authentication System
- User registration with secure password hashing (bcrypt)
- Login with email & password
- "Remember Me" functionality
- Session-based authentication with CSRF protection
- Guest & authenticated route middleware

### 🌿 Crop Protection Guides
Detailed crop-specific information for:
| Crop | Pesticides Covered | Methods |
|------|-------------------|---------|
| 🌾 **Rice** | Chlorpyrifos, Carbofuran, Malathion | Detection Methods (HPLC, GC-MS, Biosensors) |
| 🌾 **Wheat** | Glyphosate, 2,4-D, Dicamba | Safe Alternatives (IPM, Biological Controls) |
| 🌽 **Corn** | Atrazine, Metolachlor, Acetochlor | Residue Analysis (QuEChERS, LC-MS/MS) |
| 🥬 **Vegetables** | Imidacloprid, Cypermethrin, Mancozeb | Organic Solutions (Neem Oil, Bt, Companion Planting) |

### 🔬 Pesticide Identification System
- Submit pest problem details with crop type and symptoms
- Upload up to 5 images (JPEG, PNG, GIF, WebP — max 5MB each)
- Form data stored in MongoDB for tracking
- Automatic email notification to the admin team

### 📬 Contact System
- Contact form with name, email, phone, subject, and message
- Data persisted in MongoDB
- Email notification sent to admin on submission

### 📰 Newsletter Subscription
- Email-based newsletter signup
- Subscriber data stored in MongoDB

### 📚 Agricultural Resources
- Curated collection of farming resources and guides
- Educational content on sustainable agriculture

### 🛠 Services
- Overview of agricultural services offered by the platform

---

## 🧰 Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend Framework** | Laravel 13.x |
| **Language** | PHP 8.4 |
| **Database** | MongoDB Atlas (via `mongodb/laravel-mongodb` v5.7) |
| **Frontend Build** | Vite 8.0 |
| **CSS Framework** | Tailwind CSS 4.0 |
| **Templating** | Blade Templates |
| **Email** | SMTP (Gmail) via Laravel Mail |
| **Authentication** | Laravel built-in Auth (session-based) |
| **Hosting** | Render |

---

## 📁 Project Structure

```
SmartAgro/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php          # Login, Register, Logout
│   │       ├── ContactController.php       # Contact form handling
│   │       ├── CropController.php          # Crop protection data
│   │       ├── HomeController.php          # Landing page
│   │       ├── IdentificationController.php # Pesticide ID form
│   │       ├── NewsletterController.php    # Newsletter subscription
│   │       ├── ResourceController.php      # Agricultural resources
│   │       └── ServiceController.php       # Services page
│   ├── Mail/
│   │   ├── ContactFormMail.php             # Contact email template
│   │   └── IdentificationFormMail.php      # Pest ID email template
│   ├── Models/
│   │   ├── Contact.php                     # MongoDB: contacts collection
│   │   ├── Newsletter.php                  # MongoDB: newsletters collection
│   │   ├── PesticideRequest.php            # MongoDB: pesticide_requests collection
│   │   └── User.php                        # MongoDB: users collection
│   └── Providers/
│       └── AppServiceProvider.php          # HTTPS forcing in production
├── bootstrap/
│   └── app.php                             # App bootstrap & proxy trust config
├── config/
│   └── database.php                        # MongoDB connection config
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php             # Login page
│       │   └── register.blade.php          # Registration page
│       ├── emails/
│       │   ├── contact.blade.php           # Contact email template
│       │   └── identification.blade.php    # Pest ID email template
│       ├── layouts/
│       │   └── app.blade.php               # Main layout template
│       ├── contact.blade.php               # Contact page
│       ├── crop.blade.php                  # Crop detail page
│       ├── home.blade.php                  # Home/landing page
│       ├── identification.blade.php        # Pest identification form
│       ├── resources.blade.php             # Resources page
│       ├── services.blade.php              # Services page
│       └── welcome.blade.php               # Welcome page
├── routes/
│   └── web.php                             # All web routes
├── composer.json                           # PHP dependencies
├── package.json                            # Node.js dependencies
├── vite.config.js                          # Vite build configuration
└── .env.example                            # Environment template
```

---

## 📋 Prerequisites

Before setting up the project, ensure you have the following installed:

- **PHP** ≥ 8.4
- **Composer** ≥ 2.x
- **Node.js** ≥ 20.x & **npm**
- **MongoDB PHP Extension** (`ext-mongodb`)
- **MongoDB Atlas** account (or local MongoDB instance)
- **Git**

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Divyanshu-shah/SmartAgro.git
cd SmartAgro
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your configuration (see [Environment Variables](#-environment-variables) below).

### 5. Build Frontend Assets

```bash
# Development (with hot reload)
npm run dev

# Production
npm run build
```

### 6. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Quick Setup (All-in-One)

```bash
composer setup
```

This runs `composer install`, copies `.env`, generates app key, runs migrations, installs npm packages, and builds assets.

---

## 🔑 Environment Variables

Create a `.env` file in the project root with the following variables:

```env
# Application
APP_NAME=SmartAgro
APP_ENV=local
APP_KEY=                          # Generated by: php artisan key:generate
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database (MongoDB Atlas)
DB_CONNECTION=mongodb
MONGODB_URI=mongodb+srv://<username>:<password>@<cluster>.mongodb.net/?appName=<appName>
DB_DATABASE=SmartAgro

# Session & Cache
SESSION_DRIVER=file
SESSION_LIFETIME=120
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Mail (Gmail SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD="your-app-password"       # Use Gmail App Password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME=SmartAgro

# Vite
VITE_APP_NAME=SmartAgro
```

> **Note:** For Gmail, you need to generate an [App Password](https://myaccount.google.com/apppasswords) (requires 2-Step Verification enabled).

---

## 💻 Running Locally

### Development Mode (Recommended)

Run the full dev stack with hot reloading:

```bash
composer dev
```

This concurrently starts:
- 🌐 Laravel server (`php artisan serve`)
- 📋 Queue listener (`php artisan queue:listen`)
- 📜 Log viewer (`php artisan pail`)
- ⚡ Vite dev server (`npm run dev`)

### Individual Commands

```bash
# Start only the Laravel server
php artisan serve

# Start only the Vite dev server
npm run dev

# Run tests
composer test
```

---

## 🚀 Deployment

This project is configured for a Docker-based Laravel deployment on Render.

### Render (Docker)

1. Push the project to GitHub.
2. In [Render](https://render.com), create a **Web Service** and connect this repository.
3. Set the runtime to **Docker**.
4. Render will use the included [Dockerfile](Dockerfile).
5. Add the production environment variables below.
6. Deploy and copy the live Render URL.

```env
APP_NAME=SmartAgro
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-render-app.onrender.com
DB_CONNECTION=mongodb
MONGODB_URI=mongodb+srv://...
DB_DATABASE=SmartAgro
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
MAIL_MAILER=resend
MAIL_FROM_ADDRESS=onboarding@resend.dev
MAIL_FROM_NAME=SmartAgro
RESEND_API_KEY=your_resend_api_key
VITE_APP_NAME=SmartAgro
```

> This is a Laravel app deployed as a Docker container on Render.

---

## 🗃 Database Schema

All data is stored in **MongoDB Atlas** (NoSQL). Collections:

### `users`
| Field | Type | Description |
|-------|------|-------------|
| `_id` | ObjectId | Auto-generated |
| `name` | String | Full name |
| `email` | String | Unique email |
| `password` | String | Bcrypt hashed |
| `remember_token` | String | Session token |
| `created_at` | DateTime | Timestamp |
| `updated_at` | DateTime | Timestamp |

### `contacts`
| Field | Type | Description |
|-------|------|-------------|
| `_id` | ObjectId | Auto-generated |
| `name` | String | Sender name |
| `email` | String | Sender email |
| `phone` | String | Optional phone |
| `subject` | String | Message subject |
| `message` | String | Message body |
| `created_at` | DateTime | Timestamp |

### `pesticide_requests`
| Field | Type | Description |
|-------|------|-------------|
| `_id` | ObjectId | Auto-generated |
| `name` | String | Farmer name |
| `email` | String | Farmer email |
| `phone` | String | Optional phone |
| `farm_size` | Number | Farm size (acres) |
| `crop_type` | String | Type of crop |
| `pest_problem` | String | Description of pest |
| `symptoms` | String | Observed symptoms |
| `pesticide_used` | String | Previously used pesticide |
| `images` | Array | Uploaded image filenames |
| `created_at` | DateTime | Timestamp |

### `newsletters`
| Field | Type | Description |
|-------|------|-------------|
| `_id` | ObjectId | Auto-generated |
| `email` | String | Subscriber email |
| `created_at` | DateTime | Timestamp |

---

## 🛣 API Routes

### Public Routes
| Method | URI | Controller | Description |
|--------|-----|------------|-------------|
| `GET` | `/` | `HomeController@index` | Landing page |
| `GET` | `/contact` | `ContactController@index` | Contact page |
| `POST` | `/contact` | `ContactController@store` | Submit contact form |

### Guest-Only Routes (redirects if logged in)
| Method | URI | Controller | Description |
|--------|-----|------------|-------------|
| `GET` | `/login` | `AuthController@showLogin` | Login page |
| `POST` | `/login` | `AuthController@login` | Authenticate user |
| `GET` | `/register` | `AuthController@showRegister` | Register page |
| `POST` | `/register` | `AuthController@register` | Create account |

### Protected Routes (requires authentication)
| Method | URI | Controller | Description |
|--------|-----|------------|-------------|
| `POST` | `/logout` | `AuthController@logout` | Logout user |
| `GET` | `/services` | `ServiceController@index` | Services page |
| `GET` | `/identification` | `IdentificationController@index` | Pest ID form |
| `POST` | `/identification` | `IdentificationController@store` | Submit pest ID |
| `GET` | `/resources` | `ResourceController@index` | Resources page |
| `GET` | `/crops/{slug}` | `CropController@show` | Crop details (rice/wheat/corn/vege) |
| `POST` | `/newsletter` | `NewsletterController@store` | Subscribe to newsletter |

---

## 📧 Email Notifications

The app sends automated email notifications via **Gmail SMTP**:

1. **Contact Form Submission** (`ContactFormMail`)
   - Triggered when a visitor submits the contact form
   - Contains: name, email, phone, subject, message

2. **Pesticide Identification Request** (`IdentificationFormMail`)
   - Triggered when a user submits the pest identification form
   - Contains: farmer details, crop type, symptoms, uploaded images as attachments

---

## 🤝 Contributing

Contributions are welcome! Here's how:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

<p align="center">
  Made with ❤️ by <a href="https://github.com/Divyanshu-shah">Divyanshu Shah</a>
</p>
