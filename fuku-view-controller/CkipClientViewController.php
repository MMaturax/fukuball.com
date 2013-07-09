<?php
/**
 * CkipClientViewController.php is the controller
 * to dispatch ckip-client actions with ckip-client view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * CkipClientViewController.php is the controller
 * to dispatch ckip-client actions with ckip-client view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class CkipClientViewController
   extends RESTControl
      implements RESTfulInterface
{

   /**
    * Dispatch post actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPost($segments)
   {

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      case 'ckip-process':

         $paragraph = $_POST['paragraph'];

         require_once SITE_ROOT.'/fuku-class/library/CKIPClient-PHP/CKIPClient.php';
         require_once SITE_ROOT.'/fuku-config/private-param/ckip-param.php';

         $ckip_client_obj = new CKIPClient(
            CKIP_SERVER,
            CKIP_PORT,
            CKIP_USERNAME,
            CKIP_PASSWORD
         );

         $ckip_process_result = $ckip_client_obj->send($paragraph);
         $ckip_process_result_term = $ckip_client_obj->getTerm();
         $ckip_process_result_json = json_encode($ckip_process_result_term);

         $ckip_process_record_god_obj = new CkipProcessRecordGod();
         $parameter_array = array();
         $parameter_array['paragraph'] = $paragraph;
         $parameter_array['paragraph_result'] = $ckip_process_result_json;
         $ckip_process_record_id = $ckip_process_record_god_obj->create($parameter_array);
         unset($ckip_process_record_god_obj);

         // force read master
         $db_obj = DBAccess::getInstance();
         $options = array('mode'=>'master');
         $db_obj->changeMode($options);

         $ckip_process_record_obj = new CkipProcessRecord($ckip_process_record_id);

         include_once SITE_ROOT.'/fuku-view-page/ckip-client-partial-view/ckip-process-result.php';

         unset($ckip_process_record_obj);

         break;

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPost

   /**
    * Dispatch get actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restGet($segments)
   {

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      case 'record':

         $action_level_two_id = $segments[1];
         $action_level_two_id_array = explode('.', $action_level_two_id);

         $ckip_process_record_id = $action_level_two_id_array[0];
         $ckip_process_record_doc_type = $action_level_two_id_array[1];

         $ckip_process_record_obj = new CkipProcessRecord($ckip_process_record_id);

         $paragraph_result = json_decode($ckip_process_record_obj->paragraph_result, true);

         $return_result = array();
         $return_result['paragraph'] = $ckip_process_record_obj->paragraph;
         $return_result['paragraph_result'] = $paragraph_result;

         switch ($ckip_process_record_doc_type) {

         case 'json':

            header('Content-type: application/json');
            echo json_encode($return_result);

            break;

         default:

            header('Content-type: application/json');
            echo json_encode($return_result);

            break;

         }

         unset($ckip_process_result_obj);

         break;

      case 'record-list':

         $meta_type = "ckip";
         $page_title = 'CKIP Client 線上中文斷詞 | 歷史紀錄';
         $ckip_client_record_list_active = 'active';
         $yield_path = '/fuku-view-page/ckip-client-record-list.php';

         $ckip_process_record_god_obj = new CkipProcessRecordGod();
         $ckip_process_record_list = $ckip_process_record_god_obj->getList();

         require_once SITE_ROOT.'/fuku-view-layout/ckip-client-page-layout.php';

         unset($ckip_process_record_god);

         break;

      case 'about':

         $meta_type = "ckip";
         $page_title = 'CKIP Client 線上中文斷詞 | 關於我們';
         $ckip_client_about_active = 'active';
         $yield_path = '/fuku-view-page/ckip-client-about.php';
         require_once SITE_ROOT.'/fuku-view-layout/ckip-client-page-layout.php';

         break;

      default:

         $meta_type = "ckip";
         $page_title = 'CKIP Client 線上中文斷詞 | 線上中文斷詞首頁';
         $ckip_client_active = 'active';
         $yield_path = '/fuku-view-page/ckip-client-home.php';
         require_once SITE_ROOT.'/fuku-view-layout/ckip-client-page-layout.php';

         break;

      }// end switch ($action_level_one_id)

   }// end function restGet

   /**
    * Dispatch put actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPut($segments)
   {

      $_PUT = array();
      parse_str(file_get_contents('php://input'), $_PUT);

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPut


   /**
    * Dispatch delete actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restDelete($segments)
   {

      $_DELETE = array();
      parse_str(file_get_contents('php://input'), $_DELETE);

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restDelete

}
?>