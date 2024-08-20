<?php

require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include_once "../libraries/koneksi.php";
    include_once "../libraries/konversi.php";
    include 'res/stikerkeluar.php';
    $content = ob_get_clean();

    // $html2pdf = new Html2Pdf('L', 'A4', 'en');
    $width_in_mm = 100;
    $height_in_mm = 60;
    $html2pdf = new HTML2PDF('L', array($width_in_mm, $height_in_mm), 'en', true, 'UTF-8', array(5, 0, 5, 5));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('stikerkeluar.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
