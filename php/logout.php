<?php

    session_start();
    session_destroy();


echo "       <!doctype html>
            <html>
            <head>
                <title>Sweet Alert Plugin</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                

            </head>
                </html>";
	echo " 
    <script type='text/javascript'>
    
    swal('Hasta la vista baby');
       
        setTimeout(function(){  location.href ='../index.html'; }, 1000);
        
        </script>";
?>