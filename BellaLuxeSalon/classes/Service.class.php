<?php


class Service extends DbConnect
{
    public $createdSuccess = 'Menu item added successfully!';
    public $modifiedSuccess = 'Menu item modified successfully!';
    public $deletedSuccess = 'Menu deleted successfully!';
    public $databaseError = 'Database error occurred';
    public $createdError = 'Menu item was not added';
    public $modifiedError = 'Menu item was not modified';
    public $deletedError = 'Menu item was not deleted';



/**
 * Imports an array of services (as a JSON string) into the menu table.
 *
 * Uses getJsonData() to read and decode the JSON, then loops through
 * each record and passes it to create(), which expects an object
 * with ->type, ->service, ->price properties.
 *
 * @return array Summary of results: counts + any per-row errors
 */
public function importServices()
{
   // Clear existing data before import
    $this->truncate();
    // Step 1: Validate and decode the JSON
    $services = $this->getJsonData();

    $results = [
        'total'     => count($services),
        'succeeded' => 0,
        'failed'    => 0,
        'errors'    => [],
    ];

    // Step 2: Loop through each decoded record and insert it
    foreach ($services as $index => $service) {

        // Basic sanity check on required fields
        if (!isset($service['type'], $service['service'], $service['price'])) {
            $results['failed']++;
            $results['errors'][] = "Row {$index}: missing required field(s)";
            continue;
        }

        // create() expects an object with -> access, so cast the row
        $request = (object) [
            'type'    => $service['type'],
            'service' => $service['service'],
            'price'   => $service['price'],
        ];

        $response = $this->create($request);

        if ($response === $this->createdSuccess) {
            $results['succeeded']++;
        } else {
            $results['failed']++;
            $results['errors'][] = "Row {$index} ({$service['service']}): insert failed";
        }
    }

    return $results;
}
    public function getJsonData()
    {
        $path = __DIR__ . '/../view/data/services.json';
        $jsonString = file_get_contents($path);

        if ($jsonString === false) {
            error_log("Could not read service data file at {$path}");
            // handle accordingly — return, throw, etc.
        } else {
            // Validate and sanitize the data
            $data = json_decode($jsonString, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON data');
            }

            // Further validation can be added here as needed
            return $data;
        }
    }

    public function truncate()
    {
        try {
            $sql = "TRUNCATE TABLE menu";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return ['success' => true, 'message' => 'Menu table truncated successfully!'];
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return ['success' => false, 'message' => 'Could not truncate menu table.'];
        } finally {
            $this->closeConn();
        }
    }


    public function create(object$request)
    {
        //Insert a new service in the database
        try {
            $sql = "INSERT INTO menu (type, service, price) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->type, $request->service, $request->price]);
            $rows = $stmt->rowCount();
            return $rows > 0
                ? $this->createdSuccess
                : $this->createdError;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
        } finally {
            $this->closeConn();
        }
    }
    public function show(string $service)
    {
        //Show all menu items
        try {
            $sql = "SELECT * FROM menu WHERE type = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$service]);
            $results = $stmt->fetchAll();
            $this->closeConn();
            return $results;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

    public function update(object $request)
    {
        //Update a menu item
        try {
            $sql = "UPDATE menu SET service = ?, price = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->service, $request->price, $request->id]);
            $rows = $stmt->rowCount();
            return $rows > 0
                ? $this->modifiedSuccess
                : $this->modifiedError;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
        } finally {
            $this->closeConn();
        }
    }
    public function delete(object $request)
    {
        //Delete a menu item
        try {
            $sql = "DELETE FROM menu WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->id]);
            $rows = $stmt->rowCount();
            return $rows > 0
                ? $this->deletedSuccess
                : $this->deletedError;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
        } finally {
            $this->closeConn();
        }
    }
}
