<!DOCTYPE html>
<!--#Original Author: Kevin Greene #
#Date Created: 1/26/2021 #
#Version:  1 #
#Date Last Modified: 1/29/2021 #
#Modified by:  Kevin Greene #
#Modification log: 1/26/2021- #Copied last weeks project to new folder
                              #Placed information into table for better visual design
                              #Created table stylesheet and added styling to new table design
                              #Improved footer
                              #Improved mobile view

                   1/28/2021- #Added FAQ.html, faq.css, faq.js
                              #Keeping styles and js seperate for organization
                              #Improved links to nav and sections

                    2/5/2021  #Improved NavBar  
                              #Added news into cycle2 plugin and deleted table
                              #Tweaked mobile view with breakpoints in p content

                    2/17/2021 #Created logo and added to header
                              #Improved slideshow animations

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
        <link rel="stylesheet" href="css/table.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="lighttheme">
        <h1><a href = "index.php"> <img src="images/logo.svg" alt = "logo">Welcome to GuitarPlanet <img src="images/logo.svg"></a></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home </a></li>
                <li><a href="#join">Sign Up </a></li>
                <li><a href="FAQ.php">FAQ's </a></li>
                <li><a href="contact.php">Contact </a></li>
                
            </ul>
        </nav>
        </header>

     <main>


        <!--News Section inside Cycle2 linked to plugin.js-->
        <div class="lighttheme container">
            <span id="prev"><a href="">&lt;&lt;Prev &nbsp; &nbsp;</a> </span>
            <span id="next"> <a href="">Next&gt;&gt;</a></span> <br><br>
        
            <div class="cycle-slideshow" 
                 data-cycle-fx="shuffle"
                 data-cycle-timeout="7000"
                 data-cycle-slides="div"
                 data-cycle-prev="#prev"
                 data-cycle-next="#next"
                 data-cycle-center-horz="true"
                 data-cycle-center-vert="true">
             
            
                     <div>This week in the news Fender has a peach burst stratocaster from their <br> "Rockstar Collection" signed by Eddie Van
                      Halen, Slash, Angus Young, Tom Morello, and Tony Iommi available for purchase at $658,000. <br><br>
                     <img src="images/signed.png" alt = "signed guitar"></div>

                 <div>In other news, Elvis has been spotted in Costa Rica! <br>
                     Turns out the King didn't die on the throne. <br><br>
                     <img src="images/elvis.png" alt = "old Elvis">
                 </div>

                 <div> Robber the Raccoon just released his debut blues album "Rocks on the<br> Trash Can Lid". The album has had mixed reviews thus far which could
                     be a result of the language barrier. <br> <br>
                     <img src="images/Robber.png" alt = "Raccoon with guitar">
                 </div>
                
                   <div>  Famous Mexican-American guitar player Carlos Santana <br>stubbed and broke his toe on an amplifier last night in  Chula Vista while performing at
                         the North Island Credit Union Amphitheatre. <br>The remaining stops on his tour have been postponed until further notice. <br> <br>
                        <img src="images/Santana.png" alt = "funny Carlos Santana">
                    </div>
                </div>
        </div>

         <!--Create Form for Email List-->
            <div class="lighttheme letterdiv" id="join">
                <form id="email_form" name="email_form" action="join.php" method="get">
                    <h1>Sign up for our weekly email list!</h1>
                    <div>
                        <label for="email_1">Enter Your Email Here>></label>
                        <input type="text" id="email_1" name="email_1"><br>
                        <span id="email_1_error">*</span>
                    </div>
                    <br>
                    <div>
                        <label for="email_2">Re-enter Your Email Here>></label>
                        <input type="text" id="email_2" name="email_2"><br>
                        <span id="email_2_error">*</span>
                    </div>
                    <br>
                    <div>
                        <label for="first_name">Enter Your First Name Here>></label>
                        <input type="text" id="first_name" name="first_name"><br>
                        <span id="first_name_error">*</span>
                    </div>

                    <div>
                        <input type="submit" id="join_list" value="Join List">
                        <input type="button" id="clear_form" value="Clear Form">
                    </div>
                </form>
            </div>
     </main>

     <!--link to javascript file-->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="js/guitarplanet.js"></script>
     <script src="js/plugins.js"></script>
     <script src="https://malsup.github.io/jquery.cycle2.shuffle.js"></script>
     


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