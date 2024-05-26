# BigShopBD - Laravel Ecommerce Platform

BigShopBD is a robust and feature-rich Ecommerce platform built on the Laravel framework, designed to empower businesses with a seamless online shopping experience. With a focus on providing the latest updates and insights across a myriad of topics, BigShopBD offers users a comprehensive solution for their online retail needs.

## Features

- **User Authentication**: Secure user authentication system for managing access to the platform.
- **Product/Categories Management**: Allows administrators to create, edit, and delete products and categories.
- **Category Management**: Organize content by categories for easy navigation and discovery.
- **Search Functionality**: Enable users to search for specific products quickly.
- **Responsive Design**: Optimized for a seamless experience across devices of all sizes.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/search4asraful/bigshopbd.git
2. Navigate to the project directory:
    ```bash
    cd bigshopbd
3. Install dependencies:
    ```bash
    composer install
- if install not worked `(composer update)`

4. Copy `.env.example` to `.env`:
    ```bash
    cp .env.example .env
5. Generate application key:
    ```bash
    php artisan key:generate
6. Set up your database in the `.env` file:

    - DB_CONNECTION=mysql

    - DB_HOST=127.0.0.1

    - DB_PORT=3306

    - DB_DATABASE=your_database_name

    - DB_USERNAME=your_database_username
    - DB_PASSWORD=your_database_password

7. Migrate the database:
    ```bash
    php artisan migrate
8. Serve the application:
    ```bash
    php artisan serve
9. Access the application in your web browser at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request with your changes.

## Acknowledgements

- This project was built using the Laravel framework.
- Bootstrap & custom css was used for styling.
- Bootstrap & Swipper and vanila js was used for javascript.
- fontawesome & boxicons was used for icons.
- Special thanks to the Laravel community for their support and resources.