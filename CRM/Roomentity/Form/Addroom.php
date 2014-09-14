<?php

require_once 'CRM/Core/Form.php';

/**
 * Form controller class
 *
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC43/QuickForm+Reference
 */
class CRM_Roomentity_Form_Addroom extends CRM_Core_Form {
  function buildQuickForm() {
    // room label
    $this->add('text', 
            'label', 
            ts('Room label'),
            true
            
    );
    // label is required
    $this->addRule('label','Enter the room label','required'); 
    // room_no
    $this->add('text', 
            'room_no', 
            'Room no'
    );
    // room floor
    $this->add('text', 
            'floor', 
            'Room floor'
    );
    // room ext 
    $this->add('text',
            'ext',
            'Room ext'
    );

    
    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));
    

    // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
  }

  function postProcess() {
      
    $vals = $this->controller->exportValues($this->_name);
    CRM_Core_Session::setStatus(ts('You saved a new room </br>'
            . 'label: %1 </br>'
            . 'room_no: %2 </br>'
            . 'floor: %3 </br>'
            . 'ext: %4',
            array(
            1 => $vals['label'], 
            2 => $vals['room_no'],
            3 => $vals['floor'], 
            4 => $vals['ext'],
   )));
    $query = "INSERT INTO civicrm_room (label, room_no, floor, ext) "
            . "VALUES ('$vals[label]', '$vals[room_no]', '$vals[floor]','$vals[ext]')";
    $count = CRM_Core_DAO::singleValueQuery($query);
 
    
    
    parent::postProcess();

  }


  /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = array();
    foreach ($this->_elements as $element) {
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }
  
}
