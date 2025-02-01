<?php
header("Content-Type: application/json");

// Telegram Bot Config
$botToken = "7227992441:AAFGvk6nb9tpRGUvZR2Y0wwazBZuskyVCNQ";  // এখানে তোমার বটের টোকেন দাও
$chatId = "5757538181";      // এখানে তোমার চ্যাট আইডি দাও

// URL থেকে মেসেজ নেওয়া
$message = isset($_GET['message']) ? $_GET['message'] : "Hello from Telegram Bot API!";

// API Request
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    "chat_id" => $chatId,
    "text" => $message
];

// cURL দিয়ে Request পাঠানো
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Response Return করা
echo json_encode([
    "status" => "success",
    "response" => json_decode($response, true)
]);
?>