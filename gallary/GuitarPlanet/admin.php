
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
<?php
try {
    $dsn = 'mysql:host=localhost;dbname=kGreeneGuitarWorld';
    $username = 'root';
    $password = 'Pa$$w0rd';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "DB Error" . $error_message;
    exit();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_visits';
    }
}
switch ($action) {
    case 'list_visits':
        $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
        if ($employee_id == NULL || $employee_id == FALSE) {
            $employee_id = filter_input(INPUT_POST, 'employee_ID', FILTER_VALIDATE_INT);
            if ($employee_id == NULL || $employee_id == FALSE) {
                $employee_id = 1;
            }
        }

        try {//set query, prepare, bind if needed, execute
            $queryEmployee = 'SELECT * FROM employee';
            $statement1 = $db->prepare($queryEmployee);
            $statement1->execute();
            $employees = $statement1;

            $queryVisit = 'SELECT comments.first_name, '
                    . ' comments.comment_ID, comments.contact_reason, '
                    . ' comments.user_comment, comments.comment_date, comments.employee_ID '
                    . ' FROM comments '
                    . ' JOIN employee on comments.employee_ID = employee.employee_ID '
                    . ' WHERE employee.employee_ID = :employee_ID '
                    . ' ORDER BY comment_date';

            $statement2 = $db->prepare($queryVisit);
            $statement2->bindValue(':employee_ID', $employee_id);
            $statement2->execute();
            $comments = $statement2;
        } catch (Exception $ex) {
            
        }
        break;

    case 'delete_comment':
        $comment_ID = filter_input(INPUT_POST, 'comment_ID', FILTER_VALIDATE_INT);
        $queryDelete = 'DELETE FROM comments WHERE comment_ID = :comment_ID';
        $statement3 = $db->prepare($queryDelete);
        $statement3->bindValue(':comment_ID', $comment_ID);
        $statement3->execute();
        $statement3->closeCursor();
        header("Location: admin.php?employee_id=$employee_id");
        break;
    default:
        break;
}
?>
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
    <p class="lighttheme">In this next project I intend to call on the database for user comments and use 
        this page to display those comments for employees to review. I will also add
        a function that lets the employee update or delete the comment. I believe this
        will be similar to the lab we completed for the task list and I intend
        on implementing this functionality in the same way.
    </p>
    <main>
        <div class ='lighttheme'>
            <section>
                <aside class='container'>
                    <ul>
                        <?php foreach ($employees as $employee): ?>
                            <li> 
                                <a href="?employee_id=<?php echo $employee['employee_ID']; ?>">
                                    <?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
                <h1>User Comments</h1>
                <table class='container'>
                    <thead>
                    <th class='lighttheme'>First Name</th>
                    <th class='lighttheme'>Reason For Contact</th>
                    <th class='lighttheme'>Comment</th>
                    <th class='lighttheme'>Comment Date</th>
                    </thead>

                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td class='lighttheme'>
                                <?php echo $comment['first_name']; ?>
                            </td>
                            <td class='lighttheme'>
                                <?php echo $comment['contact_reason']; ?>
                            </td>
                            <td class='lighttheme'>
                                <?php echo $comment['user_comment']; ?>
                            </td>
                            <td class='lighttheme'>
                                <?php echo $comment['comment_date']; ?>
                            </td>
                            <td>
                                <form action="admin.php" method="POST">
                                    <input type="hidden" name="employee_ID"
                                           value="<?php echo $comment['employee_ID'] ?>"/>
                                    <input type="hidden" name="action" value="delete_comment"/>
                                    <input type="hidden" name="comment_ID" 
                                           value="<?php echo $comment['comment_ID']; ?>"/>
                                    <input type="submit" value="Delete"/>
                                </form>
                            </td>

                        </tr> 
                    <?php endforeach; ?>

                </table>

            </section>
        </div>        
    </main>
</body>
</html>

