<?php
/**
 * Copyright © Bhavin, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Bhavin\PdfInvoice\Model;

class Pdftemplate extends \Magento\Framework\Model\AbstractModel {
	/**
	 * @return void
	 * @codeCoverageIgnore
	 */
	protected function _construct() {
		$this->_init(\Bhavin\PdfInvoice\Model\ResourceModel\Pdftemplate::class);
	}

	/**
	 * Processing object and return left margin
	 *
	 * @return mixed
	 */
	public function getMarginData($side) {
		$marginArray = explode(',', $this->getMargin());
		$margin = 0;
		switch ($side) {
		case 'top':
			$margin = isset($marginArray[0]) && $marginArray[0] != "" ? $marginArray[0] : 0;
			break;
		case 'left':
			$margin = isset($marginArray[1]) && $marginArray[1] != "" ? $marginArray[1] : 0;
			break;
		case 'right':
			$margin = isset($marginArray[2]) && $marginArray[2] != "" ? $marginArray[2] : 0;
			break;
		case 'bottom':
			$margin = isset($marginArray[3]) && $marginArray[3] != "" ? $marginArray[3] : 0;
			break;
		}
		return $margin;
	}
	/**
	 * Processing object and return left margin
	 *
	 * @return mixed
	 */
	public function getMarginLeft() {
		return $this->getMarginData('left');
	}
	/**
	 * Processing object and return Right margin
	 *
	 * @return mixed
	 */
	public function getMarginRight() {
		return $this->getMarginData('right');
	}
	/**
	 * Processing object and return Top margin
	 *
	 * @return mixed
	 */
	public function getMarginTop() {
		return $this->getMarginData('top');
	}
	/**
	 * Processing object and return bottom margin
	 *
	 * @return mixed
	 */
	public function getMarginBottom() {
		return $this->getMarginData('bottom');
	}
	/**
	 * Processing object before save data
	 *
	 * @return $this
	 */
	public function beforeSave() {
		if ($this->getData('template_data')) {
			$data = json_encode($this->getData('template_data'), true);
			$this->setTemplateData($data);
		}
		return parent::beforeSave();
	}
}
