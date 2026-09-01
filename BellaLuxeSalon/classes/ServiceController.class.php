<?php
class ServiceController extends Service
{
    public $emptyInputError = 'Please fill in all required fields (service name and price)';
    public $invalidServiceNameError = 'Invalid service name. Only letters, numbers, spaces and the ampersand are allowed';
    public $invalidNumberError = 'Invalid price format. Please enter a valid number';
    public $invalidServiceIdError = 'Invalid service ID';
    public function showServices($service)
    {
        $query = new Service();
        $results = $query->show($service);
        return $results;
    }

    public function createService($request)
    {
        // Handle validation
        if ($this->emptyInput($request)) {
            return $this->emptyInputError;
        } elseif ($this->invalidService($request)) {
            return $this->invalidServiceNameError;
        } elseif ($this->invalidNumber($request)) {
            return $this->invalidNumberError;
        } else {
            $menuManager = new Service();
            // Call your create method
            $result = $menuManager->create($request);
            return $result;
        }
    }

    public function modifyService($request)
    {
        // Handle validation
        if ($this->emptyInput($request)) {
            return $this->emptyInputError;
        } elseif ($this->invalidService($request)) {
            return $this->invalidServiceNameError;
        } elseif ($this->invalidNumber($request)) {
            return $this->invalidNumberError;
        } else {
            $menuManager = new Service();
            $result = $menuManager->update($request);
            return $result;
        }
    }

    public function deleteService($request)
    {
        // Handle validation - you might want to add ID validation here
        if (empty($request->id)) {
            return $this->invalidServiceIdError;
        }

        $menuManager = new Service();
        // Call your delete method
        $result = $menuManager->delete($request);
        return $result;
    }

    // Validation methods
    public function emptyInput($request): bool
    {
        return (empty($request->service) || empty($request->price));
    }

    public function invalidService($request): bool
    {
        return !preg_match("/^[a-zA-Z0-9 &]*$/", $request->service);
    }

    public function invalidNumber($request): bool
    {
        // Fixed: This should return true if invalid, false if valid
        $price = $request->price;

        // Check if it's a valid number (including decimals)
        if (!is_numeric($price)) {
            return true; // Invalid
        }

        // Check if it's not negative
        if (floatval($price) < 0) {
            return true; // Invalid
        }

        return false; // Valid
    }
}
