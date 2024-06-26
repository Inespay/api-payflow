<?php

namespace inespayPayments\api\payflow\responses;

class PeriodicPayinResponse extends BaseResponse 
{
	private $periodicPayinId = null;

	private $refunds = null;

	private $refundedAmount = null;

	private $enabled = null;

	private $amount = null;

	private $description = null;
	private $reference = null;
	private $creditorName = null;
	private $creditorAccount = null;
	private $customData = null;
	private $customBeneficiary = null;
	private $periodicPayinLink = null;
	private $periodicPayinLinkClicks = null;
	private $codStatus = null;
	private $debtorName = null;
	private $debtorAccount = null;
	private $successLinkRedirect = null;
	private $successLinkRedirectMethod = null;
	private $abortLinkRedirect = null;
	private $abortLinkRedirectMethod = null;
	private $notifUrl = null;
	private $notifUrlContentType = null;
	private $createdAt = null;
	private $updatedAt = null;
	private $expiredAt = null;
	private $transactions = [];
	private $cancellations = [];

	public function __construct($data)
	{
		parent::__construct($data);

		if (isset($data->periodicPayinId)) {
			$this->periodicPayinId = $data->periodicPayinId;
		}
		if (isset($data->refunds)) {
			$this->refunds = $data->refunds;
		}
		if (isset($data->refundedAmount)) {
			$this->refundedAmount = $data->refundedAmount;
		}
		if (isset($data->enabled)) {
			$this->enabled = $data->enabled;
		}
		if (isset($data->amount)) {
			$this->amount = $data->amount;
		}
		if (isset($data->description)) {
			$this->description = $data->description;
		}
		if (isset($data->reference)) {
			$this->reference = $data->reference;
		}
		if (isset($data->creditorName)) {
			$this->creditorName = $data->creditorName;
		}
		if (isset($data->creditorAccount)) {
			$this->creditorAccount = $data->creditorAccount;
		}
		if (isset($data->customData)) {
			$this->customData = $data->customData;
		}
		if (isset($data->customBeneficiary)) {
			$this->customBeneficiary = $data->customBeneficiary;
		}
		if (isset($data->periodicPayinLink)) {
			$this->periodicPayinLink = $data->periodicPayinLink;
		}
		if (isset($data->periodicPayinLinkClicks)) {
			$this->periodicPayinLinkClicks = $data->periodicPayinLinkClicks;
		}
		if (isset($data->codStatus)) {
			$this->codStatus = $data->codStatus;
		}
		if (isset($data->debtorName)) {
			$this->debtorName = $data->debtorName;
		}
		if (isset($data->debtorAccount)) {
			$this->debtorAccount = $data->debtorAccount;
		}
		if (isset($data->successLinkRedirect)) {
			$this->successLinkRedirect = $data->successLinkRedirect;
		}
		if (isset($data->successLinkRedirectMethod)) {
			$this->successLinkRedirectMethod = $data->successLinkRedirectMethod;
		}
		if (isset($data->abortLinkRedirect)) {
			$this->abortLinkRedirect = $data->abortLinkRedirect;
		}
		if (isset($data->abortLinkRedirectMethod)) {
			$this->abortLinkRedirectMethod = $data->abortLinkRedirectMethod;
		}
		if (isset($data->notifUrl)) {
			$this->notifUrl = $data->notifUrl;
		}
		if (isset($data->notifUrlContentType)) {
			$this->notifUrlContentType = $data->notifUrlContentType;
		}
		if (isset($data->createdAt)) {
			$this->createdAt = $data->createdAt;
		}
		if (isset($data->updatedAt)) {
			$this->updatedAt = $data->updatedAt;
		}
		if (isset($data->expiredAt)) {
			$this->expiredAt = $data->expiredAt;
		}
		if (isset($data->transactions)) {
			$this->transactions = $data->transactions;
		}
		if (isset($data->cancellations)) {
			$this->cancellations = $data->cancellations;
		}
	}

	/**
	 * @return null
	 */
	public function getPeriodicPayinId()
	{
		return $this->periodicPayinId;
	}

	/**
	 * @param null $periodicPayinId
	 */
	public function setPeriodicPayinId($periodicPayinId): void
	{
		$this->periodicPayinId = $periodicPayinId;
	}
	/**
	 * @return null
	 */
	public function getRefunds()
	{
		return $this->refunds;
	}

	/**
	 * @param null $refunds
	 */
	public function setRefunds($refunds): void
	{
		$this->refunds = $refunds;
	}
	/**
	 * @return null
	 */
	public function getRefundedAmount()
	{
		return $this->refundedAmount;
	}

	/**
	 * @param null $refundedAmount
	 */
	public function setRefundedAmount($refundedAmount): void
	{
		$this->refundedAmount = $refundedAmount;
	}
	/**
	 * @return null
	 */
	public function getEnabled()
	{
		return $this->enabled;
	}

	/**
	 * @param null $enabled
	 */
	public function setEnabled($enabled): void
	{
		$this->enabled = $enabled;
	}
	/**
	 * @return null
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @param null $amount
	 */
	public function setAmount($amount): void
	{
		$this->amount = $amount;
	}
	/**
	 * @return null
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param null $description
	 */
	public function setDescription($description): void
	{
		$this->description = $description;
	}
	/**
	 * @return null
	 */
	public function getReference()
	{
		return $this->reference;
	}

	/**
	 * @param null $reference
	 */
	public function setReference($reference): void
	{
		$this->reference = $reference;
	}
	/**
	 * @return null
	 */
	public function getCreditorName()
	{
		return $this->creditorName;
	}

	/**
	 * @param null $creditorName
	 */
	public function setCreditorName($creditorName): void
	{
		$this->creditorName = $creditorName;
	}
	/**
	 * @return null
	 */
	public function getCreditorAccount()
	{
		return $this->creditorAccount;
	}

	/**
	 * @param null $creditorAccount
	 */
	public function setCreditorAccount($creditorAccount): void
	{
		$this->creditorAccount = $creditorAccount;
	}
	/**
	 * @return null
	 */
	public function getCustomData()
	{
		return $this->customData;
	}

	/**
	 * @param null $customData
	 */
	public function setCustomData($customData): void
	{
		$this->customData = $customData;
	}
	/**
	 * @return null
	 */
	public function getCustomBeneficiary()
	{
		return $this->customBeneficiary;
	}

	/**
	 * @param null $customBeneficiary
	 */
	public function setCustomBeneficiary($customBeneficiary): void
	{
		$this->customBeneficiary = $customBeneficiary;
	}
	/**
	 * @return null
	 */
	public function getPeriodicPayinLink()
	{
		return $this->periodicPayinLink;
	}

	/**
	 * @param null $periodicPayinLink
	 */
	public function setPeriodicPayinLink($periodicPayinLink): void
	{
		$this->periodicPayinLink = $periodicPayinLink;
	}
	/**
	 * @return null
	 */
	public function getPeriodicPayinLinkClicks()
	{
		return $this->periodicPayinLinkClicks;
	}

	/**
	 * @param null $periodicPayinLinkClicks
	 */
	public function setPeriodicPayinLinkClicks($periodicPayinLinkClicks): void
	{
		$this->periodicPayinLinkClicks = $periodicPayinLinkClicks;
	}
	/**
	 * @return null
	 */
	public function getCodStatus()
	{
		return $this->codStatus;
	}

	/**
	 * @param null $codStatus
	 */
	public function setCodStatus($codStatus): void
	{
		$this->codStatus = $codStatus;
	}
	/**
	 * @return null
	 */
	public function getDebtorName()
	{
		return $this->debtorName;
	}

	/**
	 * @param null $debtorName
	 */
	public function setDebtorName($debtorName): void
	{
		$this->debtorName = $debtorName;
	}
	/**
	 * @return null
	 */
	public function getDebtorAccount()
	{
		return $this->debtorAccount;
	}

	/**
	 * @param null $debtorAccount
	 */
	public function setDebtorAccount($debtorAccount): void
	{
		$this->debtorAccount = $debtorAccount;
	}
	/**
	 * @return null
	 */
	public function getSuccessLinkRedirect()
	{
		return $this->successLinkRedirect;
	}

	/**
	 * @param null $successLinkRedirect
	 */
	public function setSuccessLinkRedirect($successLinkRedirect): void
	{
		$this->successLinkRedirect = $successLinkRedirect;
	}
	/**
	 * @return null
	 */
	public function getSuccessLinkRedirectMethod()
	{
		return $this->successLinkRedirectMethod;
	}

	/**
	 * @param null $successLinkRedirectMethod
	 */
	public function setSuccessLinkRedirectMethod($successLinkRedirectMethod): void
	{
		$this->successLinkRedirectMethod = $successLinkRedirectMethod;
	}
	/**
	 * @return null
	 */
	public function getAbortLinkRedirect()
	{
		return $this->abortLinkRedirect;
	}

	/**
	 * @param null $abortLinkRedirect
	 */
	public function setAbortLinkRedirect($abortLinkRedirect): void
	{
		$this->abortLinkRedirect = $abortLinkRedirect;
	}
	/**
	 * @return null
	 */
	public function getAbortLinkRedirectMethod()
	{
		return $this->abortLinkRedirectMethod;
	}

	/**
	 * @param null $abortLinkRedirectMethod
	 */
	public function setAbortLinkRedirectMethod($abortLinkRedirectMethod): void
	{
		$this->abortLinkRedirectMethod = $abortLinkRedirectMethod;
	}
	/**
	 * @return null
	 */
	public function getNotifUrl()
	{
		return $this->notifUrl;
	}

	/**
	 * @param null $notifUrl
	 */
	public function setNotifUrl($notifUrl): void
	{
		$this->notifUrl = $notifUrl;
	}
	/**
	 * @return null
	 */
	public function getNotifUrlContentType()
	{
		return $this->notifUrlContentType;
	}

	/**
	 * @param null $notifUrlContentType
	 */
	public function setNotifUrlContentType($notifUrlContentType): void
	{
		$this->notifUrlContentType = $notifUrlContentType;
	}
	/**
	 * @return null
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * @param null $createdAt
	 */
	public function setCreatedAt($createdAt): void
	{
		$this->createdAt = $createdAt;
	}
	/**
	 * @return null
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * @param null $updatedAt
	 */
	public function setUpdatedAt($updatedAt): void
	{
		$this->updatedAt = $updatedAt;
	}
	/**
	 * @return null
	 */
	public function getExpiredAt()
	{
		return $this->expiredAt;
	}

	/**
	 * @param null $expiredAt
	 */
	public function setExpiredAt($expiredAt): void
	{
		$this->expiredAt = $expiredAt;
	}
	/**
	 * @return null
	 */
	public function getTransactions()
	{
		return $this->transactions;
	}

	/**
	 * @param null $transactions
	 */
	public function setTransactions($transactions): void
	{
		$this->transactions = $transactions;
	}
	/**
	 * @return null
	 */
	public function getCancellations()
	{
		return $this->cancellations;
	}

	/**
	 * @param null $cancellations
	 */
	public function setCancellations($cancellations): void
	{
		$this->cancellations = $cancellations;
	}
}