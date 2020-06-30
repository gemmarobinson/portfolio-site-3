<?php
    /*----------------------------------------
        | Google Analytics
    ----------------------------------------*/

    # Function to show GA code only on live sites
    function sixth_google_analytics($accountID){
        $script = '
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-545469-59"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag("js", new Date());
                gtag("config", "'. $accountID .'");
            </script>
        ';

        // Only show on live sites
      	if ($_SERVER["SERVER_ADDR"] != '192.168.33.10' || $_SERVER['SERVER_NAME'] != 'dev.sixthstory.com') {
            return $script;
      	}
    }