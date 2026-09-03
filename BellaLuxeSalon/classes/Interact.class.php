<?php


class Interact extends DbConnect{

    public function create(object $request)
    {
        try {
            $sql = "INSERT INTO menu (type, service, price) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->type, $request->service, $request->price]);
            $rows = $stmt->rowCount();

            return $rows > 0
                ? ['success' => true, 'message' => 'Menu item added successfully!']
                : ['success' => false, 'message' => 'Menu item was not added.'];
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Could not add menu item.'];
            // log $e->getMessage() somewhere instead of showing it to the user
        } finally {
            $this->closeConn();
        }
    }
        public function show(string $service)
        {
            try{
            $sql = "SELECT * FROM menu WHERE type = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$service]);
            $results = $stmt->fetchAll();
            $this->closeConn();
            return $results;
            } catch (\PDOException $e) {
                // Log the error or handle it appropriately
                error_log("Database error: " . $e->getMessage());
                return [];
            }

        }

        public function update(object $request)
        {
            try {
                $sql = "UPDATE menu SET service = ?, price = ? WHERE id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$request->type, $request->service, $request->price]);
                $rows = $stmt->rowCount();

            return $rows > 0
                ? ['success' => true, 'message' => 'Menu item updated successfully!']
                : ['success' => false, 'message' => 'Menu item was not updated.'];
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Could not update menu item.'];
            // log $e->getMessage() somewhere instead of showing it to the user
        } finally {
            $this->closeConn();
        }
    }
        public function delete(object $request)
        {
            try {
                $sql = "DELETE FROM menu WHERE id = ?";
                $stmt = $this->connect()->prepare($sql);
                $rows =$stmt->execute([$request->id]);
            return $rows > 0
                ? ['success' => true, 'message' => 'Menu deleted successfully!']
                : ['success' => false, 'message' => 'Menu item was not deleted.']   ;
            } catch (\PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return ['success' => false, 'message' => 'Could not delete menu item.'];

            } finally {
                $this->closeConn();
            }
        }

}