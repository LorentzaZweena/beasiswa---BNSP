# Scholarship | BNSP

Welcome to the "Scholarship | BNSP" project! This is a web application built with PHP and Bootstrap that aims to provide an easy and efficient way to manage and apply for scholarships under the BNSP (Badan Nasional Sertifikasi Profesi) program. The platform is designed for students and professionals looking to explore scholarship opportunities, track their application status, and access necessary resources.

## Features

- **User Registration & Authentication**: Allow users to sign up, log in, and manage their profiles.
- **Scholarship Application**: Users can browse and apply for available scholarships.
- **Admin Panel**: An administrative interface to manage scholarships, applications, and user data.
- **Responsive Design**: Built with Bootstrap for a responsive and user-friendly interface across all devices.
- **Notifications**: Users receive notifications regarding application statuses and deadlines.

## Requirements

To run this project locally, you will need the following:

- **PHP** (>= 7.4)
- **MySQL** or **MariaDB** for the database
- A web server (Apache or Nginx)
- **Composer** (for managing dependencies)
- **Bootstrap 4** (included in the project)

## Installation

### Step 1: Clone the Repository

Clone the repository to your local machine using Git.

```bash
git clone https://github.com/LorentzaZweena/beasiswa-bnsp.git
cd beasiswa-bnsp
```

### Step 2: Install Dependencies

Run the following command to install the required PHP dependencies using Composer.

```bash
composer install
```

### Step 3: Set Up the Database

1. Create a MySQL database for the application.
2. Import the SQL file found in the `database` folder (e.g., `scholarship_bnsp.sql`) to set up the tables.
3. Update the database configuration in the `.env` file or configuration file (`config/db.php`), ensuring the correct database name, username, and password are used.

### Step 4: Configure Your Web Server

Make sure your web server is set to serve the application directory. If you're using Apache, you may need to configure the `.htaccess` file to handle URL rewriting.

### Step 5: Run the Application

Once everything is set up, you can run the application by navigating to the root directory of your project in a web browser.

```bash
http://localhost/beasiswa-bnsp
```

## Usage

### For Users

- **Create an Account**: Register by providing basic information such as name, email, and password.
- **Apply for Scholarships**: Browse through available scholarships and submit applications.
- **Track Application Status**: Keep an eye on your application progress and notifications.

### For Admins

- **Manage Scholarships**: Add, update, and remove scholarship listings from the platform.
- **Review Applications**: View and manage user applications to scholarships.

## Contributing

We welcome contributions! If you'd like to improve the project or fix bugs, please follow these steps:

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Commit your changes and push them to your fork.
5. Open a pull request with a description of your changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or need further assistance, feel free to open an issue or contact the maintainers.

---

Thank you for checking out the beasiswa | BNSP project! We hope it helps students and professionals in finding and applying for scholarships efficiently.
