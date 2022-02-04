

<!DOCTYPE html>
<!--#Original Author: Kevin Greene #
#Date Created: 1/29/2021 #
#Version:  1 #
#Date Last Modified: 1/29/2021 #
#Modified by:  Kevin Greene #
#Modification log: 1/29/2021  #Created contact page and copied html from index
                              #****Added inline style to footer for this page only. Footer position necessary****
                   2/5/2021   # Improved NavBar

                   2/17/2021 #Improved mobile view sizing

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
        <link rel="stylesheet" href="css/contact.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="lighttheme">
            <h1><a href = "index.php"> <img src="images/logo.svg" alt = "logo">Welcome to GuitarPlanet <img src="images/logo.svg"></a></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home </a></li>
                    <li><a href="index.php #join">Sign Up </a></li>
                    <li><a href="FAQ.php">FAQ's </a></li>
                    <li><a href="contact.php">Contact </a></li>
                    
                </ul>
            </nav>
            </header>

     <main>
         <!--Create Form for Contact Page-->
            <div class="lighttheme" id="join">
                <form id="contact_form" name="contact_form" action="join.php" method="post">
                    <h1>Got some feedback?</h1>

                    <label for="nameBox">What's your name?</label>
                    <input id="nameBox" type="text" name="name_box"/> <br>
                    <span id="name_error"></span> <br>

                    <label>What's the reason for your contact? &nbsp;</label> <br> <br>
                    <div class = "contactBox">
                        <input name="contact" type="radio" id="question" value="1" checked="true">
                        <label for="#question">Question &nbsp;</label> <br>

                        <input name="contact" type="radio" id="issue" value="2">
                        <label for="#issue">Site bug &nbsp;</label> <br>

                        <input name="contact" type="radio" id="complaint" value="3">
                        <label for="complaint">Complaint &nbsp;</label> <br>

                        <input name="contact" type="radio" id="other" value="4">
                        <label for="#other">Other &nbsp;</label><br> <br>
                    </div>

                    <label for="#comment">Comment:</label>
                    <textarea id="comment" name='comment'></textarea> <br>
                    <span id="comment_error"></span> <br>

                    <input type="submit" id="submit" value="Submit">
                    <input type="button" id="clear" value="Clear Form">
                </form>
            </div>
     </main>

     <!--link to javascript file-->
     <script src="js/contact.js"></script>
    </body>
    
</html>