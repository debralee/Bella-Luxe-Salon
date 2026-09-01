<?php
 include ("../classes/Interact.class.php");
     $menuManager = new Interact(); // Replace with your actual class name
     $message = '';

     // Check if form was submitted
     if (isset($_POST['add'])) {
     // Create a request object from POST data
     $request = (object) [
         'type' => $_POST['type'] ?? 'Color and Dimension', // Default type or from hidden field
         'service' => $_POST['service'] ?? '',
         'price' => $_POST['price'] ?? ''
     ];

    // Call your create method
    $result = $menuManager->create($request);

    // Handle the response (if you implemented the improved version)
    if ($result['success']) {
        $message = "<div class='alert alert-success mt-3'>" . $result['message'] . "</div>";
    } else {
        $message = "<div class='alert alert-danger'>" . $result['message'] . "</div>";
    }
    }

    if(isset($_POST['modify'])){
        $request = (object) [
            'type' => $_POST['type'] ?? 'Color and Dimension', // Default type or from hidden field
            'service' => $_POST['service'] ?? '',
            'price' => $_POST['price'] ?? '',
            'service_id' => $_POST['service_id'] ?? ''
        ];
        $result = $menuManager->update($request);
        if ($result['success']) {
            $message = "<div class='alert alert-success mt-3'>" . $result['message'] . "</div>";
        } else {
            $message = "<div class='alert alert-danger'>" . $result['message'] . "</div>";
        }
    }

    if(isset($_POST['delete'])){
        $request = (object) [
            'service_id' => $_POST['service_id'] ?? ''
        ];
        $result = $menuManager->delete($request);
        if ($result['success']) {
            $message = "<div class='alert alert-success mt-3'>" . $result['message'] . "</div>";
        } else {
            $message = "<div class='alert alert-danger'>" . $result['message'] . "</div>";
        }
    }

    // header('location:adminColor.php');