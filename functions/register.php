<?php
namespace Register;

require_once dirname(__FILE__) . "/../connections/database.php";

/**
 * Ambil semua data penumpang
 */
function get()
{
    global $mysql;

    $stmt = $mysql->prepare("SELECT * FROM passenger ORDER BY PassengerID DESC");
    $stmt->execute();
    return $stmt->get_result();
}

function create($data)
{
    global $mysql;

    $FullName      = $data['FullName'];
    $gender        = $data['gender'];
    $birthDate     = $data['birth_date'];
    $placeOfBirth  = $data['placeOfBirth'];
    $contactEmail  = $data['contactEmail'];
    $contactNumber = $data['contactNumber'];

    $stmt = $mysql->prepare("INSERT INTO passenger(Name, gender, BirthDate, PlaceOfDate, ContactEmail, ContactNumber) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $Fullname, $gender, $birthDate, $placeOfBirth, $contactEmail, $contactNumber);
    return $stmt->get_result();
}
