# CRUD-Application-PHP-AJAX

This is a simple CRUD (_Create, Read, Update, Delete_) application built using PHP, MySQL, and AJAX. The application allows users to perform basic CRUD operations without refreshing the page, enhancing the user experience with asynchronous JavaScript and XML (AJAX).

## Features

- **Create**: Add new users using a modal form with client-side validation.
- **Read**: Display a list of users in a table with dynamic data fetching via AJAX.
- **Update**: Edit user details using a modal form with pre-filled data.
- **Delete**: Remove users with confirmation prompts.
- **AJAX**: Asynchronous operations for seamless user experience without page reloads.
- **Form Validation**: Client-side validation for form inputs to ensure data integrity.


## Teachnology Used

- PHP
- MySQL
- JavaScript
- AJAX
- Bootstrap 5
- FontAwesome

## File Structure

- **index.php**: Main page displaying the user table and modal forms for adding and editing users.
- **insert.php**: Handles the insertion of new users into the database.
- **connect.php**: Database connection configuration.
- **edit.php**: Fetches user details for editing.
- **update.php**: Handles updating user details in the database.
- **retrieve.php**: Retrieves all users from the database.
- **delete.php**: Handles the deletion of users from the database.
- **script.js**: JavaScript file for AJAX calls and dynamic content manipulation.
- **style.css**: Custom CSS styles.

### Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/yourusername/php-ajax-crud-app.git
    ```
2. **Navigate to the project directory:**
    ```sh
    cd php-ajax-crud-app
    ```
3. **Set up the database:**
    - Create a database named `crud` in MySQL.
    - Import the provided SQL file `database.sql` to set up the necessary table.

4. **Update database configuration:**
    - Edit `connect.php` file with your database credentials:
    ```php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "crud";
    ```

5. **Start the server:**
    - Using XAMPP or any other server, place the project directory in the `htdocs` folder.
    - Start Apache and MySQL services.
    - Open your browser and navigate to `http://localhost/php-ajax-crud-app/index.php`.


## Usage

- **Add a User:**
    - Click the "New users" button to open the modal form.
    - Fill in the user details and click "Add changes".

- **Edit a User:**
    - Click the edit icon next to the user you want to edit.
    - Update the user details in the modal form and click "Update changes".

- **Delete a User:**
    - Click the delete icon next to the user you want to delete.
    - Confirm the deletion in the prompt.
 

## Screenshots

Homepage

<img width="959" alt="Homepage" src="https://github.com/user-attachments/assets/c25cc941-a927-4dd6-8fcb-66c44c11e020">


Add user

<img width="953" alt="Add users" src="https://github.com/user-attachments/assets/4cf10a2d-0587-4697-ac3e-0c3178da4d2f">


Edit user

<img width="959" alt="Edit users" src="https://github.com/user-attachments/assets/6b64e84c-7a39-401f-8c5e-26faa829b341">

Delete user

<img width="959" alt="Delete users" src="https://github.com/user-attachments/assets/94c4d5b9-92bd-46a1-9497-173f3ac8bdd2">
<img width="959" alt="Delete successfull" src="https://github.com/user-attachments/assets/0900cca8-e7cb-4224-92bb-28e8ae560001">
