<?php
    if(isset($_GET['voterid']))
    {
        echo "<center>Your Account Has Been Created Successfully</center>";
        echo "<center>You Can Now Login Using Voter Id.</center>";
        echo "<center>Your Voter Id Is : <b>" . $_GET['voterid'] . "</b></center>";
    }
?>