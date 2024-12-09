<?php
// Helper function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Helper function to redirect
function redirect($url) {
    header("Location: $url");
    exit();
}
?>
