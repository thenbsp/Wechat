<?php

namespace Thenbsp\Wechat\Message\Template;

/**
 * 小程序模板消息类
 * Class MicroProgramTemplate
 * @package Thenbsp\Wechat\Message\Template
 */
class MicroProgramTemplate implements TemplateInterface
{
    /**
     * 模板 ID.
     */
    protected $id;

    /**
     * 跳转链接.
     */
    protected $url;

    /**
     * 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
     */
    protected $page = '';

    /**
     * 表单提交场景下，为 submit 事件带上的 formId；支付场景下，为本次支付的 prepay_id
     */
    protected $form_id = '';

    /**
     * 模板需要放大的关键词，不填则默认无放大
     */
    protected $emphasis_keyword = '';

    /**
     * 用户 Openid.
     */
    protected $openid;

    /**
     * 模板参数.
     */
    protected $options;

    /**
     * 构造方法.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * 获取模板 ID.
     */
    public function getId()
    {
        return $this->id;

        return $this;
    }

    /**
     * 设置链接.
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * 获取逻接.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 设置用户 Openid.
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * 获取用户 Openid.
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * 添加模板参数.
     */
    public function add($key, $value, $color = null)
    {
        $array = ['value' => $value];

        if (null !== $color) {
            $array['color'] = $color;
        }

        $this->options[$key] = $array;

        return $this;
    }

    /**
     * 移除模板参数.
     */
    public function remove($key)
    {
        if (isset($this->options[$key])) {
            unset($this->options[$key]);
        }

        return $this;
    }

    /**
     * 设置form_id
     */
    public function setFormId($form_id)
    {
        $this->form_id = $form_id;

        return $this;
    }

    /**
     * 设置跳转page
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * 设置需要放大的关键词
     */
    public function setEmphasisKeyword($emphasisKeyword)
    {
        $this->emphasis_keyword = $emphasisKeyword;

        return $this;
    }

    /**
     * 获取请求内容.
     */
    public function getRequestBody()
    {
        $rqBody = [
            'touser' => $this->openid,
            'template_id' => $this->id,
            'form_id' => $this->form_id,
            'data' => $this->options,
        ];

        if (!empty($this->page)) {
            $rqBody['page'] = $this->page;
        }

        if (!empty($this->emphasis_keyword)) {
            $rqBody['emphasis_keyword'] = $this->emphasis_keyword;
        }

        return $rqBody;
    }
}
