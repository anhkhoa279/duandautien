<?php

session_start();

if (isset($_SESSION['user'])) {
    echo json_encode(['status' => 'success', 'data' => $_SESSION['user']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No session data']);
}

?>