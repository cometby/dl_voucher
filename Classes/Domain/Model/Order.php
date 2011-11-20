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
class Tx_DlVoucher_Domain_Model_Order extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * info
	 *
	 * @var string
	 */
	protected $info;

	/**
	 * voucherImage
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $voucherImage;

	/**
	 * fromName
	 *
	 * @var string
	 */
	protected $fromName;

	/**
	 * toName
	 *
	 * @var string
	 */
	protected $toName;

	/**
	 * amount
	 *
	 * @var integer
	 */
	protected $amount;

	/**
	 * firstName
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $firstName;

	/**
	 * lastName
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $lastName;

	/**
	 * street
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $street;

	/**
	 * zip
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $zip;

	/**
	 * city
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $city;

	/**
	 * country
	 *
	 * @var string
	 */
	protected $country;

	/**
	 * email
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $email;

	/**
	 * printAmount
	 *
	 * @var boolean
	 */
	protected $printAmount = false;

	/**
	 * agbAccepted
	 *
	 * @var boolean
	 */
	protected $agbAccepted = false;

	/**
	 * offer
	 *
	 * @var Tx_DlVoucher_Domain_Model_Offer
	 */
	protected $offer;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the info
	 *
	 * @return string $info
	 */
	public function getInfo() {
		return $this->info;
	}

	/**
	 * Sets the info
	 *
	 * @param string $info
	 * @return void
	 */
	public function setInfo($info) {
		$this->info = $info;
	}

	/**
	 * Returns the voucherImage
	 *
	 * @return integer $voucherImage
	 */
	public function getVoucherImage() {
		return $this->voucherImage;
	}

	/**
	 * Sets the voucherImage
	 *
	 * @param integer $voucherImage
	 * @return void
	 */
	public function setVoucherImage($voucherImage) {
		$this->voucherImage = $voucherImage;
	}

	/**
	 * Returns the fromName
	 *
	 * @return string $fromName
	 */
	public function getFromName() {
		return $this->fromName;
	}

	/**
	 * Sets the fromName
	 *
	 * @param string $fromName
	 * @return void
	 */
	public function setFromName($fromName) {
		$this->fromName = $fromName;
	}

	/**
	 * Returns the toName
	 *
	 * @return string $toName
	 */
	public function getToName() {
		return $this->toName;
	}

	/**
	 * Sets the toName
	 *
	 * @param string $toName
	 * @return void
	 */
	public function setToName($toName) {
		$this->toName = $toName;
	}

	/**
	 * Returns the amount
	 *
	 * @return integer $amount
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * Sets the amount
	 *
	 * @param integer $amount
	 * @return void
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * Returns the firstName
	 *
	 * @return string $firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * Sets the firstName
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Returns the lastName
	 *
	 * @return integer $lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Sets the lastName
	 *
	 * @param integer $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * Returns the street
	 *
	 * @return string $street
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * Sets the street
	 *
	 * @param string $street
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the printAmount
	 *
	 * @return boolean $printAmount
	 */
	public function getPrintAmount() {
		return(bool) $this->printAmount;
	}

	/**
	 * Sets the printAmount
	 *
	 * @param boolean $printAmount
	 * @return void
	 */
	public function setPrintAmount($printAmount) {
		$this->printAmount = $printAmount;
	}

	/**
	 * Returns the boolean state of printAmount
	 *
	 * @return boolean
	 */
	public function isPrintAmount() {
		return $this->getPrintAmount();
	}

	/**
	 * Returns the agbAccepted
	 *
	 * @return boolean $agbAccepted
	 */
	public function getAgbAccepted() {
		return (bool) $this->agbAccepted;
	}

	/**
	 * Sets the agbAccepted
	 *
	 * @param boolean $agbAccepted
	 * @return void
	 */
	public function setAgbAccepted($agbAccepted) {
		$this->agbAccepted = $agbAccepted;
	}

	/**
	 * Returns the boolean state of agbAccepted
	 *
	 * @return boolean
	 */
	public function isAgbAccepted() {
		return $this->getAgbAccepted();
	}

	/**
	 * Returns the offer
	 *
	 * @return Tx_DlVoucher_Domain_Model_Offer $offer
	 */
	public function getOffer() {
		return $this->offer;
	}

	/**
	 * Sets the offer
	 *
	 * @param Tx_DlVoucher_Domain_Model_Offer $offer
	 * @return void
	 */
	public function setOffer(Tx_DlVoucher_Domain_Model_Offer $offer) {
		$this->offer = $offer;
	}

}
?>