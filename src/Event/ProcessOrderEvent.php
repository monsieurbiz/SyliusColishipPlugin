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

namespace MonsieurBiz\SyliusColishipPlugin\Event;

use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Symfony\Contracts\EventDispatcher\Event;

final class ProcessOrderEvent extends Event
{
    public const NAME = 'monsieurbiz_coliship.order.process';

    /**
     * @var ChannelInterface
     */
    private ChannelInterface $channel;

    /**
     * @var OrderInterface
     */
    private OrderInterface $order;

    /**
     * @var array
     */
    private array $csvFields;

    /**
     * @var array
     */
    private array $data;

    /**
     * ProcessOrderEvent constructor.
     *
     * @param ChannelInterface $channel
     * @param OrderInterface $order
     * @param array $csvFields
     * @param array $data
     */
    public function __construct(ChannelInterface $channel, OrderInterface $order, array $csvFields, array $data)
    {
        $this->channel = $channel;
        $this->order = $order;
        $this->csvFields = $csvFields;
        $this->data = $data;
    }

    /**
     * @return ChannelInterface
     */
    public function getChannel(): ChannelInterface
    {
        return $this->channel;
    }

    /**
     * @return OrderInterface
     */
    public function getOrder(): OrderInterface
    {
        return $this->order;
    }

    /**
     * @return array
     */
    public function getCsvFields(): array
    {
        return $this->csvFields;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
