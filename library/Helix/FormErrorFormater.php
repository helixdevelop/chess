<?php

class Helix_FormErrorFormater
{
    public static function format($errors)
    {
        $html = null;
        
        if(count($errors) > 0) {
            $html .= '<div class="form-errors">';
            foreach ($errors as $key => $value) {
                $html .= '<p>' . $value . '</p>';
            }
            $html .= '</div>';
        }
        
        return $html;
    }
}