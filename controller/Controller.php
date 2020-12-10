<?php
//#[Attribute(Attribute::TARGET_CLASS)]
#[Attribute(Attribute::TARGET_ALL)]
class Controller {
    public string $url = "";
    public string $method = "";
    public function __construct($url, $method)
    {
        $this->url = $url;
        $this->method = $method;

        $urls = $GLOBALS["Controller_Url"];
        if ($urls == false){
            $urls = array();
        }
        $urls[] = array($this->url,$this->method);
        $GLOBALS["Controller_Url"] = $urls;

    }
}
