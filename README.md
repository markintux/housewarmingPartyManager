# Housewarming Party Manager

The **Housewarming Party Manager** is an intuitive and efficient system designed to streamline the organization of new home celebrations. This web application helps users manage their housewarming parties by organizing guests, gifts, and event details in a user-friendly manner.

## Features

- **Guest Management:** Easily add, edit, and delete guests. Track guest confirmations and the number of attendees.
- **Gift Tracking:** Manage gifts with options to view, select, and confirm them.
- **User Dashboard:** Provides an overview of the event, including the number of confirmed guests and gifts.
- **Carousel for Images:** A dynamic carousel displaying user-uploaded images related to the event.
- **Authentication:** Ensures secure access with user-specific data management.
- **Responsive Design:** Optimized for all devices using Bootstrap 5.

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/yourusername/housewarming-party-manager.git
    cd housewarming-party-manager
    ```

2. **Install the dependencies:**

    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Configure the environment:**

    Copy the `.env.example` to `.env` and set up your environment variables, especially for the database and mail services.

    ```bash
    php artisan key:generate
    ```

4. **Run the migrations:**

    ```bash
    php artisan migrate
    ```

5. **Start the server:**

    ```bash
    php artisan serve
    ```

## Usage

- After setting up, access the application through `http://localhost:8000` and register an account.
- Add and manage guests and gifts for your event through the dashboard.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Contact

If you have any questions or need further assistance, feel free to reach out at [markintux@gmail.com].