# Life Backup - Sales Performance Evaluation System (SPES)

A centralized, web-based database application developed for "Life Backup" insurance company to monitor and evaluate sales force performance in real-time. This system utilizes **PHP**, **AJAX**, and **MySQL** to provide a seamless, non-refreshing user experience across multiple administrative roles.

## Key Features
* **Role-Based Access Control (RBAC):** Specialized login portals for Branch Managers, Supervisors, Team Leaders, Sales Agents, and Cashiers, each with unique access permissions.
* **AJAX-Powered Authentication:** A secure login system that authenticates and redirects users to their specific dashboards without full page reloads.
* **Dynamic Performance Tracking:** Real-time dashboards featuring progress bars to track recruitment targets, new policy issuances, and premium collection metrics.
* **Automated Data Entry Point:** A dedicated interface for Cashiers to input sales invoices and premium collections directly into the centralized database.
* **Advanced Target Logic:** Metrics are automatically calculated as a percentage of monthly targets completed, providing instant performance feedback.

## Tech Stack
* **Backend:** PHP (Core logic and session management).
* **Asynchronous Logic:** AJAX (for data fetching and non-refreshing UI updates).
* **Database:** MySQL (Relational schema involving agents, supervisors, and invoices).
* **Frontend:** HTML5, CSS3, and JavaScript.

## Interface Preview
### Modern Login Portal
![Login Portal](screenshots/login_portal.png)
*Role-based secure entry point featuring a clean, responsive design.*

### Manager Performance Dashboard
![Manager Dashboard](screenshots/manager_dashboard.png)
*High-level overview of team recruitment and premium collection progress.*

## Setup & Installation
1. **Initialize Database:** Import the `create logins.sql` script into your MySQL environment to set up the necessary role-based accounts and tables.
2. **Server Deployment:** Deploy the project folder to your local server (WAMP/XAMPP).
3. **Configuration:** Ensure your database credentials match in the connection logic.
4. **Access Portal:** Navigate to `localhost/spesv3/page.php` in your browser.

---
*Developed by Thilina Sandakelum Wijesinghe for the Web Technology and Applications module | Department of Software Technology at University of Vocational Technology (UoVT).*
