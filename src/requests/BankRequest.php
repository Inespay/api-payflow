<?php
namespace inespayPayments\api\payflow\requests;

class BankRequest implements \JsonSerializable
{
	private $country;
	private $enabled;
	private $enabledPeriodicPayment;
	private $visible;
	private $bankId;

	public function jsonSerialize()
	{
		return get_object_vars($this);
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry($country): void
	{
		$this->country = $country;
	}

	/**
	 * @return mixed
	 */
	public function getEnabled()
	{
		return $this->enabled;
	}

	/**
	 * @param mixed $enabled
	 */
	public function setEnabled($enabled): void
	{
		$this->enabled = $enabled;
	}
	/**
	 * @return mixed
	 */
	public function getEnabledPeriodicPayment()
	{
		return $this->enabledPeriodicPayment;
	}

	/**
	 * @param mixed $enabledPeriodicPayment
	 */
	public function setEnabledPeriodicPayment($enabledPeriodicPayment): void
	{
		$this->enabledPeriodicPayment = $enabledPeriodicPayment;
	}
	/**
	 * @return mixed
	 */
	public function getVisible()
	{
		return $this->visible;
	}

	/**
	 * @param mixed $visible
	 */
	public function setVisible($visible): void
	{
		$this->visible = $visible;
	}
	/**
	 * @return mixed
	 */
	public function getBankId()
	{
		return $this->bankId;
	}

	/**
	 * @param mixed $bankId
	 */
	public function setBankId($bankId): void
	{
		$this->bankId = $bankId;
	}
}
