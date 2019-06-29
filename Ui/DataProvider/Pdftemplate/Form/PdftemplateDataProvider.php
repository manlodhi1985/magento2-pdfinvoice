<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\PdfInvoice\Ui\DataProvider\Pdftemplate\Form;

use Bhavin\PdfInvoice\Model\ResourceModel\Pdftemplate\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * DataProvider for product edit form
 *
 * @api
 * @since 101.0.0
 */
class PdftemplateDataProvider extends AbstractDataProvider {
	/**
	 * @param string $name
	 * @param string $primaryFieldName
	 * @param string $requestFieldName
	 * @param CollectionFactory $collectionFactory
	 * @param array $meta
	 * @param array $data
	 */
	public function __construct(
		$name,
		$primaryFieldName,
		$requestFieldName,
		CollectionFactory $collectionFactory,
		array $meta = [],
		array $data = []
	) {
		parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
		$this->collection = $collectionFactory->create();
	}

	/**
	 * {@inheritdoc}
	 * @since 101.0.0
	 */
	public function getData() {
		if (isset($this->_loadedData)) {
			return $this->_loadedData;
		}
		$items = $this->collection->getItems();
		foreach ($items as $pdftemplate) {
			$this->_loadedData[$pdftemplate->getId()]['general'] = $pdftemplate->getData();
			unset($this->_loadedData[$pdftemplate->getId()]['general']['template_data']);
			$template_data = json_decode($pdftemplate->getTemplateData(), true);
			$this->_loadedData[$pdftemplate->getId()]['design']['template_data']['body'] = $template_data['body'];
			$this->_loadedData[$pdftemplate->getId()]['css']['template_data']['css'] = $template_data['css'];
			$this->_loadedData[$pdftemplate->getId()]['setting']['template_data']['template_file_name'] = $template_data['template_file_name'];
			$this->_loadedData[$pdftemplate->getId()]['setting']['template_data']['paper_orientation'] = $template_data['paper_orientation'];
			$this->_loadedData[$pdftemplate->getId()]['setting']['template_data']['paper_size'] = $template_data['paper_size'];
			$this->_loadedData[$pdftemplate->getId()]['setting']['template_data']['margin'] = $template_data['margin'];

		}
		return $this->_loadedData;
	}

	/**
	 * {@inheritdoc}
	 * @since 101.0.0
	 */
	public function getMeta() {
		$meta = parent::getMeta();

		return $meta;
	}
}
