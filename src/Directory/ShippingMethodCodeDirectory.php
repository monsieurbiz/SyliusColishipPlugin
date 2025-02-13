<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Directory;

use Sylius\Component\Core\Repository\ShippingMethodRepositoryInterface;
use Sylius\Component\Shipping\Model\ShippingMethodInterface;

final class ShippingMethodCodeDirectory implements DirectoryInterface
{
    private ShippingMethodRepositoryInterface $shippingMethodRepository;

    /**
     * ShippingMethodCodeDirectory constructor.
     */
    public function __construct(ShippingMethodRepositoryInterface $shippingMethodRepository)
    {
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    public function getValues(): array
    {
        $values = [];
        /** @var ShippingMethodInterface $method */
        foreach ($this->shippingMethodRepository->findAll() as $method) {
            $values[\sprintf('%s (%s)', $method->getName(), $method->getCode())] = $method->getCode();
        }

        return $values;
    }
}
