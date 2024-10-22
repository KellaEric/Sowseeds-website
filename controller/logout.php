<?php
session_start();
//destroying session variables
unset($_SESSION["sessionId"]);
unset($_SESSION["sessionEmail"]);
unset($_SESSION["sessionFname"]);
unset($_SESSION["sessionLname"]);
echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
// header("Location:../admin/adminSignIn.php");
echo 'logged out';
echo <<<_GOTOSIGNIN
    <script>Swal.fire({
        icon: 'success',
        title: 'Goodbye',
        text: 'Logged out successfully'
    }).then(function() {
        window.location = "../admin/adminSignIn.php";
    });</script>
                                    
_GOTOSIGNIN;
?>
