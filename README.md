1) Situation
	The app is running with mysql-dump and some mail-catching software.
	There is a need to fill up .env file to set proper all-project-configs.

2) Architecture
	I decided to use MVCS pattern for this app.
	The main reason was to place logic in a place specially designed for it and I did it in Services.
	I was also thinking about making repositories, but I found it pointless for this size project.
	I also gave up on few things like:
	- front-end;
	- verifying if an e-mail address repeats in reservations for one filmshow (to be honest, why should we forbid someone to buy all the tickets, even when each one ordered separately?);
	- creating PHPDocs with custom descriptions for all functions (I prefer using type declarations via strict_types);
	- images for movies (if I wanted to put here link to the photo stored in public/, I should create artisan command updating links in database according to current url and tell user to run it everytime installed the app or creating links to some images from the web.);
	- creating seeder to seed the database.

3) Final thoughts
	Some of the app's features could be done much better (i.e. exceptions), but it works ;)