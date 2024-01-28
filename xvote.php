<?php

// BY : @sero_bots - @WJJWJ
//تغير حقوق يدل علي علامه فشلم ومامبري الي يوم يبعثون

ob_start();
header("Content-Type: application/json; charset=UTF-8");
ob_start();
date_default_timezone_set('Asia/Baghdad');
$API_KEY = "توكنك" ;
define('API_KEY',$API_KEY);
define("IDBot", explode(":", $API_KEY)[0]);


function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $options = [
        'http' => [
            'method'  => 'POST',
            'content' => http_build_query($datas),
            'header'  => 'Content-Type: application/x-www-form-urlencoded\r\n',
        ],
    ];
    $context  = stream_context_create($options);
    $res = file_get_contents($url, false, $context);

    if ($res === FALSE) {
        return json_encode(['error' => 'Request failed']);
    } else {
        return json_decode($res);
    }
}

$usrbot = bot("getme")->result->username;
$emoji = 
"➡️
🎟️
↪️
🔘
🏠
" ;
$emoji = explode ("\n", $emoji) ;
$b = $emoji[rand(0,4)];
$NamesBACK = "رجوع $b" ;

define("USR_BOT",$usrbot); #يابه لحد يلعب بهاذه
mkdir("bbot") ;
mkdir("bbot/". USR_BOT) ;
mkdir("bbot/". USR_BOT. "/BACKUP") ;

$bbot=json_decode(file_get_contents("bbot/".USR_BOT."/bbot.json"),1);


function SETJSON($INPUT){
    if ($INPUT != NULL || $INPUT != "") {
        $F = "bbot/".USR_BOT."/bbot.json";
        $N = json_encode($INPUT, JSON_PRETTY_PRINT);
        
        file_put_contents($F, $N);
        sleep(1);
    }
}


$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$lang = $update->message->from->language_code ;
$from_id = $message->from->id;
$dy = "عليك تعين قناة اشتراك اجباري اولا ." ;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}

$title = $message->chat->title;
 

 if(!preg_match("/-/", $chat_id)) {
 $chis = $bbot[$from_id]["ch"]??"لا يوجد" ;
 $chis = "*$chis*" ;
 $emo = $bbot[$from_id]["emo"]??"❤️" ;
 $emo = "*$emo*" ;
 $klish = $bbot[$from_id]["klish"]??"🛑 عليك الاشتراك بالقناة لتتمكن من التصويت 🛑" ;
 $rshq = $bbot[$from_id]["rshq"]??"❌" ;
 $ish = $bbot[$from_id]["ish" ]??"✅" ;
 $klish = "*$klish*" ;
 
 if(!$rshq) { $bbot[$from_id]["rshq"] = "❌" ; SETJSON($bbot);} 
 if($text == "/start") {
 	bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• مرحبا بك عزيزي ([$name](tg://user?id=$chat_id)) في بوت صنع منشورات لايكات المسابقات

- الايموجي : $emo
- قناة الاشتراك الاجباري : $chis
- كليشة الاشتراك الاجباري : $klish

- اشعار التصويت : $ish
- استخدام الرشق : $rshq 

• ارسل نص او اي نوع من انواع الميديا
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"تعيين كليشة الاشتراك الاجباري",'callback_data'=>"klish" ]], 
       [['text'=>"تعيين قناة الاشتراك الاجباري",'callback_data'=>"setcha" ], ['text'=>"تعيين الاسمايل",'callback_data'=>"emo" ]], 
       [['text'=>"السماح بأستخدام الرشق : $rshq",'callback_data'=>"rshq" ], ['text'=>"استخدام الخصم",'callback_data'=>"xasm" ]],  
       [['text'=>"اشعار التصويت : $ish",'callback_data'=>"ish" ]], 
      ]
    ])
]); return false ;
}

if($data == "back") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
• مرحبا بك عزيزي ([$name](tg://user?id=$chat_id)) في بوت صنع منشورات لايكات المسابقات

- الايموجي : $emo
- قناة الاشتراك الاجباري : $chis
- كليشة الاشتراك الاجباري : $klish

- اشعار التصويت : $ish
- استخدام الرشق : $rshq 

• ارسل نص او اي نوع من انواع الميديا
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"تعيين كليشة الاشتراك الاجباري",'callback_data'=>"klish" ]], 
       [['text'=>"تعيين قناة الاشتراك الاجباري",'callback_data'=>"setcha" ], ['text'=>"تعيين الاسمايل",'callback_data'=>"emo" ]], 
       [['text'=>"السماح بأستخدام الرشق : $rshq",'callback_data'=>"rshq" ], ['text'=>"استخدام الخصم",'callback_data'=>"xasm" ]],  
       [['text'=>"اشعار التصويت : $ish",'callback_data'=>"ish" ]], 
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($data == "ish" or $data == "rshq" ) {
					
					if($bbot[$from_id][$data] == "✅" or $bbot[$from_id][$data] == null) {
						$bbot[$from_id][$data] = "❌" ;
						SETJSON($bbot) ;
						} else {
							$bbot[$from_id][$data] = "✅" ;
							SETJSON($bbot) ;
							} 
							
							$rshq = $bbot[$from_id]["rshq"]??"❌" ;
 $ish = $bbot[$from_id]["ish"]??"✅" ;
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
• مرحبا بك عزيزي ([$name](tg://user?id=$chat_id)) في بوت صنع منشورات لايكات المسابقات

- الايموجي : $emo
- قناة الاشتراك الاجباري : $chis
- كليشة الاشتراك الاجباري : $klish

- اشعار التصويت : $ish
- استخدام الرشق : $rshq 

• ارسل نص او اي نوع من انواع الميديا
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"تعيين كليشة الاشتراك الاجباري",'callback_data'=>"klish" ]], 
       [['text'=>"تعيين قناة الاشتراك الاجباري",'callback_data'=>"setcha" ], ['text'=>"تعيين الاسمايل",'callback_data'=>"emo" ]], 
       [['text'=>"السماح بأستخدام الرشق : $rshq",'callback_data'=>"rshq" ], ['text'=>"استخدام الخصم",'callback_data'=>"xasm" ]],  
       [['text'=>"اشعار التصويت : $ish",'callback_data'=>"ish" ]], 
      ]
    ])
]); 

return false ;
				} 

        $audio                 = $message->audio;
		$audio_file_id         = $message->audio->file_id;
		$video                 = $message->video;
		$video_file_id         = $message->video->file_id;
		$voice                 = $message->voice;
		$voice_file_id         = $message->voice->file_id;
		$photo                 = $message->photo;
		$photo_file_id         = $message->photo[0]->file_id;
		$sticker               = $message->sticker;
		$sticker_file_id       = $message->sticker->file_id;
		$contact               = $message->contact;
		$contact_number        = $message->contact->phone_number;
		$contact_name          = $message->contact->first_name;
		$video_note            = $message->video_note;
		$video_note_file_id    = $message->video_note->file_id;
		$document              = $message->document;
		$document_name         = $document->file_name;
		$document_file_id      = $document->file_id;
		$gif                   = $message->animation;
		$gif_file_id           = $message->animation->file_id;
		$pin                   = $message->pinned_message;
		$pin_id                = $message->pinned_message->from->id;
		$pin_first_name        = $message->pinned_message->from->first_name;
		$pin_tag               = "[$pin_first_name](tg://user?id=$pin_id)";
		$inline                = $message->reply_markup->inline_keyboard;
		$entities              = $message->entities;
		$location              = $message->location;
		$location_file_id      = $message->location->file_id;
		
		
		if($data == "klish") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
ارسل كليشة الاشتراك الاجباري التي تريد وضعها .
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($text and $bbot[$from_id]["mode"] == "klish") {
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم حفظ الكليشة بنجاح
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["klish"] = $text;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ;
return false ;
					} 
					
					if($data == "xasm") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
ارسل كود المنشور الان . 
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if(is_numeric($text) and $bbot[$from_id]["mode"] == "xasm") {
					
					if(!$bbot[$text]["name"]) {
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• يبدو ان الكود خاطء تأكد من الكود 

- الكود عباره عن الكود الذي يعطيك يا بعد ارسال اسم المتسابق للبوت
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
						exit;
						} 
						
						$f=strlen(strval($from_id)) + 1;
						for($i=0;$i<$f;$i++){
							$s=$s.$text[$i] ;
							} 
						if ($f == $s) {
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• يبدو ان هذا المتسابق ليس بمسابقتك ✅
$s
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
						exit;
						} 
						$b = $bbot[$text]["name"] ;
						$v = $bbot[$text]["like"] ;
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم وجود المتسابق ارسل عدد الاصوات لخصمها من الشخص
- $b 
- اصواته. : $v
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["xasm"] = $text;
$bbot[$from_id]["mode"] = "S2" ;
SETJSON($bbot) ;
return false ;
					} 
					
					
					
					if(is_numeric($text) and $bbot[$from_id]["mode"] == "S2") {
						$v = $bbot[$bbot[$from_id]["xasm"]]["name"] ;
						bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم خصم العدد ($text) من $v.
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 

$inline = $bbot[$from_id]["xasm"];
mkdir("msabg") ;
	mkdir("msabg/". USR_BOT ) ;
	mkdir("msabg/". USR_BOT. "/". $inline) ;
	$fileName = "msabg/". USR_BOT. "/".$inline."/v.txt";
$fileContent = file_get_contents($fileName);
$lines = explode("\n", $fileContent);
$linesToRemove = 30;
$updatedContent = implode("\n", array_slice($lines, $linesToRemove));
file_put_contents($fileName, $updatedContent);



$text1 = $bbot[$bbot[$from_id]["xasm"]]["like"]-$text ;
$bbot[$bbot[$from_id]["xasm"]]["like"] = $text1 ;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ; 
return false ;
						} 
					
					if($data == "emo") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
ارسل الاسمايل الذي تريد وضعه .
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				function containsEmoji($text) {
    return preg_match('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{1F700}-\x{1F77F}\x{1F780}-\x{1F7FF}\x{1F800}-\x{1F8FF}\x{1F900}-\x{1F9FF}\x{1FA00}-\x{1FA6F}\x{1FA70}-\x{1FAFF}\x{1FAB0}-\x{1FAD6}\x{1F004}-\x{1F0CF}\x{1F170}-\x{1F251}]/u', $text);
}

				if(containsEmoji($text) and $bbot[$from_id]["mode"] == "emo") {
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم حفظ الايموجي بنجاح
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["emo"] = $text;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ;
return false ;
					} 
				
		if($data == "setcha") {
				bot('editMessagetext', [
				'message_id'=>$message_id ,
'chat_id'=>$chat_id,
'text'=>"
قم برفع البوت ادمن في القناة ومن ثم ارسل توجيه من القناة .
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["mode"] = $data ;
SETJSON($bbot) ;
return false ;
				} 
				
				if($update->message->forward_from_chat->id and $bbot[$from_id]["mode"] == "setcha" ) {
					$mt = json_encode(bot('getChatMember', ['chat_id' => $update->message->forward_from_chat->id, 'user_id' => IDBot]));
		$nt = json_decode($mt, true);
		if ($nt['result']['status'] == "administrator") {
			bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• تم حفظ القناة بنجاح
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
$bbot[$from_id]["ch"] = $update->message->forward_from_chat->id;
$bbot[$from_id]["mode"] = null ;
SETJSON($bbot) ;
return false ;
			} else {
				bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• البوت ليس ادمن في القناة
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]], 
       
      ]
    ])
]); 
return false ;
				} 
					} 
					
					
					if($text) {
						
			if($bbot[$from_id]["ch"] == null) {
				
				if($update->message->chat->type != "private") {
						exit;
						} 
				
				bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
$dy
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"- تعيين قناة الاشتراك الاجباري -",'callback_data'=>"setcha" ]], 
       
      ]
    ])
]); 
				} else {
					if($data) {exit ;} 
					$rnd = rand(1234567,7654321);
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
$text
", 
]); 
					bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
• `@".bot("getme")->result->username. " ".$from_id."$rnd`
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"• اضغط هنا للمشاركه •",'switch_inline_query'=>"".$from_id."$rnd"]], 
       
      ]
    ])
]); 
$bbot[$from_id. $rnd]["like"] = null ;
$bbot[$from_id. $rnd]["name"] = "$text";
$bbot[$from_id. $rnd]["emo"] = "$emo";
$bbot[$from_id. $rnd]["klish"] = "$klish";
$bbot[$from_id. $rnd]["ch"] = "$chis";
$bbot[$from_id. $rnd]["ish"] = "$ish";
$bbot[$from_id. $rnd]["own"] = "$from_id";
$bbot[$from_id. $rnd]["rshq"] = "$rshq";
SETJSON($bbot) ;
					} 
			} 
			

} 
		
			
			$cuser = $update->callback_query->from->username;
$cid = $update->callback_query->from->id;
$data = $update->callback_query->data;
$inline = $update->inline_query->query;
$username = $update->inline_query->from->username;
if($inline){
$ex = $bbot[$inline]["name"];
$like = $bbot[$inline]["like"];
$emo = str_replace("*", null, $bbot[$inline]["emo"]) ;
if($emo and $ex) {
$user = trim($ex[0],"@");
$wh = str_replace($ex[0], $wh, $inline);
bot('answerInlineQuery',[
'inline_query_id'=>$update->inline_query->id,    
'results' => json_encode([[
'type'=>'article',
'id'=>base64_encode(rand(5,555)),
'title'=>"اضغط هنا للارسال.", 'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"$ex"],
'reply_markup'=>['inline_keyboard'=>[
[['text'=>"$like $emo",'callback_data'=>"liked%$inline"]],
]]
]])
]);
}else{
	exit;
	} 
}

$d = explode("%", $data) ;
if($d[0] == "liked") {
	
	$inline = $d[1];
	$ex = $bbot[$inline]["name"];
$like = $bbot[$inline]["like"];
$chx =str_replace("*", null, $bbot[$inline]["ch"]) ;
$own =str_replace("*", null, $bbot[$inline]["own"]) ;
$klish =str_replace("*", null, $bbot[$inline]["klish"]) ;
$emo = str_replace("*", null, $bbot[$inline]["emo"]) ;
if($emo and $ex) {
	$getChatMemberReq = file_get_contents("https://api.telegram.org/bot". API_KEY. "/getChatMember?chat_id=" . $chx . "&user_id=" . $from_id);
			$getChatMemberRes = json_decode($getChatMemberReq, true);
			if ($getChatMemberRes['result']['status'] == "left" ) {
	bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$klish, 
'show_alert'=>true, 
]);
return false ;
} else {
	if($update->callback_query->from->language_code != "ar") {
		if($bbot[$inline]["rshq"] == "❌") {
		bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"عذرا ولكن التصويت بحسابات en ممنوع في المسابقه ✅" , 
'show_alert'=>true , 
]);
return false ;
} 
		} 
		$lan = $update->callback_query->from->language_code ;
	mkdir("msabg") ;
	mkdir("msabg/". USR_BOT ) ;
	mkdir("msabg/". USR_BOT. "/". $inline) ;
	$Z = "msabg/". USR_BOT. "/".$inline."/v.txt";
	$like = $bbot[$inline]["like"]+1;
	if(!in_array($from_id, explode("\n", file_get_contents($Z)))) {
	bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"تم تسجيل اعجابك بنجاح." , 
'show_alert'=>false, 
]);
$db_id = $update->callback_query;
$in_id = $db_id->inline_message_id;

bot('editMessageReplyMarkup',[
			'inline_message_id'=>$in_id,
			'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[['text'=>"$like $emo $lang",'callback_data'=>"liked%$inline"]],
                
				]
				])
			]);
			
			$ns =str_replace("*", null, $bbot[$inline]["name"]) ;
			if($bbot[$inline]["ish"]) {
				bot('sendMessage', [
'chat_id'=>$own,
'text'=>"
• تصويت جديد على المنشور ($emo) :
$ns
----------------
- اسم المستخدم : [$name](tg://user?id=$from_id) 
- ايدي المستخدم : `$from_id`
- معرف المستخدم : $user
- لغه الجهاز : $lan

• عدد الاصوات الكلي : $like
", 
'parse_mode'=>"markdown" , 
'disable_web_page_preview'=>true, 

]); 
				} 
$bbot[$inline]["like"] +=1;
SETJSON($bbot) ;
file_put_contents($Z, file_get_contents($Z). "\n$from_id") ;
return false ;
} else {
	bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"تم سحب تصويتك بنجاح. " , 
'show_alert'=>false, 
]);
$like = $bbot[$inline]["like"] - 1;
$db_id = $update->callback_query;
$in_id = $db_id->inline_message_id;
bot('editMessageReplyMarkup',[
			'inline_message_id'=>$in_id,
			'reply_markup'=>json_encode([
				'inline_keyboard'=>[
				[['text'=>"$like $emo",'callback_data'=>"liked%$inline"]],
                
				]
				])
			]);
$bbot[$inline]["like"] -=1;
SETJSON($bbot) ;
file_put_contents($Z, str_replace($from_id, null, file_get_contents($Z)));
return false ;
	} 
	} 
} 
	}
	
	
	