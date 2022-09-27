<?php
include('dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $service=$_POST['service'];
    $appointment_time=$_POST['appointment_time'];
    $appointment_date=$_POST['appointment_date'];
    $appointment_no = mt_rand(1000, 9999);

    $query = mysqli_query($con, "insert into appointments(appointment_no, first_name, last_name,
            email, service, appointment_time, appointment_date) value('$appointment_no',
            '$first_name', '$last_name', '$email', '$service', '$appointment_time', '$appointment_date')");
    
    if($query)
        {
            echo "<script>window.location.href='makeAppointmentForm.php'</script>";
        }
    else{
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="makeAppointmentForm_style.css" type="text/css">
    <script src="https://kit.fontawesome.com/5b7ad2b792.js" crossorigin="anonymous"></script>


    <title>Forever Beauty Salon</title>
    
</head>

<body>
    <nav> 
        <div class="max-width">      
        <span><a href="home.php" class="fas fa-spa">Forever Beauty Salon</a></span>
        <label for="btn" class="icon">
            <span class="fa fa-bars"></span>
        </label>
         <input type="checkbox" id="btn"/>
        
        
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="#">Services</a>
                <ul>
                    <li><a href="hair.php">Hair</a></li>
                    <li><a href="makeup.php">Makeup</a></li>
                    <li><a href="nails.php">Nails</a></li>
                    <li><a href="facialTreatments.php">Facial Treatments</a></li>
                    <li><a href="bodyTreatments.php">Body Treatments</a></li>
                 </ul>
            </li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="prices.php">Prices</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="#">My Account</a>
                    <ul>
                        
                        <?php
                            if(isset($_SESSION["myid"]))
                            {
                                if(isset($_SESSION['mytype']) && $_SESSION['mytype'] == "admin")
                                {
                                    echo "<li><a href='adminDashboard.php'>Admin Panel</a></li>";
                                }
                                if(isset($_SESSION['mytype']) && $_SESSION['mytype'] == "client")
                                {
                                    echo "<li><a href='clientDashboard.php'>My profile</a></li>";
                                    echo "<li><a href='makeAppointmentForm.php'>Make Appointment</a></li>";
                                }
                                if(isset($_SESSION['mytype']) && $_SESSION['mytype'] == "receptionist")
                                {
                                    echo "<li><a href='receptionistDashboard.php'>Receptionist Panel</a></li>";
                                }
                                echo "<li><a href='logout.php'>Logout</a></li>";
                            }
                            else{
                                echo "<li><a href='makeAppointment.php'>Make Appointment</a></li>";
                                echo "<li><a href='login.php'>Login</a></li>";
                                echo "<li><a href='signup.php'>Sign Up</a></li>";
                            }
                        ?>            
                     
                    </ul>
                </li>
        </ul>
    </div>
    </nav>


    <section class="make-appointment" id="appointment">
        <div class="max-width">
            <div class="appointment-content">
                <div class="form">
                    <div class="form-text">
                        <h1>Make Appointment</h1>
                    </div>
                    <div class="main-form">
                        <form action="#" method="post">
                            <div>
                                <span>First name</span>
                                <input type="text" name="first_name" id="first_name" placeholder="Write first name" required>
                            </div>
                            <div>
                                <span>Last name</span>
                                <input type="text" name="last_name" id="last_name" placeholder="Write last name" required>
                            </div>
                            <div>
                                <span>Email</span>
                                <input type="text" name="email" id="email" placeholder="Enter your email" required>
                            </div>
                            
                            <div>
                                <span>Date</span>
                                <input type="date" name="appointment_date" id="appointment_date" placeholder="Select date" required>
                            </div>
                            <div>
                                <span>Time</span>
                                <select name="appointment_time" id="appointment_time" placeholder="Select time" required>
                                    <option value="">--select time--</option>
                                    <option value="9am">9am</option>                                    
                                    <option value="10am">10am</option>          
                                    <option value="11am">11am</option>                            
                                    <option value="12pm">12pm</option>                                    
                                    <option value="1pm">1pm</option>
                                    <option value="2pm">2pm</option>
                                    <option value="3pm">3pm</option>
                                    <option value="4pm">4pm</option>  
                                    <option value="5pm">5pm</option>
                                    <option value="6pm">6pm</option>
                                    <option value="7pm">7pm</option>                    
                                </select>
                            </div>
                            <div>
                                <span>Service</span>
                                <select name="service" id="service" placeholder="Select service" required>
                                    <option value="">--select service--</option>
                                    <?php $query=mysqli_query($con,"select * from services");
												while($row=mysqli_fetch_array($query))
												{
													?>
													<option style="color: turquoise;" value="<?php echo $row['service_name'];?>" ><?php echo $row['service_name'];?></option>
													<?php
												} ?> 
                                </select>
                            </div>
                            <div id="submit">
                                <input type="submit" value="CONFIRM" name="submit" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <footer>
        <div class="footer_container">
            <div class="section about_us">
                <h2>Forever Beauty Salon</h2>
                <div class="content">
                    <p>You can find us here</p>
                    <div class="social">
                        <a href="https://www.facebook.com/"><span class="fab fa-facebook-f"></span></a>
                        <a href="https://www.instagram.com/"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>   
            
            <div class="section address">
                <h2>Contact Us</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Bucharest, Romania</span>
                    </div>
                    <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+40-760576071</span>
                    </div>
                    <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">chloe.thompson@gmail.com</span>
                    </div>
                </div>
            </div>

            <div class="section programme">
                <h2>Programme</h2>
                <div class="content">
                    <div class="week">
                        <span class="far fa-calendar-alt"></span>
                        <span class="text">Monday-Friday</span>
                        <span class="far fa-clock"></span>
                        <span class="text">09AM to 08PM</span>
                    </div>
                    <div class="week-end1">
                        <span class="far fa-calendar-alt"></span>
                        <span class="text">Saturday</span>
                        <span class="far fa-clock"></span>
                        <span class="text">09AM to 3PM</span>
                    </div>
                    <div class="week-end2">
                        <span class="far fa-calendar-alt"></span>
                        <span class="text">Sunday</span>
                        <span class="fas fa-clock"></span>
                        <span class="text">Closed</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            <center>
                <span class="far fa-copyright">2022 All rights reserved.</span>
            </center>
        </div>
    </footer>
</body>

</html>