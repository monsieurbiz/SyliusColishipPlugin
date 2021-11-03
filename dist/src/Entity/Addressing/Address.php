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

namespace App\Entity\Addressing;

use Doctrine\ORM\Mapping as ORM;
use MonsieurBiz\SyliusColishipPlugin\Entity\Addressing\ColishipAddressInterface;
use MonsieurBiz\SyliusColishipPlugin\Entity\Addressing\ColishipAddressTrait;
use Sylius\Component\Core\Model\Address as BaseAddress;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_address")
 */
class Address extends BaseAddress implements ColishipAddressInterface
{
    use ColishipAddressTrait;
}
