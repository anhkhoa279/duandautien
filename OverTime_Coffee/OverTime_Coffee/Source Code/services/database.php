<?php
class db {
    private $hostName = "localhost";
    private $user = "root";
    private $password = "";
    private $name = "overtime_coffee";
    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->hostName,$this->user,$this->password,$this->name);
	}

    function runQuery($query, $param_type, $param_value_array) {
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param($param_type, ...$param_value_array);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultset = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        $stmt->close();
        return $resultset;
    }
    function runBaseQuery($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        $stmt->close();
        if(!empty($resultset)) {
            return $resultset;
        }
    }
}
?>