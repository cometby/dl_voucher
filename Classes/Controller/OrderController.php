<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Daniel Lienert <daniel@lienert.cc>, Daniel Lienert
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package dl_voucher
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_DlVoucher_Controller_OrderController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * orderRepository
	 *
	 * @var Tx_DlVoucher_Domain_Repository_OrderRepository
	 */
	protected $orderRepository;


	/**
	 * @var Tx_DlVoucher_Domain_Repository_OfferRepository
	 */
	protected $offerRepository;


	/**
	 * @var Tx_Yag_Domain_Repository_AlbumRepository
	 */
	protected $albumRepository;



	/**
	 * @param Tx_Yag_Domain_Repository_AlbumRepository $albumRepository
	 * @return void
	 */
	public function injectAlbumRepository(Tx_Yag_Domain_Repository_AlbumRepository $albumRepository) {
		$this->albumRepository = $albumRepository;
	}


	/**
	 * injectOrderRepository
	 *
	 * @param Tx_DlVoucher_Domain_Repository_OrderRepository $orderRepository
	 * @return void
	 */
	public function injectOrderRepository(Tx_DlVoucher_Domain_Repository_OrderRepository $orderRepository) {
		$this->orderRepository = $orderRepository;
	}


	/**
	 * @param Tx_DlVoucher_Domain_Repository_OfferRepository $offerRepository
	 * @return void
	 */
	public function injectOfferRepository(Tx_DlVoucher_Domain_Repository_OfferRepository $offerRepository) {
		$this->offerRepository = $offerRepository;
	}



	/**
	 * @return void
	 */
	public function initializeAction() {
		$this->objectManager->get('Tx_Yag_Utility_Bootstrap')->setTheme('dlVoucher')->boot();
	}



	/**
	 * action new
	 *
	 * @param Tx_DlVoucher_Domain_Model_Order $order
	 * @dontvalidate $order
	 * @return void
	 */
	public function voucherAction(Tx_DlVoucher_Domain_Model_Order $order = NULL) {

		$voucherAlbum = $this->albumRepository->findByUid(12); /** @var $voucherAlbum Tx_Yag_Domain_Model_Album */

		if($order == NULL) {

			$order = $this->orderRepository->restoreFromSession();

			if(!$order) {
				$order = $this->objectManager->get('Tx_DlVoucher_Domain_Model_Order');
				$order->setVoucherImage($voucherAlbum->getItems()->current()->getUid());
			}
		}

		$this->view->assign('offers', $this->offerRepository->findAll());
		$this->view->assign('voucherAlbum', $voucherAlbum);

		$this->view->assign('order', $order);
	}



	/**
	 * @param null|Tx_DlVoucher_Domain_Model_Order $order
	 */
	public function saveVoucherAction(Tx_DlVoucher_Domain_Model_Order $order = NULL) {

		// TODO Validierung

		$sessionOrder = $this->orderRepository->restoreFromSession();
		$sessionOrder->setVoucherValuesFromOrder($order);
		$this->orderRepository->persistToSession($sessionOrder);

		$this->forward('billing');
	}



	/**
	 * show the billing form
	 */
	public function billingAction() {

		$sessionOrder = $this->orderRepository->restoreFromSession();
		$this->view->assign('order', $sessionOrder);
	}


	public function  saveBillingAction(Tx_DlVoucher_Domain_Model_Order $order) {

		// TODO Validation
		$sessionOrder = $this->orderRepository->restoreFromSession();
		$sessionOrder->setBillingValuesFromOrder($order);
		$this->orderRepository->persistToSession($sessionOrder);

		$this->forward('overview');
	}



	public function overviewAction() {
	}

	
	/**
	 * action create
	 *
	 * @param $newOrder
	 * @return void
	 */
	public function createAction(Tx_DlVoucher_Domain_Model_Order $newOrder) {
		$this->orderRepository->add($newOrder);

		$this->objectManager->get('Tx_Extbase_Persistence_ManagerInterface')->persistAll();

		$documentCreator = $this->objectManager->get('Tx_DlVoucher_Domain_Pdf_DocumentCreator'); /** @var $documentCreator Tx_DlVoucher_Domain_Pdf_DocumentCreator */
		$documentCreator->setOrder($newOrder);
		$documentCreator->build();

	}



	/**
	 * @param Tx_DlVoucher_Domain_Model_Order $order
	 */
	protected function sendMail(Tx_DlVoucher_Domain_Model_Order $order) {
		$mail = t3lib_div::makeInstance('t3lib_mail_Message'); /** @var $mail t3lib_mail_Message */
		$mail->setFrom('gutschein@foto-lienert.de');
		$mail->setTo(array($order->getEmail() => $order->getFullName()));
		$mail->setSubject('Ihr Gutschein von Foto Lienert');
		$mail->setBody('Test');

		$mail->attach(Swift_Attachment::fromPath($order->getInvoicePDFPathAndFileName())->setFilename('Rechnung.pdf'));
		$mail->attach(Swift_Attachment::fromPath($order->getVoucherPDFPathAndFileName())->setFilename('Gutschein.pdf'));

		$mail->send();
	}
}
?>