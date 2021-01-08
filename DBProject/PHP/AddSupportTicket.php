<?php
    require 'supportticket.php';
    if (isset($_POST['Post']))
    {
        $ReportDescription = $_POST['SupportTicketInfo'];
        $ReportDescription = stripslashes(nl2br($ReportDescription));
        $AdditionalInfo = UploadSupportFile('../SupportTicketFiles/','AdditionalSupportTicket','../HTML/supportticket.php',$_GET['id'], date('Y-m-d') );
        $Closed = 'W';
        $U_ID = $_GET['id'];
        if ($ReportDescription == '')
        {
            AlertJs("Ticket Description is Empty!");
            return;
        }
        if ($AdditionalInfo == '')
            $AdditionalInfo = NULL;
        AlertJS($ReportDescription);
        $result = supportticket::insertsupportticket($ReportDescription,$Closed, $U_ID, $AdditionalInfo);
        if ($result == true)
            AlertJs("Ticket submitted");
        else
            AlertJs("Failed to submit ticket");
        redirectJs("../HTML/supportticket.php");
    }

?>