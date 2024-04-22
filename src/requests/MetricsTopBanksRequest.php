<?php
namespace inespayPayments\api\payflow\requests;

class MetricsTopBanksRequest implements \JsonSerializable
{
	private $dateFrom;
	private $dateTo;

	public function jsonSerialize()
	{
		return get_object_vars($this);
	}

	/**
	 * @return mixed
	 */
	public function getDateFrom()
	{
		return $this->dateFrom;
	}

	/**
	 * @param mixed $dateFrom
	 */
	public function setDateFrom($dateFrom): void
	{
		$this->dateFrom = $dateFrom;
	}

	/**
	 * @return mixed
	 */
	public function getDateTo()
	{
		return $this->dateTo;
	}

	/**
	 * @param mixed $dateTo
	 */
	public function setDateTo($dateTo): void
	{
		$this->dateTo = $dateTo;
	}
}
