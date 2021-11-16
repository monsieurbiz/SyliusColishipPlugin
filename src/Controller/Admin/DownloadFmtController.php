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

namespace MonsieurBiz\SyliusColishipPlugin\Controller\Admin;

use MonsieurBiz\SyliusSettingsPlugin\Settings\SettingsInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DownloadFmtController extends AbstractController
{
    public function downloadAction(
        ChannelRepositoryInterface $channelRepository,
        SettingsInterface $colishipSettings,
        string $channelCode
    ): Response {
        if (null === $channel = $channelRepository->findOneByCode($channelCode)) {
            throw $this->createNotFoundException('Channel not found');
        }

        $data = [
            'general' => $colishipSettings->getCurrentValue($channel, null, 'fmtGeneral'),
            'fields' => $colishipSettings->getCurrentValue($channel, null, 'exportFields'),
        ];

        $response = new Response(
            null, 200,
            [
                'Content-Disposition' => sprintf('attachment; filename="%s.FMT"', $channelCode),
                'Content-Type' => 'text/fmt',
            ]
        );

        return $this->render('@MonsieurBizSyliusColishipPlugin/Coliship/fmt.twig', $data, $response);
    }
}
