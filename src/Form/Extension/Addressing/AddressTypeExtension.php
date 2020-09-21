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

namespace MonsieurBiz\SyliusColishipPlugin\Form\Extension\Addressing;

use Sylius\Bundle\AddressingBundle\Form\Type\AddressType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Constraint;

class AddressTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->get('phoneNumber')->setRequired(true);
        $builder
            ->add('service', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.service',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 35,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('entrance', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.entrance',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 35,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('locality', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.locality',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 35,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('floor', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.floor',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 35,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('doorCode1', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.doorCode1',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 8,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('doorCode2', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.doorCode2',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 8,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('intercom', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.intercom',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 30,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('shippingInstructions', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.shippingInstructions',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 70,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
            ->add('recipientReference', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.address.recipientReference',
                'required' => false,
                'constraints' => [
                    new Constraint\Length([
                        'max' => 17,
                        'groups' => ['sylius', 'sylius_shipping_address_update'],
                    ]),
                ],
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [AddressType::class];
    }
}
