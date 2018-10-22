<?php
namespace PITS\PdfConverter\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
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
     * 
     */
    public function __construct() {
        $objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->pageRepository = GeneralUtility::makeInstance('TYPO3\CMS\Frontend\Page\PageRepository');
        $this->uriBuilder = $objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);
        $pdfGenerator = GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf');
    }



     /**
     * action uriBuild
     * 
     * @return void
     */
    public function uriBuildAction()
    {
      $pageRecord = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
       if ($pageRecord == NULL){
           $standaloneView = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("TYPO3\CMS\Fluid\View\StandaloneView");
           $standaloneView->   setFormat('html');
           $standaloneView->setTemplatePathAndFileName(ExtensionManagementUtility::extPath('pdf_converter').'Resources/Private/Templates/Converter/Index.html');
           echo $standaloneView->render();
           exit;
       }

      $pageType = $this->pageRepository->getPage($pageRecord);
      if ($pageType['doktype']==1||$pageType['doktype']==3||$pageType['doktype']==4) {
        $uri = $this->uriBuilder->reset()
                ->setTargetPageUid($pageRecord)
                ->setCreateAbsoluteUri(TRUE)
                ->buildFrontendUri();          
        $pdfDowload = $this->downloadPdf($uri);
        $pdfView    = $this->listAction($uri);
       
       
      }

      else{
        $this->redirect('invalidPage');
      }

      
    }

    /**
    * action list
    *
    * @return url
    */
   public function listAction($url)
   {  

           $pdfGenerator = GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf',array('ignoreWarnings' => true));
           $pdfGenerator->binary = PATH_typo3conf.'ext/pdf_converter/Libraries/bin/wkhtmltopdf';
           $directorypath = PATH_site;
           $pdfGenerator->addPage($url);
           
           if (!$pdfGenerator->send()) {
             throw new \Exception('Could not create PDF: '.$pdfGenerator->getError());
           }
           else {
              $pdfGenerator->send();
           }

   }

   /**
    * action downloadPdf
    *
    * @return void
    */
   public function downloadPdf($url)
   {


      $pdfGenerator = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('mikehaertl\wkhtmlto\Pdf',array('ignoreWarnings' => true));
      $pdfGenerator->binary = PATH_typo3conf.'ext/pdf_converter/Libraries/bin/wkhtmltopdf';
      $directorypath = PATH_site;
      $pdfGenerator->addPage($url);
      if (!$pdfGenerator->saveAs($directorypath . 'typo3conf/ext/pdf_converter//Resources/Private/Downloads/report.pdf')) {
                   throw new \Exception('Could not create PDF: '.$pdfGenerator->getError());
           }
      else {

                $pdfGenerator->saveAs($directorypath . 'typo3conf/ext/pdf_converter/report1.pdf');
            }
   }


   /**
    * action invalidPage
    *
    */
   public function invalidPageAction()
   {

   }
     
   
     

}

