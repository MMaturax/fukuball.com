<?php

require_once dirname(dirname(__FILE__))."/fuku-config/app-setter.php";

$ckip_process_record_god_obj = new CkipProcessRecordGod();
$options = array(
    "offset" => 0,
    "length" => 10
);
$ckip_process_record_list = $ckip_process_record_god_obj->getList($options);

foreach ($ckip_process_record_list as $ckip_process_record_list_data) {
    $ckip_process_record_id = $ckip_process_record_list_data['id'];
    $ckip_process_record_obj = new CkipProcessRecord($ckip_process_record_id);

    if (preg_match('/[^\x00-\x7F]/', $ckip_process_record_obj->paragraph)===0) {

        $ckip_process_record_obj->destroy('hard');

        echo "Delete \n";
        echo "$ckip_process_record_obj->paragraph \n";

    }
    unset($ckip_process_record_obj);
}
