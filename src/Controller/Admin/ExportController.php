<?php

/*
 * This file is part of Monsieur Biz's Sylius Coliship Plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusColishipPlugin\Controller\Admin;

use MonsieurBiz\SyliusColishipPlugin\Exporter\ExporterInterface;
use MonsieurBiz\SyliusSettingsPlugin\Settings\SettingsInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class ExportController extends AbstractController
{
    public function exportAction(
        SettingsInterface $colishipSettings,
        ChannelRepositoryInterface $channelRepository,
        ExporterInterface $colishipExporter,
        string $channelCode
    ): StreamedResponse {
        if (null === $channel = $channelRepository->findOneByCode($channelCode)) {
            throw $this->createNotFoundException('Channel not found');
        }

        $locale = $colishipSettings->getCurrentValue($channel, null, 'exportLocale');
        if (!empty($locale)) {
            setlocale(\LC_CTYPE, $locale);
        }
        $file = $colishipExporter->exportToFile($channel);

        return new StreamedResponse(
            function () use ($file): void {
                ob_start();
                while ($file->valid()) {
                    echo $file->fread(1024);
                }
                $content = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', ob_get_clean());
                echo str_replace("\n", "\r\n", str_replace("\r", '', $content));
            },
            200,
            [
                'Content-Disposition' => 'attachment; filename="coliship_' . date('Y-m-d') . '.csv"',
                'Content-Type' => 'application/csv',
            ]
        );
    }
}
