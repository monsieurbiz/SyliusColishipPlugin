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

namespace MonsieurBiz\SyliusColishipPlugin\Controller\Admin;

use MonsieurBiz\SyliusColishipPlugin\Exporter\ExporterInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class ExportController extends AbstractController
{
    /**
     * @param ChannelRepositoryInterface $channelRepository
     * @param ExporterInterface $colishipExporter
     * @param string $channelCode
     *
     * @return StreamedResponse
     */
    public function exportAction(
        ChannelRepositoryInterface $channelRepository,
        ExporterInterface $colishipExporter,
        string $channelCode
    ): StreamedResponse {
        if (null === $channel = $channelRepository->findOneByCode($channelCode)) {
            throw $this->createNotFoundException('Channel not found');
        }

        $file = $colishipExporter->exportToFile($channel);

        return new StreamedResponse(
            function() use ($file): void {
                while ($file->valid()) {
                    echo $file->fread(1024);
                }
            },
            200,
            [
                'Content-Disposition' => 'attachment; filename="coliship_.csv"',
                'Content-Type' => 'application/csv',
            ]
        );
    }
}
