<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'desire_job';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $exception) {
            echo "Connection failed: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update($table, $data, $where)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= $key . ' = :' . $key . ', ';
        }
        $set = rtrim($set, ', ');

        $query = "UPDATE $table SET $set WHERE $where";

        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($table, $where)
    {
        $query = "DELETE FROM $table WHERE $where";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function select($table, $columns = '*', $where = '', $params = [])
    {
        $query = "SELECT $columns FROM $table";
        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}

// Usage example

// $database = new Database();
// $connection = $database->getConnection();

// Insert example
// $data = array(
//     'name' => 'John Doe',
//     'email' => 'john@example.com',
//     'age' => 30
// );

// if ($database->insert('users', $data)) {
//     echo "Record inserted successfully!";
// } else {
//     echo "Failed to insert record!";
// }

// // Update example
// $data = array(
//     'name' => 'Jane Doe',
//     'email' => 'jane@example.com',
//     'age' => 32
// );

// $where = 'id = 1';

// if ($database->update('users', $data, $where)) {
//     echo "Record updated successfully!";
// } else {
//     echo "Failed to update record!";
// }

// // Delete example
// $where = 'id = 1';

// if ($database->delete('users', $where)) {
//     echo "Record deleted successfully!";
// } else {
//     echo "Failed to delete record!";
// }

// // Select example
// $columns = 'name, email';
// $where = 'age > :age';
// $params = array(':age' => 25);

// $results = $database->select('users', $columns, $where, $params);

// print_r($results);