# Cinema System

#### A web-based cinema system implemented in HTML/CSS, Javascript, PHP, and MySQL database.

***
**Languages/Frameworks:**
HTML5/CSS3, PHP, MySQL, JavaScript, Bootstrap 3.3.5
***

There are two main roles in the cinema system, with corresponding functions each of them can access.

`Back-end staff (in the office) and front-end staff (directly facing the customer at the counter)`

**Back-end Staff**

* **Movie:** add, delete and update movies and list all movies either by year or alphabetically.
	* the staff can enter all the data about new movies (id, title and year of release), and the genre(s) it is associated with
	* a movie poster image can be added to a given movie
	* the added movie poster will be displayed
* **Genre:** add, delete and modify the genre info.
	* No new genres will be added, modified or deleted but a movie might change the genres it is associated with, so that table has to be able to be modified.
* **Theatre room:** enter information about their rooms where they screen movies (add, delete and modify the room number and capacity).
* **Showing:** add, delete and modify information about the showings and list all the showings
* **Customer:** add, delete and modify information about the customers and list all the customer


**Front-end Staff**

* **Ticket sale:** select a customer and a showing and sell a ticket to the user.  The ticket price will be up to the staff to pick (they can enter any number they want)
* **Rating System:** allow a customer to give a rating to the showing they just saw (a number of stars between 1 and 5)
* **Showing List:** allow a customer to see a list of the showings (movie name, year) based on:
	* a selected genre (give a warning if there are no seats left for a showing)
	* a range of dates  (give a warning if there are no seats left for a showing)
	* a theatre that still has seats available 
	* a movie title (give a warning if there are no seats left for a showing)
* **Movie History:** allow a customer to see all the movie titles and ratings for the movies he/she has viewed
* **Customer Profile:** allow a customer to see his/her profile (all the info about the customer)
* **Genre Sales:** see each genre and how much in ticket sales that genre has done
* **Movie count** (by genre): see each genre and count how many movies there are in that genre'
* **Popular Movie:** list all the movie titles had have an average rating of 4 or more stars. 







