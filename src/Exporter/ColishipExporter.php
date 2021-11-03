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

namespace MonsieurBiz\SyliusColishipPlugin\Exporter;

use Doctrine\ORM\QueryBuilder;
use MonsieurBiz\SyliusColishipPlugin\Directory\DirectoryInterface;
use MonsieurBiz\SyliusColishipPlugin\Event\ProcessOrderEvent;
use MonsieurBiz\SyliusColishipPlugin\Mapping\MappingInterface;
use MonsieurBiz\SyliusSettingsPlugin\Settings\SettingsInterface;
use SplTempFileObject;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class ColishipExporter implements ExporterInterface
{
    private SettingsInterface $colishipSettings;

    private MappingInterface $fmtMapping;

    private DirectoryInterface $fmtDirectory;

    private OrderRepositoryInterface $orderRepository;

    private EventDispatcherInterface $eventDispatcher;

    /**
     * ColishipExporter constructor.
     */
    public function __construct(
        SettingsInterface $colishipSettings,
        MappingInterface $fmtMapping,
        DirectoryInterface $fmtDirectory,
        OrderRepositoryInterface $orderRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->colishipSettings = $colishipSettings;
        $this->fmtMapping = $fmtMapping;
        $this->fmtDirectory = $fmtDirectory;
        $this->orderRepository = $orderRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function exportToFile(ChannelInterface $channel): SplTempFileObject
    {
        $file = new SplTempFileObject(-1);
        $ordersToExport = $this->getOrdersToExport($channel);

        if ($this->colishipSettings->getCurrentValue($channel, null, 'debug')) {
            // Header line
            $file->fputcsv($this->getCsvFields($channel), $this->getCsvDelimiter(), $this->getCsvEnclosure(), $this->getCsvEscape());
        }

        foreach ($ordersToExport as $order) {
            $this->processOrder($channel, $order, $file);
        }

        $file->rewind();

        return $file;
    }

    private function processOrder(ChannelInterface $channel, OrderInterface $order, SplTempFileObject $file): void
    {
        $data = [];
        $csvFields = $this->getCsvFields($channel);
        foreach ($csvFields as $field) {
            $data[$field] = $this->getFieldValue($field, $order);
        }

        $event = new ProcessOrderEvent($channel, $order, $csvFields, $data);
        $this->eventDispatcher->dispatch($event, ProcessOrderEvent::NAME);

        $data = $event->getData();
        foreach ($data as $key => $value) {
            $data[$key] = str_replace($this->getCsvEnclosure(), $this->getCsvEscape() . $this->getCsvEnclosure(), $value);
        }
        $file->fwrite($this->getCsvEnclosure() . implode(
            $this->getCsvEnclosure() . $this->getCsvDelimiter() . $this->getCsvEnclosure(),
            $data
        ) . $this->getCsvEnclosure() . "\n");
    }

    private function getFieldValue(string $field, OrderInterface $order): string
    {
        return $this->fmtMapping->getValue($field, $order);
    }

    private function getCsvFields(ChannelInterface $channel): array
    {
        return $this->colishipSettings->getCurrentValue($channel, null, 'exportFields');
    }

    private function getOrdersToExport(ChannelInterface $channel): array
    {
        $paymentState = $this->colishipSettings->getCurrentValue($channel, null, 'paymentState');
        $shippingState = $this->colishipSettings->getCurrentValue($channel, null, 'shippingState');
        $methodCodes = $this->colishipSettings->getCurrentValue($channel, null, 'methodCodes') ?? [$this->colishipSettings->getCurrentValue($channel, null, 'methodCode')];

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->orderRepository->createQueryBuilder('o');

        return $queryBuilder->leftJoin('o.shipments', 's')
            ->leftJoin('s.method', 'sm')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.paymentState = :paymentState')
            ->andWhere('o.shippingState = :shippingState')
            ->andWhere('sm.code IN (:methodCodes)')
            ->setParameter('channel', $channel)
            ->setParameter('paymentState', $paymentState)
            ->setParameter('shippingState', $shippingState)
            ->setParameter('methodCodes', $methodCodes)
            ->orderBy('o.number', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    private function getCsvDelimiter(): string
    {
        return ';';
    }

    private function getCsvEnclosure(): string
    {
        return '"';
    }

    private function getCsvEscape(): string
    {
        return '"';
    }
}
