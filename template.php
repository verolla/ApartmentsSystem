<!DOCTYPE html>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
        <!--<link rel="stylesheet" type="text/css" href="admin/afyaBackend/ourown.css" />-->
        <h1><center> <a href="index.php"><img src="Nyumbaimages/nyu.jpg" width="120" height="50"></img></a>NYUMBA APARTMENTS</center></h1>
        <style>
        a:active {
    background-color: yellow;
    color:green;
}
    </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">             
            </div>
            
            <nav id="navigation">
                <ul id="nav"><h2>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="tenants/index.php">TENANT</a></li>
                    <li><a href="LANDLORD/index.php">LANDLORD</a></li>
                    <li><a href="createaccount.php">SIGNUP</a></li>
</h2>
                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                <?php echo $sidebar; ?>
            </div>
           
            
            <footer>
                <p>All rights reserved 2018. <b><a href="admin/afyaBackend/index.php">ADMIN LOGIN</a></b></p>
            </footer>
        </div>
    </body>
</html>
