<?php
class ServiceController extends Service
{
    public $emptyInputError = 'Please fill in all required fields (service name and price)';
    public $invalidServiceNameError = 'Invalid service name. Only letters, numbers, spaces and the ampersand are allowed';
    public $invalidNumberError = 'Invalid price format. Please enter a valid number';
    public $invalidServiceIdError = 'Invalid service ID';

    public function resetDemoData()
    {
        $this->importServices();
    }
    public function showServices($service)
    {
        $results = $this->show($service);
        return $results;
    }

    public function createService(object $request)
    {
        // Handle validation
        if ($this->emptyInput($request)) {
            return $this->emptyInputError;
        } elseif ($this->invalidService($request)) {
            return $this->invalidServiceNameError;
        } elseif ($this->invalidNumber($request)) {
            return $this->invalidNumberError;
        } else {

            // Call your create method
            $result = $this->create($request);
            return $result;
        }
    }

    public function modifyService(object $request)
    {
        // Handle validation
        if ($this->emptyInput($request)) {
            return $this->emptyInputError;
        } elseif ($this->invalidService($request)) {
            return $this->invalidServiceNameError;
        } elseif ($this->invalidNumber($request)) {
            return $this->invalidNumberError;
        } else {
            $result = $this->update($request);
            return $result;
        }
    }

    public function deleteService(object $request)
    {
        // Handle validation - you might want to add ID validation here
        if (empty($request->id)) {
            return $this->invalidServiceIdError;
        }

        // Call your delete method
        $result = $this->delete($request);
        return $result;
    }

    // Validation methods
    public function emptyInput(object $request): bool
    {
        return (empty($request->service) || empty($request->price) || empty($request->type));
    }

    public function invalidService(object $request): bool
    {
        return !preg_match("/^[a-zA-Z0-9 '&]*$/", $request->service);
    }

    public function invalidNumber(object $request): bool
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
