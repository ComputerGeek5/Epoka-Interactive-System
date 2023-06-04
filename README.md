# School Management System
This is the project for my CEN 342 UI Design course at Epoka University. It is a school management system that has 3 main roles: Student, Teacher and Admin.
It is developed with PHP, Laravel, Bootstrap and MySQL.

# Setting up project locally

## Requirements

You need to have some applications installed locally in order to run this project.

1. Install  [PhpStorm](https://www.jetbrains.com/phpstorm/download/#section=windows) as and IDE for the project. When installing, make sure to add bin folder to the PATH environment variable.
2. Install  [XAMPP 7.4.24](https://www.apachefriends.org/download.html) for using the php language and administrating the database.  Open XAMPP's control panel and install Apache and MySQL services.
3. Install [NodeJS](https://nodejs.org/en/) for installing front end-dependencies.
4. Install [Composer](https://getcomposer.org/download/) for installing php dependencies.
5. Install [GIT](https://git-scm.com/downloads) for version control.

### Step 1 - Clone the repository

First you are going to clone the github repository. Open command prompt and run the following commands:

```
git clone https://github.com/ComputerGeek5/Epoka-Interactive-System
```

Open the project.

### Step 2 - Install dependencies

Next you have to install front-end dependencies with npm and php dependencies with composer.

Head to the PhpStorm terminal and run the following commands:

```
composer install
npm install
npm run dev
```

### Step 3 - Configure Project Environment

Now you need to make some changes in our project folder.

1. go to the project folder and create a new file and name it .env
2. copy everything from .env.example into this new file
3. configure .env file with your database credentials
4. run the following command to set the application's key:
```
php artisan key:generate
```

To run the project successfully, make sure to always have Apache and MySQL apps up and running in XAMPP Control Panel.

### Step 4 - Create Symbolic Link for Storage

Run the following command to create a symbolic link for storage which contains the profile pictures of users and other files:

```
php artisan storage:link
```

### Step 4 - Create tables and Seed Database

To setup the app's database, first create a database and name it eis_db in [phpMyAdmin](http://localhost/phpmyadmin/index.php).
For migrating and seeding the databases you have to run the following commands:

```
php artisan migrate
php artisan db:seed
```

### Step 5 - Run Project

Finally, all you have to do is run the project with this command:

```
php artisan serve
```

You can preview the application with this url: localhost:8000 (default).

# Screenshots
