<?php

$sql = "SELECT b.booking_id, b.user_id, b.service_id, b.booking_date, b.status, b.created_at, u.fullname, u.email, s.name AS service_name
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN services s ON b.service_id = s.service_id"; // Join with the services table to get the service name

$stmt = $pdo->prepare($sql);
$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                <div class="flex items-center gap-x-3">
                    <span>ID</span>
                    <span>Emri</span>
                </div>
            </th>

            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                <button class="flex items-center gap-x-2">
                    <span>Servisi</span>
                </button>
            </th>

            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                <span>Data</span>
            </th>

            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Menyra Pageses</th>

            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Statusi i Rezervimit</th>

            <th scope="col" class="relative py-3.5 px-4">
                <span class="sr-only">Fshij</span>
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                <div class="inline-flex items-center gap-x-3">
                    <span class="id text-gray-800"><?= $booking['booking_id']; ?></span>

                    <div class="flex items-center gap-x-2">
                        <div>
                            <h2 class="font-medium text-gray-800"><?= htmlspecialchars($booking['fullname']); ?></h2>
                            <p class="text-sm font-normal text-gray-600"><?= htmlspecialchars($booking['email']); ?></p>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60">
                    <h2 class="text-sm font-normal text-emerald-500"><?= htmlspecialchars($booking['service_name']); ?></h2> <!-- Service Name -->
                </div>
            </td>
            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"><?= $booking['booking_date']; ?></td>
            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">Cash</td>

            <td class="px-4 py-4 text-sm whitespace-nowrap">
                <div class="flex items-center gap-x-2">
                    <?php
                    // Determine the booking status dynamically
                    $currentTime = new DateTime();
                    $bookingTime = new DateTime($booking['booking_date']);
                    if ($currentTime < $bookingTime) {
                        $status = 'Për në vijim'; // Pending

                    } elseif ($currentTime >= $bookingTime && $currentTime <= $bookingTime->add(new DateInterval('PT1H'))) {
                        $status = 'Në proces'; // In Progress
                    } else {
                        $status = 'I përfunduar'; // Completed
                    }

                    echo "<p class='px-3 py-1 text-xs text-white rounded-full bg-yellow-500'>$status</p>";
                    ?>
                </div>
            </td>

            <td class="px-4 py-4 text-sm whitespace-nowrap">
                <div class="flex items-center gap-x-6">
                    <form method="POST" action="update_booking_status.php">
                        <input type="hidden" name="booking_id" value="<?= $booking['booking_id']; ?>">
                        <button type="submit" class="text-gray-500 transition-colors duration-200 hover:text-red-500 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>