<?php
/**
 * Created by Angel Eye.
 * User: quanvh
 * Date: 4/14/17
 * Time: 10:38 AM
 */

namespace App\Helper;

use Illuminate\Pagination\Paginator;

class Common
{
    private static function vn_str_filter ($str)
    {
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }

    public static function text_limit($str, $len)
    {
        $string = strip_tags($str);
        if ($len > strlen($string)) {
            $len = strlen($string);
        };
        $pos = strpos($string, ' ', $len);
        if ($pos) {
            $string = substr($string, 0, $pos);
            return $string . '...';
        } else {
            $string = substr($string, 0, $len);
            return $string;
        }
    }

    public static function array_random($arr, $num = 1)
    {
        shuffle($arr);
        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[] = $arr[$i];
        }
        return $num == 1 ? $r[0] : $r;
    }

    public static function createSapo($str){
        return self::text_limit($str,160);
    }

    public static function createSlug($str) {
        $str = self::vn_str_filter($str);
        $search = array('Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', 'Â', 'Ă', 'ë', 'Ë');
        $replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
        $str = str_ireplace($search, $replace, strtolower(trim($str)));
        $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
        $str = str_replace(' ', '-', $str);
        return preg_replace('/\-{2,}/', '-', $str);
    }

    public static function getFullUrl($link, $baseUrl)
    {
        if (strpos($link, 'http') !== 0) {
            $parts = parse_url($baseUrl);
            $link = $parts['scheme'] . '://' . $parts['host'] .'/'. $link;
        }
        return $link;
    }

    public static function getLastNumber($str){
        if(preg_match_all('/\d+/', $str, $numbers))
            return end($numbers[0]);
        return -1;
    }

    public static function SetCurrentPage($page){
        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
    }

    public static function homeUrl(){
        $protocol = 'http';
        if ($_SERVER['SERVER_PORT']  == 443 ) $protocol='https';
        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $port = ":$_SERVER[SERVER_PORT]";
        } else {
            $port = '';
        }
        return $protocol."://".$_SERVER['SERVER_NAME'].$port."/";
        
    }

    public static function GetThumb($path, $str=''){
        if($path && $path != '') {
            if (strpos($path, 'http') !== false) {
                return $path;
            }
            if(!$str || $str == '') return self::homeUrl().'storage/'.$path;
            // find position of the last dot, so where the extension starts
            $extension_pos = strrpos($path, '/');
            $fileStore = substr($path, 0, $extension_pos) . '/'.$str. substr($path, $extension_pos);
            $filename = self::homeUrl(). 'storage/' .$fileStore;
//        Storeage not return port
//        $filename = \Storage::url($fileStore);
            return (\Storage::exists($fileStore)) ? $filename : self::homeUrl().'storage/'.$path;
        }
        else return self::homeUrl().'img/no-image.jpg';


    }

    public static function buildTagArray($tags)
    {
        if (is_array($tags)) {
            return $tags;
        }

        if (is_string($tags)) {
            return preg_split(
                '#[' . preg_quote(',', '#') . ']#',
                $tags,
                null,
                PREG_SPLIT_NO_EMPTY
            );
        }

        return (array)$tags;
    }

    public static function buildApiResponse($data, $status=200, $message='Success'){
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function getUserVerifyCode(){
//        return time().uniqid(true);
        return self::generateNumericOTP(6);
    }
    public static function generateNumericOTP($n) {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }

    public static function LoadCateSelection($data, $select=0, $parent=0, $str = '--'){
        foreach($data as $cate) {
            if($cate->cate_parent == $parent){
                if($select != 0 && $cate->cate_id == $select)
                    echo "<option value= '$cate->cate_id' selected>$str $cate->cate_name </option>";
                else
                    echo "<option value= '$cate->cate_id'>$str $cate->cate_name </option>";
                self::LoadCateSelection($data,$select,$cate->cate_id,$str.' --');
            }
        }
    }
}