<?php
include("config/conn.php");

$data = json_decode(file_get_contents("php://input"), true);

$bus_id = $data['bus_id'];
$seats  = $data['seats'];

foreach ($seats as $seat) {
    $stmt = $conn->prepare("UPDATE seats 
                            SET status = 'booked' 
                            WHERE bus_id = ? AND seat_no = ?");
    $stmt->execute([$bus_id, $seat]);
}

echo "Seats booked successfully";