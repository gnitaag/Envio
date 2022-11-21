<?php
/*foreach($_SESSION as $key => $value) {
            echo "$key = $value <br/>";
        }*/

if (session_destroy())
{
    success_msg("Logged out");
};

//header("Location: ?pg=home");
//die();

?>