<?php
/**
 * ShowCaseViewController.php is the controller
 * to dispatch show-case actions with show-case view
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
 * ShowCaseViewController.php is the controller
 * to dispatch show-case actions with show-case view
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
class ShowCaseViewController
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

      case 's3-upload':

         $action_level_two_id = $segments[1];

         switch ($action_level_two_id) {

         case 'upload-file':

            $s3fs_on = $_REQUEST['s3fs_on'];
            $name = $_REQUEST['name'];
            $new_file_name = time();

            $target_file_name
                = '/mnt/obeobe-bucket/s3fs_demo/'.$new_file_name;

            $retunr_value = UploadHelper::pluploadProcess(
                $_REQUEST,
                $_SERVER,
                $_FILES,
                $target_file_name
            );

            if ($retunr_value=='fail') {

               $type = 'unknow_error';
               $parameter = array("none"=>"none");
               $error_messanger = new ErrorMessenger($type, $parameter);
               $error_messanger->printErrorJSON();
               unset($error_messanger);
               exit;

            }

            if ($s3fs_on=='on') {

               $file_url_path = str_replace ('/mnt/obeobe-bucket/', 'http://www.fukuball.com/public/', $retunr_value);

               $type = 'success';
               $parameter = array("file_name"=> $name,"file_url_path"=>$file_url_path);
               $error_messanger = new ErrorMessenger($type, $parameter);
               $error_messanger->printErrorJSON();
               unset($error_messanger);

            } else {

               // api upload to s3
               include SITE_ROOT."/fuku-config/private-param/s3-param.php";
               include SITE_ROOT."/fuku-class/library/AWS/S3.php";

               $s3 = new S3(S3_ACCESSKEY, S3_SECRETKEY);

               if ($s3->putObjectFile($retunr_value, S3_BUCKET, 's3fs_demo/'.baseName('1.png'), S3::ACL_PUBLIC_READ)) {

                  $file_url_path = str_replace ('/mnt/obeobe-bucket/', 'http://www.fukuball.com/public/', $retunr_value);

                  $type = 'success';
                  $parameter = array("file_name"=> $name,"file_url_path"=>$file_url_path);
                  $error_messanger = new ErrorMessenger($type, $parameter);
                  $error_messanger->printErrorJSON();
                  unset($error_messanger);

               } else {

                  $type = 'unknow_error';
                  $parameter = array("none"=>"none");
                  $error_messanger = new ErrorMessenger($type, $parameter);
                  $error_messanger->printErrorJSON();
                  unset($error_messanger);

               }

            }



            break;

         default:
            $type = 'page_not_found';
            $parameter = array("none"=>"none");
            $error_messanger = new ErrorMessenger($type, $parameter);
            $error_messanger->printErrorJSON();
            unset($error_messanger);
            break;

         }

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

      case 'drawer-drag':
         require_once SITE_ROOT.'/fuku-view-page/show-case-drawer-drag.php';
         break;

      case 'color-quantization':

         $page_title = 'Color Quantization | Show Case';
         $color_quantization_active = 'active';
         //$yield_path = '/fuku-view-page/show-case-color-quantization.php';
         //require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';
         require_once SITE_ROOT.'/fuku-view-page/show-case-color-quantization.php';

         break;

      case 's3-upload':

         $page_title = 'Upload S3 Storage | Show Case';
         $s3_storage_active = 'active';
         $yield_path = '/fuku-view-page/upload-s3-storage.php';
         require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';

         break;

      case '5tunes11-v1':

         $page_title = '5Tunes11 | Show Case';
         $itunes11_active = 'active';
         $yield_path = '/fuku-view-page/show-case-5tunes11-v1.php';
         require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';

         break;

      case '5tunes11-v2':

         $page_title = '5Tunes11 | Show Case';
         $itunes11_active = 'active';
         $yield_path = '/fuku-view-page/show-case-5tunes11-v2.php';
         require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';

         break;

      case '5tunes11':

         $action_level_two_id = $segments[1];

         switch ($action_level_two_id) {

         case 'disc-data.json':

            header('Content-type: application/json');

            $json_data = array (
               "data"=>
               array(
                  array(
                     "id"=>"5311",
                     "disc_title"=>"今夜的秘密集會 Acoustic Live EP",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"/public/image/itunes-cover/php3fXH12480X480.jpg",
                     "tracklist"=>
                        array(
                           "處女空氣",
                           "Here We Are",
                           "等待著愛的人",
                           "耍堅強",
                           "Dear John"
                        ),
                     "url"=>"http://www.indievox.com/disc/5311"
                  ),
                  array(
                     "id"=>"4975",
                     "disc_title"=>"今夜的祕密集會",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"/public/image/itunes-cover/phptkWMy4480X480.jpg",
                     "tracklist"=>
                        array(
                           "今夜的祕密集會",
                           "今夜的祕密集會(DJ Afro&Will Remix)"
                        ),
                     "url"=>"http://www.indievox.com/disc/4975"
                  ),
                  array(
                     "id"=>"2959",
                     "disc_title"=>"處女空氣",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2010",
                     "image"=>"/public/image/itunes-cover/phpkOs1BD480X480.jpg",
                     "tracklist"=>
                        array(
                          "Dear John",
                          "戀人絮語",
                          "自導自演",
                          "處女空氣",
                          "親愛的我",
                          "狩獵霓虹",
                          "Here We Are",
                          "一萬種迷惑",
                          "默契帶我們向前走",
                          "自由之處"
                        ),
                     "url"=>"http://www.indievox.com/disc/2959"
                  ),
                  array(
                     "id"=>"1080",
                     "disc_title"=>"解放",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2008",
                     "image"=>"/public/image/itunes-cover/phpxmPhRD480X480.jpg",
                     "tracklist"=>
                        array(
                           "解放"
                        ),
                     "url"=>"http://www.indievox.com/disc/1080"
                  ),
                  array(
                     "id"=>"282",
                     "disc_title"=>"Born To Live, Live To Give",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2008",
                     "image"=>"/public/image/itunes-cover/phpGDapUA480X480.jpg",
                     "tracklist"=>
                        array(
                           "傾慕",
                           "新世紀的你和我",
                           "無聲的輪廓",
                           "Please Stay (春佑版)",
                           "我將死去",
                           "耍堅強",
                           "紅與藍",
                           "可能性 (Happy Birthday To 春佑)",
                           "感官駕馭",
                           "煙硝"
                        ),
                     "url"=>"http://www.indievox.com/disc/282"
                  ),
                  array(
                     "id"=>"4",
                     "disc_title"=>"煙硝",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2007",
                     "image"=>"/public/image/itunes-cover/KuwosEX1gI480X480.jpg",
                     "tracklist"=>
                        array(
                           "煙硝",
                           "警察先生",
                           "Go Go Go"
                        ),
                     "url"=>"http://www.indievox.com/disc/4"
                  ),
                  array(
                     "id"=>"9",
                     "disc_title"=>"少年的最後旅行",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2004",
                     "image"=>"/public/image/itunes-cover/RIbd7L0tbb480X480.jpg",
                     "tracklist"=>
                        array(
                          "夏日晚歌",
                          "紅與藍",
                          "風車",
                          "OK? (Piano&Violin Version)",
                          "你的蔚藍之海",
                          "瞬間"
                        ),
                     "url"=>"http://www.indievox.com/disc/9"
                  ),
                  array(
                     "id"=>"1",
                     "disc_title"=>"感官駕馭",
                     "artist_name"=>"回聲樂團",
                     "year"=>"2002",
                     "image"=>"/public/image/itunes-cover/phpjTj9Ue480X480.jpg",
                     "tracklist"=>
                        array(
                           "It's Time To Sing, It's Time To Get Out",
                           "限度",
                           "感官駕馭",
                           "木雕輪盤",
                           "我將死去",
                           "錯置的共鳴",
                           "剖（續繞）",
                           "傾慕",
                           "晚宴",
                           "競逐孤寂"
                        ),
                     "url"=>"http://www.indievox.com/disc/1"
                  )
               )
            );

            echo json_encode($json_data);

            break;

         case 'album-data.json':

            header('Content-type: application/json');

            $json_data = array (
               "data"=>
               array(
                  array(
                     "id"=>"5311",
                     "album"=>"今夜的秘密集會 Acoustic Live EP",
                     "artist"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"php3fXH12480X480.jpg",
                     "tracklist"=>
                        array(
                           "處女空氣",
                           "Here We Are",
                           "等待著愛的人",
                           "耍堅強",
                           "Dear John"
                        ),
                     "url"=>"http://www.indievox.com/disc/5311",
                     "first"=>true
                  ),
                  array(
                     "id"=>"4975",
                     "album"=>"今夜的祕密集會",
                     "artist"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"phptkWMy4480X480.jpg",
                     "tracklist"=>
                        array(
                           "今夜的祕密集會",
                           "今夜的祕密集會(DJ Afro&Will Remix)"
                        ),
                     "url"=>"http://www.indievox.com/disc/4975"
                  ),
                  array(
                     "id"=>"2959",
                     "album"=>"處女空氣",
                     "artist"=>"回聲樂團",
                     "year"=>"2010",
                     "image"=>"phpkOs1BD480X480.jpg",
                     "tracklist"=>
                        array(
                          "Dear John",
                          "戀人絮語",
                          "自導自演",
                          "處女空氣",
                          "親愛的我",
                          "狩獵霓虹",
                          "Here We Are",
                          "一萬種迷惑",
                          "默契帶我們向前走",
                          "自由之處"
                        ),
                     "url"=>"http://www.indievox.com/disc/2959"
                  ),
                  array(
                     "id"=>"1080",
                     "album"=>"解放",
                     "artist"=>"回聲樂團",
                     "year"=>"2008",
                     "image"=>"phpxmPhRD480X480.jpg",
                     "tracklist"=>
                        array(
                           "解放"
                        ),
                     "url"=>"http://www.indievox.com/disc/1080",
                     "last"=>true
                  ),
                  array(
                     "id"=>"282",
                     "album"=>"Born To Live, Live To Give",
                     "artist"=>"回聲樂團",
                     "year"=>"2008",
                     "image"=>"phpGDapUA480X480.jpg",
                     "tracklist"=>
                        array(
                           "傾慕",
                           "新世紀的你和我",
                           "無聲的輪廓",
                           "Please Stay (春佑版)",
                           "我將死去",
                           "耍堅強",
                           "紅與藍",
                           "可能性 (Happy Birthday To 春佑)",
                           "感官駕馭",
                           "煙硝"
                        ),
                     "url"=>"http://www.indievox.com/disc/282",
                     "first"=>true
                  ),
                  array(
                     "id"=>"4",
                     "album"=>"煙硝",
                     "artist"=>"回聲樂團",
                     "year"=>"2007",
                     "image"=>"KuwosEX1gI480X480.jpg",
                     "tracklist"=>
                        array(
                           "煙硝",
                           "警察先生",
                           "Go Go Go"
                        ),
                     "url"=>"http://www.indievox.com/disc/4"
                  ),
                  array(
                     "id"=>"9",
                     "album"=>"少年的最後旅行",
                     "artist"=>"回聲樂團",
                     "year"=>"2004",
                     "image"=>"RIbd7L0tbb480X480.jpg",
                     "tracklist"=>
                        array(
                          "夏日晚歌",
                          "紅與藍",
                          "風車",
                          "OK? (Piano&Violin Version)",
                          "你的蔚藍之海",
                          "瞬間"
                        ),
                     "url"=>"http://www.indievox.com/disc/9"
                  ),
                  array(
                     "id"=>"1",
                     "album"=>"感官駕馭",
                     "artist"=>"回聲樂團",
                     "year"=>"2002",
                     "image"=>"phpjTj9Ue480X480.jpg",
                     "tracklist"=>
                        array(
                           "It's Time To Sing, It's Time To Get Out",
                           "限度",
                           "感官駕馭",
                           "木雕輪盤",
                           "我將死去",
                           "錯置的共鳴",
                           "剖（續繞）",
                           "傾慕",
                           "晚宴",
                           "競逐孤寂"
                        ),
                     "url"=>"http://www.indievox.com/disc/1",
                     "last"=>true
                  )
               )
            );

            echo json_encode($json_data);

            break;

         default:
            $page_title = '5Tunes11 | Show Case';
            $itunes11_active = 'active';
            $yield_path = '/fuku-view-page/show-case-5tunes11.php';
            require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';
            break;

         }

         break;

      case 'skrollr-demo':

         $page_title     = 'Skrollr Demo | Show Case';
         $skrollr_active = 'active';
         $yield_path     = '/fuku-view-page/skrollr-demo.php';
         include SITE_ROOT.$yield_path;

         break;

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
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