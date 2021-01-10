<?php
class statistics
{
    public $dbConnection;
    public function __construct()
    {
        $this->dbConnection = DBConnection::getInst()->getConnection();
    }

    public function getMastermindID()
    {
        $query = "SELECT MIN(EMPLOYEE_ID) FROM EMPLOYEE";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $mastermindIDFetch = mysqli_fetch_assoc($qResult);
            return $mastermindIDFetch['MIN(EMPLOYEE_ID)'];
        } else
            return 0;
    }
    public function getNumUsers()
    {
        $query = "SELECT COUNT(U_ID) FROM USERS";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumApps()
    {
        $query = "SELECT COUNT(App_ID) FROM APPLICATIONS";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumGroups()
    {
        $query = "SELECT COUNT(GROUP_ID) FROM GROUPS";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getAvgUserAge()
    {
        $query = "SELECT AVG(TIMESTAMPDIFF(YEAR, Bdate, CURDATE())) from users";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getAvgAppRating()
    {
        $query = "SELECT AVG(Stars) from review";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getAvgUpvotes()
    {
        $query = "SELECT AVG(UP_DOWN) from UP_DOWN_VOTED_POST";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getAvgNumAppUsers()
    {
        $query = "SELECT AVG(NumOfUsers) from APPLICATIONS";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getAvgNumGroupMembers()
    {
        $query = "SELECT COUNT(U_ID) AS MEM from MEMBER_IN GROUP BY Group_ID";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $sum = 0;
            while ($row = mysqli_fetch_row($qResult)) {
                $sum +=  $row[0];
            }
            $numGroups = $this->getNumGroups();
            return $sum / $numGroups;
        } else
            return 0;
    }
    public function getMostInstalledApp()
    {
        $query = "SELECT Application_Name,NumOfUsers, App_ID FROM `APPLICATIONS` WHERE NumOfUsers = (SELECT MAX(NumOfUsers) FROM applications)";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_assoc();
            return $row;
        } else
            return 0;
    }

    public function getAvgAppPrice()
    {
        $query = "SELECT AVG(Price) FROM applications";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getNumEmp()
    {
        $query = "SELECT COUNT(Employee_ID) FROM employee";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getNumSupport()
    {
        $AccountType = SUPPORT_ACCOUNT;
        $query = "SELECT COUNT(Employee_ID) FROM employee WHERE Account_Type = '$AccountType'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }

    public function getNumAdmin()
    {
        $AccountType = ADMIN_ACCOUNT;
        $query = "SELECT COUNT(Employee_ID) FROM employee WHERE Account_Type = '$AccountType'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumBanned()
    {
        $query = "SELECT COUNT(U_ID) FROM users WHERE Ban_End >= Curdate();";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumHidden()
    {
        $query = "SELECT COUNT(U_ID) FROM applications where Hide = '1'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getAvgSalary()
    {
        $query = "SELECT AVG(salary) from employee";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumSupportTickets()
    {
        $query = "SELECT count(TicketID) from supportticket";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumSupportTicketsOpen()
    {
        $query = "SELECT COUNT(TicketID) from supportticket WHERE Closed = 'W'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumSupportTicketsWorkedOn()
    {
        $query = "SELECT COUNT(TicketID) from supportticket WHERE Closed = 'B'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
    public function getNumSupportTicketsClosed()
    {
        $query = "SELECT COUNT(TicketID) from supportticket WHERE Closed != 'B' AND Closed != 'W'";
        $qResult =  $this->dbConnection->query($query);
        if ($qResult && $qResult->num_rows > 0) {
            $row = $qResult->fetch_row()[0];
            return $row;
        } else
            return 0;
    }
}
