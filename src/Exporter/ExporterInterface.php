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

namespace MonsieurBiz\SyliusColishipPlugin\Exporter;

use SplTempFileObject;
use Sylius\Component\Channel\Model\ChannelInterface;

interface ExporterInterface
{
    /**
     * @param ChannelInterface $channel
     *
     * @return SplTempFileObject
     */
    public function exportToFile(ChannelInterface $channel): SplTempFileObject;
}
