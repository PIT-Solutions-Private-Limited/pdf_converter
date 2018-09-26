
plugin.tx_pdfconverter_converterpdf {
    view {
        templateRootPaths.0 = EXT:pdf_converter/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_pdfconverter_converterpdf.view.templateRootPath}
        partialRootPaths.0 = EXT:pdf_converter/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_pdfconverter_converterpdf.view.partialRootPath}
        layoutRootPaths.0 = EXT:pdf_converter/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_pdfconverter_converterpdf.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_pdfconverter_converterpdf.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_pdfconverter._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-pdf-converter table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-pdf-converter table th {
        font-weight:bold;
    }

    .tx-pdf-converter table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

# Module configuration
module.tx_pdfconverter_web_pdfconverterpdfconverter {
    persistence {
        storagePid = {$module.tx_pdfconverter_pdfconverter.persistence.storagePid}
    }
    view {
        templateRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Templates/
        templateRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.templateRootPath}
        partialRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Partials/
        partialRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.partialRootPath}
        layoutRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.layoutRootPath}
    }
}

# Module configuration
module.tx_pdfconverter_web_pdfconverterpdfconvert {
    persistence {
        storagePid = {$module.tx_pdfconverter_pdfconvert.persistence.storagePid}
    }
    view {
        templateRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Templates/
        templateRootPaths.1 = {$module.tx_pdfconverter_pdfconvert.view.templateRootPath}
        partialRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Partials/
        partialRootPaths.1 = {$module.tx_pdfconverter_pdfconvert.view.partialRootPath}
        layoutRootPaths.0 = EXT:pdf_converter/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = {$module.tx_pdfconverter_pdfconvert.view.layoutRootPath}
    }
}
