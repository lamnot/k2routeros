 <?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        //header("WWW-Authenticate: Basic realm=\"Private Area\"");
        //header("HTTP/1.0 401 Unauthorized");
        //print "Sorry - you need valid credentials to be granted access!\n";
        exit;
    } else {
        if (($_SERVER['PHP_AUTH_USER'] == 'k2logink4g') && ($_SERVER['PHP_AUTH_PW'] == 'K2wan%nch1k4w*ndPa')) {
            //print "Welcome to the private area!";
        } else {
            //header("WWW-Authenticate: Basic realm=\"Private Area\"");
            //header("HTTP/1.0 400 Unauthorized");
            //print "Sorry - you need valid credentials to be granted access!\n";
            exit;
        }
    }
?> 