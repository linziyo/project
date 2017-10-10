<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\ListItem;
use PhpOffice\PhpWord\Style\TOC;
use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function index()
    {
        $templateFile = "c:\\template.docx";
//        $templateFile = resource_path() . '\assets\default.dot';
//        $phpword = new PHPWord();
//        $templateProsessor = new TemplateProcessor("c:\\word.docx");
//        $templateProsessor->setValue("name", "fanshengbo");
//        $templateProsessor->saveAs("c:\\word1.docx");

        $phpword = \PhpOffice\PhpWord\IOFactory::load($templateFile);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'HTML');
        $objWriter->save('c:\\helloWorld.html');
    }
}
