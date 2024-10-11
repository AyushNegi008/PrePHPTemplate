<?php
// Proxy script to fetch and serve the PDF
require "dbcon.php";

$url = $contentloc."/" . $_GET['file'];

// Set appropriate headers
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="downloaded.pdf"');

// Fetch the PDF and output it
echo file_get_contents($url);
?>