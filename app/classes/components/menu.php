<?php
class Menu{
    private static $details = array();

    static function create($title, $image, $URL){
        array_push(self::$details, $title);
        array_push(self::$details, $image);
        array_push(self::$details, $URL);
    }

    static function display(){
        echo '<div class="row" style="margin-left: 25px">';

        for($i = 0; $i < sizeof(self::$details); $i+=3){
            echo "
                <div class=\"col px-4 py-4\">
                    <div class=\"card h-100 picture-gallery\" style=\"width: 18rem;\">
                        <a href=\"".self::$details[$i+2]."\" target=\"_blank\">
                            <img src=\"".self::$details[$i+1]."\" class=\"card-img-top\" alt=\"#\">
                        </a>
                        <div class=\"picture-info\">
                            <h1 class=\"card-header border-0\"><a class=\"text-decoration-none text-white\" href=\"#\"><strong>".self::$details[$i]."</strong></a></h1>
                        </div>
                    </div>
                </div>
            ";
        }

        echo '</div>';
    }
}
?>