<?php

# 送信先アドレス
$mailto = "xianukai@gmail.com";
# 送信後画面からの戻り先
$toppage = "./form.html";



foreach($_POST as $key => $value){
  
  if(!is_array($value)){
    
    # 文字コードをUTF-8に統一
    $enc = mb_detect_encoding($value);
    $value = mb_convert_encoding($value, "UTF-8", $enc);

    # 無効化
    $value = htmlentities($value , ENT_QUOTES , "UTF-8");

    # 改行処理 //そもそもtextareaがないから必要ないかも？
    $value = str_replace("\r\n","",$value);
    $value = str_replace("\r","",$value);
    $value = str_replace("\n","",$value);
    
  }
  $input[$key] = $value;
}
/*
echo"<pre>";
var_dump($_POST);
var_dump($input);
echo"</pre>";
*/

#
# 入力情報の受け取りと加工
#

$name = $_POST["name"];
$name2 = $_POST["name2"];
$kana = $_POST["kana"];
$kana2 = $_POST["kana2"];
$type = $_POST["type"];//typeがradio
$highschool = $_POST["highschool"];
//$keyword = $_POST["keyword"];
$gender = $_POST["gender"];//typeがradio
$birthday = $_POST["birthday"];
$birthday2 = $_POST["birthday2"];
$birthday3 = $_POST["birthday3"];
$zip = $_POST["zip"];
$zip2 = $_POST["zip2"];
$state = $_POST["state"];
$address = $_POST["address"];
$address2 = $_POST["address2"];
$address3 = $_POST["address3"];
$phone = $_POST["phone"];
$phone2 = $_POST["phone2"];
$phone3 = $_POST["phone3"];
$mobile = $_POST["mobile"];
$mobile2 = $_POST["mobile2"];
$dm = $_POST["dm"];//typeがradio
$elements = $_POST["elements"];

# 無効化
$name = htmlentities($name , ENT_QUOTES , "UTF-8");
$name2 = htmlentities($name2 , ENT_QUOTES , "UTF-8");
$kana = htmlentities($kana , ENT_QUOTES , "UTF-8");
$kana2 = htmlentities($kana2 , ENT_QUOTES , "UTF-8");
//$type = htmlentities($type , ENT_QUOTES , "UTF-8");
$highschool = htmlentities($highschool , ENT_QUOTES , "UTF-8");
//$keyword = htmlentities($keyword , ENT_QUOTES , "UTF-8");
//$gender = htmlentities($gender , ENT_QUOTES , "UTF-8");
$birthday = htmlentities($birthday , ENT_QUOTES , "UTF-8");
$birthday2 = htmlentities($birthday2 , ENT_QUOTES , "UTF-8");
$birthday3 = htmlentities($birthday3 , ENT_QUOTES , "UTF-8");
$zip = htmlentities($zip , ENT_QUOTES , "UTF-8");
$zip2 = htmlentities($zip2 , ENT_QUOTES , "UTF-8");
$state = htmlentities($state , ENT_QUOTES , "UTF-8");
$address = htmlentities($address , ENT_QUOTES , "UTF-8");
$address2 = htmlentities($address2 , ENT_QUOTES , "UTF-8");
$address3 = htmlentities($address3 , ENT_QUOTES , "UTF-8");
$phone = htmlentities($phone , ENT_QUOTES , "UTF-8");
$phone2 = htmlentities($phone2 , ENT_QUOTES , "UTF-8");
$phone3 = htmlentities($phone3 , ENT_QUOTES , "UTF-8");
$mobile = htmlentities($mobile , ENT_QUOTES , "UTF-8");
$mobile2 = htmlentities($mobile2 , ENT_QUOTES , "UTF-8");
//$dm = htmlentities($dm , ENT_QUOTES , "UTF-8");

# 改行処理 //そもそもtextareaがないから必要ないかも？
$name = str_replace("\r\n","",$name);
$name2 = str_replace("\r\n","",$name2);
$kana = str_replace("\r\n" , "" , $kana);
$kana2 = str_replace("\r\n" , "", $kana2);
//$type = str_replace("\r\n" , "", $type); //type radioだから改行はしない
$highschool = str_replace("\r\n" , "" , $highschool);
//$keyword = str_replace("\r\n" , "" , $keyword);
//$gender = str_replace("\r\n" , "" , $gender); // type radioだから改行はしない
$birthday = str_replace("\r\n" , "" , $birthday);
$birthday2 = str_replace("\r\n" , "" , $birthday2);
$birthday3 = str_replace("\r\n" , "" , $birthday3);
$zip = str_replace("\r\n" , "" , $zip);
$zip2 = str_replace("\r\n" , "" , $zip2);
$state = str_replace("\r\n" , "" , $state);
$address = str_replace("\r\n" , "" , $address);
$address2 = str_replace("\r\n" , "" , $address2);
$address3 = str_replace("\r\n" , "" , $address3);
$phone = str_replace("\r\n" , "" , $phone);
$phone2 = str_replace("\r\n" , "" , $phone2);
$phone3 = str_replace("\r\n" , "" , $phone3);
$mobile = str_replace("\r\n" , "" , $mobile);
$mobile2 = str_replace("\r\n" , "" , $mobile2);
//$dm = str_replace("\r\n" , "" , $dm);// radioだから改行はしない


# 入力チェック //html側でrequiredで対処してもいい
if ($name == "") { error("名字が未入力です"); }
if ($name2 == "") { error("ファーストネームが未入力です"); }
mb_regex_encoding("UTF-8");
if ($kana == "") { error("カナが未入力です"); 
}else if (!preg_match("/^[ァ-ヶー]+$/u", $kana)) { error("カタカナを入力して下さい"); }
if ($kana2 == "") { error("カナが未入力です"); 
}else if (!preg_match("/^[ァ-ヶー]+$/u", $kana2)) { error("カタカナを入力して下さい"); }
if (empty($_POST['type'])) { error("区分が選択されていません"); }//区分はtype radio
if ($highschool == "") { error("高校名が未入力です"); }
//if ($keyword == "") { error("名前が未入力です"); }

if (empty($_POST['gender'])) { error("性別が選択されていません"); }
if ($birthday == "") { error("生年月日が未入力です"); }
if ($birthday2 == "") { error("生年月日が未入力です"); }
if ($birthday3 == "") { error("生年月日が未入力です"); }
if ($zip == "") { error("郵便番号が未入力です"); }
if ($zip2 == "") { error("郵便番号が未入力です"); }
if ($state == "") { error("都道府県が未入力です"); }
if ($address == "") { error("住所が未入力です"); }
if ($address2 == "") { error("市区町村が未入力です"); }
if ($phone == "") { error("電話番号が未入力です"); }
if ($phone2 == "") { error("電話番号が未入力です"); }
if ($phone3 == "") { error("電話番号が未入力です"); }
if (!preg_match("/\w+/",$mobile) && $mobile != "") { error("メールアドレスが不正です"); }
if (!preg_match("/\w+/",$mobile2)&& $mobile2 != "") { error("メールアドレスが不正です"); }
/*
if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-]) * @([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $in["mobile3"])) {$error_notes.="・コメントが未入力です。"<br>";
*/


if ($_POST['mobile'] !== $_POST['mobile2'] ){ error("メールアドレスが一致しません"); }
if (empty($_POST['elements'])) { error("資料が選択されていません"); }

//配列を文字列化することで、checkboxの$elementsも対応されるようになる？
/*if (isset($_POST["elements"]) && is_array($_POST["elements"])) {
  $elemetns = implode("、", $_POST["elements"]);
}*/

# 分岐チェック
if ($_POST["mode"] == "post") { conf_form(); }
else if($_POST{"mode"} == "send") { send_form(); }

#
# 確認画面
#
function conf_form() {
  global $name;
  global $name2;
  global $kana;
  global $kana2;
  global $type;
  global $highschool;
  //global $keyword;
  global $gender;
  global $birthday;
  global $birthday2;
  global $birthday3;
  global $zip;
  global $zip2;
  global $state;
  global $address;
  global $address2;
  global $address3;
  global $phone;
  global $phone2;
  global $phone3;
  global $mobile;
  global $mobile2;
  global $dm;
  global $elements;
  
  //資料の項目の文字
  $elem_text="";
  foreach($elements as $key => $value){
    if($elem_text!==""){
      $elem_text .= "、";
    }
    $elem_text .= $value;
  }
  
  # テンプレート読み込み
  $conf = fopen("tmpl/conf.tmpl", "r") or die;
  $size = filesize("tmpl/conf.tmpl");
  $data = fread($conf , $size);
  fclose($conf);
  
  # 文字置き換え
  $data = str_replace("!name!" , $name , $data);
  $data = str_replace("!name2!" , $name2 , $data);
  $data = str_replace("!kana!" , $kana , $data);
  $data = str_replace("!kana2!" , $kana2 , $data);
  $data = str_replace("!type!" , $type , $data); //radio
  $data = str_replace("!highschool!" , $highschool , $data);
  //$data = str_replace("!keyword!" , $keyword , $data);
  $data = str_replace("!gender!" , $gender , $data); // radio
  $data = str_replace("!birthday!" , $birthday , $data);
  $data = str_replace("!birthday2!" , $birthday2 , $data);
  $data = str_replace("!birthday3!" , $birthday3 , $data);
  $data = str_replace("!zip!" , $zip , $data);
  $data = str_replace("!zip2!" , $zip2 , $data);
  $data = str_replace("!state!" , $state , $data);
  $data = str_replace("!address!" , $address , $data);
  $data = str_replace("!address2!" , $address2 , $data);
  $data = str_replace("!address3!" , $address3 , $data);
  $data = str_replace("!phone!" , $phone , $data);
  $data = str_replace("!phone2!" , $phone2 , $data); 
  $data = str_replace("!phone3!" , $phone3 , $data);
  $data = str_replace("!mobile!" , $mobile , $data);
  $data = str_replace("!mobile2!" , $mobile2 , $data);
  $data = str_replace("!dm!" , $dm , $data); // radio
  $data = str_replace("!elements!" , $elem_text , $data);//checkbox
    
  # 表示
  echo $data;
  exit;
}

#
# エラー画面
#
function error($msg) {
  $error = fopen("tmpl/error.tmpl" , "r");
  $size = filesize("tmpl/error.tmpl");
  $data = fread($error, $size);
  fclose($error);
  
  # 文字置き換え
  $data = str_replace("!message!", $msg, $data);
  
  # 表示
  echo $data;
  exit;
}

#
# CSV書込
#
function send_form() {
  global $name;
  global $name2;
  global $kana;
  global $kana2;
  global $type; //radio
  global $highschool;
  //global $keyword;
  global $gender; // radio
  global $birthday;
  global $birthday2;
  global $birthday3;
  global $zip;
  global $zip2;
  global $state;
  global $address;
  global $address2;
  global $address3;
  global $phone;
  global $phone2;
  global $phone3;
  global $mobile;
  global $mobile2;
  global $dm; // radio
  global $elements;
  
  //  $keyword　↓省略しています
  $user_input = array($name, $name2 , $kana, $kana2, $type, $highschool, $gender, $birthday,$birthday2,$birthday3, $zip, $zip2, $state, $address, $address2, $address3, $phone, $phone2, $phone3, $mobile, $mobile2,$dm,$elements);
  mb_convert_variables("SJIS", "UTF-8", $user_input);
  $fh = fopen("user.csv", "a");
  flock($fh, LOCK_EX);
  fputcsv($fh, $user_input); //配列だとエラーが起きる
  flock($fh , LOCK_UN);
  fclose($fh);
  
  /*
  # メール送信
  send_mail();
  */
  
  # テンプレート読み込み
  $conf = fopen("tmpl/send.tmpl","r") or die;
  $size = filesize("tmpl/send.tmpl");
  $data = fread($conf, $size);
  fclose($conf);
  
  # 文字置き換え
  global $toppage;
  $data = str_replace("!top!", $toppage, $data);
  # 表示
  echo $data;
  exit;
}

/*
#
# メール送信
#
function send_email() {
  # 時間とIPアドレスの取得
  $date = date("Y/m/d H:i:s");
  $ip = getenv("REMOTE_ADDR");
  
  global $name;
  global $name2;
  global $kana;
  global $kana2;
  global $type; //radio
  //global $highschool;
  //global $keyword;
  global $gender; // radio
  global $birthday;
  global $birthday2;
  global $birthday3;
  global $zip;
  global $zip2;
  global $state;
  global $address;
  global $address2;
  global $address3;
  global $phone;
  global $phone2;
  global $phone3;
  global $mobile;
  global $mobile2;
  global $dm; // radio
  global $elements;
  
  # 本文
  $body = <<< _FORM_
  フォームメールより、次のとおり連絡がありました。
  
  日時：$date
  IP情報：$ip
  名前：$name $name2
  フリガナ：$kana $kana2
  区分：$type
  性別：$gender
  生年月日：$birthday年$birthday2月$birthday3日
  郵便番号：$zip$zip2
  都道府県：$state
  住所：$address$address2
  電話番号：$phone$phone2$phone3
  メール：$mobile $mobile2
  DMを受け取りますか？：$dm
  請求資料：
  
_FORM_;

  # 送信
  global $mailto;
  mb_language("japanese");
  mb_internal_encoding("UTF-8");
  $name_sendonly = "送信専用アドレス";
  $name_sendonly = mb_encode_mimeheader($mail_sendonly);
  $name_sendonly = "xianukai@gmail.com";
  $mailfrom = "From:".$name_sendonly."<".$mail_sendonly.">";
  $subject = "フォームから連絡がありました";
  mb_send_mail($mailto, $subject, $body , $mailfrom);
}*/

?>

<?php

ini_set( 'display_errors' , 0 ); //エラー表示しない
error_reporting(E_ALL & ~E_DEPRECATED); //互換性注意以外の全エラーを扱う
ini_set('log_errors' , 1); //エラーログをファイルに保存する
ini_set('error_log', 'C:\xampp\apache\logs\php_error.log'); //エラーログを保存するファイルの指定

echo $aaa;

# ディレクトリ・トラバーサル対策
function get_filename() {
  $filename = $_POST['filename'];
  if (strpos($filename, '..') !== false) {
    exit('不正なアクセスです。');
  }
  return str_replace('\0','' , $filename);
}

$filename = get_filename();
$file = 'www/html/'. $filename;
if (file_exists($file) === true) {
  readfile($file);
}

?>