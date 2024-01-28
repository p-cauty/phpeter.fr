<?php

namespace App\View\Markdown;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Embed\Bridge\OscaroteroEmbedAdapter;
use League\CommonMark\Extension\Embed\EmbedExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;

class PHPeterMarkdownConverter extends MarkdownConverter
{
    /**
     * Create a new Markdown converter pre-configured for GFM
     *
     * @param array<string, mixed> $config
     */
    public function __construct(array $config = [])
    {
        $config = [
            ...$config,
            'embed' => [
                'adapter' => new OscaroteroEmbedAdapter(),
                'allowed_domains'=> [
                    'youtube.com',
                    'youtu.be',
                    'vimeo.com',
                    'instagram.com',
                    'twitter.com',
                    'x.com',
                    'facebook.com',
                    'soundcloud.com',
                    'spotify.com',
                    'twitch.tv',
                    'wikipedia.org',
                    'giphy.com',
                    'tenor.com',
                    'amazon.com',
                ],
                'fallback' => 'link',
            ],
        ];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new AttributesExtension());
        //$environment->addExtension(new EmbedExtension());
        $environment->addExtension(new ExternalLinkExtension());

        parent::__construct($environment);
    }
}