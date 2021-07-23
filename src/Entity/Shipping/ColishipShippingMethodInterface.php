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

namespace MonsieurBiz\SyliusColishipPlugin\Entity\Shipping;

interface ColishipShippingMethodInterface
{
    public function getColishipProductCode(): ?string;

    public function setColishipProductCode(?string $colishipProductCode): void;
}
