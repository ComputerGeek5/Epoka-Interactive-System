## Step 1 - Clone the repository
First we are going to clone the github repository. Open command prompt and run the following commands:

- git clone https://github.com/ComputerGeek5/School-Management-System

Open the project.

## Step 2 - Install dependencies
Next we have to install front-end dependencies with npm and php dependencies with composer.

Navigate to the folder using the terminal and run the following commands:

- composer install 
- npm install 
- npm run dev (for compiling css and javascript assets)

## Step 3 - Configure Project Environment
Now we need to make some changes in our project folder.

Go to the project folder and create a new file and name it .env.
Copy everything from .env.example into this new file. Run the following commands: 
- php artisan key:generate -> to set the application key
- php artisan storage:link -> to create a link between the storage and public folders

To run the project successfully, make sure to always have Apache and MySQL services up and running in XAMPP Control Panel.

## Step 4 - Setup Database
To setup the app's database, first create a database and name it [name_db]. 
For migrating and seeding the databases we have to run the following commands:

- php artisan migrate
- php artisan db:seed

## Step 5 - Run Project
Finally, all we have to do is run the project with this command:

- php artisan serve

You can view the application with this url: localhost:8000 (default).
