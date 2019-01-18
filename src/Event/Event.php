<?php

namespace Thenbsp\Wechat\Event;

use Thenbsp\Wechat\Message\Entity;
use Thenbsp\Wechat\Bridge\XmlResponse;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Event extends ArrayCollection
{
    /**
     * response message entity.
     */
    public function setResponse(Entity $entity)
    {
        $body = $entity->getBody();

        $body['ToUserName'] = $this['FromUserName'];
        $body['FromUserName'] = $this['ToUserName'];
        $body['MsgType'] = $entity->getType();
        $body['CreateTime'] = time();

        $response = new XmlResponse($body);
        $response->send();
    }

    /**
     * check event options is valid.
     */
    abstract public function isValid();
    
    /**
     * get event content.
     */
    public function getContent()
    {
        return $this['Content'];
    }

    /**
     * get event Initiator.
     */
    public function getFromUser()
    {
        return $this['FromUserName'];
    }

    /**
     * get event recipient.
     */
    public function getToUser()
    {
        return $this['ToUserName'];
    }
}
