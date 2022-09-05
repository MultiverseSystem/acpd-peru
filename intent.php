<?php
        $utf = "senoraaaa";

        echo substr($utf,5,4) ."<br>";
        // output cake#
        echo mb_substr($utf,0,5);
        //output cakeæ

        
    

?>