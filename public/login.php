<?php
session_start();
include '../includes/db.php';

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";
    $stm = $pdo->prepare($sql);

    if ($stm->execute([$email])) {
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['isloggedin'] = true;
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] === 'admin') {
                header('Location: ../admin/dashboard.php');
            } else {
                header('Location: ../templates/dashboard.php');
            }
            exit();
        } else {
            echo "<p style='color: red;'>Invalid credentials</p>";
        }
    } else {
        echo "<p style='color: red;'>Unable to process the request</p>";
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
        <nav class="flex flex-col py-6 sm:flex-row sm:justify-between sm:items-center">
            <a href="#">
                <h1 class="font-bold text-6xl text-indigo-600">C</h1>
            </a>
            <div class="flex items-center mt-2 -mx-2 sm:mt-0">
                <a href="#" class="px-3 py-2 mx-1 text-sm font-semibold text-indigo-600 border-2 border-indigo-600 rounded-md hover:bg-indigo-100">Log in</a>
                <a href="register.php" class="px-3 py-2 mx-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Register</a>
            </div>
        </nav>

        <div class="flex flex-col lg:flex-row jus justify-between items-center py-6 lg:h-[36rem] gap-12">
            <div class="lg:w-1/2">
                <h2 class="text-3xl mb-6 font-semibold text-gray-800 lg:text-4xl">Car Wash Management System</h2>
                <h3 class="mt-2 text-2xl font-semibold text-gray-800">
                Hello, ready to <span class="text-indigo-600">book</span> your car wash? 
                </h3>
                <p class="mt-2 text-gray-600">
                To reserve a car wash, please log in first. Our easy-to-use system helps you choose a convenient time for your car wash. Register now and take advantage of our fast and high-quality services!
                </p>
            </div>

            <div class=" flex justify-center">
                <div class="max-w-sm w-full p-8 shadow rounded-lg">
                    <div class="text-center">
                        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Log in</h1>
                        <p class="text-gray-600 mb-6">Log in to access your account and reserve a car wash.</p>
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
                                $_SESSION['isloggedin'] = true; 
                                header('Location: ../templates/dashboard.php');
                                exit();
                            }
                        } else {
                            echo "<p style='color: red;'>Error: Unable to process the request.</p>";
                        }
                    }
                    ?>

                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600">E-Mail Adress</label>
                            <input type="email" name="email" id="email" placeholder="youremail@gmail.com" 
                                class="w-full px-4 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-500" />
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                            <input type="password" name="password" id="password" placeholder="Your Password" 
                                class="w-full px-4 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-500" />
                        </div>
                        <div class="mb-6">
                            <button type="submit" name="login_btn" class="w-full px-4 py-3 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none">Log in</button>
                        </div>
                        <p class="text-sm text-center text-gray-600">
                           Don't have an Account?<a href="./register.php" class="text-indigo-600 hover:underline"> Register.</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
