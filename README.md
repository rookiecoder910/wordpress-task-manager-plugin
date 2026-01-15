# 🧩 WordPress Task Manager Plugin

A lightweight WordPress plugin built to **learn and understand WordPress plugin development**, with a focus on hooks, database handling, security, and admin dashboard customization.

---

## 📌 Purpose

This project was created as a **hands-on learning exercise** to explore core WordPress plugin concepts, including:

* WordPress plugin structure and lifecycle
* Using **hooks** and **activation hooks**
* Secure interaction with the WordPress database
* Building custom **admin dashboard pages**

The primary goal is **clarity, correctness, and best practices**, rather than production-level complexity.

---

## ✨ Features

* Custom **Admin Menu Page** in the WordPress dashboard
* Add and delete tasks using a simple, clean UI
* Secure form handling using **nonces** and input sanitization
* Custom MySQL table creation using `dbDelta`
* Clean and minimal plugin architecture following WordPress standards

---

## 🛠️ Tech Stack

* **PHP**
* **WordPress**
* **MySQL**
* WordPress Hooks & `$wpdb`

---

## 📂 Folder Structure

```text
simple-task-manager/
│── simple-task-manager.php
│── README.md
```

---

## 🚀 How to Run This Plugin

### Step 1: Set Up WordPress Locally

1. Install **XAMPP / WAMP / LocalWP**
2. Start **Apache** and **MySQL**
3. Download WordPress from [https://wordpress.org](https://wordpress.org)
4. Extract WordPress into:

   ```
   htdocs/wordpress
   ```
5. Create a database named `wordpress` using phpMyAdmin
6. Complete the WordPress installation via:

   ```
   http://localhost/wordpress
   ```

---

### Step 2: Install the Plugin

1. Navigate to:

   ```
   wp-content/plugins/
   ```
2. Create a folder named:

   ```
   simple-task-manager
   ```
3. Copy `simple-task-manager.php` into this folder

---

### Step 3: Activate the Plugin

1. Open WordPress Admin:

   ```
   http://localhost/wordpress/wp-admin
   ```
2. Go to **Plugins → Installed Plugins**
3. Activate **WordPress Task Manager Plugin**

---

### Step 4: Use the Plugin

1. After activation, find **Task Manager** in the admin sidebar
2. Add new tasks using the input field
3. Delete tasks using the delete button
4. All tasks are stored securely in the WordPress database

---

## 🔧 How It Works (Behind the Scenes)

* Creates a custom database table on plugin activation
* Uses WordPress hooks to register admin menus
* Handles form submission securely using **nonces**
* Performs CRUD operations using `$wpdb`
* Follows WordPress coding standards and best practices

---

## 📷 Screenshots

<img width="400" height="400" alt="Task Manager Admin Page" src="https://github.com/user-attachments/assets/bc138d86-73db-4629-9202-c2679027ff6b" />

---

## 🎯 Learning Outcomes

* Understood the **WordPress plugin lifecycle**
* Learned how **activation hooks** work
* Practiced **secure CRUD operations**
* Built admin pages using WordPress APIs
* Gained hands-on experience with **PHP in WordPress**

---

## 📎 Note

This plugin is intended **for learning and practice purposes only** and is not designed for production use.

---

## 👤 Author

**Manas Kumar**
GitHub: [https://github.com/rookiecoder910](https://github.com/rookiecoder910)

---

## ⭐ Why This Project Exists

This repository demonstrates:

* Intentional learning of **WordPress development**
* Understanding of **WordPress internals**
* Clean, readable, and well-structured **PHP code**
