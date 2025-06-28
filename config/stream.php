<?php

// jika .env tidak diisi maka gunakan value default
return [
    'camera_user' => env('CAMERA_USER', 'default_user'),
    'camera_pass' => env('CAMERA_PASS', 'default_pass'),
    'camera_url'  => env('URL_CAMERA', 'default_url'),
];