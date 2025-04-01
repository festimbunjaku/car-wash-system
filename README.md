# Car Wash Management System

A complete management solution for car wash businesses with scheduling, customer tracking, and payment processing functionalities.

![Car Wash Management System](https://raw.githubusercontent.com/festimbunjaku/car-wash-system/main/assets/images/dashboard-preview.png)

## 🚗 Features

- **User Management**: Admin and customer roles with secure authentication
- **Booking System**: Schedule appointments with date and time selection
- **Service Management**: Create, update, and manage service offerings
- **Customer Management**: Track customer information and service history
- **Payment Processing**: Record and manage transactions
- **Admin Dashboard**: Comprehensive analytics and business reporting
- **Responsive Design**: Works on desktop, tablet, and mobile devices

## 🛠️ Tech Stack

- **PHP**: Core backend language
- **MySQL**: Database for data persistence
- **jQuery**: JavaScript library for frontend interactivity
- **Tailwind CSS**: Utility-first CSS framework
- **Chart.js**: Interactive charts for the dashboard
- **PDO**: PHP Data Objects for database connections

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- npm (for Tailwind CSS)

## 🔧 Installation

1. Clone the repository:
```bash
git clone https://github.com/festimbunjaku/car-wash-system.git
cd car-wash-system
```

2. Install dependencies:
```bash
npm install
```

3. Set up the database:
   - Create a MySQL database named `carwashapp`
   - Import the database schema from `database/carwashapp.sql`

4. Configure the database connection:
   - Open `includes/db.php`
   - Update the database credentials as needed

5. Start the local development server:
```bash
php -S localhost:8000
```

6. Access the application:
   - Customer interface: `http://localhost:8000/public/login.php`
   - Admin interface: `http://localhost:8000/admin/dashboard.php`

## 📁 Project Structure

```
car-wash-system/
├── admin/                # Admin panel files
│   ├── dashboard.php     # Admin dashboard
│   ├── bookings.php      # Manage bookings
│   ├── users.php         # User management
│   └── profile.php       # Admin profile settings
├── assets/               # Static assets (CSS, JS, images)
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── images/           # Image assets
├── includes/             # Shared PHP files
│   ├── db.php            # Database connection
│   ├── functions.php     # Helper functions
│   └── auth.php          # Authentication logic
├── public/               # Customer-facing pages
│   ├── login.php         # User login
│   └── register.php      # User registration
├── templates/            # Reusable HTML templates
│   ├── header.php        # Page header
│   └── footer.php        # Page footer
├── database/             # Database schema and migrations
├── .gitignore            # Git ignore file
├── package.json          # npm dependencies
├── tailwind.config.js    # Tailwind CSS configuration
└── README.md             # Project documentation
```

## 🔐 Default Login Credentials

### Admin
- Email: admin@example.com
- Password: admin123

### Sample Customer
- Email: customer@example.com
- Password: customer123

## 🖥️ Usage

### Admin
1. Log in to the admin dashboard using admin credentials
2. Monitor overall business performance on the dashboard
3. Manage bookings, services, and customer accounts
4. Update service offerings and pricing
5. Process payments and generate reports

### Customers
1. Register for a new account or log in with existing credentials
2. Browse available services
3. Book appointments by selecting service, date, and time
4. View booking history and status
5. Update profile information

## 🚧 Roadmap

- [ ] Implement online payment gateway integration
- [ ] Add SMS notifications for booking confirmations
- [ ] Develop a customer loyalty program
- [ ] Create a mobile app version
- [ ] Add multi-language support

## 📝 License

[MIT License](LICENSE)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📞 Contact

For questions or support, please reach out to the project maintainer.

---

*Built with ❤️ by Festim Bunjaku*