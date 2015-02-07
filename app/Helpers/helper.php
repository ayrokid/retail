<?php  
/*
|--------------------------------------------------------------------------
| Helper of System
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| function of name system
|--------------------------------------------------------------------------
*/
if ( ! function_exists('system_name')){
    function system_name(){
        return 'Sun Retail';  
    }
}

/*
|--------------------------------------------------------------------------
| function of company
|--------------------------------------------------------------------------
*/
if ( ! function_exists('company')){
    function company(){
        return 'sun.com';
    }
}

/*
|--------------------------------------------------------------------------
| function of Address
|--------------------------------------------------------------------------
*/
if ( ! function_exists('address')){
    function address(){
        return  "Jl. Solo";
    }
}

/*
|--------------------------------------------------------------------------
| function of telepon
|--------------------------------------------------------------------------
*/
if ( ! function_exists('telepon')){
    function telepon(){
        return "0271 - 0000 00000";
    }
}

/*
|--------------------------------------------------------------------------
| function of version
|--------------------------------------------------------------------------
*/
if ( ! function_exists('version')){
    function version(){
        return "Beta";
    }
}

/*
|--------------------------------------------------------------------------
| function of developer
|--------------------------------------------------------------------------
*/
if ( ! function_exists('developer')){
    function developer(){
        return "SUNLab";
    }
}

/*
|--------------------------------------------------------------------------
| function of domain
|--------------------------------------------------------------------------
*/
if ( ! function_exists('domain')){
    function domain(){
        return "sunretail.com";
    }
}

/**
 * -----------------------------------------------------------------------------
 * fungsi filter string
 * by : yanun
 * update : 23/02/2013 21:08
 * -----------------------------------------------------------------------------
 */
 if (!function_exists('filter_string')) {

    function filter_string($data) {
        $data = trim($data);
        $back = strtoupper(stripslashes(strip_tags($data, ENT_QUOTES)));
        return $back;
    }

}
 /**
 * -----------------------------------------------------------------------------
 * fungsi filter numeric
 * by : yanun
 * update : 23/02/2013 21:08
 * -----------------------------------------------------------------------------
 */
 if (!function_exists('filter_numeric')) {

    function filter_numeric($no = '') {
        $no = str_replace(',', '', $no);
        $nomor = filter_string($no);
        if ($no == '') {
            return 0;
        }
        return $nomor;
    }

}

/**
 * -----------------------------------------------------------------------------
 * fungsi random_string
 * by : yanun
 * update : 02/07/2013 09:36
 * -----------------------------------------------------------------------------
 */
if( !function_exists('random_string')){
    function random_string($str = "") {
        //$pengacak = "AJWKXLAJSCLWLWDAKDKSAJDADKEOIJEOQWENQWENQONEQWAJSNDKASO";
        $passEnkrip = md5($str);
        return $passEnkrip;
    }
}

/*
 * -----------------------------------------------------------------------------
 * fungsi mengubah angka dalam bentuk rupiah
 * by : yanun
 * update : 21/03/2012 14:52
 * -----------------------------------------------------------------------------
 */
if(!function_exists("currency_idr")){

    function currency_idr($nominal='' , $koma=2){
        if(strlen($nominal) > 0) {
            return number_format($nominal, $koma, '.', ',');  
        }else{
            return 0;
        }
    }
}
 
/*
 * fungsi mengubah tanggal dari SQL ke format indonesia atau sebaliknya
 * by : yanun
 * update : 12/03/2012 14:41
 * -----------------------------------------------------------------------------
 */
if (!function_exists('to_date')) {

    function to_date($date = '') {
        $bagi = explode(" ", $date);
        if(count($bagi)>1){
            $pecah = explode('-', $bagi[0]);
            if (count($pecah) > 2) {
                $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
            } else {
                $pecah = explode('/', $date);
                if(count($pecah) > 2){
                    $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
                }else{
                    $getDate = $date;
                }
            }
            return $getDate.' '.$bagi[1];
        }else{
            $pecah = explode('-', $date);
            if (count($pecah) > 2) {
                $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
            } else {
                $pecah = explode('/', $date);
                if(count($pecah) > 2){
                    $getDate = $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0];
                }else{
                    $getDate = $date;
                }
            }
            return $getDate;
        }
    }
}


/**
 * ------------------------------------------------------------------------------
 * Session
 * by : yanun
 * udpate : April 23th 2014
 * ------------------------------------------------------------------------------
 */
if(! function_exists('session')){

    function session($name){
        return Session::get($name);
    }

}

/**
 * ------------------------------------------------------------------------------
 * Menu
 * by : yanun
 * udpate : Agustus 23th 2014
 * ------------------------------------------------------------------------------
 */
if(! function_exists('menu')){

    function menu($id = null){

        $data = array();

        $results = DB::select('select * from menus where sub_id=? ', array($id));

        if(count($results) > 0){
            return $results;
        }

        return $data;
    }

}

/*
 * -----------------------------------------------------------------------------
 * Show all city from storage
 * 
 * @return array()
 */
if(! function_exists('kota'))
{
    function kota($id = bull)
    {
        $data = array();

        $results = DB::select('select id, name from kota where propinsi_id = ?', array($id));

        foreach($results as $val){
            $data[$val->id] = $val->name;
        }

        return $data;
    }
}

/*
 * ----------------------------------------------------------------------------
 * Show all kecamatan from storage
 *
 * @return array()
 */
if(! function_exists('kecamatan'))
{
    function kecamatan($id = null)
    {
        $data = array();

        $results = DB::select('select id, name from kecamatan where kota_id=? ', array($id));

        foreach ($results as $value) {
            $data[$val->id] = $val->name;
        }

        return $data;
    }
}

/*
 * ----------------------------------------------------------------------------
 * Show all Gender for every Customer
 *
 * @return array()
 */
if(! function_exists('gender'))
{
    function gender($id = null)
    {
        if (is_null($id)) {
            $data = array('M' => 'Man', 'W' => 'Women');
        } else {
            switch ($id) {
                case 'M':
                    $data = 'Man';
                    break;
                case 'W':
                    $data = 'Women';
                    break;
                default:
                    $data = '';
                    break;
            }
        }

        return $data;
        
    }
}

/**
 * -----------------------------------------------------------------------------
 * status perkawinan
 * by : yanun
 * -----------------------------------------------------------------------------
 */
if(!function_exists("marital")){
        function marital($kode='') {
            if($kode == ''){
                $data = array(
                    ''   => '- pilih -',
                    'KW'  => 'Kawin',
                    'BK'  => 'Belum Kawin',
                    'JN'  => 'Janda',
                    'DD'  => 'Duda'
                );
            }else{
                switch ($kode) {
                    case 'KW' : $data = 'Kawin'; break;
                    case 'BK' : $data = 'Belum Kawin'; break;
                    case 'JN' : $data = 'Janda'; break;
                    case 'DD' : $data = 'Duda'; break;
                    default  : $data="";
                }
            }
            return $data;
        }
}

/**
 * -----------------------------------------------------------------------------
 * Agama
 * by : yanun
 * -----------------------------------------------------------------------------
 */
if(!function_exists("agama")){
    function agama() {
        $data = array(
            '' => 'Pilih',
            'ISLAM' => 'Islam',
            'KRISTEN' => 'kristen',
            'KATHOLIK' => 'Katholik',
            'HINDU' => 'Hindu',
            'BUDHA' => 'Budha'
        );
        return $data;
    }
}

/**
 * -----------------------------------------------------------------------------
 * Type ID
 * by : yanun
 * -----------------------------------------------------------------------------
 */
if(!function_exists("type_id")){
    function type_id($id = null) {
        if (is_null($id) ) {
            $data = array(
                ''  => 'Pilih',
                'K' => 'KTP',
                'S' => 'SIM',
                'P' => 'PASSPOR'
                );
        } else {
            switch ($id) {
                case 'K': $data = 'KTP';
                    break;
                case 'S': $data = 'SIM';
                    break;
                case 'P': $data = 'PASSPOR';
                    break;
            }
        }
        return $data;
    }
}