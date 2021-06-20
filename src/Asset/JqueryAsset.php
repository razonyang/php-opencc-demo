<?php

declare(strict_types=1);

namespace App\Asset;

use Yiisoft\Yii\JQuery\JqueryAsset as BaseJqueryAsset;

class JqueryAsset extends BaseJqueryAsset
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
}
