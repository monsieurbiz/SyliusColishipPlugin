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

namespace MonsieurBiz\SyliusColishipPlugin\Form\Extension\Shipping;

use Sylius\Bundle\ShippingBundle\Form\Type\ShippingMethodType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ShippingMethodTypeExtension extends AbstractTypeExtension
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('colishipProductCode', TextType::class, [
                'label' => 'monsieurbiz_coliship.form.shipping_method.coliship_product_code',
                'help' => 'monsieurbiz_coliship.form.shipping_method.coliship_product_code_help',
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [ShippingMethodType::class];
    }
}
