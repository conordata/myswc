# My Solid Waste Collection (mySWC)  

mySWC app is a tool developed to help municipalities collect accurate data on the municipal solid waste collection operation. This application works with a smart bin that collects the data directly inside the trash bin thanks to the sensors, and sends them to the mySWC appl. This application allows the management of trash bin in the system, including adding new, as well as updating and deleting existing trash bin in the system. In addition, it allows the management of municipal workers and contractors involved in the municipal solid waste collection program, including the creation of new workers and/or contractors, as well as the updating and deletion of existing worker/contractor in the system. Furthermore, it enables user management, activity reporting and real-time monitoring.
 
## To begin

In order to better use the application, make sure you have the required software and you follow the configuration steps provided below.

### Prerequisites

Please download one of the following applications depending on the operating system installed on your computer. The choice is yours, for my case I am using xampp because my computer is running Windows 10.

* Xampp 	(Windows OS)
* LAMP		(Linux OS)
* MAMP		(Mac OS)

For the text editor, you have several choices among:

* PHPSTORM
* VScode,
* SublimeText
* Atom text editor
* etc.

### Installation

Here are the steps to follow to install the application on your computer.

Start by cloning the project via the link below:

$ git clone https://github.com/conordata/myswc

Unzip the download folder then move the extracted folder to:

* C:\xampp\htdocs if you are using **Xampp**
* $ /var/www/html if you are on **Linux**

Then create a new database named trashproject in phpMyadmin 

After creating a new database successfully, go to import, then import the database dump file **trashproject.sql** available in the unzipped file

If there is no error, you should be ready to run the application on your local computer

## Start-up

After installing the prerequisite software and configuring the app, open any browser available on your computer and enter the address **localhost/myswc** in the address bar to start or click here http://127.0.0.1/myswc. 

For my case, I use Google Chrome as my browser

## Login details

* username: admin
* password: admin

## Home Page

Voila, we can easily access an application




