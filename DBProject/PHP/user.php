<?php

require_once 'connection.php';
class user
{
    public $dbConnection;
    public $U_ID;
    public $FName;
    public $LName;
    public $Username;
    public $Password;
    public $Email;
    public $Address;
    public $Bdate;
    public $Gender;
    public $Developer;
    public $Phone_Number;
    public $Balance;
    public $Billing_Info;
    public $Ban_End;
    public $Profile_Picture;
    public $Hide;

    // Creates a new object and initializes its data
    public function __construct($U_ID)
    {
        $this ->dbConnection = DBConnection::getInst()->getConnection();
        $result = $this->dbConnection->query("SELECT * FROM  users WHERE U_ID='$U_ID'");
        $row = $result->fetch_assoc();
        $this->$U_ID = $row['U_ID'];
        $this->FName = $row['FName'];
        $this->LName = $row['LName'];
        $this->Username = $row['Username'];
        $this->Password = $row['Password'];
        $this->Email = $row['Email'];
        $this->Address = $row['Address'];
        $this->Bdate = $row['Bdate'];
        $this->Gender = $row['Gender'];
        $this->Developer = $row['Developer'];
        $this->Phone_Number = $row['Phone_Number'];
        $this->Balance = $row['Balance'];
        $this->Billing_Info = $row['Billing_Info'];
        $this->Ban_End = $row['Ban_End'];
        if ($row['Profile_Picture'])
            $this->Profile_Picture = $row['Profile_Picture'];
        else
            $this->Profile_Picture = "../IMAGES/DEFAULT_USER.jpg";
        $this->Hide = $row['Hide'];
    }

    public function getFName($id)
    {
        $result = $this->dbConnection->query("SELECT FName FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["FName"];
            }
        }
    }
    public function getLName($id)
    {
        $result = $this->dbConnection->query("SELECT LName FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["LName"];
            }
        }
    }

    public function getUserName($id)
    {
        $result = $this->dbConnection->query("SELECT Username FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Username"];
            }
        }
    }
    public function getEmail($id)
    {
        $result = $this->dbConnection->query("SELECT Email FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Email"];
            }
        }
    }
    public function getAddress($id)
    {
        $result = $this->dbConnection->query("SELECT Address FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Address"];
            }
        }
    }
    public function getBDate($id)
    {
        $result = $this->dbConnection->query("SELECT Bdate FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Bdate"];
            }
        }
    }
    public function getGender($id)
    {
        $result = $this->dbConnection->query("SELECT Gender FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Gender"];
            }
        }
    }
    public function getDevStatus($id)
    {
        $result = $this->dbConnection->query("SELECT Developer FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Developer"];
            }
        }
    }
    public function getPhoneNumber($id)
    {
        $result = $this->dbConnection->query("SELECT Phone_Number FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Phone_Number"];
            }
        }
    }
    public function getBalance($id)
    {
        $result = $this->dbConnection->query("SELECT Balance FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Balance"];
            }
        }
    }
    public function getBilingInfo($id)
    {
        $result = $this->dbConnection->query("SELECT Billing_Info FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Billing_Info"];
            }
        }
    }
    public function getBanEnd($id)
    {
        $result = $this->dbConnection->query("SELECT Ban_End FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Ban_End"];
            }
        }
    }
    public function getProfilePicture($id)
    {
        $result = $this->dbConnection->query("SELECT Profile_Picture FROM  users WHERE U_ID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {?>
              <?php if ($row['Profile_Picture'])?>
                            <img class="img-fluid rounded-circle" src="<?php echo $row['Profile_Picture'];?>" alt="">
              <?php if(!$row['Profile_Picture']) 
               {?>
                <img class="img-fluid rounded-circle" src="../IMAGES/DEFAULT_USER.jpg" alt="">
             <?php }
                ?>
           <?php }
        }
    
    }

    // Probably won't get much use for now
    public function getAllIDs()
    {
        $result = $this->dbConnection->query("SELECT U_ID FROM  users");
        return $result;
    }

    //Doesn't actually insert a user, just creates a query and returns it
    public  function InsertUser(
        $U_ID,
        $FName,
        $LName,
        $Username,
        $Password,
        $Email,
        $Address,
        $Bdate,
        $Gender,
        $Developer,
        $Phone_Number,
        $Balance,
        $Billing_Info,
        $Ban_End,
        $Profile_Picture
    ) {
        $insertQuery = "INSERT INTO users
         (U_ID, FName, LName, Username, Password,Email, Address,Bdate,Gender, 
        Developer,Phone_Number, Balance,Billing_Info, Ban_End, Profile_Picture)
         VALUES ('$U_ID','$FName','$LName','$Username','$Password','$Email','$Address','$Bdate','$Gender','$Developer','$Phone_Number','$Balance','$Billing_Info','$Ban_End','$Profile_Picture') ";
        return $insertQuery;
    }
    public function UpdateUserInfo(
        $U_ID,
        $FName,
        $LName,
        $Username,
        $Password,
        $Email,
        $Address,
        $Bdate,
        $Gender,
        $Profile_Picture,
        $Hide,
        $Phone_Number
    ) {
        $updateQuery = "UPDATE users SET FName = '$FName', LName = '$LName', Username = '$Username', Password = '$Password', Email = '$Email', Address = '$Address', Bdate = '$Bdate', Gender = '$Gender', Profile_Picture = '$Profile_Picture', Hide = '$Hide', Phone_Number = '$Phone_Number' WHERE U_ID = $U_ID";
         $this->dbConnection->query($updateQuery);
    }
}
?>