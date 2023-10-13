<?php
require 'config.php';
session_start();
$user_id = $_SESSION['id'];

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:Login.php');
}
?>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">
    <head>
        <link rel="stylesheet" href="css/style.css">

        <meta charset="UTF-8">
        <title>Book Store Website</title>
        <style type="text/css">
            .main_tag{
                margin:10px;
            }
            .catego{
                text-align: center;
                background-color: aqua;
            }
            .catego1{
                text-align: center;
                color: gray;

            }
            .categ-b{

                text-align: center;
                align-items: center;
                width: 100%;
                height: 30 px;
                margin-top: 10 px;

            }
            .books{
                width: 360 px;
                height: auto;
                padding: 20 px 30 px;
                position: center;
                color:#089da1;
            }

            .books-img{
                padding: 18 px;
                border-radius: 50%;
                width: 100 px;
                height:100 px;
                text-align: center;
                position: center;
                left: 50%;
                border-radius: 50%;
                border: 10 px solid aqua;

            }
            .color{
                color:#000 ;
            }

            .about_tag h1{
                color:aqua;
            }

        </style>
    </head>
    <body>

        <section>

            <nav>

                <div class="logo">
                    <img src="image/logo.png">
                </div>

                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#s">Categories</a></li>
                    <li><a href="#abtus">About</a></li>

                    <?php
                    if ($user_id) {
                        echo '<li><a href = "Shop.php">Shop</a></li>';
                        echo '<li><a href = "home.php?logout">Logout</a></li>';
                    } else {
                        echo '<li><a href = "Login.php">Login</a></li>';
                        echo '<li><a href = "register.php">Register</a></li>';
                    }
                    ?>

                </ul>

                <div class="social_icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-heart"></i>
                </div>

            </nav>

            <div class="main">

                <div class="main_tag">
                    <h1>  WELCOME TO <br><span>BOOK STORE</span></h1>
                    <div id="a"></div>
                    <p>
                        For All Your Reading Needs.Get Your New Book With The Best Price.
                        Read Novels,Fiction,Horror,Science,Journals,Legend.
                        Special Upto 50% Off.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                    <a href="#a" class="main_btn">Show More</a>

                </div>

                <div class="main_img">
                    <img src="image/table.png">
                </div>

            </div>

        </section>




        <!--Services-->
        <div id="s">
            <div class="services">

                <div class="services_box">

                    <div class="services_card">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h3>Fast Delivery</h3>
                        <p>
                            Use code DeliverNow to avail of the limited same day delivery offer.Fast delivery services. 
                        </p>
                    </div>

                    <div class="services_card">
                        <i class="fa-solid fa-headset"></i>
                        <h3>24 x 7 Services</h3>
                        <p>
                            Web Services In 24 Hours.24-HOUR BOOKSTORE. 
                        </p>
                    </div>

                    <div class="services_card">
                        <i class="fa-solid fa-tag"></i>
                        <h3>Best Deal</h3>
                        <p>
                            Once you register our website bookstore best deal is available.  
                        </p>
                    </div>

                    <div class="services_card">
                        <i class="fa-solid fa-lock"></i>
                        <h3>Secure Payment</h3>
                        <p>
                            Using A Highest Encryption Standard To Keep All Personal Details Secure On Our Website.
                        </p>
                    </div>

                </div>

            </div>
            <!--Categories-->

            <section class="ct">
                <div class = "categ-r">


                    <div class = "catego"> 
                        <h2>Books Categories</h2>
                    </div>


                    <div class = "catego1"> <p>
                            Most Popular Books categories.Genres in Fiction and Non-Fiction.
                            All Categories:Science, Art,History,Fiction,Horror,Romance.
                        </p></div>
                </div>
                <div class = "categ-b">
                    <div class = "books">
                        <div class = "books-img">
                            <img src ="image/tb.jpeg" width ="150 px" height="150px">
                        </div>  
                        <div class ="color"><h4>TextBooks</h4> </div>
                        <p>Books produced to meet the needs of educators as like the SchoolBooks.</p>
                    </div>

                    <div class = "books">
                        <div class = "books-img">
                            <img src = "image/sc.jpg"width ="150 px" height="150 px">
                        </div>  
                        <div class ="color"><h4>Science</h4></div>
                        <p>Popular science books for free online reading as like the earth science book. </p>
                    </div>


                    <div class = "books">
                        <div class = "books-img">
                            <img src ="image/hst.jpeg"width ="150 px" height="150 px">
                        </div>  
                        <div class ="color"><h4>History</h4></div>
                        <p>Looking for the best books about history : A History about American people book.</p>
                    </div>


                </div>
            </section>



            <!--About-->
            <div id= "abtus">
                <div class="about">

                    <div class="about_image">
                        <img src="image/bs.jpeg" width = "550 px" heigh = "450 px ">
                    </div>

                    <div class="about_tag">
                        <h1>About Us</h1>
                        <p>
                            An online BookStore in a web application that allows customers to buy books online.<br>
                            Customers can search for a book by title or author using a web server,add it to their <br> shoping cart
                            and then purchase it usibg a creidt card transiction.
                        </p>
                        <a href="#" class="about_btn">HOME</a>
                    </div>

                </div>
            </div>








    </body>
</html>