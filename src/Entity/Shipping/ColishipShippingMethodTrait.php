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

namespace MonsieurBiz\SyliusColishipPlugin\Entity\Shipping;

use Doctrine\ORM\Mapping as ORM;

trait ColishipShippingMethodTrait
{
    /**
     * @ORM\Column(name="coliship_product_code", type="string", length=10, nullable=true)
     */
    protected ?string $colishipProductCode = null;

    public function getColishipProductCode(): ?string
    {
        return $this->colishipProductCode;
    }

    public function setColishipProductCode(?string $colishipProductCode): void
    {
        $this->colishipProductCode = $colishipProductCode;
    }
}
