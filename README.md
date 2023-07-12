<h1 align="center"> HelpMe! </h1>
HelpMe! It is a general forum where you can find a large number of categories.
On this platform you can ask for help from all those people who share your same passions or who simply want to share their knowledge. But that's not all, you can also share yours and help others in an enriching and fun way!

## Installation
To install the project and be able to test it on your device:
 - Download this project in zip file or clone it to your device.
 - Copy the folder "HelpMe!" in your server folder, if you use WAMP surely you should access "C:\wamp64\www" and paste your file.
 - Import the sql file in phpmyadmin (this file contains some sample data)
 - Open your browser and search for "http://127.0.0.1/HelpMe!/vues/signin.php" or "localhost/HelpMe!/vues/signin.php"
 - ENJOY THE KNOWLEDGE OF OTHERS AND CONTRIBUTE YOUR GRAIN OF SAND

## Design
For the design of the page I have used figma, which has helped me to have a visual and to be able to move faster.
The page is responsive, except for the DataTable on the admin page 😉.
To make the page easier to use, I have tried to use large elements with bright colors to make them stand out and facilitate ergonomics.

## Security
For page security I use php session to confirm user is logged in on each page, if user never logs in they will be redirected to a page with a 404 error (in case they try to login with a url) .
I also verify that the user is an administrator when accessing the administrator page and also I only make the configuration button appear if the account is of the administrator type.
I have created index files to prevent users from seeing all the files contained in this project.

## Possible improvements
Several improvements could be added, starting with the functionality of adding messages to each topic 😅. The button called "Read more" that you can see in each topic is not functional, its objective was to show the same topic and be able to show all the messages and allow the user to add one.
Another improvement would be the use of controllers 😂. I have created a folder for all the controllers, but when I got into the code I just missed creating them. What I could do to improve it is extract the functional code of each page, put it in a controller and import (include) the controller in the page that would only be in charge of displaying the visual.
I would also add buttons on certain pages to be able to return to the main page, for example from the profile creation screen and the administrator page you cannot return to the main page.

All these improvements and functionalities have not been carried out due to a lack of time.
