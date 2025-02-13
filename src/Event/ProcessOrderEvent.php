<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Event;

use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Symfony\Contracts\EventDispatcher\Event;

final class ProcessOrderEvent extends Event
{
    public const NAME = 'monsieurbiz_coliship.order.process';

    private ChannelInterface $channel;

    private OrderInterface $order;

    private array $csvFields;

    private array $data;

    /**
     * ProcessOrderEvent constructor.
     */
    public function __construct(ChannelInterface $channel, OrderInterface $order, array $csvFields, array $data)
    {
        $this->channel = $channel;
        $this->order = $order;
        $this->csvFields = $csvFields;
        $this->data = $data;
    }

    public function getChannel(): ChannelInterface
    {
        return $this->channel;
    }

    public function getOrder(): OrderInterface
    {
        return $this->order;
    }

    public function getCsvFields(): array
    {
        return $this->csvFields;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
