<?php

require_once 'CRM/Core/Page.php';

class CRM_Roomentity_Page_Room extends CRM_Core_Page {

    function run() {
        // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
        CRM_Utils_System::setTitle(ts('List of rooms'));

        $query = "SELECT * FROM civicrm_room";
        $count = CRM_Core_DAO::executeQuery($query);
        $i = 1;
        $contact = array();
        while ($count->fetch()) {
            $contact[] = array('id' => $i,
                'label' => $count->label,
                'room_no' => $count->room_no,
                'floor' => $count->floor,
                'ext' => $count->ext
            );
            $i++;
        }
        $this->assign('room', $contact);


        parent::run();
    }

}
