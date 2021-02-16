Delivery System.

Database used:  name=example
                database type: mysql

Requirements:
PHP 7,
composer

How to run application:

1. git clone https://github.com/SteveDevs/Delivery-System.git
2. Create database called pargo or any database name you prefer.
3. set up .env file: 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=example
    DB_USERNAME=your_user_name
    DB_PASSWORD=your_password

4. run composer install.
5. php artisan migrate --seed.
6. php artisan serve.
7. open up brower http://localhost:8000/

Refresh database:

php artisan migrate:fresh --seed

Database structure: See database.png

How application should run:

Logins should be seperated into Admin and Employees.

Admins have full access to manage and edit all data.
employees only have access to view what dilivery assignment they have been allocated to by the admin.

Flow:

The order would come in remotely, then the admin would put this order into the pargo system.
This order would contain the parcels and the household where it would need to go.

The parcels would get ordered from the supplier where the parcels would get stored at pargo when the parcels arrive.

Depending on the availabilty of the employee the parcel and delivery would get assigned to the employee. More than one paricualr employee can be assigned to a delivery.

Depending on whether or not all parcels would be delivered to the households the households might recieved more than one delivery.

Discarding of parcels would occur if payments on particular parcels are absent.

