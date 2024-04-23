<?php

namespace inespayPayments\api\payflow\responses;

class SinglePayinsResponse extends BaseResponse
{
    private $singlePayins = null;

    private $itemsReturned = null;

    private $currentPage = null;

    private $totalItems = null;

    private $totalPages = null;

    private $pageSize = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->singlePayins)) {
            $this->singlePayins = $data->singlePayins;
        }

        if (isset($data->itemsReturned)) {
            $this->itemsReturned = $data->itemsReturned;
        }

        if (isset($data->currentPage)) {
            $this->currentPage = $data->currentPage;
        }

        if (isset($data->totalItems)) {
            $this->totalItems = $data->totalItems;
        }

        if (isset($data->totalPages)) {
            $this->totalPages = $data->totalPages;
        }

        if (isset($data->pageSize)) {
            $this->pageSize = $data->pageSize;
        }
    }

    /**
     * @return null
     */
    public function getSinglePayins()
    {
        return $this->singlePayins;
    }

    /**
     * @param null $singlePayins
     */
    public function setSinglePayins($singlePayins): void
    {
        $this->singlePayins = $singlePayins;
    }

    /**
     * @return null
     */
    public function getItemsReturned()
    {
        return $this->itemsReturned;
    }

    /**
     * @param null $itemsReturned
     */
    public function setItemsReturned($itemsReturned): void
    {
        $this->itemsReturned = $itemsReturned;
    }

    /**
     * @return null
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param null $currentPage
     */
    public function setCurrentPage($currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return null
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param null $totalItems
     */
    public function setTotalItems($totalItems): void
    {
        $this->totalItems = $totalItems;
    }

    /**
     * @return null
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @param null $totalPages
     */
    public function setTotalPages($totalPages): void
    {
        $this->totalPages = $totalPages;
    }

    /**
     * @return null
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param null $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }
}