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
    <meta http-equiv="refresh" content="30">
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
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./book-wash.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Book a Car Wash</span>
                </a>
            </div>

            
                

                <!-- My Bookings Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 border border-white dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./booking-history.php">
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

<section class="container mt-8 px-4 mx-auto w-full h-full">
    <div class="flex items-center gap-x-3">
        <h2 class="text-lg font-medium text-gray-800">Historia e Rezervimeve</h2>

        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">x Rezervime</span>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">

                <?php 
                  $user_id = $_SESSION['user_id'];

                  // Handle booking cancellation request
                  if (isset($_GET['cancel_booking_id'])) {
                      $cancel_booking_id = filter_input(INPUT_GET, 'cancel_booking_id', FILTER_VALIDATE_INT);
                      
                      if ($cancel_booking_id) {
                          $sql = "UPDATE bookings SET status = 'Cancelled' WHERE booking_id = :booking_id AND user_id = :user_id";
                          $stmt = $pdo->prepare($sql);
                          
                          // Bind parameters and execute the query
                          if ($stmt->execute([':booking_id' => $cancel_booking_id, ':user_id' => $user_id])) {
                              $cancel_message = "Booking cancelled successfully!";
                          } else {
                              $error_message = "Error updating the booking status.";
                          }
                      } else {
                          $error_message = "Invalid booking ID.";
                      }
                  }
                  
                  // Query to get all bookings for the logged-in user
                  $sql = "
                      SELECT 
                          b.booking_id, 
                          b.user_id, 
                          b.service_id, 
                          b.booking_date, 
                          b.status, 
                          u.fullname, 
                          u.email, 
                          s.name AS service_name, 
                          s.duration, 
                          p.payment_method
                      FROM bookings b
                      JOIN users u ON b.user_id = u.id
                      JOIN services s ON b.service_id = s.service_id
                      LEFT JOIN payments p ON b.booking_id = p.booking_id
                      WHERE b.user_id = :user_id
                  ";
                  
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute([':user_id' => $user_id]);
                  $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  ?>
                   <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center">Your Bookings</h1>

    <?php if (isset($cancel_message)): ?>
                            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg" role="alert">
                                <?= $cancel_message ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error_message)): ?>
                            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg" role="alert">
                                <?= $error_message ?>
                            </div>
                        <?php endif; ?>

                        <?php if (count($bookings) > 0): ?>
                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-3.5 px-4 text-sm text-gray-500">ID - Name</th>
                                        <th class="py-3.5 px-12 text-sm text-gray-500">Service</th>
                                        <th class="py-3.5 px-4 text-sm text-gray-500">Booking Date</th>
                                        <th class="py-3.5 px-4 text-sm text-gray-500">Payment Method</th>
                                        <th class="py-3.5 px-4 text-sm text-gray-500">Status</th>
                                        <th class="py-3.5 px-4 text-sm text-gray-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($bookings as $row): ?>
                                        <tr>
                                            <td class="px-4 py-4 text-sm text-gray-700">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <span class="text-gray-800"><?= $row['booking_id'] ?></span>
                                                    <div>
                                                        <h2 class="font-medium text-gray-800"><?= $row['fullname'] ?></h2>
                                                        <p class="text-sm text-gray-600"><?= $row['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm text-gray-700">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60">
                                                    <h2 class="text-sm text-emerald-500"><?= $row['service_name'] ?></h2>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-500"><?= date("m/d/Y H:i", strtotime($row['booking_date'])) ?></td>
                                            <td class="px-4 py-4 text-sm text-gray-500"><?= $row['payment_method'] ?></td>
                                            <td class="px-4 py-4 text-sm">
                                                <?php
                                                    // Determine the status based on the current time and booking date
                                                    $booking_time = strtotime($row['booking_date']);
                                                    $current_time = time();
                                                    $status = $row['status'];

                                                    if ($status == 'Cancelled') {
                                                        echo "<span class='px-3 py-1 text-xs text-white rounded-full bg-red-500'>Cancelled</span>";
                                                    } elseif ($status == 'Completed') {
                                                        echo "<span class='px-3 py-1 text-xs text-white rounded-full bg-green-500'>Completed</span>";
                                                    } elseif ($current_time >= $booking_time + ($row['duration'] * 60)) {
                                                        echo "<span class='px-3 py-1 text-xs text-white rounded-full bg-green-500'>Completed</span>";
                                                    } elseif ($current_time >= $booking_time) {
                                                        echo "<span class='px-3 py-1 text-xs text-white rounded-full bg-blue-500'>In Progress</span>";
                                                    } else {
                                                        echo "<span class='px-3 py-1 text-xs text-white rounded-full bg-yellow-500'>Pending</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td class="px-4 py-4 text-sm">
                                                <?php if ($status != 'Completed' && $status != 'Cancelled'): ?>
                                                    <a href="?cancel_booking_id=<?= $row['booking_id'] ?>" class="text-gray-500 hover:text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-center text-gray-500">No bookings found.</p>
                        <?php endif; ?>
</div>
            </div>
        </div>
    </div>                      
</body>
</html>