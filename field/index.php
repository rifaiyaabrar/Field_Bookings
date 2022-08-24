<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'config/database.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <!-- fontawsome -->
    <script src="https://kit.fontawesome.com/42c7407e68.js" crossorigin="anonymous"></script>

</head>

<body class="container-main">

    <!-- navbar -->
    <div class="topnav">
        <a class="brand" href="#header-section">Football <br>Field</a>
        href="#contact">Contact
        <a class="nav-link" href="#contact">Contact</a>
        <a class="nav-link" href="#appo">Book</a>
        <a class="nav-link" href="#review-section">Review</a>
    </div>

    <section class="header-section" id="header-section">
        <div class="header-div">

            <div class="header-img">
                <img style="width: 100%;" src="images/field.jpg" alt="mechanic image">
            </div>
            <div class="header">
                <h1 class="title-header">BOOK YOUR <br> SLOTS NOW!</h1>
            </div>
        </div>
    </section>
    <div class="work">
        <div class="work-card work-card-first">
            <h3 class="work-header">ROOF SYSTEM</h3>
            <hr>
            <div class="icon"><i class="fa-solid fa-people-roof fa-2xl"></i></div>
            <p class="work-p">
                We have a roof, so that you dont have to be afraid of sunheat.
            </p>
            <button class="work-button">Book</button>
        </div>
        <div class="work-card">
            <h3 class="work-header">DRESSING ROOM</h3>
            <hr>
            <div class="icon"><i class="fa-solid fa-shower fa-2xl"></i></div>
            <p class="work-p">
                Have a dressing for each team, so you take shower and rest as you wish.
            </p>
            <button class="work-button">Book</button>
        </div>
        <div class="work-card work-card-last">
            <h3 class="work-header">AIR CONDITIONED</h3>
            <hr>
            <div class="icon"><i class="fa-solid fa-fan fa-2xl"></i></div>
            <p class="work-p">
                Always keeping you cool all the time in our air conditioned facility.
            </p>
            <button class="work-button">Book</button>
        </div>

    </div>

    <section class="about-us" id="about">
        
        <div class="div-f">
            <?php
             $sql= 'SELECT * FROM review_list WHERE status = "confirmed"';
             $result = mysqli_query($conn, $sql);
             $review_list=mysqli_fetch_all($result, MYSQLI_ASSOC);
             foreach($review_list as $client):
            ?>
        <div  class="us-container fade mySlides">
            
            <div class="activities us-sub img_review">
               <blockquote style="font-size: 3rem;">
                <q><?php echo $client['review_text']; ?></q> 
               </blockquote>
            </div>
            <div class="why-us us-sub">
                <p style="text-align: center"><?php echo $client['name']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- <div  class="us-container fade mySlides">
            <div class="activities us-sub img_review">
               <blockquote style="font-size: 3rem;">
                <q>The field is really good!</q> 
               </blockquote>
            </div>
            <div class="why-us us-sub">
                <p style="text-align: center">Asiffff</p>
            </div>
        </div>

        <div  class="us-container fade mySlides">
            <div class="activities us-sub img_review">
               <blockquote style="font-size: 3rem;">
                <q>The field is really good!</q> 
               </blockquote>
            </div>
            <div class="why-us us-sub">
                <p style="text-align: center">Asiffff</p>
            </div>
        </div> -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
   

       
    </section>
    <section class="schedule-section" id="schedules">
      
      <div class="schedule-text">
      <div class="schedule-title">
         <h1 class="title-header2">
            Look at All The<br> booked slots From This Week!
         </h1>
      </div>
      <div class="schedule-list">
         <ul>
            <?php
            
            //  echo $day1;
            // mysqli_stmt_bind_param($day1,'asd');
            $datetime = new DateTime(date("Y/m/d"));
            //  $datetime->modify('+1 day');
            $day = new DateTime(date("l"));
            $day1= $datetime->format('Y-m-d');

            
            

            $stmt = $conn->prepare('SELECT * FROM `booking_list` WHERE `slot_date`= ? AND `status` = "confirmed"');
            $stmt->bind_param("s", $day1);
           
             $stmt->execute();
             $result = $stmt->get_result();
             $week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            ?>

            <li><?php echo $day->format('l');?> slots : <span class="time-table"><?php foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?>
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?>
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?>
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?> 
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?>
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
                <?php $datetime->modify('+1 day');$day1= $datetime->format('Y-m-d');$stmt->execute();$result = $stmt->get_result();$week_list = mysqli_fetch_all($result, MYSQLI_ASSOC);?>
            <li><?php $day->modify('+1 day'); echo $day->format('l');?> slots : <span class="time-table"><?php  foreach($week_list as $client): ?><span class="slot"><?php echo $client['slot_time']; ?></span><?php endforeach;?></span></li>
         
            </ul>
      </div>
      </div>
    </section>
   
    <section class="appointment-section" id="appo">
        <h2 class="section-header">BOOK YOUR SLOT</h2>
        <hr>
        <?php
           $name = $phone = $email = $slot_date = $slot_time = $review ='';
           $nameErr = $phoneErr = $emailErr = $slot_dateErr = $slot_timeErr = $reviewErr='';
           
        //    form submit
          if(isset($_POST['submit'])){
            // validate name
            // echo 'lalaa';
            if(empty($_POST['name'])){
              $nameErr='Name is required';
            }else{
                $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // $name='aaaaa';
            }
             // validate phone
            if(empty($_POST['phone'])){
                $phoneErr='phone is required';
              }else{
                  $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_NUMBER_INT);
              }
               // validate address
            if(empty($_POST['email'])){
                $emailErr='email is required';
              }else{
                  $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              }
               // validate car_license
            if(empty($_POST['slot_date'])){
                $slot_dateErr='slot_date is required';
              }else{
                  $slot_date = filter_input(INPUT_POST,'slot_date',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              }
               // validate car_engine
            if(empty($_POST['slot_time'])){
                $slot_timeErr='slot_time is required';
              }else{
                  $slot_time = filter_input(INPUT_POST,'slot_time',FILTER_SANITIZE_NUMBER_INT);
              }
               // validate date
            // if(empty($_POST['review'])){
            //     $reviewErr='review is required';
            //   }else{
            //     // $review = preg_replace("([^0-9/])", "", $_POST['review']);
            //       $review = filter_input(INPUT_POST,'review',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //   }
            

              if(empty($nameErr) && empty($phoneErr) && empty($addressErr) && empty($slot_dateErr) && empty($slot_timeErr) && empty($reviewErr)){
                try {
                // add to data base
                $sql= "INSERT INTO booking_list (name, phone, email, slot_date, slot_time) VALUES ('$name', '$phone', '$email', '$slot_date', '$slot_time')";
                
                // if (mysqli_errno() == 1062) {
                // echo '<script type="text/JavaScript">
                // alert("Slot is taken!");
                // </script>';
                // }
                if(mysqli_query($conn, $sql)){
                    //success
                    // header("Location: admin.php");
                    // echo 'lessgoo';
                  }else{
                    echo 'Error: '. mysqli_error($conn);
                  }
                } catch (\Throwable $th) {
                    echo '<script type="text/JavaScript">
                    alert("Slot is taken!");
                    </script>';
                }
              }
              
          }
        //   echo $dateErr;
        //   echo $date;
          

        ?>


        <div class="appointment-form">


   <!-- temporary figuring out slots          -->
<?php  
        // $shakti;
        // $Ejaz;
        // $Aosaf;
        // $booked="True";
        // function slots($number){
        //     global $booked;
        //     if ($number>=1){
        //         $booked=True;
        //         return "Booked";
        //     }
        //  }
        // $sql='';
        // $sql= 'SELECT COUNT(mechanic) AS Appointments FROM appointments_list WHERE mechanic="Shaktiman";';
        // $result = mysqli_query($conn, $sql);
        // while($row = $result->fetch_assoc()) {
        //     $shakti=(int)$row["Appointments"];
            
        // }
        // $sql='';
        // $sql= 'SELECT COUNT(mechanic) AS Appointments FROM appointments_list WHERE mechanic="Ejaz";';
        // $result = mysqli_query($conn, $sql);
        // while($row = $result->fetch_assoc()) {
        //     $Ejaz=(int)$row["Appointments"];
        // }
        // $sql='';
        // $sql= 'SELECT COUNT(mechanic) AS Appointments FROM appointments_list WHERE mechanic="Aosaf";';
        // $result = mysqli_query($conn, $sql);
        // while($row = $result->fetch_assoc()) {
        //     $Aosaf=(int)$row["Appointments"];
        // }
        // $sql='';
        // $sql= 'SELECT COUNT(mechanic) AS Appointments FROM appointments_list WHERE mechanic="Riyadh";';
        // $result = mysqli_query($conn, $sql);
        // while($row = $result->fetch_assoc()) {
        //     $Riyadh=(int)$row["Appointments"];
        // }
        // $sql='';
        // $sql= 'SELECT COUNT(mechanic) AS Appointments FROM appointments_list WHERE mechanic="Meshal";';
        // $result = mysqli_query($conn, $sql);
        // while($row = $result->fetch_assoc()) {
        //     $Meshal=(int)$row["Appointments"];
        // }
    
    ?>
         <!-- ******************* -->


            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="myForm" method="POST" autocomplete="off">
                <div class="inline-formcell">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="inline-formcell">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="formcell-wholeline">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="inline-formcell third">
                    <label for="slot_date">Date</label>
                    <input type="date" id="slot_date" name="slot_date" placeholder="Select Date" required>
                </div>
                <!-- <div class="inline-formcell third">
                    <label for="slot_time">Time</label>
                    <input type="time" id="slot_time" name="slot_time" required>
                </div> -->
                
                    
                    <div class="inline-formcell">
                        <label for="custom-select">Time</label>
                        <select class="custom-select" name="slot_time" id="custom-select" required>
                            <option value="" disabled selected hidden>Choose Your Time</option>
                            <option value="1">Slot-1 : 2:00</option>
                            <option value="2">Slot-2 : 3:30</option>
                            <option value="3">Slot-3 : 5:00</option>
                            
                        </select>
                    </div>

               <br>
                <input type="submit" class="Submitbtn" value="Submit" name='submit'>


            </form>
        </div>

        <?php
      $sql= 'SELECT * FROM field_status ';
      $result = mysqli_query($conn, $sql);
      $field_status=mysqli_fetch_all($result, MYSQLI_ASSOC);
      
      foreach($field_status as $client):
      if($client['status']=="closed"){
        echo '<script>document.getElementById("appo").style.display="none";</script>';
        echo '<script>
        document.querySelector(".title-header2").innerHTML="WE ARE CLOSED FOR NOW SORRY!"
        document.querySelector(".schedule-list").style.display="none";
        </script>';
      }
      else{
        echo '<script>document.getElementById("appo").style.display="block";</script>';
        echo '<script>
        document.querySelector(".title-header2").innerHTML="Look at All The<br> booked slots From This Week!"
        document.querySelector(".schedule-list").style.display="unset";
        </script>';
        
      }
       endforeach;
       ?>
    </section>
    
    <?php
           $myreview = $bookingno = $name='';
           $myreviewErr = $bookingnoErr =$name='';
           
        //    form submit
          if(isset($_POST['submit2'])){
            // validate name
            // echo 'lalaa';
            if(empty($_POST['myreview'])){
              $myreviewErr='review is required';
            }else{
                $myreview = filter_input(INPUT_POST,'myreview',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // $name='aaaaa';
            }
             // validate phone
            if(empty($_POST['bookingno'])){
                $bookingnoErr='bookingno is required';
              }else{
                  $bookingno = filter_input(INPUT_POST,'bookingno',FILTER_SANITIZE_NUMBER_INT);
              }
              if(empty($_POST['name'])){
                $nameErr='name is required';
              }else{
                  $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                  // $name='aaaaa';
              }
               // validate date
            // if(empty($_POST['review'])){
            //     $reviewErr='review is required';
            //   }else{
            //     // $review = preg_replace("([^0-9/])", "", $_POST['review']);
            //       $review = filter_input(INPUT_POST,'review',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //   }
            

              if(empty($myreviewErr) && empty($bookingnoErr) && empty($nameErr)){
                // add to data base
                $sql= "INSERT INTO review_list (review_text, booking_id, name) VALUES ('$myreview', '$bookingno','$name')";
                
               
                
                // if (mysqli_errno() == 1062) {
                // echo '<script type="text/JavaScript">
                // alert("Slot is taken!");
                // </script>';
                // }
                if(mysqli_query($conn, $sql)){
                    //success
                    // header("Location: admin.php");
                    // echo 'lessgoo';
                  }else{
                    echo 'Error: '. mysqli_error($conn);
                  }
              }
              
          }
        //   echo $dateErr;
        //   echo $date;
          

        ?>
    <section id="review-section"class="review-section">
       <div>
        <h2 class="section-header">GIVE YOUR REVIEWS HERE!</h2>
        <hr>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" id="review-form" class="review-form">
        <input type="text" class="review-text" name="myreview" placeholder="Write your Review">
        <input type="text" class="book-no" name="bookingno" placeholder="Your Booking No:">
        <input type="text" class="book-no" name="name" placeholder="Your Name:">
        <input type="submit" class="Submitbtn" value="Submit" name='submit2'>
        </form>
    
       </div>
    </section>
    <section class="banner-section">
        <div class="banner">
            <h1 class="banner-header">NO BETTER FIELD ANYWHERE</h1>
            <!-- <button class="banner-btn">Contact Us</button> -->
            <button class="banner-btn">CONTACT</button>
        </div>
    </section>

    <section class="footer-section" id="contact">
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
                    Football Field Service <br>
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




<script type="text/javascript">
    // querySelector('.Submitbtn').addEventListener("click",function(){
    //     document.getElementById("myForm").reset();
    // })

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
</script>

<script src="js/script.js"></script>

<!-- <script type="text/javascript">

alert(cstatus);
if(cstatus==="closed"){
  document.getElementById("appo").style.display="none";
}
</script> -->
</body>

</html>