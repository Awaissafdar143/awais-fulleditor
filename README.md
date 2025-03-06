# Larpack - Laravel Admin Panel Package

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-^8.1-blue?style=for-the-badge&logo=php)
![License](https://img.shields.io/github/license/your-username/larpack?style=for-the-badge)

## 🚀 Introduction

**Larpack** is a Laravel package that provides a full-featured admin panel, authentication system, and middleware support for managing users, permissions, and system settings efficiently.

## 🛠️ Features

- 🏗️ **Pre-built Admin Panel** with authentication and role-based access control.
- 🗂️ **Middleware Support** for authentication, maintenance mode, and redirection.
- 📜 **Route Management** for web, admin, and superadmin sections.
- 🛠️ **Configurable Settings** with an easy-to-merge configuration file.
- 📑 **View & Migration Loading** for seamless integration.

---

## 📥 Installation

You can install **Larpack** via Composer:

```sh
composer require awaistech/larpack
```

Once installed, publish the package assets:

```sh
php artisan vendor:publish --tag=larpack-config
php artisan vendor:publish --tag=larpack-views
php artisan vendor:publish --tag=larpack-migrations
```

Run the migrations:

```sh
php artisan migrate
```

---

## ⚙️ Configuration

### **1️⃣ Register the Service Provider (If Not Auto-Discovered)**  
For Laravel versions below 5.5, add the service provider manually in **config/app.php**:

```php
'providers' => [
    Awaistech\Larpack\PackageServiceProvider::class,
],
```

### **2️⃣ Middleware Setup**  
Larpack provides custom middleware for authentication and role management. You can register them in **app/Http/Kernel.php**:

```php
protected $routeMiddleware = [
    'authchheck' => \Awaistech\Larpack\Middleware\AuthChheck::class,
    'check.maintenance' => \Awaistech\Larpack\Middleware\CheckMaintenanceMode::class,
    'redirect.if.login' => \Awaistech\Larpack\Middleware\RedirectIfLogin::class,
    'super.admin' => \Awaistech\Larpack\Middleware\SuperAdmin::class,
];
```

---

## 🛠 Usage

### **1️⃣ Routing**
The package registers the following routes automatically:

- `/admin` → Admin Panel
- `/superadmin` → Super Admin Dashboard
- `/login` → Authentication Page

To view all registered routes, run:

```sh
php artisan route:list
```

### **2️⃣ Blade Views**
Views are loaded from the package. You can override them by copying files to:

```sh
resources/views/vendor/larpack/
```

### **3️⃣ Configurations**
Modify the configuration file **config/larpack.php** as needed.

---

## 📦 Publishing Resources

To publish specific resources:

```sh
php artisan vendor:publish --tag=larpack-config
php artisan vendor:publish --tag=larpack-views
php artisan vendor:publish --tag=larpack-migrations
```

To publish everything:

```sh
php artisan vendor:publish --provider="Awaistech\Larpack\PackageServiceProvider"
```

---

## 🛑 Uninstalling

If you need to remove **Larpack**, follow these steps:

```sh
composer remove awaistech/larpack
```

Delete any published configuration and migration files manually:

```sh
rm -rf config/larpack.php
rm -rf database/migrations/*_create_larpack_tables.php
rm -rf resources/views/vendor/larpack
```

---

## 📜 License

This package is open-sourced software licensed under the **MIT License**.

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. **Fork** this repository.
2. **Clone** your fork:  
   ```sh
   git clone https://github.com/your-username/larpack.git
   ```
3. **Create a new branch** for your feature:  
   ```sh
   git checkout -b feature-name
   ```
4. **Commit changes** and push:  
   ```sh
   git add .
   git commit -m "Added new feature"
   git push origin feature-name
   ```
5. **Create a Pull Request**.

---

## 📞 Support

If you encounter any issues, please open an issue on **GitHub** or contact us:

- 📧 Email: [support@yourdomain.com](mailto:support@yourdomain.com)
- 📝 GitHub Issues: [Report an issue](https://github.com/your-username/larpack/issues)

---

🚀 **Enjoy using Larpack for your Laravel applications!** 🚀
