<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Mapping;

use MonsieurBiz\SyliusColishipPlugin\Entity\Addressing\ColishipAddressInterface;
use MonsieurBiz\SyliusColishipPlugin\Entity\Shipping\ColishipShippingMethodInterface;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class FmtMapping implements MappingInterface
{
    private array $mapping = [];

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function __construct()
    {
        $this->mapping = [
            'ReferenceExpedition' => function (OrderInterface $order) {
                return $order->getNumber();
            },
            'RaisonSociale' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getCompany();
            },
            'NomDestinataire' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getLastName();
            },
            'Prenom' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getFirstName();
            },
            'Adresse1' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getStreet();
            },
            'Adresse2' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getFloor();
            },
            'Adresse3' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getEntrance();
            },
            'Adresse4' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getLocality();
            },
            'Commune' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getCity();
            },
            'CodePostal' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getPostcode();
            },
            'CodePays' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getCountryCode();
            },
            'Telephone' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getPhoneNumber();
            },
            'CodePorte1' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getDoorCode1();
            },
            'CodePorte2' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getDoorCode2();
            },
            'InstructionLivraison' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getShippingInstructions();
            },
            'Interphone' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getIntercom();
            },
            'Mail' => function (OrderInterface $order) {
                return $order->getCustomer()?->getEmail();
            },
            'ServiceDestinataire' => function (OrderInterface $order) {
                /** @var (AddressInterface&ColishipAddressInterface)|null $shippingAddress */
                $shippingAddress = $order->getShippingAddress();

                return $shippingAddress?->getService();
            },
            'CodeProduit' => function (OrderInterface $order) {
                $shipment = $order->getShipments()->first();
                $shipmentMethod = $shipment ? $shipment->getMethod() : null;

                return $shipment && $shipmentMethod instanceof ColishipShippingMethodInterface ?
                    $shipmentMethod->getColishipProductCode() ?? 'COLD'
                    : 'COLD';
            },
            'Poids' => function (OrderInterface $order) {
                $shipment = $order->getShipments()->first();

                return $shipment ? $shipment->getShippingWeight() : '';
            },
        ];
    }

    public function getValue(string $field, OrderInterface $order): string
    {
        if (!isset($this->mapping[$field])) {
            return '';
        }

        return (string) $this->mapping[$field]($order);
    }
}
