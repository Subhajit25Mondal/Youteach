![ToyTeach Logo](imgs/brand_l.png)
### You teach is an application which aims to connect people with Instructors, who which to get training for Stop the Bleed.

# Quick Links
 1. [Prerequisites](#prerequisites)
 2. [Screenshots](#screenshots)
 3. [Demo](#Demo)
 4. [Deployment](#deployment)
 5. [Authors](#authors)
 6. [License](#license)

 # Prerequisites

1. To deploy YouTeach in your local machine you need Apache server installed and running in your machine as well as the MySql and PHP engine installed and running.

2. [Here Maps API](https://developer.here.com) credentials are required to run the map scripts.

# Screenshots

Some Screenshots of this application can we found under `/screenshots` directory.

# Demo


**Note:**  The demo server is registered under free service plan. And unfortunately, it doesn't support `file_get_contents()` function.
Thus, Auto detection of location isn't working. So, the default location has been set to [Kolkata, India](https://www.google.com/search?q=kolkata&oq=kolkata&aqs=chrome..69i57j69i60l2j69i61j69i60l2.1806j0j9&sourceid=chrome&ie=UTF-8). 
If you are planning to deploy YouTeach to Cloud Server, then use premium hosting plans via [Hostinger](https://www.hostinger.in/), [Godaddy](https://in.godaddy.com/) etc. 


[Click Here](http://dotcom.scienceontheweb.net/) for Demo.


# Deployment
## Built With
* HTML & CSS
* PHP
* SQL
* Javascript
* Hack

For deploying YouTeach to your system please follow the steps below :

1. Please enable your Apache server along with PHP engine and mySQL.
1. Create a new database in MySQL. Import the file `/sql/8jro0ljvNr.sql` to your newly made database.
1. Move on to the file `connect.php` and enter the required credentials.

    ```php
    <?php 
    $con = mysqli_connect('HOST_NAME','USER_NAME','PASSWORD','DATABASE_NAME');
    ?>
    ```
1. Also you need to get the [Here Maps API](https://developer.here.com) credentials and paste then in the files listed below.
    * `/search/index.php` (line no. 93, 94)
    * `/register/details.php` (line no. 108, 109)
    * `/dashboard/dashboard.php` (line no. 124, 125)
    * `/update/map.php` (line no. 111, 112)

```php
/* Note: If you choose to create a Remote mySQL Database then also folow the above steps. 
Only add a new section "PORT_NUMBER" in the function "mysqli_connect()" */

mysqli_connect('HOST_NAME*','USER_NAME','PASSWORD','DATABASE_NAME','PORT_NUMBER');
```
# Authors
* Subhajit Mondal
# License

This project is licensed under the GPL-3.0 - see the [LICENSE](LICENSE) file for details.
