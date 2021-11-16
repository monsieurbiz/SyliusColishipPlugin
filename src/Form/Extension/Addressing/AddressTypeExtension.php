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

namespace MonsieurBiz\SyliusColishipPlugin\Form\Extension\Addressing;

use Sylius\Bundle\AddressingBundle\Form\Type\AddressType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AddressTypeExtension extends AbstractTypeExtension
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->get('phoneNumber')->setRequired(true);
        $builder
            ->add('service', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.service',
                'required' => false,
            ])
            ->add('entrance', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.entrance',
                'required' => false,
            ])
            ->add('locality', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.locality',
                'required' => false,
            ])
            ->add('floor', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.floor',
                'required' => false,
            ])
            ->add('doorCode1', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.doorCode1',
                'required' => false,
            ])
            ->add('doorCode2', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.doorCode2',
                'required' => false,
            ])
            ->add('intercom', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.intercom',
                'required' => false,
            ])
            ->add('shippingInstructions', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.shippingInstructions',
                'required' => false,
            ])
            ->add('recipientReference', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.recipientReference',
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [AddressType::class];
    }
}
