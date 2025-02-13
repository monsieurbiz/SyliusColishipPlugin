<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Form;

use MonsieurBiz\SyliusColishipPlugin\Directory\DirectoryInterface;
use MonsieurBiz\SyliusSettingsPlugin\Form\AbstractSettingsType;
use MonsieurBiz\SyliusSettingsPlugin\Form\SettingsTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class SettingsType extends AbstractSettingsType implements SettingsTypeInterface
{
    private DirectoryInterface $fmtDirectory;

    private DirectoryInterface $orderPaymentStateDirectory;

    private DirectoryInterface $orderShippingStateDirectory;

    private DirectoryInterface $shippingMethodCodeDirectory;

    /**
     * SettingsType constructor.
     */
    public function __construct(
        DirectoryInterface $fmtDirectory,
        DirectoryInterface $orderPaymentStateDirectory,
        DirectoryInterface $orderShippingStateDirectory,
        DirectoryInterface $shippingMethodCodeDirectory
    ) {
        $this->fmtDirectory = $fmtDirectory;
        $this->orderPaymentStateDirectory = $orderPaymentStateDirectory;
        $this->orderShippingStateDirectory = $orderShippingStateDirectory;
        $this->shippingMethodCodeDirectory = $shippingMethodCodeDirectory;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isDefaultForm = $this->isDefaultForm($builder);
        $constraints = $isDefaultForm ? [
            new Assert\NotBlank(),
        ] : [];

        $this
            ->addWithDefaultCheckbox($builder, 'enabled', CheckboxType::class, [
                'required' => false,
            ])
            ->addWithDefaultCheckbox($builder, 'debug', CheckboxType::class, [
                'required' => false,
            ])
            ->addWithDefaultCheckbox($builder, 'fmtGeneral', TextareaType::class, [
                'required' => $isDefaultForm,
                'constraints' => $constraints,
            ])
            ->addWithDefaultCheckbox($builder, 'paymentState', ChoiceType::class, [
                'required' => $isDefaultForm,
                'choices' => $this->orderPaymentStateDirectory->getValues(),
                'constraints' => $constraints,
            ])
            ->addWithDefaultCheckbox($builder, 'shippingState', ChoiceType::class, [
                'required' => $isDefaultForm,
                'choices' => $this->orderShippingStateDirectory->getValues(),
                'constraints' => $constraints,
            ])
            ->addWithDefaultCheckbox($builder, 'methodCode', ChoiceType::class, [
                'label' => 'monsieurbiz_coliship.admin.settings.method_code_deprecated',
                'required' => $isDefaultForm,
                'choices' => $this->shippingMethodCodeDirectory->getValues(),
                'constraints' => $constraints,
            ])
            ->addWithDefaultCheckbox($builder, 'methodCodes', ChoiceType::class, [
                'required' => $isDefaultForm,
                'choices' => $this->shippingMethodCodeDirectory->getValues(),
                'multiple' => true,
                'constraints' => $constraints,
            ])
            ->addWithDefaultCheckbox($builder, 'exportFields', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => $this->fmtDirectory->getValues(),
            ])
            ->addWithDefaultCheckbox($builder, 'exportLocale', TextType::class, [
                'required' => false,
                'label' => 'monsieurbiz_coliship.admin.settings.export_locale',
            ])
        ;
    }
}
