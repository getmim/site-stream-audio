<?php
/**
 * StreamController
 * @package site-stream-audio
 * @version 0.0.1
 */

namespace SiteStreamAudio\Controller;

use LibFormatter\Library\Formatter;
use StreamAudio\Model\StreamAudio as SAudio;
use SiteStreamAudio\Library\Meta;

class StreamController extends \Site\Controller
{
    public function singleAction() {
        $stream = SAudio::getOne([]);
        if(!$stream)
            return $this->show404();

        $stream = Formatter::format('stream-audio', $stream, ['user']);

        $params = [
            'stream' => $stream,
            'meta'   => Meta::single($stream)
        ];

        $this->res->render('stream/audio/single', $params);
        $this->res->setCache(86400);
        $this->res->send();
    }
}