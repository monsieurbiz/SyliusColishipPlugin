<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Twig\Extension;

use MonsieurBiz\SyliusSettingsPlugin\Settings\SettingsInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

final class ColishipExtension extends AbstractExtension implements ExtensionInterface
{
    private ChannelRepositoryInterface $channelRepository;

    private SettingsInterface $colishipSettings;

    public function __construct(
        ChannelRepositoryInterface $channelRepository,
        SettingsInterface $colishipSettings
    ) {
        $this->channelRepository = $channelRepository;
        $this->colishipSettings = $colishipSettings;
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('monsieurbiz_coliship_export_channels', [$this, 'getChannels']),
        ];
    }

    public function getChannels(): array
    {
        $channels = [];
        /** @var ChannelInterface $channel */
        foreach ($this->channelRepository->findAll() as $channel) {
            if ($this->colishipSettings->getCurrentValue($channel, '', 'enabled')) {
                $channels[] = $channel;
            }
        }

        return $channels;
    }
}
