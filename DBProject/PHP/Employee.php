<?php
    require_once 'connection.php';
    class Employee
    {
        public $Employee_ID;
        public $Gender;
        public $Bdate;
        public $Salary;
        public $Employee_Address;
        public $Department;
        public $Phone;
        public $Email;
        public $Fname;
        public $Lname;
        public $Account_Type;
        public $Password;
        public function __construct($EID)
        {
            $db = DBConnection::getInst()->getConnection();
            $query = "SELECT * FROM Employee WHERE Employee_ID = $EID";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
            $this->Employee_ID = $row['Employee_ID'];
            $this->Gender = $row['Gender'];
            $this->Bdate = $row['Bdate'];
            $this->Salary = $row['Salary'];
            $this->Employee_Address = $row['Employee_Address'];
            $this->Department = $row['Department'];
            $this->Phone = $row['Phone'];
            $this->Email = $row['Email'];
            $this->Fname = $row['Fname'];
            $this->Lname = $row['Lname'];
            $this->Account_Type = $row['Account_Type'];
            $this->Password = $row['Password'];
        }

        public static function getManager()
        {
            $db = DBConnection::getInst()->getConnection();
            $query = "SELECT MIN(Employee_ID) FROM Employee";
            $result = $db->query($query);
            $result = $result->fetch_assoc();
            return $result;
        }

        public static function getAllEmployees()
        {
            $db = DBConnection::getInst()->getConnection();
            $query = "SELECT * FROM Employee";
            $result = $db->query($query);
            return $result;
        }
    }


?>