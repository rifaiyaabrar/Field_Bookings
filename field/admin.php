<?php include 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <!-- fontawsome -->
    <script src="https://kit.fontawesome.com/42c7407e68.js" crossorigin="anonymous"></script>

</head>

<body class="container-main">

    <!-- navbar -->
    <div class="topnav">
        <a class="brand" href="#home">Football <br>Field</a>
        <a class="nav-link" href="#news">Logout</a>
        <a class="nav-link" href="#review">Reviews</a>
        <a class="nav-link" href="#appointments">Appointments</a>
    </div>

    <section class="header-section">
        <div class="header-div">

            <div class="header-img">
                <img style="width: 100%;" src="images/field.jpg" alt="mechanic image">
            </div>
            <div class="header">
                <h1 class="title-header">ADMIN <br> PANEL</h1>
            </div>
        </div>
    
    </section>
    

   

    <section class="available-section">
    <h2 class="section-header">Availability</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <select class="custom-select" name="status" id="custom-select-a" onchange="this.form.submit();" required>
        <option value="" disabled selected hidden>Choose</option>
        <option value="open">Open</option>
        <option value="closed">Closed</option>
    </select>
    </form>
    <?php
    $sts='';
    if(isset($_POST['status'])){
        $sts=filter_input(INPUT_POST,'status',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql= "UPDATE `field_status` SET `status` = '$sts' WHERE `field_status`.`id` = 1;";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <script>
        
        
    </script>
     <?php 
        $sql= 'SELECT * FROM booking_list WHERE status = "pending"';
        $result = mysqli_query($conn, $sql);
        $booking_list=mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    </section>

    <section  class="approval-section">
    <h2 style="color:white;"class="section-header">
                PENDING LIST
            </h2>
            <hr>
    <table class="list-table">
                <tr>
                    <th>Serial No</th>
                    <th>Client Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Booked Slots Date</th>
                    <th>Booked Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($booking_list as $client): ?>
                <tr>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['phone']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['slot_date']; ?></td>
                    <td><?php echo $client['slot_time']; ?></td>
                    <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <input type="hidden" name="hidden_id"value="<?php echo $client['id'] ?>" >
                    <button name="submit_bu" class="work-button" type="submit" onclick="location.reload();">Confirm</button><button name="submit_bd"class="work-button" type="submit" onclick="location.reload();">Delete</button></form></td>
                </tr>
                <?php endforeach; ?>
                <!-- <tr>
                    <td>3</td>
                    <td>Shiba</td>
                    <td>01839221282</td>
                    <td>Shiba@mail.com</td>
                    <td>4th July,2022</td>
                    <td>2:30 pm</td>
                    <td><button class="work-button" onclick="updateStatus()">Confirm</button><button class="work-button" onclick="deleteStatus()">Delete</button></td>
                </tr> -->
    </table>

    <?php 
    

    if(isset($_POST['submit_bu'])){
        
        $sql= "UPDATE booking_list SET status = 'confirmed' WHERE id = ".$_POST["hidden_id"].";";
        $result = mysqli_query($conn, $sql);
        

    }
    if(isset($_POST['submit_bd'])){
        
        $sql= "DELETE FROM `booking_list` WHERE `booking_list`.`id` = ".$_POST["hidden_id"].";";
        $result = mysqli_query($conn, $sql);
        // echo '<script>location.reload();</script>';

    }
   
    
    ?>
    </section>
    
    <?php 
        $sql= 'SELECT * FROM booking_list WHERE status = "confirmed"';
        $result = mysqli_query($conn, $sql);
        $booking_list=mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <section id="appointments" class="approval-section">
    <h2 style="color:white;"class="section-header">
                BOOKED LIST
            </h2>
            <hr>
    <table class="list-table">
                <tr>
                    <th>Serial No</th>
                    <th>Client Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Booked Slots Date</th>
                    <th>Booked Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($booking_list as $client): ?>
                <tr>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['phone']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['slot_date']; ?></td>
                    <td><?php echo $client['slot_time']; ?></td>
                    <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <input type="hidden" name="hidden_id"value="<?php echo $client['id'] ?>" >
                    <button class="work-button" onclick="document.location =  'mailto:<?php echo $client['email']; ?>'">Contact</button><button name="submit_bd"class="work-button" type="submit" onclick="location.reload();">Delete</button></form></td>
                </tr>
                <?php endforeach; ?>
             
    </table>

    <?php
        if(isset($_POST['submit_ru'])){
        
            $sql= "UPDATE review_list SET status = 'confirmed' WHERE booking_id = ".$_POST["hidden_id"].";";
            $result = mysqli_query($conn, $sql);
            
    
        }
        if(isset($_POST['submit_rd'])){
            
            $sql= "DELETE FROM `review_list` WHERE `review_list`.`booking_id` = ".$_POST["hidden_id"].";";
            $result = mysqli_query($conn, $sql);
            // echo '<script>location.reload();</script>';
    
        }
    ?>
    </section>
    <?php 
        $sql= 'SELECT * FROM review_list WHERE status = "pending"';
        $result = mysqli_query($conn, $sql);
        $review_list=mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <section id="review"class="approval-section">
    <h2 style="color:white;"class="section-header">
                PENDING REVIEW LIST
            </h2>
            <hr>
    <table class="list-table">
                <tr>
                    <th>Booking No</th>
                    <th>Review</th>
                    <th>Action</th>
                </tr>
                <?php foreach($review_list as $client): ?>
                <tr>
                    <td><?php echo $client['booking_id']; ?></td>
                    <td><?php echo $client['review_text']; ?></td>
                    <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <input type="hidden" name="hidden_id"value="<?php echo $client['booking_id'] ?>">
                    <button name="submit_ru" class="work-button" type="submit" onclick="location.reload();">Confirm</button><button name="submit_rd"class="work-button" type="submit" onclick="location.reload();">Delete</button></form></td>
                </tr>
                <?php endforeach; ?>
    </table>

 
    </section>
    <?php 
        $sql= 'SELECT * FROM review_list WHERE status = "confirmed"';
        $result = mysqli_query($conn, $sql);
        $review_list=mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <section class="approval-section">
    <h2 style="color:white;"class="section-header">
                REVIEWS LIST
            </h2>
            <hr>
    <table class="list-table">
                <tr>
                 <th>Booking No</th>
                 <th>Review</th>
                 <th>Action</th>
                </tr>
                <?php foreach($review_list as $client): ?>
                <tr>
                    <td><?php echo $client['booking_id']; ?></td>
                    <td><?php echo $client['review_text']; ?></td>
                    <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <input type="hidden" name="hidden_id"value="<?php echo $client['booking_id'] ?>" >
                    <button name="submit_rd"class="work-button" type="submit" onclick="location.reload();">Delete</button></form></td>
                </tr>
                <?php endforeach; ?>
               
    </table>

    
    </section>

    


                

                <!-- <script>alert(update_ID)</script> -->
                <!-- '<script>alert(update_ID);document.write(update_ID)</script> ' -->


            <!-- for date -->


               <?php 
                // $id_chnge= $_COOKIE["IDD"];
                // // echo $id_chnge;
                // if(isset($_POST['submit'])){
                //     $date=$dateErr='';
                //     if(empty($_POST['date'])){
                //         echo $dateErr='date is required';
                //       }else{
                //         // $date = preg_replace("([^0-9/])", "", $_POST['date']);
                //           $date = filter_input(INPUT_POST,'date',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                //         //   echo $date;
                //         //   echo $dateErr;
                //       }
                //     if(empty($dateErr)){
                //         $sql='';
                //         $sql="UPDATE appointments_list 
                //         SET date = '$date' 
                //         WHERE appointments_list.id = '$id_chnge'";
                //         echo "<meta http-equiv='refresh' content='0'>";
                //     }
                //     if(mysqli_query($conn, $sql)){
                //         //success
                //         // header("Location: admin.php");
                        
                //         // echo 'lessgoo';
                //       }else{
                //         echo 'Error: '. mysqli_error($conn);
                //       }
                // }

               
               ?>

              <!-- for mechanic -->


               <?php 
                // $id_chnge2= $_COOKIE["IDD2"];
                // // echo $id_chnge2;
                // if(isset($_POST['submit'])){
                //     $mechanic=$mechanicErr='';
                //     if(empty($_POST['mechanic'])){
                //         echo $mechanicErr='mechanic is required';
                //       }else{
                //         // $date = preg_replace("([^0-9/])", "", $_POST['date']);
                //           $mechanic = filter_input(INPUT_POST,'mechanic',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                //         //   echo $mechanic;
                //         //   echo $mechanicErr;
                //       }
                //     if(empty($mechanicErr)){
                //         $sql='';
                //         $sql="UPDATE appointments_list 
                //         SET mechanic = '$mechanic' 
                //         WHERE appointments_list.id = '$id_chnge2'";
                //         echo "<meta http-equiv='refresh' content='0'>";
                //     }
                //     if(mysqli_query($conn, $sql)){
                //         //success
                //         // header("Location: admin.php");
                        
                //         // echo 'lessgoo';
                //       }else{
                //         echo 'Error: '. mysqli_error($conn);
                //       }
                // }

               
               ?>

            </table>
        </div>
    </section>


    <section class="footer-section">
        <div class="footer-row">
            <div class="footer-left">
                <p class="footer-text">Football Field &copy; 2022 • Privacy Policy </p>
                <div class="footer-icons-div">
                    <i class="fa-brands fa-facebook-f footer-icons"></i>
                    <i class="fa-solid fa-envelope footer-icons-f"></i>
                    <i class="fa-brands fa-github footer-icons-f"></i>
                    <i class="fa-brands fa-twitter footer-icons-f"></i>

                </div>
            </div>
            <div class="footer-right">
                <p>
                    Football Field Services <br>
                    New lake road, gulshan ,<br> south badda, holding no. B 117/4 <br> Jhil park, Dhaka 1212
                </p>
                <p>Phone: <span style="color: #f85b5b;"> 01705478925</span> <br> Office: <span style="color: #f85b5b;">
                        01633528794</span></p>
            </div>
        </div>

        <div class="mapp">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7302.269749664342!2d90.41833001593788!3d23.77821101594866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c784fb2d1903%3A0xf969554f8ea777ab!2sToyota%20Motors%20And%20Car%20Servicing%20Center!5e0!3m2!1sen!2sbd!4v1656061966678!5m2!1sen!2sbd"
                width="400" height="300" style="border:0;float:right" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>

    <script>
        
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="js/script.js"></script>
</body>

</html>




