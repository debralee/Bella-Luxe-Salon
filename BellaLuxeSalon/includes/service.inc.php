<?php
@session_start(); // Make sure session is started

include "../classes/DBConnect.class.php";
include "../classes/Service.class.php";
include "../classes/ServiceController.class.php";

$message = '';

// Define the setFlashMessage function
function setFlashMessage($type, $message)
{
    // Store the flash message in the user's session
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

// Function to get flash message and clear it from session
function getFlashMessage()
{
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
}

// Generate CSRF token if it doesn't exist
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['add'])) {
    // DON'T generate a new token here - use the existing one

    // Create a request object from POST data
    $request = (object) [
        'type' => $_POST['type'] ?? 'Color and Dimension',
        'service' => $_POST['service'] ?? '',
        'price' => $_POST['price'] ?? '',
        'page' => $_POST['page'],
        'csrf_token' => $_POST['csrf_token']
    ];

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        setFlashMessage('danger', 'Invalid security token. Please try again.');
        header("Location: ../view/{$request->page}");
        exit();
    } else {
        // Call your create method
        $menuManager = new ServiceController();
        $message = $menuManager->createService($request);

        // Regenerate token after successful operation for security
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        header("location: ../view/{$request->page}?message=" . urlencode($message));
        exit;
    }
} elseif (isset($_POST['delete'])) {
    // DON'T generate a new token here

    $request = (object) [
        'id' => $_POST['id'] ?? '',
        'page' => $_POST['page'],
        'csrf_token' => $_POST['csrf_token']
    ];

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        setFlashMessage('danger', 'Invalid security token. Please try again.');
        header("Location: ../view/{$request->page}");
        exit();
    } else {
        $menuManager = new ServiceController();
        $message = $menuManager->deleteService($request);

        // Regenerate token after successful operation
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        header("location: ../view/{$request->page}?message=" . urlencode($message));
        exit;
    }
} elseif (isset($_POST['modify'])) {
    // DON'T generate a new token here

    $request = (object) [
        'id' => $_POST['id'] ?? '',
        'type' => $_POST['type'] ?? '',
        'service' => $_POST['service'] ?? '',
        'price' => $_POST['price'] ?? '',
        'page' => $_POST['page'],
        'csrf_token' => $_POST['csrf_token']
    ];

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        setFlashMessage('danger', 'Invalid security token. Please try again.');
        // header('Location: ' . $_SERVER['PHP_SELF']);
        header("Location: ../view/{$request->page}");
        exit();
    } else {
        $menuManager = new ServiceController();
        $message = $menuManager->modifyService($request);

        // Regenerate token after successful operation
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        header("location: ../view/{$request->page}?message=" . urlencode($message));
        exit;
    }
}

// Display flash message if exists
$flashMessage = getFlashMessage();
if ($flashMessage) {
    echo "<div class='alert alert-{$flashMessage['type']}'>{$flashMessage['message']}</div>";
}
