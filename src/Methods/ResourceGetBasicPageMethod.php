<?php

namespace Invoke\Toolkit\Resources\Methods;

use Invoke\Method;
use Invoke\Toolkit\Resources\ResourceInterface;

class ResourceGetBasicPageMethod extends Method
{
    public function __construct(protected readonly ResourceInterface $resource)
    {
    }

    protected function handle(int $perPage = 10,
                              int $page = 1)
    {
        $items = $this->resource->getRepository()->getBasicPage($perPage, $page);

        return $this->resource->getResult()::many($items);
    }
}
