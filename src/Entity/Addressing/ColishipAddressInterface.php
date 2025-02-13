<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Entity\Addressing;

interface ColishipAddressInterface
{
    public function getService(): ?string;

    public function setService(?string $service): void;

    public function getEntrance(): ?string;

    public function setEntrance(?string $entrance): void;

    public function getLocality(): ?string;

    public function setLocality(?string $locality): void;

    public function getFloor(): ?string;

    public function setFloor(?string $floor): void;

    public function getDoorCode1(): ?string;

    public function setDoorCode1(?string $doorCode1): void;

    public function getDoorCode2(): ?string;

    public function setDoorCode2(?string $doorCode2): void;

    public function getIntercom(): ?string;

    public function setIntercom(?string $intercom): void;

    public function getShippingInstructions(): ?string;

    public function setShippingInstructions(?string $shippingInstructions): void;

    public function getRecipientReference(): ?string;

    public function setRecipientReference(?string $recipientReference): void;
}
