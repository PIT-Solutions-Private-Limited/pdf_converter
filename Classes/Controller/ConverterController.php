<?php
namespace PITS\PdfConverter\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use mikehaertl\wkhtmlto\Pdf;

/***
 *
 * This file is part of the "Page to Pdf" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Kasim Sabah <kasim,sm@pitsolutions.com>, PIT solutions
 *
 ***/

/**
 * ConverterController
 */
class ConverterController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * converterRepository
     *
     * @var \PITS\PdfConverter\Domain\Repository\ConverterRepository
     * @inject
     */
    protected $converterRepository = null;

    /**
     * 
     */
    public function __construct() {
        $objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->uriBuilder = $objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);
        $pdfGenerator = GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf');

    }

     /**
     * 
     * 
     */
    public function uriBuildAction()
    {
       $pageRecord = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
       $uri = $this->uriBuilder->reset()
                ->setTargetPageUid($pageRecord)
                ->setCreateAbsoluteUri(TRUE)
                ->buildFrontendUri();

       $pdf1 = $this->pdfConversionAction($uri);
       // $pdf2 = $this->htmltopdf($uri);
       $pdf3 = $this->listAction($uri);
       file_put_contents('/var/www/typo3_8/pdf1.pdf', $pdf1);
      
    }

    /**
     * action pdfConversion
     *
     * @return void
     */
    public function pdfConversionAction($url)
    {   


        // $descriptors = [
        //     1 => ['pipe', 'w'], // stdout
        //     2 => ['pipe', 'w'], // stderr
        // ];

        // // Set to true, if you encounter "QXcbConnection: Could not connect to display"
        // $useXvfb = true;

        // $process = proc_open('wkhtmltopdf -q' . escapeshellarg($url) . ' -', $descriptors, $pipes);


        // $pdf = stream_get_contents($pipes[1]);
        // $errors = stream_get_contents($pipes[2]);
        // // DebuggerUtility::var_dump($pipes[1]);exit;


        // // Close the process
        // fclose($pipes[1]);
        // proc_close($process);

        // if ($errors) {
        //     throw new \Exception('PDF generation error: ' . $errors);
        // }

        // return $pdf;
    
    }
    //  public function htmltopdf($url)
    // {
    //     # code...

    //     $pdf = new Pdf;
    //     // $pdf->addPage('/path/to/page.html');
    //     // $pdf->addPage('<html>....</html>');
    //     $pdf->addPage($url);

    //     // Add a cover (same sources as above are possible)
    //     // $pdf->addCover('/path/to/mycover.html');

    //     // Add a Table of contents
    //     $pdf->addToc();

    //     // Save the PDF
    //     if (!$pdf->saveAs('/var/www/typo3_8/pdf22.pdf')) {
    //         $error = $pdf->getError();
    //         // ... handle error here
    //     }
    //     else($pdf->saveAs('/var/www/typo3_8/pdf22.pdf'));


    //     // ... or send to client for inline display
    //     // if (!$pdf->send()) {
    //     //     $error = $pdf->getError();
    //     //     // ... handle error here
    //     // }

    //     // ... or send to client as file download
    //     // if (!$pdf->send('report.pdf')) {
    //     //     $error = $pdf->getError();
    //     //     // ... handle error here
    //     // }

    //     // ... or you can get the raw pdf as a string
    //     // $content = $pdf->toString();
    //     // DebuggerUtility::var_dump($content);exit;
            
    // }

     /**
    * action list
    *
    * @return void
    */
   public function listAction($url)
   {   


           $pdfGenerator = GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf',array('ignoreWarnings' => true));
           $pdfGenerator->binary = PATH_typo3conf.'ext/pdf_converter/Libraries/bin/wkhtmltopdf';

           $directorypath = PATH_site;
           // $url = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL');
           $pdfGenerator->addPage($url);

           if (!$pdfGenerator->send()) {
                       throw new \Exception('Could not create PDF: '.$pdfGenerator->getError());
               }
               else {
                  $pdfGenerator->send();
                  DebuggerUtility::var_dump("success");
               }
               exit();

           if($pdfGenerator->binary) {
               DebuggerUtility::var_dump("created binary");exit;
            }
       
       // DebuggerUtility::var_dump($data);
   }

   // /**
   //  * action downloadPage
   //  *
   //  * @return void
   //  */
   // public function downloadPageAction()
   // {
   //     $pdfGenerator = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf',array('ignoreWarnings' => true));
   //     $pdfGenerator->binary = 'c :confused: program files/wkhtmltopdf/bin/wkhtmltopdf.exe';
   //     $directorypath = PATH_site;
   //     $url = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL');
   //     $pdfGenerator->addPage($url);
   //     if (!$pdfGenerator->saveAs($directorypath . 'typo3conf/ext/wkhtml_pdf/Pdfss/report1.pdf')) {
   //                 throw new \Exception('Could not create PDF: '.$pdfGenerator->getError());
   //         }
   //         else {
   //            $pdfGenerator->saveAs($directorypath . 'typo3conf/ext/wkhtml_pdf/Pdfss/report1.pdf');
   //            DebuggerUtility::var_dump("success");
   //         }
   //         exit();

   //     if($pdfGenerator->binary) {
   //         DebuggerUtility::var_dump("created binary");exit;
   //     }


   //     $wkhtmlpdfs = $this->wkhtmlpdfRepository->findAll();
   //     $this->view->assign('wkhtmlpdfs', $wkhtmlpdfs);
   // }

   
     

}

