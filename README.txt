-- CONCEPTS AND GENERAL OVERVIEW --
The concept was making a website which meets the requirements for the assignment.
The mvc is based on the mvc pulled from github linked through itslearning (Henrik's).
All navigation is in the menu at the top of the page.

- DISCLAIMER WITH migration.sql -
YOU HAVE TO REGISTER THE USERS YOURSELF IN ORDER TO ACCESS THEM, AS migration.sql CAN'T MAKE HASHED PASSWORDS EQUAL TO THE PHP HASHING - WONT GET SAME RESULTS WHEN TRYING TO LOGIN.



-- LIST OF URL'S AND WHAT THEY DO --
/app/views/home/index.php               - Frontpage of the site, 
/app/views/user/registration.php        - Registration page
/app/views/user/login.php               - Login page
/app/views/user/user_list.php           - Page that shows a list of users
/app/views/user/upload.php              - Page for uploading images
/app/views/user/feed.php                - Page for showing all uploaded images

/app/views/home/restricted.php          - Doesn’t do anything, haven’t deleted it yet.



-- HOW TO SET UP THE PROJECT --
- Which folder PHP should be started from in order to run the project correctly
    PHP should be started from the “mvc” folder.
    
- Where to find the db_config.php to set up the database
    Path to db_config.php is: (/app/core/db_config.php).
    username = "root"
    password = ""
    
- Where to find the migration.sql file which contains all SQL code to set up the database
    Migration-sql is in the install folder: (/install/migration.sql).
    
    - DISCLAIMER WITH migration.sql -
    YOU HAVE TO REGISTER THE USERS YOURSELF IN ORDER TO ACCESS THEM, AS migration.sql CAN'T MAKE HASHED PASSWORDS EQUAL TO THE PHP HASHING - WONT GET SAME RESULTS WHEN TRYING TO LOGIN.
    THE SAME WITH UPLOADING BLOB USING migration.sql, SO HAVE TO UPLOAD IMAGES YOURSELF: THERE ARE IMAGES IN (/public/assets/) TO TEST WITH.
    
    
- What you do with AJAX and where to find both JS and PHP code for it
    The AJAX call is used to load contents of fetch_info.html (/public/asstes/fetch_info.html) when clicked on a button, in index.php (/app/views/home/index.php). 
    The code for the AJAX call is in (/public/js/scripts.js) and is using the js build in Fetch API.



-- SECURITY --
- That XSS is not possible
    In the controllers, when trying to access a page, it will check if the user is logged in and then choosing the appropriate view, so logged in might go to specific view, while not being logged in will go to the login page.
    
- That SQL injection is not possible
    When using a function that connects with the database, variables parsed is first filtered using FILTER_UNSAFE_RAW, which removes harmful data by removing or encoding unwanted characters or strip tags.
    They are then bound to the prepared statement using bindParam before executing the query.
    This makes it so the parsed variable is read with no malicious content and injections shouldn’t be possible.
    
- That only images can be uploaded (not PDF, EXE or PHP files, etc.)
    When uploading images, the upload function in (/app/models/User.php) has an $allowTypes array, which gets compared to the type of the file being uploaded. The array only contains jpg, png, jpeg and gif files.
    
- How passwords are protected
    Passwords use hashing when registering an account, so the password is protected.



-- API --
Due to how long it took to make uploading or retrieving images from database work, I haven’t made any API’s that can upload images or get images belonging to a specific user. But I have made an image feed, which shows all uploaded images and they can be uploaded to database in update.php.

I didn’t make an API for getting a list of users, but I have a user_list.php view, which does get the list and shows it in a table.



-- LIST OF KNOWN ERRORS --
- Describe what you tried and what you think is wrong
    As mentioned before you have to make your own users to test, as migration.sql can't do password hashing the same as php, it will not be the same.
    The same with saving images as blobs, so use your own images or use images in (/public/assets/)
