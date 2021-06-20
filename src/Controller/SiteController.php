<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RazonYang\OpenCC\Config;
use RazonYang\OpenCC\Converter;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\Yii\View\ViewRenderer;

class SiteController
{
    private ViewRenderer $viewRenderer;
    private DataResponseFactoryInterface $responseFactory;

    private static $configs = [
        Config::S2T => '简体 => 繁体',
        Config::T2S => '繁体 => 简体',
        Config::S2TW => '简体 => 台湾正体',
        Config::TW2S => '台湾正体 => 简体',
        Config::S2HK => '简体 => 香港繁体',
        Config::HK2S => '香港繁体 => 简体',
        Config::S2TWP => '简体 => 繁体（台湾正体标准） 并转换为台湾常用词条',
        Config::TW2SP => '繁体（台湾正体标准） => 简体 并转换为中国大陆常用词条',
        Config::T2TW => '繁体（OpenCC 标准）=> 台湾正体',
        Config::HK2T => '香港繁体 => 繁体（OpenCC 标准）',
        Config::T2HK => '繁体（OpenCC 标准） => 香港繁体',
        Config::T2JP => '繁体（OpenCC 标准） => 日文新字体',
        Config::JP2T => '日文新字体 => 繁体（OpenCC 标准）',
        Config::TW2T => '台湾正体 => 繁体（OpenCC 标准）',
    ];

    public function __construct(ViewRenderer $viewRenderer, DataResponseFactoryInterface $responseFactory)
    {
        $this->viewRenderer = $viewRenderer->withControllerName('site');
        $this->responseFactory = $responseFactory;
    }

    public function index(): ResponseInterface
    {
        return $this->viewRenderer->render('index', [
            'configs' => self::$configs,
        ]);
    }

    public function convert(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();
        $data = [
            'output' => '',
        ];
        try {
            $converter = new Converter($body['config']);
            $data['output'] = $converter->convert($body['input']);
            $converter->close();
        } catch (\Throwable $e) {
            $data['output'] = $e->getMessage();
        }

        return $this->responseFactory->createResponse($data);
    }
}
