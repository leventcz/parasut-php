# Parasut PHP API Client

Modern PHP API client that allows you to interact with the [Parasut API v4](https://apidocs.parasut.com/)

## Installation

> **Requires [PHP 8.2+](https://php.net/releases/)**

```bash
composer require leventcz/parasut-php
```

## Usage

### Initializing Client

```php
$credentials = [
    'client_id' => 'YOUR_CLIENT_ID',
    'client_secret' => 'YOUR_CLIENT_SECRET',
    'company_id' => 'YOUR_COMPANY_ID',
    'username' => 'YOUR_USERNAME',
    'password' => 'YOUR_PASSWORD'
];

$client = Parasut::client($credentials);
```

### Examples

```php
// paginate through sales invoices
$salesInvoices = $client
    ->salesInvoice()
    ->index(query: ['page' => ['size' => 10, 'number' => 4]]);

$salesInvoices['data']; // array of sales invoices   
$salesInvoices['meta']; // pagination meta

// retrieve the specified sales invoice with its payments
$salesInvoice = $client
    ->salesInvoice()
    ->show(id: 1234, query: ['include' => 'payments']);

$salesInvoice['data']; // sales invoice
$salesInvoice['included']; // array of payments
```

### Methods & Parameters

The methods fully follow the naming conventions of their related endpoints and take required and optional parameters as arguments.

```php
// POST | https://api.parasut.com/v4/{company_id}/contacts/{id}/contact_debit_transactions
$client
    ->contact()
    ->contactDebitTransactions(id: $id: query: [], body: [])

// PATCH | https://api.parasut.com/v4/{company_id}/employees/{id}/archive
$client
    ->employee()
    ->archive(id: $id: query: [])
```

### API Reference

| Resource             | Reference                                          |
|----------------------|----------------------------------------------------|
| `salesInvoice()`     | https://apidocs.parasut.com/#tag/SalesInvoices     |
| `contact()`          | https://apidocs.parasut.com/#tag/Contacts          |
| `purchaseBill()`     | https://apidocs.parasut.com/#tag/PurchaseBills     |
| `bankFee()`          | https://apidocs.parasut.com/#tag/BankFees          |
| `salary()`           | https://apidocs.parasut.com/#tag/Salaries          |
| `tax()`              | https://apidocs.parasut.com/#tag/Taxes             |
| `employee()`         | https://apidocs.parasut.com/#tag/Employees         |
| `eInvoiceInbox()`    | https://apidocs.parasut.com/#tag/EInvoiceInboxes   |
| `eArchive()`         | https://apidocs.parasut.com/#tag/EArchives         |
| `eInvoice()`         | https://apidocs.parasut.com/#tag/EInvoices         |
| `eSmm()`             | https://apidocs.parasut.com/#tag/ESmms             |
| `account()`          | https://apidocs.parasut.com/#tag/Accounts          |
| `transaction()`      | https://apidocs.parasut.com/#tag/Transactions      |
| `product()`          | https://apidocs.parasut.com/#tag/Products          |
| `warehouse()`        | https://apidocs.parasut.com/#tag/Warehouses        |
| `shipmentDocument()` | https://apidocs.parasut.com/#tag/ShipmentDocuments |
| `stockMovement()`    | https://apidocs.parasut.com/#tag/StockMovements    |
| `inventoryLevel()`   | https://apidocs.parasut.com/#tag/InventoryLevels   |
| `itemCategory()`     | https://apidocs.parasut.com/#tag/ItemCategories    |
| `tag()`              | https://apidocs.parasut.com/#tag/Tags              |
| `tracableJob()`      | https://apidocs.parasut.com/#tag/TrackableJobs     |

## License

Parasut PHP is an open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.
