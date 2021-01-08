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
        public function __construct($EID)
        {
            $db = DBConnection::getInst()->getConnection();
            $query = "SELECT * FROM Employee WHERE Employee_ID = '$EID'";
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
        }
    }

?>