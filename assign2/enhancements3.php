<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="GOI Cinemas - Enhancements" />
    <meta name="keywords" content="HTML,CSS,Javascript" />
    <meta name="author" content="Gang of Islands" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>GOI Cinemas - Enhancements</title>
</head>

<body id='enhancementsBG'>
    <?php include_once 'includes/menu.php'; ?>


    <section id="enhancementContainer">
        <h1 class="assignment-related-page-title">PHP Enhancements</h1>

        <details>
            <summary>#1 - Manager login form</summary>

            This enhancement puts the manager page behind an authentication form meaning only authorized individuals are allowed to acces it.
            The control flow for authentication is as follows:
            <ol>
                <li>Retrieve login form data via POST variables</li>
                <li>Query database to see if a user exists with the given password</li>
                <li>If not refresh the page and show an error message (passed in via query parameters)</li>
                <li>If the user exists redirect to the manager page and set the authenticaed flag in the session to true</li>
                <li>This session flag can be queried to see if the user is logged in and skip reauthenication.</li>
                <li>The logout button sets this flag to false</li>
            </ol>

            This enhancement improves upon the requirements by providing security and the potential for future manager functionality depending on the user role.
        </details>

        <details>
            <summary>#2 - Extra manager reporting functionality </summary>
        </details>

        <details>
            <summary>#3 - Linking mutliple tables using foreign keys</summary>
            This enhancement utilizes our database to collaborate the orders' table with other tables such as 'contact_method', 'movies', and 'options' to remove redundancy when storing data. 

Creating different tables for different category of data helps to create accuracy when inserting data as it eliminates data duplication and helps with flexibility as it ease the increasing incoming of customers' data .
Relational database also improves readibility and ease of usage which allow managers to easiliy carry our complex queries.
        </details>

        <details>
            <summary>#4 - Autopopulating products page from database</summary>
            For this enhancement we are populating products page from the database. In the database we have records of each product we offer for example, Black Panther. The images for these records are stored online and the reference to that image is saved into the database. Doing it this way means that adding a product does not require us to add another section for a new product in the html instead we can just add the record into the database. This cuts down on extra code.
            <ol>
                <li>Query the database and fetch all the movies </li>
                <li>Using a while loop to loop through all the records</li>
                <li>Display all data in a table format.</li>
            </ol>
        </details>

        <details>
            <summary>Extra - References</summary>

            <ul>
                <li>Background and other images: <a href="https://unsplash.com" target='_blank'>Unsplash</a></li>
                <li>Movie descriptions and images:</li>
                <ul>
                    <li>
                        <a href="https://playandgo.com.au/top-gun-maverick-movie-review/">Top Gun</a>
                    </li>
                    <li>
                        <a href="https://www.imdb.com/title/tt10648342/">Thor</a>
                    </li>
                    <li>
                        <a href="https://www.orcasound.com/2022/06/11/paws-of-fury-the-legend-of-hank-new-trailer-and-poster-available/">Paws</a>
                    </li>
                    <li>
                        <a href="https://www.sonypictures.my/movies/bullet-train">Bullet Train</a>
                    </li>
                    <li>
                        <a href="https://www.imdb.com/title/tt9114286/">Black Panther</a>
                    </li>
                    <li>
                        <a href="https://www.imdb.com/title/tt1630029/">Avatar</a>
                    </li>
                </ul>
                <li>Learning resources</li>
                <ul>
                    <li><a href="https://www.w3schools.com/css/css_navbar.asp">W3 Navigation bar</a></li>
                    <li><a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox">CSS Flexbox</a></li>
                    <li><a href="https://dev.to/webdeasy/top-20-css-buttons-animations-f41">Animated button gradient</a></li>
                </ul>
            </ul>
        </details>
    </section>

    <?php include_once 'includes/footer.php'; ?>  
</body>

</html>
