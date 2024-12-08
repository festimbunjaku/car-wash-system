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
    <title>Register - Car Wash Management System</title>
    <link rel="stylesheet" href="../assets/css/output.css" />
</head>
<body class="bg-white">
<header class="bg-gray-50 min-h-screen">
    <div class="container px-6 mx-auto">
        <nav class="flex flex-col py-6 sm:flex-row sm:justify-between sm:items-center">
            <a href="#">
                <h1 class="font-bold text-6xl text-indigo-600">C</h1>
            </a>

            <div class="flex items-center mt-2 -mx-2 sm:mt-0">
                <a href="./login.php" class="px-3 py-2 mx-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Log in</a>
                <a href="./register.php" class="px-3 py-2 mx-1 text-sm font-semibold text-indigo-600 border-2 border-indigo-600 rounded-md hover:bg-indigo-100">Register</a>
            </div>
        </nav>

        <div class="flex flex-col justify-between items-center py-6 lg:h-[36rem] lg:flex-row">
            <div class="lg:w-1/2">
                <h2 class="text-3xl mb-6 font-semibold text-gray-800 lg:text-4xl">Car Wash Management System</h2>

                <h3 class="mt-2 text-2xl font-semibold text-gray-800">
                <span class="text-indigo-600">Welcome!</span> Register to reserve your first car wash.
                
                </h3>

                <p class="mt-2 text-gray-600">
                To reserve a car wash, please register by filling out your details below. Our high-quality services and simple registration process help you save time!
                </p>
            </div>

            <div class=" flex items-center justify-center">
                <div class=" p-8 rounded-lg  max-w-sm w-full shadow">
                    <div class="flex justify-center mb-6">
                        <span class="inline-block bg-indigo-100 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                            </svg>
                        </span>
                    </div>
                    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Create a New Account</h2>
                    <p class="text-gray-600 text-center mb-6">Enter your details to sign up.</p>

                    <?php
                        if (isset($_POST['login_btn'])) {
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        
                            $sql = "INSERT INTO `users` (`fullname`, `email`, `password`) VALUES (?,?,?)";
                            $stm = $pdo->prepare($sql); 
                            if ($stm->execute([$fullname, $email, $password])) {
                                header('Location: login.php');
                            } else {
                                echo "Error: Something went wrong during registration.";
                            }
                        }
                    ?>


                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="mb-4">
                            <label for="fullName" class="block text-gray-700 text-sm font-semibold mb-2">Full Name *</label>
                            <input type="text" name="fullname" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="James Brown">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Your E-Mail Adress *</label>
                            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="youremail@gmail.com">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password *</label>
                            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="••••••••">
                        </div>
                        <button type="submit" name="login_btn" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Register</button>
                        <p class="text-gray-600 text-xs text-center mt-4">
                        By clicking Register, you agree to the 
<a href="#" class="text-indigo-600 hover:underline">Terms and Conditions.
</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
