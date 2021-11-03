<?php

/*
 * This file is part of Monsieur Biz' Coliship plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Directory;

use Sylius\Component\Core\OrderPaymentStates;

final class OrderPaymentStateDirectory implements DirectoryInterface
{
    public function getValues(): array
    {
        return [
            'sylius.ui.' . OrderPaymentStates::STATE_PAID => OrderPaymentStates::STATE_PAID,
            'sylius.ui.' . OrderPaymentStates::STATE_AUTHORIZED => OrderPaymentStates::STATE_AUTHORIZED,
            'sylius.ui.' . OrderPaymentStates::STATE_AWAITING_PAYMENT => OrderPaymentStates::STATE_AWAITING_PAYMENT,
            'sylius.ui.' . OrderPaymentStates::STATE_PARTIALLY_AUTHORIZED => OrderPaymentStates::STATE_PARTIALLY_AUTHORIZED,
            'sylius.ui.' . OrderPaymentStates::STATE_PARTIALLY_PAID => OrderPaymentStates::STATE_PARTIALLY_PAID,
            'sylius.ui.' . OrderPaymentStates::STATE_PARTIALLY_REFUNDED => OrderPaymentStates::STATE_PARTIALLY_REFUNDED,
            'sylius.ui.' . OrderPaymentStates::STATE_REFUNDED => OrderPaymentStates::STATE_REFUNDED,
            'sylius.ui.' . OrderPaymentStates::STATE_CANCELLED => OrderPaymentStates::STATE_CANCELLED,
            'sylius.ui.' . OrderPaymentStates::STATE_CART => OrderPaymentStates::STATE_CART,
        ];
    }
}
