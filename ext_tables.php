<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'PITS.PdfConverter',
            'Converterpdf',
            'Converter'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'PITS.PdfConverter',
                'web', // Make module a submodule of 'web'
                'pdfconverter', // Submodule key
                '', // Position
                [
                    'Converter' => 'uriBuild','pdfConversion','htmltopdf','listAction',
                    
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:pdf_converter/Resources/Public/Icons/user_mod_pdfconverter.svg',
                    'labels' => 'LLL:EXT:pdf_converter/Resources/Private/Language/locallang_pdfconverter.xlf',
                ]
            );
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('pdf_converter', 'Configuration/TypoScript', 'Page to Pdf');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pdfconverter_domain_model_converter', 'EXT:pdf_converter/Resources/Private/Language/locallang_csh_tx_pdfconverter_domain_model_converter.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pdfconverter_domain_model_converter');

    }
);
