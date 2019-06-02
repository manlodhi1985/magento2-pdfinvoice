<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bhavin\PdfInvoice\Setup;

use Magento\Framework\Setup;

class InstallData implements Setup\InstallDataInterface {
	/**
	 * @var \Bhavin\PdfInvoice\Model\Pdftemplate
	 */
	protected $pdfTemplate;

	/**
	 * @var Installer
	 */
	protected $installer;

	public function __construct(
		\Bhavin\PdfInvoice\Model\Pdftemplate $pdfTemplate
	) {
		$this->pdfTemplate = $pdfTemplate;
	}

	/**
	 * {@inheritdoc}
	 */
	public function install(Setup\ModuleDataSetupInterface $setup, Setup\ModuleContextInterface $moduleContext) {
		$pdftemplateData['name'] = 'Default PDF Invoice';
		$pdftemplateData['store_id'] = 0;
		$pdftemplateData['status'] = 0;
		$pdftemplateData['template_data']['template_file_name'] = 'invoice {{var invoice.increment_id}}';
		$pdftemplateData['template_data']['margin_top'] = 10;
		$pdftemplateData['template_data']['margin_bottom'] = 10;
		$pdftemplateData['template_data']['margin_left'] = 15;
		$pdftemplateData['template_data']['margin_right'] = 15;
		$pdftemplateData['template_data']['header'] = '';
		$pdftemplateData['template_data']['footer'] = '';
		$pdftemplateData['template_data']['paper_size'] = 0;
		$pdftemplateData['template_data']['paper_orientation'] = 0;
		$pdftemplateData['template_data']['css'] = ' table.email-items {border-collapse: collapse;margin: 0px auto;background: #e6e1dd;width: 100%;}.email-items thead tr th{background:#ef9a6b;}th.item-info {text-align: left;width: 40%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 10px 10px;}th.item-qty {text-align: left;width: 20%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 0;}th.item-subtotal {text-align: right;width: 20%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 10px 10px;}td.item-qty {width: 20%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 0;}td.item-price {text-align: right;width: 20%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 10px 10px;}.order-totals th {padding: 5px 0 0;text-align: right;font-size: 16px;font-weight: bold;}td.item-info {font-size: 18px;color: #000;padding: 10px 0 15px 10px;}td.item-info.has-extra {text-align: left;width: 40%;vertical-align: middle;font-size: 18px;font-weight: bold;padding: 10px 10px 10px;}table.email-items tbody td {border-bottom: 1px solid #000!important;}.order-totals td {padding: 5px 10px 0 0;text-align: right;font-size: 16px;font-weight: bold;}tfoot.order-totals {background-color: #f9f9f9!important;}table.email-items tr td p.product-name {color: #000;font-size: 20px;margin: 0;}table.email-items tr td p {font-size: 18px;color: #000;margin: 0;}td.item-info.has-extra dd {margin-left: 0;float: left;padding-right: 10px;}td.item-info.has-extra dt {display: block;float: left;padding-right: 10px;width: 8%;}tr.grand_total th {padding-bottom: 13px!important;}tr.grand_total td {padding-bottom: 13px!important;}';
		$pdftemplateData['template_data']['body'] = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0," /><table style="border-collapse: collapse; border-spacing: 0; margin: 0 auto; width: 100%; font-family: \'Trebuchet MS\'; max-width: 1280px; border: none;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td style="padding: 25px 0 35px; background: #ef9a6b;"><table style="border-collapse: collapse; margin: 0px auto; width: 100%;" cellspacing="0" cellpadding="0"><tbody><tr><td style="padding: 0 0 0 25px; text-align: left; vertical-align: top; width: 25%;" align="left"><h3 style="color: #2b2b2b; margin: 0 0; font-size: 18px;">Address</h3><p style="margin: 10px 0 0; font-size: 16px; color: #000;">{{var mageants_pdfinvoice/business_info/address}}</p></td><td style="padding: 0 0 0 25px; text-align: left; vertical-align: top; width: 25%;" align="left"><h3 style="color: #2b2b2b; margin: 0 0; font-size: 18px;">Phone</h3><p style="margin: 10px 0 0; font-size: 16px; color: #000;">{{var mageants_pdfinvoice/business_contact/phone}}<br /> {{config path="general/store_information/phone"}}<br /> {{var mageants_pdfinvoice/business_contact/Fax}}</p></td><td style="padding: 0 0 0 25px; text-align: left; vertical-align: top; width: 25%;" align="left"><h3 style="color: #2b2b2b; margin: 0 0; font-size: 18px;">Email</h3><p style="margin: 10px 0 0; font-size: 16px; color: #000;">{{var mageants_pdfinvoice/business_contact/email}}<br /> {{config path="web/secure/base_url"}}</p></td><td style="padding: 0 10px 0 25px; text-align: right; vertical-align: middle; width: 25%;" align="left"><img src="{{var mageants_pdfinvoice/business_info/company_logo}}" alt="logo" /></td></tr></tbody></table></td></tr><tr><td style="padding: 20px 10px 3px 45px; background: #1b404e;"><table style="border-collapse: collapse; margin: 0px auto; width: 100%;" cellspacing="0" cellpadding="0"><tbody><tr><td style="padding: 0 0; text-align: left; vertical-align: middle; width: 50%;" align="left"><h1 style="color: #fff; margin: 0 0; font-size: 38px;">INVOICE</h1></td><td style="padding: 0 0; text-align: right; vertical-align: middle; width: 50%;" align="right"><p style="margin: 0 0; font-size: 16px; color: #fff; width: 234px; float: right; text-align: left;">Invoice: <strong>#{{var invoice_increment_id}}</strong><br /> Invoice: <strong> {{var invoice_created_at}}</strong><br /> Invoice Amount: <strong> {{var invoice_grand_total }} </strong></p></td></tr></tbody></table></td></tr><tr><td style="padding: 30px 45px 3px 45px;"><table style="border-collapse: collapse; margin: 0px auto; width: 100%;" cellspacing="0" cellpadding="0"><tbody><tr><td valign="top"><h2 style="font-size: 24px; color: #433d41; font-weight: bold; margin: 0 0 20px;">BILLING ADDRESS</h2><p style="font-size: 16px; color: #433d41; font-weight: bold; margin: 0 0 20px;">{{var formattedBillingAddress|raw}}</p></td><td style="padding-left: 10px; text-align: right;" valign="top"><h2 style="font-size: 24px; color: #433d41; font-weight: bold; margin: 5px 0 0;">PAYMENT METHOD</h2><p style="color: #433d41; font-size: 16px; line-height: 1.2; margin-top: 0; padding: 0;">{{var payment_html}}</p></td></tr></tbody></table></td></tr><tr><td style="padding: 30px 45px 3px 45px;">{{layout handle="mageants_sales_email_order_items" order=$order area="frontend"}}</td></tr><tr><td style="padding: 15px 45px 15px;"><table style="border-collapse: collapse; margin: 0px auto; width: 100%;" cellspacing="0" cellpadding="0"><tbody><tr><td style="text-align: left; font-size: 16px; width: 50%;" align="left"><strong style="font-size: 18px;">Note</strong><br /> {{var mageants_pdfinvoice/business_info/notes}} <br />{{var invoice_customer_note}} <br /> {{var comment}}</td><td style="text-align: left; width: 50%;" align="right"><img style="max-width: 100%; width: auto; height: auto;" src="{{config path=" alt="Barcode" /></td></tr></tbody></table></td></tr></tbody></table>';

		$this->pdfTemplate->setData($pdftemplateData)->save();
	}
}
