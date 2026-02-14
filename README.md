# Sales Performance Evaluation System (SPES) 📊

A centralized, web-based database application developed for "Life Backup" insurance company. This system is designed to evaluate sales force performance through real-time dashboards and seamless data entry points.

## 🌟 Key Features
* **Seamless AJAX Login:** A secure login system that redirects users to their respective dashboards without full page reloads.
* **Real-time Performance Dashboards:** Dynamic visualizations for Branch Managers, Supervisors, and Team Leaders to track recruitment and sales targets.
* **Centralized Data Entry:** A dedicated module for cashiers to input premium collection and invoice details.
* **Automated Performance Calculation:** Metrics calculated based on the percentage of monthly targets completed by individual agents and teams.

## 🛠️ Tech Stack
* **Core Logic:** PHP & AJAX (for real-time updates without page refreshing).
* **Database:** MySQL (Relational schema for sales agents, team leaders, and invoices).
* **Frontend:** HTML5, CSS3, and JavaScript.

## 📸 Interface Preview
### Secure Login Portal
![Login Portal](screenshots/login_portal.png)
*Modern, clean login interface for all sales force members.*

### Manager Dashboard
![Manager Dashboard](screenshots/manager_dashboard.png)
*Real-time tracking of recruitment targets and premium collection.*

## 🚀 Setup & Installation
1.  Import the `create logins.sql` script into your MySQL database.
2.  Deploy the PHP files (`login.php`, `page.php`) to your local WAMP/XAMPP server.
3.  Access the portal via `localhost/spesv3/page.php#login`.

---
*Developed for the Web Technology and Applications module as part of the "100 Startups Program"*
