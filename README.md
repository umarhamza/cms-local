# CMS Local

## Installation
- Clone github repo
- Run PHP server (MAMP, XAMPP)
- Install NPM dependencies `npm install`
- Create database and name is `cms-local`
- Use the following SQL script to create database table:
```
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
- Install Composer dependencies (PHPMailer) using `php composer.phar install`
- Update both the `$mail->Username` and `$mail->Password` in the `server.php` file to the email and password in the instructional email sent to you.
