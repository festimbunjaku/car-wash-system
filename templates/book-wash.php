<?php
    include '../includes/db.php';
    session_start();
    
    if(!isset($_SESSION['isloggedin']) or ($_SESSION['isloggedin'] != true)){
            header('Location: ../public/login.php');
        }

    if(isset($_GET['action'])){
        if($_GET['action'] == 'signout'){
            unset($_SESSION['email']);
            unset($_SESSION['isloggedin']);

            session_destroy();
            header('Location: ../public/login.php');
        }
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

                <!-- Dashboard Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>

                <div class="space-y-3 ">
                <!-- Book a Car Wash Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 border border-white dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./book-wash.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Book a Car Wash</span>
                </a>
            </div>

            
                

                <!-- My Bookings Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./booking-history.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">My Bookings</span>
                </a>

                <!-- Profile Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./profile.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Profile</span>
                </a>

                <!-- Log Out Link -->
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
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl">Rezervo një Larje Makine</h1>

            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-500 xl:mt-6">
            Rezervo një larje makine dhe përfito nga shërbimet tona të cilësisë së lartë. Ne kujdesemi për çdo detaj, për t'i kthyer makinës tuaj shkëlqimin e mëparshëm.
            </p>

            <div class="grid grid-cols-1 gap-8 mt-6 xl:mt-12 xl:gap-12 md:grid-cols-2 lg:grid-cols-3 ">
                <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg shadow">
                    <p class="font-medium text-gray-500 uppercase text-2xl">Larje Bazike</p>

                    <h2 class="text-4xl font-semibold text-gray-800 uppercase">
                        15€
                    </h2>

                    <p class="font-medium text-gray-500">Larje e jashtme me dorë dhe tharje. Përfshin pastrimin e gomave.</p>

                    <p><b>Larje e jashtme:</b> Heq pluhurin dhe papastërtitë nga karroceria.</p>
                    <p><b>Pastrimi i gomave:</b> Heqja e baltës dhe shkëlqim i gomave.</p>
                    <p><b>Tharje me dorë:</b> Përdorimi i leckave mikrofibër për tharje pa njolla.</p>
                    <p><b>Përkujdesje e shpejtë:</b> Ideale për ata që kanë pak kohë.</p>

                    <button class="w-full px-4 py-2 mt-10 tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <a href="#form">Rezervo Tani</a> 
                    </button>
                </div>

                <div class="w-full p-8 space-y-8 text-center bg-blue-600 rounded-lg shadow-2xl">
                    <p class="font-medium text-white uppercase text-3xl">Larje Premium</p>

                    <h2 class="text-5xl font-bold text-white uppercase">
                        30€
                    </h2>

                    <p class="font-medium text-white">Larje e jashtme, pastrim i brendshëm, pastrim i pultit dhe goma.</p>

                    <p class="text-white"><b class="text-yellow-200">Larje e jashtme dhe e brendshme:</b> Pastrim i plotë nga jashtë dhe nga brenda.</p>
                    <p class="text-white"><b class="text-yellow-200">Pastrimi i tapicerisë:</b> Fshirje e pluhurit dhe pastrim i sediljeve.</p>
                    <p class="text-white"><b class="text-yellow-200">Pastrimi i pultit:</b> Largimi i njollave dhe shkëlqim për sipërfaqet plastike ose druri.</p>
                    <p class="text-white"><b class="text-yellow-200">Shkëlqim për goma:</b> Gomat marrin pamje të pastër dhe të freskët.</p>

                    <button class="w-full px-4 py-2 mt-10 tracking-wide text-blue-500 capitalize transition-colors duration-300 transform bg-white rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:ring focus:ring-gray-200 focus:ring-opacity-80">
                        <a href="#form">Rezervo Tani</a> 
                    </button>
                </div>

                <div class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg shadow">
                    <p class="font-medium text-gray-500 uppercase text-2xl">Detajim i Plotë</p>

                    <h2 class="text-4xl font-semibold text-gray-800 uppercase">
                        75€
                    </h2>

                    <p class="font-medium text-gray-500">Detajim i plotë i brendshëm dhe i jashtëm, me dyll dhe lustër.</p>

                    <p><b>Pastrim i thellë i brendshëm:</b> Pastrim profesional i tapicerisë dhe dyshemeve.</p>
                    <p><b>Larje me dyll dhe lustër:</b> Mbrojtje dhe shkëlqim afatgjatë për karrocerinë.</p>
                    <p><b>Pastrimi i dritareve dhe pasqyrave:</b> Largimi i njollave dhe pluhurit për shikueshmëri maksimale.</p>
                    <p><b>Heqja e njollave të vështira:</b> Përpunim i zonave të ndotura ose me njolla të vështira për t’u hequr.</p>

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

// Assuming PDO connection is established and available in $pdo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $userId = $_SESSION['user_id']; // Get the user_id from the session
    $name = $_POST['name']; // Get the name from the form
    $serviceId = $_POST['service_id']; // Get the selected service
    $bookingDate = $_POST['booking_date']; // Get the booking date
    $paymentMethod = $_POST['payment_method']; // Get the payment method
    
    
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

    // Prepare SQL to insert booking into the database
    $sql = "INSERT INTO Bookings (user_id, service_id, booking_date, status) VALUES (?, ?, ?, 'Pending')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId, $serviceId, $bookingDate]);

    // Now insert payment details
    $lastBookingId = $pdo->lastInsertId(); // Get the last inserted booking ID
    $paymentSql = "INSERT INTO Payments (booking_id, amount, payment_method, status) VALUES (?, ?, ?, 'Pending')";
    $paymentStmt = $pdo->prepare($paymentSql);
    $paymentStmt->execute([$lastBookingId, $servicePrice, $paymentMethod]);

    // Provide feedback
    echo "<p style='color: green;'>Booking has been successfully made!</p>";
}
?>

<!-- HTML Form -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="p-4">
    <!-- User Information -->
    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- Service Selection -->
    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="service">Service</label>
        <select name="service_id" id="service" class="w-full border rounded px-3 py-2" required>
            <option value="">Select a service</option>
            <option value="1" data-price="15" data-duration="30">Basic Wash - €15</option>
            <option value="2" data-price="30" data-duration="60">Premium Wash - €30</option>
            <option value="3" data-price="75" data-duration="120">Full Detailing - €75</option>
        </select>
    </div>

    <!-- Service Details -->
    <div id="service-details" class="mb-4 hidden">
        <p><b>Price:</b> <span id="service-price">-</span></p>
        <p><b>Duration:</b> <span id="service-duration">-</span> minutes</p>
    </div>

    <!-- Date -->
    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="date">Date</label>
        <input type="datetime-local" name="booking_date" id="date" class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- Payment Method -->
    <div class="mb-4">
        <label class="block text-gray-800 font-bold mb-2" for="payment-method">Payment Method</label>
        <select name="payment_method" id="payment-method" class="w-full border rounded px-3 py-2" required>
            <option value="">Select payment method</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Cash">Cash</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 focus:ring focus:ring-blue-300">Submit Reservation</button>
    </div>
</form>

</div>
  
</div>

</body>
</html>