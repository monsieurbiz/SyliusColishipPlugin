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

namespace App\Entity\Shipping;

use Doctrine\ORM\Mapping as ORM;
use MonsieurBiz\SyliusColishipPlugin\Entity\Shipping\ColishipShippingMethodInterface;
use MonsieurBiz\SyliusColishipPlugin\Entity\Shipping\ColishipShippingMethodTrait;
use Sylius\Component\Core\Model\ShippingMethod as BaseShippingMethod;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_shipping_method")
 */
class ShippingMethod extends BaseShippingMethod implements ColishipShippingMethodInterface
{
    use ColishipShippingMethodTrait;
}
