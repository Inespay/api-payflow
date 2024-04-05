<?php
namespace inespayPayments\api\payflow\responses;


class BankResponse
{
	
	private $status = null;
	
	private $description = null;
	
	private $total = null;
	
	private $data = null;

	public function __construct($data)
	{
		if (isset($data->status)) {
			$this->status = $data->status;
		}

		if (isset($data->description)) {
			$this->description = $data->description;
		}

		if (isset($data->total)) {
			$this->total = $data->total;
		}

		if (isset($data->data)) {
			$this->data = $data->data;
		}
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function getData()
	{
		return $this->data;
	}
}
