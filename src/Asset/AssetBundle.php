<?php

declare(strict_types=1);

namespace App\Asset;

use Yiisoft\Assets\AssetBundle as BaseAssetBundle;

class AssetBundle extends BaseAssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
}
