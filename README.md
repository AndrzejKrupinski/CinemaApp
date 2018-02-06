<h3>1) Situation</h3>
<p>
	The app is running with mysql-dump and some mail-catching software.
	There is a need to fill up .env file to set proper all-project-configs.
</p>

<h3>2) Architecture</h3>
<p>
	I decided to use MVCS pattern for this app.
	The main reason was to place logic in a place specially designed for it and I did it in Services.
	I was also thinking about making repositories, but I found it pointless for this size project.
	I also gave up on few things like:<br>
	- front-end;<br>
	- verifying if an e-mail address repeats in reservations for one filmshow (to be honest, why should we forbid someone to buy all the tickets, even when each one ordered separately?);<br>
	- creating PHPDocs with custom descriptions for all functions (I prefer using type declarations via strict_types);<br>
	- images for movies (if I wanted to put here link to the photo stored in public/, I should create artisan command updating links in database according to current url and tell user to run it everytime installed the app or creating links to some images from the web.);<br>
	- creating seeder to seed the database.<br>
</p>

<h3>3) Final thoughts</h3>
<p>
	Some of the app's features could be done much better (i.e. exceptions), but it works ;)
</p>