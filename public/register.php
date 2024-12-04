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
                <a href="./login.php" class="px-3 py-2 mx-2 text-sm font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Kyqu</a>
                <a href="./register.php" class="px-3 py-2 mx-1 text-sm font-semibold text-indigo-600 border-2 border-indigo-600 rounded-md hover:bg-indigo-100">Regjistrohu</a>
            </div>
        </nav>

        <div class="flex flex-col justify-between items-center py-6 lg:h-[36rem] lg:flex-row">
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-semibold text-gray-800 lg:text-4xl">Autolarje</h2>

                <h3 class="mt-2 text-2xl font-semibold text-gray-800">
                    Përshëndetje <span class="text-indigo-600">Mik</span>
                </h3>

                <p class="mt-4 text-gray-600">
                    Për të rezervuar një larje makine, ju lutem regjistrohuni duke plotësuar të dhënat tuaja më poshtë. Shërbimet tona të cilësisë së lartë dhe procesi i thjeshtë i regjistrimit ju ndihmojnë të kurseni kohë!
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
                    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Krijo një llogari të re</h2>
                    <p class="text-gray-600 text-center mb-6">Vendosni të dhënat tuaja për t'u regjistruar.</p>

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
                            <label for="fullName" class="block text-gray-700 text-sm font-semibold mb-2">Emri i Plotë *</label>
                            <input type="text" name="fullname" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="James Brown">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Adresa e Email-it *</label>
                            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="emailijuaj@gmail.com">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Fjalëkalimi *</label>
                            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-indigo-100 focus:border-indigo-500" required placeholder="••••••••">
                        </div>
                        <button type="submit" name="login_btn" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Regjistrohu</button>
                        <p class="text-gray-600 text-xs text-center mt-4">
                            Duke klikuar Regjistrohu, ju pranoni <a href="#" class="text-indigo-600 hover:underline">Termat dhe Kushtet</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
