<?php 

include 'database.php';
$withdrawn_object = new withdrawn();

if(isset($_POST['action']) && $_POST['action'] == 'amount_withdrawn'){

    $ammount_request = $_POST['WithdrawnAmmount'];

    $withdrawn_object->withdrawn_request($ammount_request);
}


?>