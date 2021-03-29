<?php
if (! function_exists('transport_info')) {
    function transport_info($payment_type)
    {
        $result = '';
        switch($payment_type){
            case 'direct':
                $result = 'Thanh toán tại cửa hàng';
                break;
            case 'home':
                $result = 'Thanh toán tại nhà';
                break;
        }
        return $result;
    }
}

if (! function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        return number_format($number).$suffix;
    }
}

if (! function_exists('showCategories')) {
    function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child) {
            if ($stt == 0) {
                // là cấp 1
                $class = "class='list-item'";
            } else {
                // là cấp 2,3,...
                $class = "class='sub-menu'";
            }
            echo "<ul {$class}>";
            foreach ($cate_child as $key => $item) {
                $slug = create_slug($item['title']);
                // Hiển thị chuyên mục
                echo '<li>';
                echo "<a href='/shop/{$item['slug']}' title=''>{$item['name']}</a>";
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item['id'], $char . '|---', ++$stt);
                echo '</li>';
            }
            echo "</ul>";
        }
    }
}

if ( ! function_exists('create_slug'))
{
    function create_slug($string) {
        $search = array (
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        ) ;
        $replace = array (
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        ) ;
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}








