<?php

declare(strict_types=1);

namespace Leventcz\Parasut;

use Leventcz\Parasut\Http\HttpClientInterface;
use Leventcz\Parasut\Resources\Account;
use Leventcz\Parasut\Resources\BankFee;
use Leventcz\Parasut\Resources\Contact;
use Leventcz\Parasut\Resources\EArchive;
use Leventcz\Parasut\Resources\EInvoice;
use Leventcz\Parasut\Resources\EInvoiceInbox;
use Leventcz\Parasut\Resources\Employee;
use Leventcz\Parasut\Resources\ESmm;
use Leventcz\Parasut\Resources\InventoryLevel;
use Leventcz\Parasut\Resources\ItemCategory;
use Leventcz\Parasut\Resources\Product;
use Leventcz\Parasut\Resources\PurchaseBill;
use Leventcz\Parasut\Resources\Salary;
use Leventcz\Parasut\Resources\SalesInvoice;
use Leventcz\Parasut\Resources\ShipmentDocument;
use Leventcz\Parasut\Resources\StockMovement;
use Leventcz\Parasut\Resources\Tag;
use Leventcz\Parasut\Resources\Tax;
use Leventcz\Parasut\Resources\TrackableJob;
use Leventcz\Parasut\Resources\Transaction;
use Leventcz\Parasut\Resources\WareHouse;

readonly class Client
{
    /**
     * @param  HttpClientInterface  $httpClient
     */
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    /**
     * @return SalesInvoice
     */
    public function salesInvoice(): SalesInvoice
    {
        return new SalesInvoice($this->httpClient);
    }

    /**
     * @return Contact
     */
    public function contact(): Contact
    {
        return new Contact($this->httpClient);
    }

    /**
     * @return PurchaseBill
     */
    public function purchaseBill(): PurchaseBill
    {
        return new PurchaseBill($this->httpClient);
    }

    /**
     * @return BankFee
     */
    public function bankFee(): BankFee
    {
        return new BankFee($this->httpClient);
    }

    /**
     * @return Salary
     */
    public function salary(): Salary
    {
        return new Salary($this->httpClient);
    }

    /**
     * @return Tax
     */
    public function tax(): Tax
    {
        return new Tax($this->httpClient);
    }

    /**
     * @return Employee
     */
    public function employee(): Employee
    {
        return new Employee($this->httpClient);
    }

    /**
     * @return EInvoiceInbox
     */
    public function eInvoiceInbox(): EInvoiceInbox
    {
        return new EInvoiceInbox($this->httpClient);
    }

    /**
     * @return EArchive
     */
    public function eArchive(): EArchive
    {
        return new EArchive($this->httpClient);
    }

    /**
     * @return EInvoice
     */
    public function eInvoice(): EInvoice
    {
        return new EInvoice($this->httpClient);
    }

    /**
     * @return ESmm
     */
    public function eSmm(): ESmm
    {
        return new ESmm($this->httpClient);
    }

    /**
     * @return Account
     */
    public function account(): Account
    {
        return new Account($this->httpClient);
    }

    /**
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        return new Transaction($this->httpClient);
    }

    /**
     * @return Product
     */
    public function product(): Product
    {
        return new Product($this->httpClient);
    }

    /**
     * @return WareHouse
     */
    public function wareHouse(): WareHouse
    {
        return new WareHouse($this->httpClient);
    }

    /**
     * @return ShipmentDocument
     */
    public function shipmentDocument(): ShipmentDocument
    {
        return new ShipmentDocument($this->httpClient);
    }

    /**
     * @return StockMovement
     */
    public function stockMovement(): StockMovement
    {
        return new StockMovement($this->httpClient);
    }

    /**
     * @return InventoryLevel
     */
    public function inventoryLevel(): InventoryLevel
    {
        return new InventoryLevel($this->httpClient);
    }

    /**
     * @return ItemCategory
     */
    public function itemCategory(): ItemCategory
    {
        return new ItemCategory($this->httpClient);
    }

    /**
     * @return Tag
     */
    public function tag(): Tag
    {
        return new Tag($this->httpClient);
    }

    /**
     * @return TrackableJob
     */
    public function trackableJob(): TrackableJob
    {
        return new TrackableJob($this->httpClient);
    }
}
