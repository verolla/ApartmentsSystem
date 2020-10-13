

<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Adminstyles.css" />
        <h1><center> <a href="adminindex.php"><img src="../Nyumbaimages/nyu.jpg" width="120" height="50"></img></a>NYUMBA ADMIN PANEL</center></h1>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">             
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="add.php">Add</a></li>
                    <li><a href="delete.php">Delete</a></li>
                    <li><a href="update.php">Update</a></li>
                    <li><a href="view.php">View</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                <?php echo $sidebar; ?>
                <p><h3> RECENT CHANGES</h3></p>
            </div>
           
            
            <footer>
                <p>All rights reserved 2018. <a href="../index.php">Go to homepage</a></p>
            </footer>
        </div>
    </body>
</html>
