<?php 
session_start();
include '../includes/db.php'; 

if(isset($_SESSION['isloggedin'])){
    if($_SESSION['isloggedin'] == true){
        header('Location:../templates/dashboard.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Car Wash Management System</title>
    <link rel="stylesheet" href="../assets/css/output.css" />
</head>
<body class="bg-white">
<header class="bg-gray-100 min-h-screen">
    <div class="container px-6 mx-auto">
        <!-- Navigation -->
        <nav class="flex flex-col py-6 sm:flex-row sm:justify-between sm:items-center">
            <a href="#">
                <h1 class="font-bold text-6xl text-indigo-600">C</h1>
            </a>
            <div class="flex items-center mt-2 -mx-2 sm:mt-0">
                <a href="#" class="px-3 py-2 mx-1 text-sm font-semibold text-indigo-600 border-2 border-indigo-600 rounded-md hover:bg-indigo-100">Kyqu</a>
                <a href="register.php" class="px-3 py-2 mx-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Regjistrohu</a>
            </div>
        </nav>

        <!-- Main Section -->
        <div class="flex flex-col lg:flex-row jus justify-between items-center py-6 lg:h-[36rem] gap-12">
            <!-- Left Text Section -->
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-semibold text-gray-800 lg:text-4xl">Autolarje</h2>
                <h3 class="mt-2 text-2xl font-semibold text-gray-800">
                    Përshëndetje <span class="text-indigo-600">Mik</span>
                </h3>
                <p class="mt-4 text-gray-600">
                    Për të rezervuar një larje makine, ju lutem identifikohuni më parë. Sistemi ynë i lehtë për t'u përdorur ju ndihmon të zgjidhni një kohë të përshtatshme për larjen e makinës suaj. Regjistrohuni tani dhe përfitoni nga shërbimet tona të shpejta dhe cilësore!
                </p>
            </div>

            <!-- Right Form Section -->
            <div class="lg:w-1/2 flex justify-center">
                <div class="max-w-sm w-full p-8 shadow rounded-lg">
                    <div class="text-center">
                        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Kyqu</h1>
                        <p class="text-gray-600 mb-6">Kyqu për të hyrë në llogarinë tënde dhe rezervuar një larje makine.</p>
                    </div>
                    
                    <?php
                       if (isset($_POST['login_btn'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                    
                        $sql = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";
                        $stm = $pdo->prepare($sql);
                    
                        if ($stm->execute([$email])) {
                            $user = $stm->fetch(PDO::FETCH_ASSOC);
                    
                            if (!$user) {
                                echo "<p style='color: red;'>Error: Email does not exist.</p>";
                            } elseif (!password_verify($password, $user['password'])) {
                                echo "<p style='color: red;'>Error: Invalid password.</p>";
                            } else {
                                $_SESSION['user_id'] = $user['id'];
                                $_SESSION['email'] = $email;
                                $_SESSION['isloggedin'] = true;  // Set session variable to track login status
                                header('Location: ../templates/dashboard.php');
                                exit(); // Make sure to stop further code execution after the redirect
                            }
                        } else {
                            echo "<p style='color: red;'>Error: Unable to process the request.</p>";
                        }
                    }
                    ?>

                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600">Adresa e Email-it</label>
                            <input type="email" name="email" id="email" placeholder="emailijuaj@gmail.com" 
                                class="w-full px-4 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-500" />
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm text-gray-600">Fjalëkalimi</label>
                            <input type="password" name="password" id="password" placeholder="Passwordi juaj" 
                                class="w-full px-4 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-500" />
                        </div>
                        <div class="mb-6">
                            <button type="submit" name="login_btn" class="w-full px-4 py-3 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none">Kyqu</button>
                        </div>
                        <p class="text-sm text-center text-gray-600">
                            Nuk keni një llogari? <a href="./register.php" class="text-indigo-600 hover:underline">Regjistrohuni.</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
