<?php

/*
 * This file is part of Monsieur Biz' Coliship plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Directory;

use Sylius\Component\Core\OrderShippingStates;

final class OrderShippingStateDirectory implements DirectoryInterface
{
    public function getValues(): array
    {
        return [
            'sylius.ui.' . OrderShippingStates::STATE_READY => OrderShippingStates::STATE_READY,
            'sylius.ui.' . OrderShippingStates::STATE_PARTIALLY_SHIPPED => OrderShippingStates::STATE_PARTIALLY_SHIPPED,
            'sylius.ui.' . OrderShippingStates::STATE_SHIPPED => OrderShippingStates::STATE_SHIPPED,
            'sylius.ui.' . OrderShippingStates::STATE_CANCELLED => OrderShippingStates::STATE_CANCELLED,
            'sylius.ui.' . OrderShippingStates::STATE_CART => OrderShippingStates::STATE_CART,
        ];
    }
}
