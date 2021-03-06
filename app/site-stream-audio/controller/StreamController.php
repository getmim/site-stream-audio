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

    public function updateAction(){
        $stream = SAudio::getOne([]);
        $content = [];

        if($stream){
            $content = [
                'song'   => $stream->curr_song,
                'artist' => $stream->curr_artist,
                'cover'  => $stream->curr_cover
            ];
        }

        $result = json_encode($content);

        $this->res->addHeader('Content-Type', 'application/json');
        $this->res->addContent($result);
        $this->res->send();
    }
}