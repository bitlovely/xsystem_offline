<?php
require "../init.php";

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "logout":
            session_destroy();
            header("Location: index.php");
            die;
    }
}

if (
    !empty(a78Bf8d35765Be2408C50712CE7a43aD::$request["username"]) &&
    !empty(a78Bf8D35765bE2408c50712CE7a43aD::$request["password"])
) {
    $f566700a43ee8e1f0412fe10fbdf03df->query(
        "SELECT * FROM `users` WHERE `username` = '%s' AND `password` = '%s' AND (`exp_date` >= " . time() . " OR `exp_date` is null) LIMIT 1",
        a78Bf8D35765bE2408C50712CE7a43AD::$request["username"],
        a78Bf8D35765BE2408C50712Ce7a43AD::$request["password"]
    );

    $_SESSION["cl_data"] = $f566700a43ee8e1f0412fe10fbdf03df->F1eD191D78470660EdFf4A007696bC1f();
    die;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Client_Login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
    <div style="height:136px; width:100%; background-image:url(images/back_line_login.png); margin-top:22%;"></div>
    
            <!--   Center Arrow and Logo Code   -->
   			<center>
                <div style="width:378px; height:494px; background-image:url(images/login_card.png); margin-top:-315px;">
                            		
    
			
            <!--   Form Code   -->

                    <form id="login"  method="post" action="index.php">
                          <fieldset id="inputs_login">
                              <input id="username" placeholder="username" name="username" autofocus required type="text">
                              </br> </br>
                              <input id="password" name="password" placeholder="password" required type="password">
                          </fieldset>
                          <fieldset id="actions">
                          		<input id="submit" value="" type="submit">
                          </fieldset>
                      	</form>
					</div>
                    <?php
                        session_start();

                        if (
                            empty($_SESSION["client_loggedin"]) || 
                            $_SESSION["client_loggedin"] !== true || 
                            empty($_SESSION["cl_data"])
                        ) {
                            header("Location: live.php");
                            exit;
                        }

                        if (!empty($A311af351a57a1d9580a9fe53b473019)) {
                            echo '<font color="red">' . $A311af351a57a1d9580a9fe53b473019 . '</font>';
                        }

                        if (!empty($_GET["action"])) {
                            if ($f566700a43ee8e1f0412fe10fbdf03df->d1e5CE3B87Bb868B9e6efd39AA355a4f() > 0) {
                                $_SESSION["client_loggedin"] = true;
                            }
                        } else {
                            // Redirect to 'live.php' if 'action' GET parameter is missing
                            header("Location: live.php");
                            exit;
                        }
                    ?>
            </center>
	</body>
</html>
