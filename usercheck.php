<?php session_start();

require "dbutil.php";

$db = DbUtil::loginConnection();
$stmt = $db->stmt_init();
$username = $_GET['inputEmail'];


if($stmt->prepare("SELECT * FROM Users WHERE username = '".$username."'")) {
                $stmt->execute();
                $stmt->bind_result($user, $pass, $admin);
                $stmt->fetch();
                if ($user == $username){
                    echo "User Found";
                }

                else {
                    echo "User not Found";
                }
                
                }
                
?>
