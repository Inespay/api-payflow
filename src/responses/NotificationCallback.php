<?php

namespace inespayPayments\api\payflow\responses;
class NotificationCallback
{
    /** @var string */
    public $singlePayinId;

    /** @var string */
    public $codStatus;

    /** @var string */
    public $description;

    /** @var int */
    public $amount;

    /** @var string */
    public $reference;

    /** @var int */
    public $date;

    /** @var string */
    public $creditorAccount;

    /** @var string */
    public $debtorName;

    /** @var string */
    public $debtorAccount;

    /** @var string|null */
    public $customData;

    /** @var string */
    public $periodicPayinId;

    /** @var int */
    public $startDate;

    /** @var int */
    public $endDate;

    /** @var string */
    public $frequency;

    /** @var string */
    public $periodicCancelId;

    public function __construct($data)
    {
        if (isset($data->singlePayinId)) {
            $this->singlePayinId = $data->singlePayinId;
        }

        if (isset($data->codStatus)) {
            $this->codStatus = $data->codStatus;
        }

        if (isset($data->description)) {
            $this->description = $data->description;
        }

        if (isset($data->amount)) {
            $this->amount = $data->amount;
        }

        if (isset($data->reference)) {
            $this->reference = $data->reference;
        }

        if (isset($data->date)) {
            $this->date = $data->date;
        }

        if (isset($data->creditorAccount)) {
            $this->creditorAccount = $data->creditorAccount;
        }

        if (isset($data->customData)) {
            $this->customData = $data->customData;
        }

        if (isset($data->periodicPayinId)) {
            $this->periodicPayinId = $data->periodicPayinId;
        }

        if (isset($data->startDate)) {
            $this->startDate = $data->startDate;
        }

        if (isset($data->endDate)) {
            $this->endDate = $data->endDate;
        }

        if (isset($data->frequency)) {
            $this->frequency = $data->frequency;
        }

        if (isset($data->periodicCancelId)) {
            $this->periodicCancelId = $data->periodicCancelId;
        }
    }

    public function getSinglePayinId(): string
    {
        return $this->singlePayinId;
    }

    public function setSinglePayinId(string $singlePayinId): void
    {
        $this->singlePayinId = $singlePayinId;
    }

    public function getCodStatus(): string
    {
        return $this->codStatus;
    }

    public function setCodStatus(string $codStatus): void
    {
        $this->codStatus = $codStatus;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    public function getCreditorAccount(): string
    {
        return $this->creditorAccount;
    }

    public function setCreditorAccount(string $creditorAccount): void
    {
        $this->creditorAccount = $creditorAccount;
    }

    public function getDebtorName(): string
    {
        return $this->debtorName;
    }

    public function setDebtorName(string $debtorName): void
    {
        $this->debtorName = $debtorName;
    }

    public function getDebtorAccount(): string
    {
        return $this->debtorAccount;
    }

    public function setDebtorAccount(string $debtorAccount): void
    {
        $this->debtorAccount = $debtorAccount;
    }

    public function getCustomData(): ?string
    {
        return $this->customData;
    }

    public function setCustomData(?string $customData): void
    {
        $this->customData = $customData;
    }

    public function getPeriodicPayinId(): string
    {
        return $this->periodicPayinId;
    }

    public function setPeriodicPayinId(string $periodicPayinId): void
    {
        $this->periodicPayinId = $periodicPayinId;
    }

    public function getStartDate(): int
    {
        return $this->startDate;
    }

    public function setStartDate(int $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): int
    {
        return $this->endDate;
    }

    public function setEndDate(int $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getFrequency(): string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): void
    {
        $this->frequency = $frequency;
    }

    public function getPeriodicCancelId(): string
    {
        return $this->periodicCancelId;
    }

    public function setPeriodicCancelId(string $periodicCancelId): void
    {
        $this->periodicCancelId = $periodicCancelId;
    }
}