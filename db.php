<?php
           
        $conn=new mysqli("localhost","root","","kartik");
        if($conn->connect_error){
            die($conn->connect_error);
        }