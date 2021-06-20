<?php

declare(strict_types=1);

use App\Asset\JqueryAsset;
use App\Asset\Site\IndexAsset;
use Yiisoft\View\WebView;

/** @var App\ApplicationParameters $applicationParameters */
/** @var Yiisoft\View\WebView $this */
/** @var Yiisoft\Assets\AssetManager $assetManager */

$this->params['breadcrumbs'] = '/';

$this->setTitle($applicationParameters->getName());
$assetManager->register([IndexAsset::class]);
?>

<section class="section">
    <div class="columns">
        <div class="column">
            <div class="select">
                <select id="config">
                    <?php foreach ($configs as $value => $name) : ?>
                        <option value="<?= $value ?>"><?= $name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="column">
            <button class="button" onclick="convert()">Convert</button>
        </div>
    </div>
</section>

<section class="section">
    <div class="columns">
        <div class="column is-full-mobile is-half-desktop">
            <textarea class="textarea" id="input" placeholder="Input" rows="10">我鼠标哪儿去了</textarea>
        </div>
        <div class="column is-full-mobile is-half-desktop">
            <textarea class="textarea" id="output" placeholder="Output" rows="10" readonly></textarea>
        </div>
    </div>
</section>