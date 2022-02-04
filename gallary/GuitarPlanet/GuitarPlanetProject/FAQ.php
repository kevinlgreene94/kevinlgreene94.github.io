<!DOCTYPE html>
 <!--#Original Author: Kevin Greene #
 #Date Created: 1/28/2021 #
 #Version:  1 #
 #Date Last Modified: 1/28/2021 #
 #Modified by:  Kevin Greene #
 #Modification log: 1/28/2021- #Added FAQ.html, faq.css, faq.js
                              #Keeping styles and js seperate for organization
                              #Improved links to nav and sections
                    2/5/2021  #Improved NavBar  
                              #Added accordion and resized for mobile view 
                              
                    1/28/2022 #Converted to php for databasing          
     -->
    <head>
        <meta charset="utf-8">
        <meta name="description" content="GuitarPlanet Newsletter">
        <meta name="keywords" content="guitarplanet, guitar newsletter, news, famous guitar">
        <meta name="author" content="Kevin Greene">
        <meta name="viewport" content="width=device-width initial scale=1.0">
        <title>GuitarPlanet&#x1f3b8;</title>

        <!--Stylesheet Links-->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/faq.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&display=swap" rel="stylesheet">
        
    </head>

    <body>
        <header class="lighttheme">
            <h1><a href = "index.php"> <img src="images/logo.svg" alt = "logo">Welcome to GuitarPlanet <img src="images/logo.svg"></a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home </a></li>
                    <li><a href="index.php#join">Sign Up </a></li>
                    <li><a href="FAQ.php">FAQ's </a></li>
                    <li><a href="contact.php">Contact </a></li>
                    
                </ul>
            </nav>
            </header>

        <main class = "lighttheme">
        
            <h1>FAQ's</h1>
            <div id="accordion">
                <h3><a href="">Is the information you provide factual?</a></h2>
                <div>
                  <p>The news I report is fictitious and serves as content for my project.</p>
                 </div> <br><br>
                <h3><a href="">Is Elvis really dead?</a></h2>
                <div>
                    <p>Probably</p>
                </div><br><br>
                <h3><a href="">Doesn't GuitarWorld already exist?</a></h2>
                <div>
                  <p>This is GuitarPlanet. We're just better.
                   </p>
                 </div><br><br>
                 <h3><a href="">How can I sign up for more ficticious information?</a></h2>
                 <div>
                  <p>You can sign up for our newsletter anytime by filling out the form <a href="index.html#join">here</a>.
                  </p>
                </div><br><br>
            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="js/accordion.js"></script>
            <script src="js/faq.js"></script>
        </main>
        
        
        <footer class="lighttheme">
            <div>
                <a href="mailto:guitarplanet@fake.com">Email: guitarplanet@fake.com</a> <br>
                <a href="Tel:18005551234">Telephone: 1(800)555-1234</a> <br>
            </div>
            GuitarPlanet Copyright &copy; <br>
            <a href="instagram.com" target="_blank"><img src="images/instagram.png" alt="instagram icon"></a>
            <a href="twitter.com" target="_blank"><img src="images/twitter.png" alt="twitter icon"></a>
    </footer>

    </body>
</html>