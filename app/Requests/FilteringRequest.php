<?php


namespace App\Requests;


use Illuminate\Http\Request;

/**
 * Class FilteringRequest
 * @package App\Requests
 */
class FilteringRequest
{
    /**
     * @var string
     */
    public $status;
    /**
     * @var int
     */
    public $balanceMin;
    /**
     * @var int
     */
    public $balanceMax;
    /**
     * @var string
     */
    public $provider;
    /**
     * @var string
     */
    public $currency;

    public function __construct(Request $request)
    {
        $this->status = $request->status??null;
        $this->provider = $request->provider??null;
        $this->currency = $request->currency??null;
        $this->balanceMin = $request->balanceMin??null;
        $this->balanceMax = $request->balanceMax??null;

    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getBalanceMin()
    {
        return $this->balanceMin;
    }

    /**
     * @param mixed $balanceMin
     */
    public function setBalanceMin($balanceMin): void
    {
        $this->balanceMin = $balanceMin;
    }

    /**
     * @return mixed
     */
    public function getBalanceMax()
    {
        return $this->balanceMax;
    }

    /**
     * @param mixed $balanceMax
     */
    public function setBalanceMax($balanceMax): void
    {
        $this->balanceMax = $balanceMax;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider): void
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }


}
