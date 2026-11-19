# PHP Login Validation – Database

## Aim
To build a PHP login application that receives a username and password, checks them against user information stored in a MySQL database, and displays a success or failure message.

## Files
- `index.php` – login form
- `db_connect.php` – database connection
- `authenticate.php` – validates the submitted details
- `home.php` – successful login page
- `signout.php` – ends the session
- `create_database.php` – creates the database, table, and sample user
- `assets/style.css` – page design

## How to run
1. Install XAMPP.
2. Start Apache and MySQL from XAMPP Control Panel.
3. Copy the `PHP_User_Validation_Friend` folder into `C:\xampp\htdocs\`.
4. Visit `http://localhost/PHP_User_Validation_Friend/create_database.php`.
5. After setup is successful, visit `http://localhost/PHP_User_Validation_Friend/`.
6. Test with username `demo` and password `Demo@456`.
7. Try an incorrect password to check the failure message.
8. Select Sign out to end the session.
9. Delete `create_database.php` after creating the database.

## Expected output
- Correct login details open the account verified page.
- Incorrect details show a login failure message.

## Security
Passwords are stored as hashes using `password_hash()` and checked using `password_verify()`. The login query uses a prepared statement to help prevent SQL injection. The successful page is protected using a PHP session.

**Note:** GitHub Pages does not run PHP. Use XAMPP or a PHP hosting service to execute this project.
