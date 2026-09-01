<?php


class Interact extends DbConnect{



        public function create($request)
        {
            $sql = "INSERT INTO menu (type, service, price) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->type,$request->service, $request->price]);
            $this->closeConn();
            return ['success' => true, 'message' => 'Menu item added successfully!'];
        }
        public function show(string $service)
        {
            // Method 1: Using named parameters (RECOMMENDED)
            $sql = "SELECT * FROM menu WHERE type = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$service]);
            $results = $stmt->fetchAll();
            $this->closeConn();
            return $results;

        }
        // public function show(string $request)
        // {
        //     try {
        //         $sql = "SELECT * FROM menu WHERE type = :request";
        //         $stmt = $this->connect()->prepare($sql);
        //         $stmt->execute([':request' => $request]);
        //         $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Specify fetch mode
        //         return $results;
        //     } catch (PDOException $e) {
        //         // Log the error or handle it appropriately
        //         error_log("Database error: " . $e->getMessage());
        //         return []; // Return empty array instead of crashing
        //     }
        // }
        public function update($request)
        {
            $sql = "UPDATE menu SET service = ?, price = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->service, $request->price, $request->id]);
            $this->closeConn();
            return ['success' => true, 'message' => 'Menu item modified successfully!'];
        }
        public function delete($request)
        {
            $sql = "DELETE FROM menu WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request->id]);
            $this->closeConn();
            return ['success' => true, 'message' => 'Menu deleted successfully!'];
        }

}