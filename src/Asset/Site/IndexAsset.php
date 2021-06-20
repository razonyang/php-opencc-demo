<?php

namespace App\Asset\Site;

use App\Asset\AssetBundle;
use App\Asset\JqueryAsset;

class IndexAsset extends AssetBundle
{
    public ?string $sourcePath = '@resources/assets/site/index';

    public array $js = [
        'index.js',
    ];

    public array $depends = [
        JqueryAsset::class,
    ];
}
