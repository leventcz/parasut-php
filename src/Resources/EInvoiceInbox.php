<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Resources\Concerns\IndexesResources;

class EInvoiceInbox extends ApiResource
{
    use IndexesResources;

    /**
     * @var string
     */
    protected string $resource = 'e_invoice_inboxes';
}
