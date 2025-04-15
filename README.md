# BNSP-Sekolah

BNSP-Sekolah is a web-based application designed to manage school-related processes and information, including managing student data, teacher records, class schedules, and more. It is built with PHP Native for the back-end and Bootstrap for the front-end, providing a responsive and user-friendly interface.

## Table of Contents

1. [Overview](#overview)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Installation](#installation)
5. [Usage](#usage)
6. [License](#license)
7. [Contributors](#contributors)

## Overview

BNSP-Sekolah aims to provide an efficient solution for school management. This application allows administrators and staff to easily manage data and perform key tasks like adding new students, assigning teachers to classes, and generating reports. The system is lightweight and easy to use, making it ideal for smaller schools and institutions.

### Key Features

- **Student Management**: Add, edit, and delete student records. Manage student information including names, grades, attendance, and more.
- **Teacher Management**: Add, edit, and delete teacher records. Manage teacher profiles and assign them to classes.
- **Class Scheduling**: Organize and manage class schedules, assigning teachers to appropriate time slots.
- **User Authentication**: Secure login for administrators and teachers.
- **Responsive Design**: Bootstrap ensures that the web application is fully responsive and works on all devices.
- **Reports**: Generate reports of student performance and attendance.

## Technologies Used

- **PHP (Native)**: The backend logic is built with pure PHP for simplicity and performance.
- **Bootstrap**: A front-end framework for designing responsive and modern web pages.
- **MySQL**: Used for data storage and management.
- **HTML5, CSS3, JavaScript**: For front-end development and ensuring an interactive user experience.

## Installation

Follow the steps below to set up the project on your local machine:

### Prerequisites

- Web server (Apache, Nginx, etc.)
- PHP 7.4 or higher
- MySQL database
- Composer (optional, if managing dependencies)

### Steps

1. **Clone the repository**:
    ```bash
    git clone https://github.com/LorentzaZweena/BNSP-Sekolah.git
    cd BNSP-Sekolah
    ```

2. **Set up the database**:
    - Create a MySQL database for the project.
    - Import the `bnsp-sekolah.sql` file (if provided) or create the required tables manually.

3. **Configure Database Connection**:
    - Open the `config.php` file and update the database connection settings with your credentials.

4. **Set up the web server**:
    - Place the project folder in the root directory of your web server.
    - Ensure the web server is pointing to the `index.php` file as the entry point.

5. **Run the application**:
    - Open your browser and navigate to the server's address (e.g., `http://localhost/BNSP-Sekolah`).

6. **Log in**:
    - Use the default admin credentials (if set) to log in for the first time and set up the necessary configurations.

## Usage

Once the application is installed and running, users can access various sections of the management system from the navigation bar. The following roles are available:

- **Administrator**: Has full access to manage students, teachers, schedules, and reports.
- **Teacher**: Can view student records and update attendance.
- **Student**: Can view personal records and performance data (if applicable).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributors

- [Zweena Ariva](https://github.com/LorentzaZweena)
