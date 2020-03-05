<?php  

//» كـاتب الملف/»سجاد العراقي «//
//ch √√ @LUA2PHP
//مـن تخمـط الملـف اذكر المصدر//
//ولا تغـير بلحقوق وتظهر فشلك//
//@SJAD100 /المطـور/ 
// اشترك بقناه المطور من فضلك//
ob_start(); 
$API_KEY = "8010";#توكن البوت 
define('API_KEY',$API_KEY); 
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>"; 
echo file_get_contents("https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']); 
function bot($method,$datas=[]){ 
$url = "https://api.telegram.org/bot".API_KEY."/".$method; 
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas); 
$res = curl_exec($ch); 
if(curl_error($ch)){ 
var_dump(curl_error($ch)); 
}else{return json_decode($res);}} 
$update   = json_decode(file_get_contents('php://input'));
$message    = $update->message;
$text       = $message->text;
$chat_id    = $message->chat->id;
$from_id         = $message->from->id;
$user       = '@'.$message->from->username;
$nrame     = $message->from->first_name;
$username = $message->from->username;
$data       = $update->callback_query->data;
$chat_id2   = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;

$join = bot('getChatMember', ["chat_id" => "@LUA2PHP", "user_id" => $from_id])->result->status;

if ($message && $join == 'left')
  {
  bot('sendMessage', ['chat_id' => $chat_id, 'text' => "عذرآ عزيزي⁉️
عليك الاشــتراك لأســتخدام البــوت✅
@LUA2PHP
اشتــرك ثم ارســل /start ❕ من فضــلك", 'reply_markup' => json_encode(['inline_keyboard' => [[['text' => '• اضغط هنا للشترك -🔱 ', 'url' => 'https://t.me/LUA2PHP ']]]]) ]);
  die('مشيولي');
  }

$ex = explode(' ', $text);


///////////////////

$u = explode("\n",file_get_contents("pj.txt"));
$c = count($u)-1;
$modxe = file_get_contents("em.txt");
$admin = "185520099"; /* ايدي مالتك */
#                بداية الاوامر                 #
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("pj.txt", $chat_id."\n",FILE_APPEND);
  }
if ($text == "/start" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"
☑️￤اهلا عزيزي :- المطور .
▫️￤اليك الاوامر الان حدد ماتريده 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
        ]);
}
// ماثيو( سجاد العراقي )𖤍
if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"
☑️￤اهلا عزيزي :- المطور .
▫️￤اليك الاوامر الان حدد ماتريده 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('em.txt', '');
}
#                   المشتركين                   #
if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
#                   رسالة للكل                   #
if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("em.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"▪️ ارسل رسالتك الان 📩 وسيتم نشرها لـ [ $c ] مشترك . 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' الغاء 🚫 •','callback_data'=>'off']]    
        ]
    ])
    ]);
}
#------ #كتابة #سجاد ------#
if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("em.txt","no");

} 
}

if($text == "/start"){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 "text"=>
"♳» اهــلا بـك فـي بـوت اختصار الروابط ㋡
♴» البوت يقوم بختصار الروابط ♡
♵»البـوت سـريــع جـدا وجـديــد ᗧ
♵»فقط قم بأرسال الرابط وانتظر ≿
♶»سوف يرسل لك رابط مختصر 💖
♻️» #ملاحظه:- يجب ان يحتوي الرابط ع * https *
♷»تابعنا  » @LUA2PHP",
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' 📡تابعنا •','url'=>'t.me/lua2php']]    ,
[['text'=>' 📚 المطور •','url'=>'t.me/sjad100']] ,   
        ]
    ])
 ]);
 }

 if($text !="/start"){
     $api = "https://arba7hna.com/api?api=51065fcb0194804c3714348eaa77ecae4c3f24e1&url=$text"; 
$result = json_decode(file_get_contents($api), true); 
$short = $result["shortenedUrl"];
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 "text"=>"
♳» هذا الرابط الخاص بك ㋡
♴» اضغط ع الرابط وسوف ينسخ ♡
♵»الرابط 
`$short`ᗧ",
'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>' 📡تابعنا •','url'=>'t.me/lua2php']]    ,
        ]
    ])
 ]);
 }
 
 //» كـاتب الملف/»سجاد العراقي «//
//ch √√ @LUA2PHP
//مـن تخمـط الملـف اذكر المصدر//
//ولا تغـير بلحقوق وتظهر فشلك//
//@SJAD100 /المطـور