<?php

declare(strict_types=1);

namespace App\ViewInjection;

use App\ApplicationParameters;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Yii\View\ContentParametersInjectionInterface;

final class ContentViewInjection implements ContentParametersInjectionInterface
{
    private ApplicationParameters $applicationParameters;
    private AssetManager $assetManager;

    public function __construct(
        ApplicationParameters $applicationParameters,
        AssetManager $assetManager
    ) {
        $this->applicationParameters = $applicationParameters;
        $this->assetManager = $assetManager;
    }

    public function getContentParameters(): array
    {
        return [
            'applicationParameters' => $this->applicationParameters,
            'assetManager' => $this->assetManager,
        ];
    }
}
