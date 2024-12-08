<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] !== true || $_SESSION['role'] !== 'customer') {
    session_destroy();
    header('Location: ../public/login.php');
    exit();
}


if (isset($_GET['action']) && $_GET['action'] == 'signout') {
    session_destroy();
    header('Location: ../public/login.php');
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Car Wash</title>
    <link rel="stylesheet" href="../assets/css/output.css" />
</head>
<body class="flex">
<aside class="flex flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
    <a href="/">
        <h1 class="font-bold text-6xl text-indigo-600">C</h1>
    </a>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6 ">
            <div class="space-y-3 ">

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>

                <div class="space-y-3 ">
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 border border-white dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./book-wash.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Book a Car Wash</span>
                </a>
            </div>

            
                

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./booking-history.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">My Bookings</span>
                </a>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./profile.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Profile</span>
                </a>

                <a href="?action=signout"  class="flex items-center px-4 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./profile.php">
                    <svg class="w-4 h-4" fill="#dfcece" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                    <span class="mx-2 text-sm font-medium">Sign Out</span>
                </a>

            </div>
        </nav>
    </div>
</aside>

<div class=" ">
    <div class="bg-white">
        <div class="container px-6 py-8 mx-auto pl-16">
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl">Reserve a Car Wash</h1>

            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-500 xl:mt-6">
            Reserve a car wash and take advantage of our high-quality services. We take care of every detail to restore your car's shine.
            </p>

            <div class="grid grid-cols-1 gap-8 mt-6 xl:mt-12 xl:gap-12 md:grid-cols-2 lg:grid-cols-3 ">
                <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg shadow">
                    <p class="font-medium text-gray-500 uppercase text-2xl">Basic Wash</p>

                    <h2 class="text-4xl font-semibold text-gray-800 uppercase">
                        15€
                    </h2>

                    <p class="font-medium text-gray-500">Exterior hand wash and drying. Includes tire cleaning.</p>

                    <p><b>Exterior Wash:</b> Removes dust and dirt from the bodywork.</p>
                    <p><b>Tire Cleaning:</b> Removes mud and provides shine to the tires.</p>
                    <p><b>Hand Drying:</b> Use of microfiber cloths for streak-free drying.</p>
                    <p><b>Quick Care:</b> Ideal for those who are short on time.</p>


                    <button class="w-full px-4 py-2 mt-10 tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <a href="#form">Reserve Now</a> 
                    </button>
                </div>

                <div class="w-full p-8 space-y-8 text-center bg-blue-600 rounded-lg shadow-2xl">
                    <p class="font-medium text-white uppercase text-3xl">Premium Wash</p>

                    <h2 class="text-5xl font-bold text-white uppercase">
                        30€
                    </h2>

                    <p class="font-medium text-white">Exterior wash, interior cleaning, dashboard cleaning, and tire treatment.</p>

                    <p class="text-white"><b class="text-yellow-200">Exterior and Interior Wash:</b> Full cleaning inside and out.</p>
                    <p class="text-white"><b class="text-yellow-200">Upholstery Cleaning:</b> Dusting and cleaning of seats.</p>
                    <p class="text-white"><b class="text-yellow-200">Dashboard Cleaning:</b> Stain removal and shine for plastic or wooden surfaces.</p>
                    <p class="text-white"><b class="text-yellow-200">Tire Shine:</b> Tires get a clean, fresh appearance.</p>


                    <button class="w-full px-4 py-2 mt-10 tracking-wide text-blue-500 capitalize transition-colors duration-300 transform bg-white rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:ring focus:ring-gray-200 focus:ring-opacity-80">
                        <a href="#form">Reserve Now</a> 
                    </button>
                </div>

                <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg shadow">
                    <p class="font-medium text-gray-500 uppercase text-2xl">Full Detailing</p>

                    <h2 class="text-4xl font-semibold text-gray-800 uppercase">
                        75€
                    </h2>
                    <p class="font-medium text-gray-500">Full interior and exterior detailing, with wax and polish.</p>

                    <p><b>Deep Interior Cleaning:</b> Professional cleaning of upholstery and floors.</p>
                    <p><b>Wax and Polish Wash:</b> Long-lasting protection and shine for the bodywork.</p>
                    <p><b>Window and Mirror Cleaning:</b> Removal of stains and dust for maximum visibility.</p>
                    <p><b>Stubborn Stain Removal:</b> Treatment of heavily soiled or stained areas that are difficult to clean.</p>

                    <button class="w-full px-4 py-2 mt-10 tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <a href="#form">Rezervo Tani</a> 
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="w-2/3 mx-auto mb-6 mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-blue-600 text-white text-center font-bold uppercase">
        Book an Appointment
    </div>
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id']; 
    $name = $_POST['name']; 
    $serviceId = $_POST['service_id']; 
    $bookingDate = $_POST['booking_date']; 
    $paymentMethod = $_POST['payment_method']; 
    
    
    $servicePrice = 0;
    $serviceDuration = 0;

    if ($serviceId == 1) {
        $servicePrice = 15;
        $serviceDuration = 30;
    } elseif ($serviceId == 2) {
        $servicePrice = 30;
        $serviceDuration = 60;
    } elseif ($serviceId == 3) {
        $servicePrice = 75;
        $serviceDuration = 120;
    }

    $sql = "INSERT INTO Bookings (user_id, service_id, booking_date, status) VALUES (?, ?, ?, 'Pending')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId, $serviceId, $bookingDate]);

    $lastBookingId = $pdo->lastInsertId();
    $paymentSql = "INSERT INTO Payments (booking_id, amount, payment_method, status) VALUES (?, ?, ?, 'Pending')";
    $paymentStmt = $pdo->prepare($paymentSql);
    $paymentStmt->execute([$lastBookingId, $servicePrice, $paymentMethod]);

    echo "<p style='color: green;'>Booking has been successfully made!</p>";
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="p-4">
    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="service">Service</label>
        <select name="service_id" id="service" class="w-full border rounded px-3 py-2" required>
            <option value="">Select a service</option>
            <option value="1" data-price="15" data-duration="30">Basic Wash - €15</option>
            <option value="2" data-price="30" data-duration="60">Premium Wash - €30</option>
            <option value="3" data-price="75" data-duration="120">Full Detailing - €75</option>
        </select>
    </div>

    <div id="service-details" class="mb-4 hidden">
        <p><b>Price:</b> <span id="service-price">-</span></p>
        <p><b>Duration:</b> <span id="service-duration">-</span> minutes</p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="date">Date</label>
        <input type="datetime-local" name="booking_date" id="date" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="payment-method">Payment Method</label>
        <select name="payment_method" id="payment-method" class="w-full border rounded px-3 py-2" required>
            <option value="">Select payment method</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 focus:ring focus:ring-blue-300">Submit Reservation</button>
    </div>
</form>

</div>
  
</div>

</body>
</html>