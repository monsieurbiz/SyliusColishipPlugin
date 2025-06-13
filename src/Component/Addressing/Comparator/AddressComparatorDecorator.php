<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Component\Addressing\Comparator;

use MonsieurBiz\SyliusColishipPlugin\Entity\Addressing\ColishipAddressInterface;
use Sylius\Component\Addressing\Comparator\AddressComparator;
use Sylius\Component\Addressing\Comparator\AddressComparatorInterface;
use Sylius\Component\Addressing\Model\AddressInterface;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\AutowireDecorated;

#[AsDecorator(decorates: 'sylius.comparator.address', priority: 10)]
class AddressComparatorDecorator implements AddressComparatorInterface
{
    public function __construct(
        #[AutowireDecorated]
        private AddressComparator $decorated,
    ) {
    }

    public function equal(AddressInterface $firstAddress, AddressInterface $secondAddress): bool
    {
        return
            $this->decorated->equal($firstAddress, $secondAddress)
            && $this->normalizeAddress($firstAddress) === $this->normalizeAddress($secondAddress);
    }

    private function normalizeAddress(AddressInterface $address): array
    {
        if (!$address instanceof ColishipAddressInterface) {
            return [];
        }

        return array_map(function ($value) {
            return strtolower(trim((string) $value));
        }, [
            $address->getService(),
            $address->getEntrance(),
            $address->getLocality(),
            $address->getFloor(),
            $address->getDoorCode1(),
            $address->getDoorCode2(),
            $address->getIntercom(),
            $address->getShippingInstructions(),
            $address->getRecipientReference(),
        ]);
    }
}
