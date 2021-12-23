<?php
        //database connection variables
        // $host= "lapideomultiservices.com";
        // $dbname = "lapideom_database";
        // $uname = "lapideom_root";
        // $pword = "L@pideom08";
         $host= "localhost";
        $dbname = "lapideom_database";
        $uname = "root";
        $pword = "root";

        //variables from contact-form
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $name ." ". "is requesting a call back for their business consultation";

        //Mail variables
        $from = $email;
        $to = "info@lapideomultiservices.com";
        $subject = "Call Back Request";
        $message = $msg;
        $headers = "From:" . $from;

        $sql = "INSERT INTO `call_back_request_table` (`userid`, `name`, `email`, `created_at`) VALUES (NULL, '$name', '$email', CURRENT_TIMESTAMP)";

        //db connection
        $con = mysqli_connect($host,$uname,$pword,$dbname);

        //check connection
        if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        }
        echo "connected successfully";

        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
                mail($to,$subject,$message,$headers);
                echo "message sent successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            mysqli_close($con);
    ?>