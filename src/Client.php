<?php

declare(strict_types=1);

namespace Leventcz\Parasut;

use Leventcz\Parasut\Endpoints\BankFee;
use Leventcz\Parasut\Endpoints\Contact;
use Leventcz\Parasut\Endpoints\PurchaseBill;
use Leventcz\Parasut\Endpoints\SalesInvoice;
use Leventcz\Parasut\Http\HttpClientInterface;
use Leventcz\Parasut\ValueObjects\Credential;

readonly class Client
{
    /**
     * @param  HttpClientInterface  $httpClient
     * @param  Credential  $credential
     */
    public function __construct(private HttpClientInterface $httpClient, private Credential $credential)
    {
    }

    /**
     * @return SalesInvoice
     */
    public function salesInvoice(): SalesInvoice
    {
        return new SalesInvoice($this->httpClient, $this->credential);
    }

    /**
     * @return Contact
     */
    public function contact(): Contact
    {
        return new Contact($this->httpClient, $this->credential);
    }

    /**
     * @return PurchaseBill
     */
    public function purchaseBill(): PurchaseBill
    {
        return new PurchaseBill($this->httpClient, $this->credential);
    }

    /**
     * @return BankFee
     */
    public function bankFee(): BankFee
    {
        return new BankFee($this->httpClient, $this->credential);
    }
}
