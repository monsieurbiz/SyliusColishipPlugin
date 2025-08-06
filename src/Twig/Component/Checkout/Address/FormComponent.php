<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Twig\Component\Checkout\Address;

use MonsieurBiz\SyliusColishipPlugin\Entity\Addressing\ColishipAddressInterface;
use Sylius\Bundle\ShopBundle\Twig\Component\Checkout\Address\AddressBookComponent;
use Sylius\Bundle\ShopBundle\Twig\Component\Checkout\Address\FormComponent as BaseFormComponent;
use Sylius\Bundle\UiBundle\Twig\Component\ResourceFormComponentTrait;
use Sylius\Bundle\UiBundle\Twig\Component\TemplatePropTrait;
use Sylius\Component\Core\Model\OrderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveListener;

class FormComponent extends BaseFormComponent
{
    /** @use ResourceFormComponentTrait<OrderInterface> */
    use ResourceFormComponentTrait;

    use TemplatePropTrait;

    #[LiveListener(AddressBookComponent::SYLIUS_SHOP_ADDRESS_UPDATED)]
    public function addressFieldUpdated(#[LiveArg] mixed $addressId, #[LiveArg] string $field): void
    {
        parent::addressFieldUpdated($addressId, $field);

        $address = $this->addressRepository->find($addressId);
        if (!$address instanceof ColishipAddressInterface) {
            return;
        }

        $formAddressValues = $this->formValues[$field];
        $formAddressValues['service'] = $address->getService();
        $formAddressValues['entrance'] = $address->getEntrance();
        $formAddressValues['locality'] = $address->getLocality();
        $formAddressValues['floor'] = $address->getFloor();
        $formAddressValues['doorCode1'] = $address->getDoorCode1();
        $formAddressValues['doorCode2'] = $address->getDoorCode2();
        $formAddressValues['intercom'] = $address->getIntercom();
        $formAddressValues['shippingInstructions'] = $address->getShippingInstructions();

        $this->formValues[$field] = $formAddressValues;
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->formFactory->create(
            $this->formClass,
            $this->resource,
            ['customer' => $this->customerContext->getCustomer()],
        );
    }
}
