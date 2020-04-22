<?php

require_once 'vendor/autoload.php';

$name = basename(__FILE__, '.php');
    $name="www";
    $source = __DIR__ . "/{$name}.docx";

    $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
    // Adding an empty Section to the document...
    $section = $phpWord->addSection();
    // Adding Text element to the Section having font styled by default...
    $section->addText($data);

    $name=basename(__FILE__, '.php');
    $source = __DIR__ . "/{$name}.html";

    // Saving the document as HTML file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
    $objWriter->save($source);
