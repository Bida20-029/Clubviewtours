<?php
// Retrieve form data
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$destination = $_POST['destination'];
$activities = $_POST['activities'];
$breakfast = $_POST['breakfast'];
$transport = $_POST['transport'];
$nights = $_POST['nights'];
$prefer = $_POST['prefer'];
$people = $_POST['people'];
$sharing = $_POST['sharing'];

// Perform calculations, generate quote content, etc.
$destinationPrice = 0;
if ($destination === 'Durban') {
    $destinationPrice = 750;
} elseif ($destination === 'Cape Town') {
    $destinationPrice = 750;
} elseif ($destination == 'Knysna'){
    $destinationPrice = 950;
} elseif ($destination == 'Mozambique'){
    $destinationPrice = 600;
} elseif ($destination == 'Namibia'){
    $destinationPrice = 450;
} elseif ($destination == 'Kasane'){
    $destinationPrice = 1200;
} elseif ($destination == 'Otherbw'){
    $destinationPrice = 1000;
} elseif ($destination == 'OtherSA'){
    $destinationPrice = 1000;
}

$breakfastprefer = 0;
if ($breakfast === 'yes') {
    $breakfastprefer = 300;
} elseif ($breakfast === 'no') {
    $breakfastprefer = 0;
}

$nightsPrice = 0;
if ($nights === '1') {
    $nightsPrice = 1;
} elseif ($nights === '2') {
    $nightsPrice = 2;
} elseif ($nights === '3'){
    $nightsPrice = 3;
} elseif ($nights === '4'){
    $nightsPrice = 4;
} elseif ($nights === '5'){
    $nightsPrice = 5;
} elseif ($nights === '6'){
    $nightsPrice = 6;
} elseif ($nights === '7'){
    $nightsPrice = 7;
} elseif ($nights === '8'){
    $nightsPrice = 8;
}

$prefertotal = 0;
if ($prefer === 'lodge') {
    $prefertotal = -100;
} elseif ($prefer === 'bed/breakfast') {
    $prefertotal = -80;
} elseif ($prefer === 'hotel') {
    $prefertotal = 100;
}

$sharingtotal = 0;
if ($sharing === 'yes') {
    $sharingtotal = 0.5;
} elseif ($sharing === 'no') {
    $sharingtotal = 1;
}

$activitiestotal = 0;
if ($activities === 'yes') {
    $activitiestotal = 300;
} elseif ($activities === 'no') {
    $activitiestotal = 0;
}

// Calculate total
$total = (($destinationPrice + $prefertotal + $breakfastprefer + $activitiestotal) * $nightsPrice) * $sharingtotal;

// Generate PDF using TCPDF or FPDF
require_once('tcpdf/tcpdf.php'); // Include TCPDF library
$pdf = new TCPDF();

// Add content to PDF
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Quote for $name $surname", 0, 1);
$pdf->Cell(0, 10, "Email: $email", 0, 1);
$pdf->Cell(0, 10, "Total: $total", 0, 1);
// Add more quote content

// Output PDF
$pdf->Output('quote.pdf', 'D'); // 'D' for download

// Optionally, save quote details to database

?>
