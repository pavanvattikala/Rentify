# Rentify - Where Renting Meets Simplicity

Rentify is a web application developed as part of a hiring challenge by Presidio. The application simplifies the process of finding rental properties for tenants and listing properties for landlords. The challenge involves building both the backend and frontend components, implementing additional features, and optionally deploying the application to a cloud platform.

## Project Overview

This project spans three main parts:

1. **Part I - Basic Application (Mandatory)**
2. **Part II - Add-On Features (Advanced)**
3. **Part III - Extra (Optional): Bonus Section**

## Tech Stack Used

For this project, we chose the following technology stack:

-   **Frontend**: Tailwind CSS
-   **Backend**: Laravel

## Installation and Setup

### Prerequisites

-   PHP 7.4 or higher
-   Composer
-   Laravel 8 or higher
-   MySQL or another database supported by Laravel
-   Node.js and npm (for frontend asset management)

### Steps to Setup

1. **Clone the repository:**

    ```bash
    git clone https://github.com/pavanvattikala/Rentify.git
    cd rentify
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set up the environment file:**

    Copy the `.env.example` file to `.env` and update the necessary configuration values.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run migrations:**

    ```bash
    php artisan migrate
    ```

5. **Seed the database (optional):**

    ```bash
    php artisan db:seed
    ```

6. **Start the development server:**

    ```bash
    php artisan serve
    ```

## Usage

### Property Listing

-   Visit the home page to see a list of properties.
-   Use the filter form to filter properties by price range.

### Property Details

-   Click on a property to view its details.
-   If interested, click the "I'm Interested" button to view the seller's contact information (requires login).

### Seller Actions

-   Sellers can log in to view, edit, or delete their posted properties.
-   Sellers receive email notifications when a buyer shows interest in their property.

## Conclusion

The Rentify project successfully demonstrates the creation of a full-stack web application with Laravel, handling various user roles, CRUD operations, real-time interactions, and email notifications. The implementation follows best practices in software development, ensuring scalability and maintainability. This project was developed under the constraints of a hiring challenge, showcasing the ability to deliver a robust and functional application within a limited time frame.

---

By following this readme, you can set up and run the Rentify application on your local machine. For further enhancements or contributions, feel free to fork the repository and submit pull requests.
