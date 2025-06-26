<?php

$input = file_get_contents("php://input");
file_put_contents("data.json", $input);

$update = json_decode($input, true);

const API = "";

function bot(string $method, array $params) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.telegram.org/bot" . API . '/' . $method,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
    ]);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
};

if ($input) {

        $text = $update['message']['text'];
        $chat_id = $update['message']['chat']['id'];
        
        // Send the message back to the user who sent it
        bot('sendMessage', [
            'chat_id' =>  $chat_id,
            'text' => $text,
        ]);
}

// Github.com/AtaDevPro