<?php
namespace lichunyin\blogroll;

use lichunyin\blogroll\exception\MessageException;

/**
 * 绘制html页面
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2019年5月23日
 */
class Pager
{
    /**
     *
     * @var Link
     */
    private $link;

    /**
     *
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link   = $link;
    }

    /**
     * 友情链接提交表单
     */
    public function bootstrapFrom() : string
    {
        $alert  = '';
        $title  = '';
        $url    = '';
        if(!empty($_POST['link_title']) && !empty($_POST['link_url'])){
            try{
                $title  = trim($_POST['link_title']);
                $url    = trim($_POST['link_url']);
                $this->link->add($title, $url);
                $alert  = '已成功交换链接，谢谢合作。';
            }catch(MessageException $e){
                $alert  = '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
            }catch(\Exception $e){
                $alert  = '<div class="alert alert-dark" role="alert">系统异常，请尝试重新提交，或者与网站管理员联系!</div>';
            }
        }

        return <<<FORM
        <!doctype html>
        <html lang="zh_CN">
            <head>
                <title>友情链接交换-自助申请</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
            </head>
            <body>
                <div class="container show">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <h1>友情链接自助交换</h1>
                                <form id="blogroll-form" method="post">
                                    {$alert}
                                    <div class="form-group">
                                        <label for="link_title">链接标题</label>
                                        <input type="text" class="form-control" value="{$title}" name="link_title" id="link_title" placeholder="请输入友情链接标题" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link_url">链接网站url(请填写你添加本站友情链接的完整url)</label>
                                        <input type="text" class="form-control" value="{$url}" name="link_url" id="link_url" placeholder="请输入友情链接url" required>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">请先做好本站友情链接，然后在此提交申请.</button>
                                    <div class="form-group">
                                    </div>
                                </form>
                            </p>
                            <p><a href="https://github.com/li-chun-yin/blogroll.git">友情链接自助交换交换源码（开发者：李春寅）</a></p>
                            <div class="alert alert-info" role="alert">本站名称：{$this->link->getConfig()->getSiteTitle()}， 本站url：{$this->link->getConfig()->getSiteUrl()}。请添加</div>
                            <p><a href="javascript:history.back();">返回</a></p>
                        </div>
                    </div>
                </div>
            </body>
        </html>
FORM;
    }

    /**
     * 友情链接html
     *
     * @return string
     */
    public function linksHtml() : string
    {
        $links  = $this->link->all();
        $html   = [];
        foreach($links AS $link => $title){
            $html[] = '<a href="' . $link . '" title="' . $title . '" _target="_blank">' . $title . '</a>';
        }
        $html   = implode(' | ', $html);
        return $html;
    }
}