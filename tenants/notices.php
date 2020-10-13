<?php
//How to select data from more than one table joined by PK
$sel="SELECT users.email, users.password, data.data_1, data.data_2
FROM users,data 
WHERE users.email='$user_email' AND users.user_id=data.user_id";
$sel1="SELECT 
    users.email, users.password, data.data_1, data.data_2 FROM users INNER JOIN data ON users.user_id=data.user_id WHERE users.email='$user_email'";
    $sel2="SELECT u.user_id, u.email, u.password, u.last_login
FROM users u
JOIN userData ud ON (u.userID = ud.userID)";

?>