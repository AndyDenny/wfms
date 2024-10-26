<?php


namespace ishop\libs;


class Pagination
{
    public $currentPage;
    public $perpage;
    public $total;
    public $countPages;
    public $uri;


    public function __construct($page, $perpage, $total){
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
        var_dump($this->uri);
    }

    public function getHtml(){
        $back = null;
        $forward = null;
        $startPage = null;
        $endPage = null;
        $page2left = null;
        $page1left = null;
        $page2right = null;
        $page1right = null;

        if($this->currentPage > 1){
            $back = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 1). "'>&lt;</a></li>";
        }

        if($this->currentPage < $this->countPages){
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }

        if($this->currentPage > 3){
            $startPage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }

        if($this->currentPage < ($this->countPages - 2) ){
            $endPage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if($this->currentPage - 2 > 0  ){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 2 ). "'>" .($this->currentPage - 2 ). "</a></li>";
        }
        if($this->currentPage - 1 > 0  ){
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 1 ). "'>" .($this->currentPage - 1 ). "</a></li>";
        }

        if($this->currentPage + 1 <= $this->countPages){
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage + 1). "</a></li>";
        }
        if($this->currentPage + 2 <+ $this->countPages){
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="pagination"> '.$startPage.$back.$page1left.$page2left.' <li class="active"><span>'.$this->currentPage.'</span></li>'.$page2right.$page1right.$forward.$endPage.'</ul>';
    }

    public function __toString()
    {
       return $this->getHtml();
    }

    /**
     * @return mixed
     */
    public function getCountPages()
    {
        return ceil($this->total / $this->perpage) ?: 1;
    }
    /**
     * @return mixed
     */
    public function getCurrentPage($page){
        if(!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getStart(){
        return ($this->currentPage - 1) * $this->perpage;
    }

    public function getParams(){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != ''){
            echo 'TR';
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(preg_match("#page-#",$param)){
                    $uri .= "{$param}&amp;";
                }
            }
        }
        return urldecode($uri);
    }

}