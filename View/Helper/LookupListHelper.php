<?php

App::uses('AppHelper', 'View/Helper');

class LookupListHelper extends AppHelper
{

    public $helpers = array('Html', 'Form');

    public function makeList($field, $list_slug, $options = array())
    {
        $this->LookupList = ClassRegistry::init('LookupLists.LookupList');

        $list = $this->LookupList->listItems($list_slug);
        $default = $this->LookupList->getDefault($list_slug);
        
        $field_options = array_merge(array('options' => $list, 'default' => $default), $options);
        //debug($field_options);
        
        return $this->Form->input($field, $field_options);
    }

}
