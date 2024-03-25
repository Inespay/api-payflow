<?php

namespace Inespay\api\payflow\requests;

class PeriodicCancelRequest implements \JsonSerializable
{
    private $periodicPayinId;

    private $reference;

    private $successLinkRedirect;

    private $successLinkRedirectMethod;

    private $abortLinkRedirect;

    private $abortLinkRedirectMethod;

    private $notifUrl;

    private $notifUrlContentType;

    private $customData;

    private $expiration;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getPeriodicPayinId()
    {
        return $this->periodicPayinId;
    }

    /**
     * @param mixed $periodicPayinId
     */
    public function setPeriodicPayinId($periodicPayinId): void
    {
        $this->periodicPayinId = $periodicPayinId;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getSuccessLinkRedirect()
    {
        return $this->successLinkRedirect;
    }

    /**
     * @param mixed $successLinkRedirect
     */
    public function setSuccessLinkRedirect($successLinkRedirect): void
    {
        $this->successLinkRedirect = $successLinkRedirect;
    }

    /**
     * @return mixed
     */
    public function getSuccessLinkRedirectMethod()
    {
        return $this->successLinkRedirectMethod;
    }

    /**
     * @param mixed $successLinkRedirectMethod
     */
    public function setSuccessLinkRedirectMethod($successLinkRedirectMethod): void
    {
        $this->successLinkRedirectMethod = $successLinkRedirectMethod;
    }

    /**
     * @return mixed
     */
    public function getAbortLinkRedirect()
    {
        return $this->abortLinkRedirect;
    }

    /**
     * @param mixed $abortLinkRedirect
     */
    public function setAbortLinkRedirect($abortLinkRedirect): void
    {
        $this->abortLinkRedirect = $abortLinkRedirect;
    }

    /**
     * @return mixed
     */
    public function getAbortLinkRedirectMethod()
    {
        return $this->abortLinkRedirectMethod;
    }

    /**
     * @param mixed $abortLinkRedirectMethod
     */
    public function setAbortLinkRedirectMethod($abortLinkRedirectMethod): void
    {
        $this->abortLinkRedirectMethod = $abortLinkRedirectMethod;
    }

    /**
     * @return mixed
     */
    public function getNotifUrl()
    {
        return $this->notifUrl;
    }

    /**
     * @param mixed $notifUrl
     */
    public function setNotifUrl($notifUrl): void
    {
        $this->notifUrl = $notifUrl;
    }

    /**
     * @return mixed
     */
    public function getNotifUrlContentType()
    {
        return $this->notifUrlContentType;
    }

    /**
     * @param mixed $notifUrlContentType
     */
    public function setNotifUrlContentType($notifUrlContentType): void
    {
        $this->notifUrlContentType = $notifUrlContentType;
    }

    /**
     * @return mixed
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param mixed $customData
     */
    public function setCustomData($customData): void
    {
        $this->customData = $customData;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration): void
    {
        $this->expiration = $expiration;
    }
}