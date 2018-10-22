
plugin.tx_pdfconverter_converterpdf {
    view {
        # cat=plugin.tx_pdfconverter_converterpdf/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:pdf_converter/Resources/Private/Templates/
        # cat=plugin.tx_pdfconverter_converterpdf/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:pdf_converter/Resources/Private/Partials/
        # cat=plugin.tx_pdfconverter_converterpdf/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:pdf_converter/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_pdfconverter_converterpdf//a; type=string; label=Default storage PID
        storagePid =
    }
}

module.tx_pdfconverter_pdfconverter {
    view {
        # cat=module.tx_pdfconverter_pdfconverter/file; type=string; label=Path to template root (BE)
        templateRootPath = EXT:pdf_converter/Resources/Private/Templates/
        # cat=module.tx_pdfconverter_pdfconverter/file; type=string; label=Path to template partials (BE)
        partialRootPath = EXT:pdf_converter/Resources/Private/Partials/
        # cat=module.tx_pdfconverter_pdfconverter/file; type=string; label=Path to template layouts (BE)
        layoutRootPath = EXT:pdf_converter/Resources/Private/Layouts/
    }
    persistence {
        # cat=module.tx_pdfconverter_pdfconverter//a; type=string; label=Default storage PID
        storagePid =
    }
}


}
