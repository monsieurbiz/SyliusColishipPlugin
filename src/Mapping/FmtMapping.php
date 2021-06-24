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

namespace MonsieurBiz\SyliusColishipPlugin\Mapping;

use Sylius\Component\Core\Model\OrderInterface;

final class FmtMapping implements MappingInterface
{
    private array $mapping = [];

    public function __construct()
    {
        $this->mapping = [
            'ReferenceExpedition' => function(OrderInterface $order) {
                return $order->getNumber();
            },
            'RaisonSociale' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getCompany();
            },
            'NomDestinataire' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getLastName();
            },
            'Prenom' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getFirstName();
            },
            'Adresse1' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getStreet();
            },
            'Adresse2' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getFloor();
            },
            'Adresse3' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getEntrance();
            },
            'Adresse4' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getLocality();
            },
            'Commune' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getCity();
            },
            'CodePostal' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getPostcode();
            },
            'CodePays' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getCountryCode();
            },
            'Telephone' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getPhoneNumber();
            },
            'CodePorte1' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getDoorCode1();
            },
            'CodePorte2' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getDoorCode2();
            },
            'InstructionLivraison' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getShippingInstructions();
            },
            'Interphone' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getIntercom();
            },
            'Mail' => function(OrderInterface $order) {
                return $order->getCustomer()->getEmail();
            },
            'ServiceDestinataire' => function(OrderInterface $order) {
                return $order->getShippingAddress()->getService();
            },
            'CodeProduit' => function() {
                return 'COLD';
            },
            'Poids' => function(OrderInterface $order) {
                //@TODO get current shipment only
                return $order->getShipments()[0]->getShippingWeight();
            }
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
