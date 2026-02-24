# DevPortfolio — Website Portfolio Interaktif Modern

Website portfolio interaktif berbasis PHP 8+ dengan arsitektur MVC, MySQL, dan desain dark glassmorphism yang modern dan responsif.

![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)

## ✨ Fitur

- **Landing Page** — Hero section dengan typing effect & animated particles
- **Tentang Saya** — Skill bars interaktif, tech stack icons, statistik
- **Portfolio** — Filter kategori via AJAX, modal detail popup
- **Blog** — CRUD, pagination, SEO-friendly URL (slug)
- **Contact Form** — Validasi frontend & backend, anti-spam (honeypot + rate limiting)
- **Admin Panel** — Login aman, dashboard statistik, CRUD project & blog, upload gambar

## 🔐 Keamanan

- PDO prepared statements (anti SQL injection)
- Password hashing (`password_hash` / `password_verify`)
- CSRF token protection
- XSS prevention (htmlspecialchars)
- File upload validation (MIME type, size)
- Session regeneration on login

## 🚀 Instalasi

### Prasyarat
- XAMPP (PHP 8+, Apache, MySQL)
- Web browser modern

### Langkah

1. **Clone/copy** folder ini ke `htdocs`:
   ```
   C:\xampp\htdocs\belajarweb.baru\
   ```

2. **Start XAMPP** — nyalakan Apache dan MySQL

3. **Import Database** — buka phpMyAdmin (`http://localhost/phpmyadmin`):
   - Import `database/schema.sql` (buat database & tabel)
   - Import `database/seed.sql` (data dummy)

4. **Buka website**:
   - Frontend: `http://localhost/belajarweb.baru/public/`
   - Admin: `http://localhost/belajarweb.baru/public/admin/login`

5. **Login Admin**:
   - Username: `admin`
   - Password: `admin123`

## 📂 Struktur

```
belajarweb.baru/
├── app/
│   ├── controllers/          # Controller classes
│   │   ├── Admin/            # Admin CRUD controllers
│   │   ├── HomeController.php
│   │   ├── ProjectController.php
│   │   ├── BlogController.php
│   │   ├── ContactController.php
│   │   └── AuthController.php
│   ├── core/                 # Base MVC classes
│   │   ├── Router.php
│   │   ├── Controller.php
│   │   └── Model.php
│   ├── models/               # Data models (PDO)
│   └── views/                # PHP view templates
│       ├── layouts/
│       ├── partials/
│       ├── home/
│       ├── blog/
│       └── admin/
├── config/
│   ├── app.php               # App configuration
│   └── database.php          # PDO connection
├── database/
│   ├── schema.sql            # DB schema
│   └── seed.sql              # Dummy data
├── public/
│   ├── assets/
│   │   ├── css/style.css     # Dark glassmorphism theme
│   │   ├── js/               # Vanilla JS (typing, particles, AJAX)
│   │   └── images/           # Upload directory
│   ├── index.php             # Entry point
│   └── .htaccess             # URL rewriting
├── routes/web.php            # Route definitions
├── .htaccess
└── README.md
```

## 🏗️ Arsitektur

```
Request → .htaccess → public/index.php → Router → Controller → Model (PDO) → View
```

- **Router**: Regex-based URL matching dengan parameter dinamis
- **Controller**: Base class dengan view rendering, JSON response, CSRF, file upload
- **Model**: Base class dengan CRUD, pagination, slug generator
- **View**: PHP templates dengan layout system (ob_start/ob_get_clean)

## ⚙️ Konfigurasi

Edit `config/app.php` untuk mengubah:
- Koneksi database
- SMTP email settings
- Upload file settings
- Base URL

## 📝 License

MIT License — Bebas digunakan dan dimodifikasi.
