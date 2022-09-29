<?php

namespace App\Services;

use App\Repositories\ShoppingSessionRepository;

class ShoppingSessionService
{
    protected $shoppingSessionRepository;

    public function __construct(
       ShoppingSessionRepository $shoppingSessionRepository
    ) {
        $this->shoppingSessionRepository = $shoppingSessionRepository;
    }

    public function getShoppingSessionId ()
    {
        return $this->shoppingSessionRepository->getShoppSessionIdByUserId();
    }

}
