<?php

use Leventcz\Parasut\Client;
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

beforeEach(function () {
    $httpClient = Mockery::mock(HttpClientInterface::class);
    $this->client = new Client($httpClient);
});

it('creates Account instance', function () {
    expect($this->client->account())
        ->toBeInstanceOf(Account::class);
});

it('creates BankFee instance', function () {
    expect($this->client->bankFee())
        ->toBeInstanceOf(BankFee::class);
});

it('creates Contact instance', function () {
    expect($this->client->contact())
        ->toBeInstanceOf(Contact::class);
});

it('creates EArchive instance', function () {
    expect($this->client->eArchive())
        ->toBeInstanceOf(EArchive::class);
});

it('creates EInvoice instance', function () {
    expect($this->client->eInvoice())
        ->toBeInstanceOf(EInvoice::class);
});

it('creates EInvoiceInbox instance', function () {
    expect($this->client->eInvoiceInbox())
        ->toBeInstanceOf(EInvoiceInbox::class);
});

it('creates Employee instance', function () {
    expect($this->client->employee())
        ->toBeInstanceOf(Employee::class);
});

it('creates ESmm instance', function () {
    expect($this->client->eSmm())
        ->toBeInstanceOf(ESmm::class);
});

it('creates InventoryLevel instance', function () {
    expect($this->client->inventoryLevel())
        ->toBeInstanceOf(InventoryLevel::class);
});

it('creates ItemCategory instance', function () {
    expect($this->client->itemCategory())
        ->toBeInstanceOf(ItemCategory::class);
});

it('creates Product instance', function () {
    expect($this->client->product())
        ->toBeInstanceOf(Product::class);
});

it('creates PurchaseBill instance', function () {
    expect($this->client->purchaseBill())
        ->toBeInstanceOf(PurchaseBill::class);
});

it('creates Salary instance', function () {
    expect($this->client->salary())
        ->toBeInstanceOf(Salary::class);
});

it('creates SalesInvoice instance', function () {
    expect($this->client->salesInvoice())
        ->toBeInstanceOf(SalesInvoice::class);
});

it('creates ShipmentDocument instance', function () {
    expect($this->client->shipmentDocument())
        ->toBeInstanceOf(ShipmentDocument::class);
});

it('creates StockMovement instance', function () {
    expect($this->client->stockMovement())
        ->toBeInstanceOf(StockMovement::class);
});

it('creates Tag instance', function () {
    expect($this->client->tag())
        ->toBeInstanceOf(Tag::class);
});

it('creates Tax instance', function () {
    expect($this->client->tax())
        ->toBeInstanceOf(Tax::class);
});

it('creates TrackableJob instance', function () {
    expect($this->client->trackableJob())
        ->toBeInstanceOf(TrackableJob::class);
});

it('creates Transaction instance', function () {
    expect($this->client->transaction())
        ->toBeInstanceOf(Transaction::class);
});

it('creates WareHouse instance', function () {
    expect($this->client->wareHouse())
        ->toBeInstanceOf(WareHouse::class);
});
