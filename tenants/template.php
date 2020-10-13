<html>
    <head>
        
        
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="../admin/Adminstyles.css" />
        <h1><center> <a href="../index.php"><img src="../Nyumbaimages/nyu.jpg" width="120" height="50"></img></a>NYUMBA TENANT PORTAL</center></h1>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">             
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <?php echo $nav; ?>

                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                <?php echo $sidebar; ?>
                <p><h3> NOTIFICATIONS TAB</h3></p>
                <li><a href="">Notice!!</a></li>
            </div>
           
            
            <footer>
                <p>All rights reserved 2018. <a href="../index.php">Go to home</a></p>
            </footer>
        </div>
    </body>
</html>