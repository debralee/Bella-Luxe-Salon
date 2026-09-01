<?php


class Service extends DbConnect
{
    public $createdSuccess = 'Menu item added successfully!';
    public $modifiedSuccess = 'Menu item modified successfully!';
    public $deletedSuccess = 'Menu deleted successfully!';
    public $databaseError = 'Database error occurred';

    public function create($request)
    {
        //Insert a new service in the database
        try {
            $sql = "INSERT INTO menu (type, service, price) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->type, $request->service, $request->price]);
            $this->closeConn();
            return $this->createdSuccess;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
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

    public function update($request)
    {
        //Update a menu item
        try {
            $sql = "UPDATE menu SET service = ?, price = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->service, $request->price, $request->id]);
            $this->closeConn();
            return $this->modifiedSuccess;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
        }
    }
    public function delete($request)
    {
        //Delete a menu item
        try {
            $sql = "DELETE FROM menu WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->id]);
            $this->closeConn();
            return $this->deletedSuccess;
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log("Database error: " . $e->getMessage());
            return $this->databaseError;
        }
    }
}
