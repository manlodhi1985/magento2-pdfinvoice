<?php
/**
 * Copyright © Bhavin, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\PdfInvoice\Controller\Adminhtml\Pdftemplate;

class Index extends \Bhavin\PdfInvoice\Controller\Adminhtml\Pdftemplate {
	public function execute() {
		$this->_setPageData();

		return $this->getResultPage();
	}
}