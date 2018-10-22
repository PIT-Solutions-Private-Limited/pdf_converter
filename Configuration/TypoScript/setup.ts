
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
        templateRootPaths.0 = EXT:pdf_converter/Resources/Private/Templates/
        templateRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.templateRootPath}
        partialRootPaths.0 = EXT:pdf_converter/Resources/Private/Partials/
        partialRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.partialRootPath}
        layoutRootPaths.0 = EXT:pdf_converter/Resources/Private/Layouts/
        layoutRootPaths.1 = {$module.tx_pdfconverter_pdfconverter.view.layoutRootPath}
    }
}



