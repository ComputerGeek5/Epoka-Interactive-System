# School Management System

![3](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/fe1aac0e-a02b-4ffa-a8a0-e408523dd34f)

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

![1](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/a21c7c4f-0990-406c-b137-c1231c9829af)
![2](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/32a99ad8-d92e-47fc-82b3-896eb8dfb75e)
![3](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/fe1aac0e-a02b-4ffa-a8a0-e408523dd34f)
![4](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/d332f9c5-a6f2-492d-9866-0bc53c553f9e)
![5](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/b894f041-3413-4dc5-9aa3-5c4df810237d)
![6](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/940d9729-eeda-4251-9fa0-02bc0576a57f)
![7](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/842253b8-1628-4783-a9f2-396ebdc96561)
![8](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/87a8f5dd-0f30-4251-8403-f41c4a4bd782)
![9](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/3cc44d81-633d-464d-ab57-3f525e068508)
![10](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/e498c53c-0c14-4128-b910-016392a8535b)
![11](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/727aa76e-e882-41a8-a600-9f557d7f9112)
![12](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/18acda5f-1239-4114-a8ce-46070667870c)
![13](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/7b278ee9-f1c8-41dc-aad9-621d3ce232da)
![14](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/99b2514f-abe5-4795-8a33-e7e767ca27b2)
![15](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/1cff21c7-3e83-464f-b961-ec35a101228a)
![16](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/da749cd1-6cb3-41bf-96d4-a4b68ab0e952)
![17](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/14791bc7-5e1a-43db-bb3e-b61b14317a9e)
![18](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/e19d7d3b-d488-4da2-8434-2ad6400f93b0)
![19](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/bd0eae75-b020-4b86-8f8f-dcce2ec5cdb7)
![20](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/4d7d4238-cd65-4e70-ba19-9bab07394cae)
![21](https://github.com/ComputerGeek5/Epoka-Interactive-System/assets/78569367/614948e9-aa6d-4282-9887-3a738050db09)
