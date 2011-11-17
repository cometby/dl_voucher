<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Daniel Lienert <lienert@punkt.de>
*  All rights reserved
*
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 */
class Tx_DlVoucher_Domain_Model_Customer extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $firstName;


	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastName;

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $address = '';

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $email = '';

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $zip = '';

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $city = '';
}
?>
