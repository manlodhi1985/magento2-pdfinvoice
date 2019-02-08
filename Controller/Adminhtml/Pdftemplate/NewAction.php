<?php
/**
 * Copyright © Bhavin, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\PdfInvoice\Controller\Adminhtml\Pdftemplate;

use \Magento\Backend\App\Action\Context;
use \Magento\Backend\Model\View\Result\ForwardFactory;

class NewAction extends \Magento\Backend\App\Action {
	/**
	 * Access Resource ID
	 *
	 */
	const RESOURCE_ID = 'Bhavin_PdfInvoice::pdftemplate_new_edit';
	/**
	 * Redirect result factory
	 *
	 * @var \Magento\Backend\Model\View\Result\ForwardFactory
	 */
	protected $_resultForwardFactory;

	/**
	 * constructor
	 *
	 * @param ForwardFactory $resultForwardFactory
	 * @param Context $context
	 */
	public function __construct(
		ForwardFactory $resultForwardFactory,
		Context $context
	) {
		$this->_resultForwardFactory = $resultForwardFactory;

		parent::__construct($context);
	}

	/*
		 * Check permission via ACL resource
	*/
	protected function _isAllowed() {
		return $this->_authorization->isAllowed(Self::RESOURCE_ID);
	}
	/**
	 * forward to edit
	 *
	 * @return \Magento\Backend\Model\View\Result\Forward
	 */
	public function execute() {
		$resultForward = $this->_resultForwardFactory->create();

		$resultForward->forward('edit');

		return $resultForward;
	}

}