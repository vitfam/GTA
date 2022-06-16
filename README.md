# GTA 2.0 | VITFAM Event
VITFAM is hosting an event about budgeting.<br>
Where a player has provided credentials and a list of car, they must next go through the catalogue that will be provided in the starting of the event.
They'll buy the car according to their budget and will survive through all the rounds. They can also sell the car to other participants. Depreciation / Appreciation will be there. 

### How to use -
- Change the time to the time you want to start & end of the event in the [time.js](./js/time.js) file in js folder and [_event_time.php](./components/_event_time.php) file in components folder.
- Reset the [Database](./vitfam-gta.sql)
  - Change to **0 stars** and adjust the quantity of **amount** in the users table to your liking. 
  - **Stock** the automobile in the cars table according to your preferences.
- Login to the website and start the event.


## For Developers : <br>
- Fork the file and clone it in your local machine.
- Open XAMPP Server and in phpmyadmin upload the [Database](./vitfam-gta.sql).
- Now you can paste the folder to htdocs in XAMPP and open it via XAMPP server.


### User credential -
- Email : player@vitfam.com
- Password : player123
