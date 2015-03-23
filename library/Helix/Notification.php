<?php

class Helix_Notification
{
    public static function getNotifications()
    {
        $notifications = Notification_Model_Notify::getNotify();
        
        $html = null;
        
        if(count($notifications) > 0) {
            foreach ($notifications as $key => $value) {
                switch ($key) {
                    case Notification_Model_Notify::SUCCESS:
                        $html .= '<div class="tools-message tools-message-blue">';
                        $html .= '<p>';
                        $html .= implode('</p><p>', $value);
                        $html .= '</p>';
                        $html .= '</div>';
                        break;
                    case Notification_Model_Notify::ERROR:
                        $html .= '<div class="tools-message tools-message-red">';
                        $html .= '<p>';
                        $html .= implode('</p><p>', $value);
                        $html .= '</p>';
                        $html .= '</div>';
                        break;
                }
            }
        }
        Notification_Model_Notify::clearNotify();
        
        return $html;
    }
}