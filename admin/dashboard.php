<?php
include '../includes/db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] !== true) {
    session_destroy();
    header('Location: ../public/login.php');
    exit();
}

// Check if the user is an admin
if ($_SESSION['role'] !== 'admin') {
    session_destroy();
    header('Location: ../public/login.php');
    exit();
}

// Signout functionality
if (isset($_GET['action']) && $_GET['action'] == 'signout') {
    unset($_SESSION['email']);
    unset($_SESSION['isloggedin']);
    unset($_SESSION['role']);
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
    <title>Admin Dashboard</title>
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
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 border bg-slate-800" href="./dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>
                <div class="space-y-3 ">
                <!-- Book a Car Wash Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./bookings.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Bookings</span>
                </a>
            </div>

            
                

                <!-- My Bookings Link -->
                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="./users.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="mx-2 text-sm font-medium">Users</span>
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


<?php
$userId = $_SESSION['user_id'];

   
        $sql = "SELECT * FROM `users` WHERE `id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $today = date('F j, Y'); 
    ?>
    


<main class="flex-1 p-4">
    
        <div class="flex-1 bg-indigo-100 border border-indigo-200  w-full flex justify-between rounded-xl p-6 animate-fade-in mb-6">
            <div>
            <h2 class="text-4xl md:text-5xl text-blue-900">
                Hello <br><strong><?= htmlspecialchars($user['fullname']); ?></strong>
            </h2>
            </div>

            <div class="bg-blue-100 border border-blue-200 rounded-xl p-6 animate-fade-in">
            <h2 class="text-4xl md:text-5xl text-blue-900">
            <?= $today; ?>
            </h2>
            </div>
            
        </div>

<?php
    $sql = "SELECT COUNT(*) AS service_count FROM services";
    $stmt = $pdo->query($sql);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $serviceCount = $result['service_count'];

?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php
            $sql = "SELECT COUNT(*) AS booking_count FROM bookings";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $booking_count = $result['booking_count'];
        ?>
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.3s">
            <h3 class="text-xl font-bold text-indigo-800">Numri Total i Larjeve</h3>
            <p class="mt-4  text-sm text-gray-600">Check out all the booked bookings  so far.</p>
            <h1 class="text-center text-6xl font-bold mt-4"><?= $booking_count; ?></h1>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
                    <a href="./bookings.php">View Bookings</a>
                </button>
            </div>
        </div>
        
        <?php
            $sql = "SELECT COUNT(*) AS user_count FROM users";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_count = $result['user_count'];
        ?>
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.2s">
            <h3 class="text-xl font-bold text-indigo-800">Perdoruesi</h3>
            <p class="mt-4 text-sm text-gray-600">View all users and see their details.</p>
            <h1 class="text-center text-6xl font-bold mt-4"><?= $user_count; ?></h1>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                <a href="./users.php">View Users</a></button>
            </div>
        </div>

        <?php
            $sql = "SELECT COUNT(*) AS completed_bookings FROM bookings WHERE status = 'Completed'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $completed_bookings = $result['completed_bookings'];
        ?>
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.3s">
            <h3 class="text-xl font-bold text-indigo-800">Numri Total i Larjeve te kompletuara</h3>
            <p class="mt-4  text-sm text-gray-600">Check out all the completed bookings so far.</p>
            <h1 class="text-center text-6xl font-bold mt-4"><?= $completed_bookings; ?></h1>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
                    <a href="./bookings.php">View Bookings</a>
                </button>
            </div>
        </div>

        <?php
            $sql = "SELECT COUNT(*) AS cancelled_bookings FROM bookings WHERE status = 'Cancelled'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $cancelled_bookings = $result['cancelled_bookings'];
        ?>
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.3s">
            <h3 class="text-xl font-bold text-indigo-800">Numri Total i Larjeve te anuluara</h3>
            <p class="mt-4  text-sm text-gray-600">Check out all the cancelled bookings  so far.</p>
            <h1 class="text-center text-6xl font-bold mt-4"><?= $cancelled_bookings; ?></h1>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-red-500 rounded-lg hover:bg-green-600">
                    <a href="./bookings.php">View Bookings</a>
                </button>
            </div>
        </div>

        <?php
            $sql = "SELECT COUNT(*) AS pending_bookings FROM bookings WHERE status = 'Pending'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $pending_bookings = $result['pending_bookings'];
        ?>
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.3s">
            <h3 class="text-xl font-bold text-indigo-800">Numri Total i Larjeve ne vijim</h3>
            <p class="mt-4  text-sm text-gray-600">Check out all the pending bookings.</p>
            <h1 class="text-center text-6xl font-bold mt-4"><?= $pending_bookings; ?></h1>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-green-600">
                    <a href="./bookings.php">View Bookings</a>
                </button>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg p-6 h-64 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl animate-slide-up" style="animation-delay: 0.1s">
            <h3 class="text-xl font-bold text-indigo-800">Change Password</h3>
            <p class="mt-4 text-sm text-gray-600">Update your password to enhance the security of your account.</p>
           <div class="text-center flex justify-center items-center mt-4"> <svg class="text-center" width="64px" height="64px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_round [#1342]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598" id="profile_round-[#1342]"> </path> </g> </g> </g> </g></svg></div>
            <div class="flex justify-center items-center mt-6">
                <button class="px-6 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">
                <a href="../templates/profile.php">Update Password</a>   </button>
            </div>
        </div>
    </div>
</main>

</body>
</html>
