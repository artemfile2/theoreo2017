<?php

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(0);

class Lib
{
    public static function varDump()
    {

        echo '<p><pre><strong>';

        foreach (func_get_args() as $var) {
            var_dump($var);
        }

        echo '</strong></pre></p>';
    }

    public static function getHost()
    {
        if ($host = Input::SERVER('HTTP_X_FORWARDED_HOST')) {

            $elements = explode(',', $host);
            $host = trim(end($elements));
        } else {

            if (!$host = Input::SERVER('HTTP_HOST')) {

                if (!$host = Input::SERVER('SERVER_NAME')) {
                    $server_addr=Input::SERVER('SERVER_ADDR');
                    $host = !empty($server_addr) ? $server_addr : '';
                }
            }
        }

        $host = preg_replace('/:\d+$/', '', $host);

        return trim($host);
    }

    public static function getVarDump()
    {
        ob_start();
        foreach (func_get_args() as $var) {
            Lib::VarDump($var);
        }

        return ob_get_clean();
    }

    public static function addVarDump()
    {
        foreach (func_get_args() as $var) {

            DebugBar::getCollector('Var dumps')->addMessage($var);
        }
    }

    public static function parseAjaxForm($form_name)
    {
        $params=array();
        $items = array();
        $data=explode("&",Input::RAW_POST($form_name));

        foreach ($data as $input) {
            $input=explode("=",$input);

            if(strpos($input[0],'%5B%5D') !== false) { //if exists forms elements with "[]" postfix (like multiple checkboxes)
                $item_name = str_replace('%5B%5D', '', $input[0]);
                $items[$item_name][] = Lib::html2text(urldecode($input[1]));
            } else {
                $params[$input[0]] = Lib::html2text(trim(urldecode($input[1])));
            }
        }

        if(Lib::chkArr($items)) {
            $params = array_merge($params,$items);
        }

        return $params;
    }

    public static function getPHPDebugAssets()
    {
        return DebugBar::getJavascriptRenderer()->renderHead();
    }

    public static function getPHPDebugPanel()
    {
        return DebugBar::getJavascriptRenderer()->render();
    }

    public static function renderErrorsInfo()
    {
        foreach (\DYuriev\ErrorHandler::getAppErrors() as $error) {
            $error_info = '[' . $error['LEVEL'] . '] ' . $error['MESSAGE'] . ' in file ' . $error['FILE'] . ' on line ' . $error['LINE'];
            DebugBar::getCollector('Errors')->addMessage($error_info);
        }
    }

    public static function chkArr($array)
    {
        return (isset($array) && is_array($array) && count($array) > 0) ? true : false;
    }

    public static function chkInt($integer)
    {
        return (isset($integer) && is_int($integer) && $integer > 0) ? true : false;
    }

    public static function chkStr($string)
    {
        return (isset($string) && is_string($string) && strlen(trim($string)) > 0) ? true : false;
    }

    public static function chkObj($object)
    {
        return (isset($object) && is_object($object)) ? true : false;
    }

    public static function chkProp($prop, $class)
    {
        return property_exists($class, $prop);
    }

    public static function redirect($address,$code=302)
    {
        if (Lib::chkArr($address)) {
            $redirect_url = Lib::mkLink($address);
        } elseif (empty($address)) {
            $redirect_url = Lib::mkLink(array(''));
        } else {
            $redirect_url = $address;
        }

        header('Location: '.$redirect_url, $code);
        exit();
    }

    public static function explodePath($path)
    {
        $arr = array();

        $arr2 = array_filter(explode('/',$path), function ($var) {
                if ($var == '0') $var='00'; /** dirty hack */
                return Lib::chkStr($var) ?  $var :  false;
            });

        foreach ($arr2 as $part) {
            $arr[]=$part;
        }

        return $arr;
    }

    public static function isMobileDevice()
    {
        $m_brs=array(
            'Alcatel',
            'Asus',
            'Android',
            'BlackBerry',
            'Ericsson',
            'Fly',
            'Huawei',
            'i-mate',
            'iPAQ',
            'iPhone',
            'iPod',
            'iPad',
            'LG-',
            'LGE-',
            'MDS_',
            'MOT-',
            'Nokia',
            'Palm',
            'Panasonic',
            'Pantech',
            'Philips',
            'Sagem',
            'Samsung',
            'Sharp',
            'SIE-',
            'Symbian',
            'Vodafone',
            'Voxtel',
            'WebOS',
            'ZTE-',
            'Windows CE',
            'Zune');

        foreach ($m_brs as $m_br) {
            if(FALSE !== strpos(Input::SERVER('HTTP_USER_AGENT'),$m_br)) return true;
        }

        return false;
    }

    public static function sanitize($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }

    public static function unsanitize($str)
    {
        return html_entity_decode($str, ENT_QUOTES, 'UTF-8');
    }

    public static function html2text($input)
    {
        if (Lib::chkArr($input)) {
            array_walk($input, function (&$val,$key) {
                    $val = Lib::sanitize($val);
                });

            return $input;
        }

        return Lib::sanitize($input);
    }

    public static function text2html($input)
    {
        if (Lib::chkArr($input)) {
            array_walk($input, function (&$val,$key) {
                    $val = Lib::unsanitize($val);
                });

            return $input;
        }

        return Lib::unsanitize($input);
    }

    public static function genRandID($lenght = 40)
    {
        return substr(sha1(microtime().uniqid()),0,$lenght);
    }

    public static function chkFile($filename)
    {
        if (is_file($filename) && is_readable($filename)) return true;
        return false;
    }

    public static function chkFileWrite($filename)
    {
        if (is_file($filename) && is_writable($filename)) return true;
        return false;
    }

    public static function chkDir($dirname)
    {
        if (is_dir($dirname) && is_readable($dirname)) return true;
        return false;
    }

    public static function chkDirWrite($dirname)
    {
        if (is_dir($dirname) && is_writable($dirname)) return true;
        return false;
    }

    public static function chkArrKey($key,$arr)
    {
        if (Lib::chkArr($arr) && array_key_exists($key,$arr)) {
            return true;
        }

        return false;
    }

    public static function loadArrayFile($file)
    {
        if (Lib::chkFile($file)) {
            return include_once($file);
        }

        return false;
    }

    public static function mkPath($path_arr,$add_trail=false)
    {
        if (Lib::chkArr($path_arr)) {
            $path=ROOT_DIR.'/'.implode($path_arr,'/');
        } else {
            return false;
        }

        if ($add_trail) {
            $path.='/';
        }

        return $path;
    }

    public static function mkLink($link_arr,$add_trail=false)
    {
        if (Lib::chkArr($link_arr)) {
            $proto=Input::isHTTPS() ? 'https://' : 'http://';
            $link=$proto.Config::get('app.main_domain').'/'.implode($link_arr,'/');
        } else {
            return false;
        }

        if ($add_trail) {
            $link.='/';
        }

        return $link;
    }

    public static function getFilesFromDir($dir)
    {
        $files = array();
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if (is_dir($dir.DS.$file)) {
                        $dir2 = $dir.DS.$file;

                        $files[] = Lib::getFilesFromDir($dir2);
                    } else {
                        $files[] = $dir.DS.$file;

                    }
                }
            }
            closedir($handle);
        }

        return $files;
    }

    public static function array_flat($array)
    {
        foreach ($array as $a) {
            if (is_array($a)) {
                $tmp = array_merge($a, Lib::array_flat($a));
            } else {
                $tmp[] = $a;
            }
        }

        return $tmp;
    }

    public static function netCompare($networks, $ip)
    {
        $flag = false;

        foreach ($networks as $network) {

            if (false === strpos($network, '/')) {
                $network = $network . '/32';
            }

            $ip_arr = explode('/', $network);
            $network_long = ip2long($ip_arr[0]);
            $x = ip2long($ip_arr[1]);
            $mask = long2ip($x) == $ip_arr[1] ? $x : 0xffffffff << (32 - $ip_arr[1]);
            $ip_long = ip2long($ip);

            if(($ip_long & $mask) == ($network_long & $mask)) {
                $flag = true;
            }
        }

        return $flag;
    }

    public static function httpAuthBasic($callback)
    {
        $user=trim(Input::SERVER('PHP_AUTH_USER'));
        $password=trim(Input::SERVER('PHP_AUTH_PW'));
        if (empty($user) || empty($password)) return false;
        return call_user_func($callback,$user,$password);
    }

    //mode can be: 0 - digits, 1 - letters, 2 - letters and digits, 3 - letters, digits and signs
    public static function getRandStr($str_len,$mode=1)
    {
        $res=array(); $str='';
        $letters='AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
        $digits='0123456789';
        $signs='!@#$%^&*()_-=+[]{};:|,.?';

        switch ($mode) {
            case 0:
                $str=$digits;
                break;

            case 1:
                $str=$letters;
                break;

            case 2:
                $str=$letters.$digits;
                break;

            case 3:
                $str=$letters.$digits.$signs;
                break;

            default:
                trigger_error('getRandStr: Invalid mode argument',E_ERROR);
                break;
        }

        $sym_arr=str_split($str);
        shuffle($sym_arr);
        $len=count($sym_arr);

        for ($i=0;$i<$str_len;$i++) {
            $rand=mt_rand(0,$len-1);
            $res[]=$sym_arr[$rand];
        }

        return implode('',$res);
    }

    public static function getRandInt($len)
    {
        return Lib::getRandStr($len,0);
    }

    public static function setCookie($name,$value=null,$expire=null,$path=null,$domain=null,$secure=null,$http_only=null)
    {
        $expire=is_null($expire) ? Config::get('cookie.default_expire') : $expire;
        $path=is_null($path) ? Config::get('cookie.default_path') : $path;
        $domain=is_null($domain) ? Config::get('cookie.default_domain') : $domain;
        $http_only=is_null($http_only) ? Config::get('cookie.only_http') : $http_only;
        setcookie($name,$value,$expire,$path,$domain,$secure,$http_only);
    }

}

class CurlRequest
{
    protected $proxy = null;
    protected $proxy_auth = null;
    protected $user_agent = 'Forpost/3 (PHP5; cURL;)';
    protected $http_referer = 'http://localhost/';
    protected $response_http_code = null;
    protected $response_http_body = null;
    protected $response_http_headers = null;
    protected $response_cookies = array();
    protected $request_cookies = array();
    protected $response_raw_headers = null;
    
    protected function buildCookie(array $cookie_array)
    {
        foreach ($cookie_array as $key => $value) {
            $cookies .= "$key=$value; ";
        }   

        return rtrim(trim($cookies), ';');
    }

    public function getResponseCode()
    {
        $response_http_code = $this->response_http_code;
        unset($this->response_http_code);

        return $response_http_code;
    }
    
    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
        
        return $this;
    }
    
    public function setReferer($referer)
    {
        $this->http_referer= $referer;

        return $this;
    }
    
    public function setRequestCookies(array $request_cookies = array())
    {
        $this->request_cookies = $request_cookies;
        
        return $this;
    }

    public function getResponseBody()
    {
        $response_http_body = $this->response_http_body;
        unset($this->response_http_body);

        return $response_http_body;
    }
    
    public function getResponseHeaders()
    {
        $response_http_headers = $this->response_http_headers;
        unset($this->response_http_headers);

        return $response_http_headers;
    }

    public function getResponseRawHeaders()
    {
        $response_http_headers = $this->response_raw_headers;
        unset($this->response_raw_headers);

        return $response_http_headers;
    }
    
    public function getResponseCookies()
    {
        $response_cookies = $this->response_cookies;
        unset($this->response_cookies );

        return $response_cookies;
    }        
    
    protected function parseHeaders($headers_str)
    {
        $headers = array();
        $headersArr = explode("\n", $headers_str);
        unset($headersArr[0]);

        foreach ($headersArr as $line) {
            $line = trim($line);
           
            if(!empty($line)) {
                $arr = explode(':', $line);
                $key = trim($arr[0]);
                $value = trim($arr[1]);

                if (\Lib::chkArrKey($key, $headers)) {
                    
                    if (\Lib::chkArr($headers[$key])) {
                        $headers[$key][] = $value;
                    } else {
                        $headers[$key] = array($headers[$key], $value);
                    }

                } else {
                    $headers[$key] = $value;
                }
            }
        }
        
        unset($headers['']);
        
        return $headers;
    }

    public function get($url, array $curl_options = array())
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_REFERER, $this->http_referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_ENCODING, 'deflate');
        
        if (\Lib::chkArr($this->request_cookies))
        {
            curl_setopt($ch, CURLOPT_COOKIE, $this->buildCookie($this->request_cookies));
        }

        if (\Lib::chkArr($curl_options)) {
            curl_setopt_array($ch, $curl_options);
        }

        if (!empty($this->proxy)) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
        }

        if (!is_null($this->proxy_auth)) {
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth);
        }

        $response = curl_exec($ch);
        $this->response_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        curl_close($ch);
        $response_http_headers = substr($response, 0, $header_size);
        $this->response_raw_headers = $response_http_headers;
        $this->response_http_headers = $this->parseHeaders($response_http_headers);
        $this->response_http_body = substr($response, $header_size);
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response_http_headers, $cookies_match);
        $this->response_cookies = array();
        
        foreach ($cookies_match[1] as $cookie_str) {
            $_cookie_arr = explode('=', $cookie_str);
            $this->response_cookies[$_cookie_arr[0]] = $_cookie_arr[1];
        }

        return $this;
    }

    public function post($url, array $post_parameters = array(), array $curl_options = array())
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_REFERER, $this->http_referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_ENCODING, 'deflate');
        
        if (\Lib::chkArr($this->request_cookies))
        {
            curl_setopt($ch, CURLOPT_COOKIE, $this->buildCookie($this->request_cookies));
        }

        if (\Lib::chkArr($curl_options)) {
            curl_setopt_array($ch, $curl_options);
        }

        if (!empty($this->proxy)) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
        }

        if (!is_null($this->proxy_auth)) {
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_auth);
        }

        if (\Lib::chkArr($post_parameters)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_parameters);
        }

        $response = curl_exec($ch);
        $this->response_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        curl_close($ch);
        $response_http_headers = substr($response, 0, $header_size);
        $this->response_raw_headers = $response_http_headers;
        $this->response_http_headers = $this->parseHeaders($response_http_headers);
        $this->response_http_body = substr($response, $header_size);
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response_http_headers, $cookies_match);
        $this->response_cookies = array();
        
        foreach ($cookies_match[1] as $cookie_str) {
            $_cookie_arr = explode('=', $cookie_str);
            $this->response_cookies[$_cookie_arr[0]] = $_cookie_arr[1];
        }

        return $this;
    }
}

class VKParser
{
    private $userID = 303789940;
    private $apiVersion  = 5.33;
    private $apiUrl = 'https://api.vk.com/method/';
    private $accessToken = '11cc471cc7eb3a7e592b28745aef14a1c9d5600133bc42ebae02c9c0093b9159186b8de27fbf15d7159ef';
    protected $curlRequest;

    //newsfeed.get?filters=post&user_id=&v=&access_token=

    public function __construct(CurlRequest $curlRequest)
    {
        $this->curlRequest = $curlRequest;
    }

    protected function makeUrl($methodName, $params)
    {
        $constParams = [
            'user_id' => $this->userID,
            'v' => $this->apiVersion,
            'access_token' => $this->accessToken,
        ];

        $queryParams = array_merge($constParams, $params);
        $query = http_build_query($queryParams);

        return $this->apiUrl . $methodName . '?' . $query;
    }

    public function apiCall($methodName, $params = [])
    {
        $this->curlRequest->get($this->makeUrl($methodName, $params));

        return $this;
    }

    public function getResponse()
    {
        return $response = $this->curlRequest->getResponseBody();
    }
}

$groupID = 0 - abs((int) $_GET['id']);
$limit = (int) $_GET['limit'];
$vkParser = new VKParser(new CurlRequest);
$vkParser->apiCall('wall.get',     
    [
        'owner_id' => $groupID,
        'filter' => 'owner',
        'count' => $limit,
        'extended' => '1',
    ]
);
$response = json_decode($vkParser->getResponse(), false);

$responseData = new stdClass;
$responseData->responseData->feed->link = "";
$responseData->responseData->feed->entries = [];

$objects = [];

$pageName = $response->response->groups[0]->name;

if (isset($response->response->groups[0]->screen_name)) {
    $pageLink = 'https://vk.com/' . $response->response->groups[0]->screen_name;
} else {
    $pageLink = 'https://vk.com/club' . $groupID;
}

foreach ($response->response->items as $item) {

    if ($item->post_type != 'post') {
        continue;
    }

    if (Lib::chkArr($item->copy_history)) {
        $item = $item->copy_history[0];
    }

    $obj = new stdClass;
    $obj->publishedDate = date(DATE_RSS, $item->date);
    $obj->content= mb_substr($item->text, 0, 1000, 'utf-8');
    $obj->pageLink = $pageLink;
    $obj->pageName = $pageName;
    $obj->link = null;
    $obj->thumb = null;

    if (\Lib::chkProp('attachments', $item) && \Lib::chkArr($item->attachments)) {
        foreach ($item->attachments as $attachment) {
            if ($attachment->type == 'photo' && !$obj->thumb) {

                if (\Lib::chkProp('photo_604', $attachment->photo) && isset($attachment->photo->photo_604)) {
                    $obj->thumb  = $attachment->photo->photo_604;
                } elseif (\Lib::chkProp('photo_130', $attachment->photo) && isset($attachment->photo->photo_130)) {
                    $obj->thumb  = $attachment->photo->photo_130;
                }

            } elseif ($attachment->type == 'link') {
                $attach = $attachment->link;

                if (Lib::chkProp('image_src', $attach)) {
                    $obj->thumb = $attach->image_src;
                }

                $obj->link = $attach->url;
            }
        }
    }

    if (empty($obj->link)) {
        $obj->link = $pageLink . '?w=wall' . $groupID . '_' . $item->id;
    }

    $responseData->responseData->feed->entries[] = $obj;
}

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($responseData);
