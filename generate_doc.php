<?php
// =============================================
// 1. INITIAL SETUP (ERROR HANDLING & MEMORY)
// =============================================
ini_set('memory_limit', '256M');          // Prevent memory issues
error_reporting(E_ALL);                   // Show all errors
ini_set('display_errors', 1);             // Display errors (debugging)
ob_start();                               // Buffer output to prevent corruption

// =============================================
// 2. LOAD PHPWORD (WITH PATH VALIDATION)
// =============================================
$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    die("Error: Composer dependencies not found. Run 'composer install' first.");
}
require $autoloadPath;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Converter;

// =============================================
// 3. GENERATE THE DOCUMENT
// =============================================
$phpWord = new PhpWord();
$section = $phpWord->addSection();

// Set default font (optional)
$phpWord->setDefaultFontName('Arial');
$phpWord->setDefaultFontSize(11);

// Add sample content (replace with your actual content)
$section->addText(
    'Website Development Project Document',
    ['bold' => true, 'color' => '71227D', 'size' => 16],
    ['alignment' => 'center']
);
$section->addTextBreak(1);

// =============================================
// 4. SAVE & DOWNLOAD (WITH SAFETY CHECKS)
// =============================================
$filename = "Website_Development_Proposal_" . date('Y-m-d') . ".docx";

// Option 1: Save locally first for testing (comment out headers if using this)
// $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save($filename);
// echo "Saved locally: " . realpath($filename);
// exit;

// Option 2: Force download
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Cache-Control: max-age=0');
header('Expires: 0');
header('Pragma: public');

// Clear buffers and send file
ob_end_clean(); // Critical: Remove any accidental output
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');
exit;
?>