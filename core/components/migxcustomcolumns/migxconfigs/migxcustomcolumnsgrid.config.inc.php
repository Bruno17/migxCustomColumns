<?php

$resource_id = $this->modx->getOption('resource_id', $_REQUEST, '');
$resource_id = empty($resource_id) ? $this->modx->getOption('id', $_REQUEST, '') : $resource_id;
if ($resource = $this->modx->getObject('modResource', $resource_id)) {
    $customcolumns = $this->modx->fromJson($resource->getTVValue('migxCustomColumns'));

    $columns = array();
    $fields = array();

    if (is_array($customcolumns)) {
        foreach ($customcolumns as $col) {
            $field = $column = array();
            $field['caption'] = $column['header'] = $this->modx->getOption('fieldcaption', $col, '');
            $field['field'] = $column['dataIndex'] = $this->modx->getOption('fieldname', $col, '');

            $columns[] = $column;
            $fields[] = $field;

        }
    }

    $tabs = array();
    $tabs[] = array('caption' => '', 'fields' => $fields);

    $this->customconfigs['tabs'] = $tabs;
    $this->customconfigs['columns'] = $columns;
}
