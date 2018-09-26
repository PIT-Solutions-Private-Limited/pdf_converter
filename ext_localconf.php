<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PITS.PdfConverter',
            'Converterpdf',
            [
                'Converter' => 'list','uriBuild'
            ],
            // non-cacheable actions
            [
                'Converter' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    converterpdf {
                        iconIdentifier = pdf_converter-plugin-converterpdf
                        title = LLL:EXT:pdf_converter/Resources/Private/Language/locallang_db.xlf:tx_pdf_converter_converterpdf.name
                        description = LLL:EXT:pdf_converter/Resources/Private/Language/locallang_db.xlf:tx_pdf_converter_converterpdf.description
                        tt_content_defValues {
                            CType = list
                            list_type = pdfconverter_converterpdf
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'pdf_converter-plugin-converterpdf',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:pdf_converter/Resources/Public/Icons/user_plugin_converterpdf.svg']
			);
		
    }
);
