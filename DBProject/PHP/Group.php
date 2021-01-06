<?php

include_once('connection.php');

class group
{
    public $dbConnection;
    public $GROUP_ID;
    public $GroupName;
    public $Date_Created;
    public $Group_picture;
    public $Group_Description;
    public $U_ID;

    // Creates a new object and initializes its data
    public function __construct($Group_ID) //why id?????????????? Cause it's unique
    {
        $this->dbConnection = DBConnection::getInst()->getConnection();
        $result = $this->dbConnection->query("SELECT * FROM groups WHERE Group_ID='$Group_ID'");
        $row = $result->fetch_assoc(); //why???? Returns a row as an associative array
        $this->GROUP_ID = $row['GROUP_ID']; //????? Kinda not needed, yes
        $this->GroupName = $row['GroupName'];
        $this->Date_Created = $row['Date_Created'];
        $this->Group_Description = $row['Group_Description'];
        $this->U_ID = $row['U_ID'];
        $this->Group_picture = $row['Group_picture'];
    }
    public function getGroupName($id)
    {
        $result = $this->dbConnection->query("SELECT GroupName FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["GroupName"];
            }
        }
    }
    public function getDateCreated($id)
    {
        $result = $this->dbConnection->query("SELECT Date_Created FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Date_Created"];
            }
        }
    }
    public function getGroupDescription($id)
    {
        $result = $this->dbConnection->query("SELECT Group_Description FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Group_Description"];
            }
        }
    }
    public function getUser($id)
    {
        $result = $this->dbConnection->query("SELECT U_ID FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["U_ID"];
            }
        }
    }
    public function getGroupPicture($id)
    {
        $result = $this->dbConnection->query("SELECT Group_picture FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
?>
                <img class="img-fluid rounded-circle" src="<?php echo $row["Group_picture"]; ?>" alt="">
            <?php
            }
        }
    }
    public function getGroupPicture2($id)
    {
        $result = $this->dbConnection->query("SELECT Group_picture FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                echo $row["Group_picture"];
            }
        }
    }
    public function getGroupPicture_Circle($id)
    {
        $result = $this->dbConnection->query("SELECT Group_picture FROM  Groups WHERE Group_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            ?>
                <img class="img-fluid rounded-circle" src="<?php echo $row["Group_picture"]; ?>" alt="">
<?php
            }
        }
    }
    public static function InsertGroup($GroupName, $Date_Created, $Group_picture, $Group_Description, $U_ID)
    {
        $dbConnection = DBConnection::getInst()->getConnection();
        $result = $dbConnection->query("INSERT INTO Groups (GroupName,Date_Created,Group_picture,Group_Description,U_ID)VALUES('$GroupName','$Date_Created','$Group_picture','$Group_Description',$U_ID)");
    }

    public static function InsertMember_in($U_ID, $Group_ID)
    {
        $dbConnection = DBConnection::getInst()->getConnection();
        $result = $dbConnection->query("INSERT INTO member_in (U_ID,Group_ID)VALUES($U_ID,$Group_ID)");
    }

    public static function GetAllGroupID()
    {
        $dbConnection = DBConnection::getInst()->getConnection();
        $result = $dbConnection->query("SELECT Group_ID FROM groups");
        return $result;
    }

    public function GetNumMembers($GROUP_ID)
    {
        $result = $this->dbConnection->query("SELECT COUNT(U_ID) FROM member_in WHERE Group_ID=$GROUP_ID");
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["COUNT(U_ID)"];
            }
        }
    }

    public static function UpdateGroupPic($picPath, $groupID)
    {
        $dbConnection = DBConnection::getInst()->getConnection();
        $result = $dbConnection->query("UPDATE groups SET Group_picture='$picPath' WHERE GROUP_ID=$groupID");
    }
}

?>