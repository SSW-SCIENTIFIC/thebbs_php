<?php

# #####################################################
# 	
# 	初期設定1の説明
# 	
# 	define('BBSTITLE', '爆発コンデンサ');
# 	define('SUBTITLE', '旧THEBBS型掲示板');
# 	↑PC用掲示板タイトルとサブタイトル
# 	
# 	define('MOBBBSTITLE', '[携帯用爆発コンデンサ]');
# 	define('MOBSUBTITLE', '携帯用旧THEBBS型掲示板');
# 	↑携帯用掲示板タイトルとサブタイトル
# 	
# 	define('DATDIR', 'dat/');
# 	↑ログファイルが置かれるディレクトリ
# 	
# 	define('CSSFILE', '../css/sugoiyo260.css');
# 	↑cssファイルのディレクトリ
# 	
# 	define('ENDSUBTITLE', 'THE終了スレッド');
# 	↑終了済みスレッド一覧の注意書き部分(PCのみ)
# 	
# 	$ADMINCRYPT = array('okame#*ADMIN*','inoue#*subADMIN*');
# 	↑管理者用のcrypt-keyです
# 	必ず変更してください
# 	半角英数字16文字以内推奨
# 	「,'crypt-key#表示文字'」という書き方で
# 	複数設定できます。
# 	crypt-keyや表示文字には ' # はつかえません
# 	
# 	$USERCRYPT = array('phage#*研究中です*','mogura#*捻れ！*');
# 	↑ユーザー用のcrypt-keyです
# 	掲示板の常連の方など、特殊クリプトが欲しいという方用です
# 	半角英数字16文字以内推奨
# 	「,'crypt-key#表示文字'」という書き方で
# 	複数設定できます。
# 	crypt-keyや表示文字には ' # はつかえません
# 	
# 	define('NANASI_BEFORE', '');
# 	define('NANASI_AFTER', '人目の|;´Д`|');
# 	↑名無しさんのハンドルネームです
# 	
# 	define('PCLINK', '<a href="http://xxx.xxx/" target="_top">HOME</a>');
# 	define('PCLINK2', ' &gt; ');
# 	define('MOBLINK', '<a href="http://xxx.xxx/">HOME</a>');
# 	define('MOBLINK2', ' &gt; ');
# 	PC用携帯用の一覧やスレッド内からのリンク先です。
# 	それぞれご自分のホームぺージのTOPなどに書き換えてください。
# 
# #####################################################
# 	
# 	初期設定2の説明
# 	オプション設定です。
# 	
# 	define('MAXTHREADS', 1024);
# 	↑最大スレッド数です。こんなに要りません。普通
# 	
# 	define('DEFAULTTHREADS', 100);
# 	↑デフォルトで表示されるスレッド数です。こんなに要りません。普通
# 	
# 	define('MAXLINES', 1024);
# 	↑１スレッドあたりの最大投稿数
# 	
# 	define('MAXKAIGYOU', 50);
# 	↑投稿記事の最大改行数
# 	
# 	define('MAXBUNLENGTH', 1750);
# 	↑投稿記事の最大全角文字数
# 	
# 	define('ADDLIMITHOUR', 0);
# 	↑スレッド作成の時間制限です。単位はhourです。0は制限無しになります
# 
# 	define('MEMBERSHIPSYSTEM', false);
# 	↑パスワード制限機能です。falseをtrueに変更すると有効になります
# 	
# 	define('MEMBERPWD', 'sugoiyo');
# 	↑パスワード制限機能を有効にした時の入室パスワード
# 	
# 	define('KIRIBANSYSTEM', false);
# 	↑キリ番機能を有効にするにはfalseをtrueに変更
# 	$KIRIBAN = array('2#2get! yeah!','3#NAGASHIMA JAPAN');
# 	↑キリ番機能を有効にした時の'キリ番#表示文字'
# 
# 	define('WANTNAME', false);
# 	↑お名前を必須入力にしたい場合はfalseをtrueに変更
# 
# 	define('WANTCRKEY', false);
# 	↑crypt-keyを必須入力にしたい場合はfalseをtrueに変更
# 
# 	define('HTMLPRINT', false);
# 	↑HTML要素（タグ）を有効にしたい場合はfalseをtrueに変更
# 
# #####################################################

# ------------------------------------------------------------------以上、解説終わり。


# 初期設定1 - お好みに変更してください - グローバル変数設定

	define('BBSTITLE', '爆発コンデンサ');
	define('SUBTITLE', '旧THEBBS型掲示板');
	define('MOBBBSTITLE', '[携帯用爆発コンデンサ]');
	define('MOBSUBTITLE', '携帯用旧THEBBS型掲示板');
	define('DATDIR','dat/');
	define('CSSFILE', '../css/sugoiyo260.css');
	define('ENDSUBTITLE', '【THE終了スレッド】<br>※最大投稿数をオーバーしたり、その他諸事情にて終了となったスレッドです。');

	$ADMINCRYPT = array('okame#ADMIN','inoue#subADMIN');
	$USERCRYPT = array('phage#Ss1','mogura#Ss2');
	define('NANASI_BEFORE', '');
	define('NANASI_AFTER', '人目の|;´Д`|');

# スレッド一覧やスレッド内からのリンク先。PC用 - 変更しましょう

	define('PCLINK', '<a href="http://xxx.xxx/" target="_top">HOME</a>');
	define('PCLINK2', ' &gt; ');

# スレッド一覧やスレッド内からのリンク先。携帯用 - 変更しましょう

	define('MOBLINK', '<a href="http://xxx.xxx/">HOME</a>');
	define('MOBLINK2', ' &gt; ');

# 初期設定2 - オプション設定です。変更されなくても大丈V

	define('MAXTHREADS', 1024);
	define('DEFAULTTHREADS', 100);
	define('MAXLINES', 1024);

	define('MAXKAIGYOU', 50);
	define('MAXBUNLENGTH', 1750);

	define('ADDLIMITHOUR', 0);

	define('MEMBERSHIPSYSTEM', false);
	define('MEMBERPWD', 'sugoiyo');

	define('KIRIBANSYSTEM', true);
	$KIRIBAN = array('2#2get! yeah!','3#NAGASHIMA JAPAN');

	define('WANTNAME', false);
	define('WANTCRKEY', false);

	define('HTMLPRINT', false);
	$HTMLPERMIT = array('big', 'small', 'em', 'b', 'i', 'u', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'strong', 's', 'strike', 'kbd', 'samp', 'var', 'tt', 'sup', 'sub');


# スクリプト名称表示部
	define('SCTOP', 'ザ☆掲示板風スクリプト');
	define('SCNAME', 'THEBBS.CGI（改）');				# このスクリプトの名称
	define('SCVERSION', 'Customized THEBBS.CGI 2X VERSION 2.6.2');				# リンクのtitle属性として使用
	define('MOBSCNAME', 'Powered by sugoiyo');									# 携帯用スクリプトネーム
	define('SCNAME2', 'THEBBS.PHP From CGI');				# このスクリプトの名称
	define('SCVERSION2', 'Customized THEBBS.PHP VERSION 1.00');				# リンクのtitle属性として使用
	define('MOBSCNAME2', 'Powered by S-sword');									# 携帯用スクリプトネーム
	define('HOGEHOGE', '');

# その他
	define('OMAK', '【ザ風】');													# 単なるオマケ
	define('NUNNU', 'http://nun.nu/?');											# 例のジャンプ先
	define('NUNNU2', 'http:\/\/nun.nu\/\?');
	define('CHECKSECOND', 40);													# 2重投稿をチェックする秒
	define('CHECKLENGTH', 30);													# 2重投稿をチェックするバイト数（文頭から）

# 変更不要（解説用） - グローバル変数宣言
	$CRYPTKEYMATCHFLG = false;													# crypt-keyがマッチしたかどうかの判定フラグ
	$DIRECT = false;															# themobile.phpの呼び出しがthebbs.phpから行われればYES、直接themobile.phpを読み込んでいればNO
	$MOBFLG = false;															# アクセスがモバイルからの場合に1を代入するフラグ

#########---------プログラム開始---------############


main();


# #####################################################
# main メインルーチン
# end_main 終了済みスレッド用ルーチン
# member パスワード制限用ルーチン
# #####################################################

# メインルーチン
function main(){
	if(MEMBERSHIPSYSTEM)
		member();
	check_agent();
	if($_SERVER['QUERY_STRING'] == ''){
		put_header();
		put_index(DEFAULTTHREADS);
	}elseif($_SERVER['QUERY_STRING']{0} == 'e'){
		$_SERVER['QUERY_STRING'] = substr($_SERVER['QUERY_STRING'],1);
		end_main();
	}elseif($_SERVER['QUERY_STRING'] == 'all'){
		put_header();
		put_index(MAXTHREADS);
	}elseif($_SERVER['QUERY_STRING'] == 'add'){
		if(ADDLIMITHOUR)
			check_limit();
		put_header();
		put_addform();
	}else{
		form_decode();
		$tmp = !empty($_POST['X']);

		if($tmp && $_POST['X'] == 'w')
			thread_write();
		elseif($tmp && $_POST['X'] == 'a'){
			if(ADDLIMITHOUR)
				check_limit();
			thread_add();
		}else{
			put_header();
			thread_view();
		}
	}
	put_footer();
}

# 終了済みスレッド用ルーチン
function end_main(){
	if($_SERVER['QUERY_STRING'] == ''){
		put_header();
		end_index(DEFAULTTHREADS);
	}elseif($_SERVER['QUERY_STRING'] == 'all'){
		put_header();
		end_index(MAXTHREADS);
	}else{
		put_header();
		end_view();
	}
	put_footer();
}

# オプション機能のパスワード制限用ルーチン
function member(){
	if(!chack_pwd()){
		if($_SERVER['QUERY_STRING'] == 'keep')
			keep_pwd();
		else{
			put_header();
			put_pwdpage();
		}
	}elseif($_SERVER['QUERY_STRING'] == 'logout')
		logout;
}

# #####################################################
# 主な関数1（サブルーチン）
# check_agent キャリアの振り分け
# put_header ヘッダーの表示
# put_footer フッターの表示
# error エラーメッセージの表示1
# error エラーメッセージの表示2
# #####################################################

# キャリアの振り分け
function check_agent(){
	global $DIRECT, $MOBFLG;

	/* ↓よく分からない */
	# ユーザーエージェントの取得 - themobile.phpを直接読み込んでいる場合は、$testagentに値を代入
	# $_SERVER['HTTP_USER_AGENT']='UP.Browser';												# 携帯用表示を見るためのテスト用

	# キャリアの振り分け
	if(preg_match('/(UP.Browser|DoCoMo|J-PHONE)/', $_SERVER['HTTP_USER_AGENT'])){
		$DIRECT = $MOBFLG = true;
		require('themobile.php');
		exit();
	}
}
# ヘッダーの表示
function put_header(){
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'">';
}

# フッターの表示
function put_footer($flg = false){
	if(MEMBERSHIPSYSTEM && !$flg)
		echo ' <a href="thebbs.php?logout">ログアウト</a>';
	echo '<br><span class=cp><a>'.SCTOP.'</a><br><a href="http://thebbscgi.sugoiyo.com/" target="_blank" title="'.SCVERSION.'">'.SCNAME.'<br><a href="http://prog.s-sword.net/" target="_blank" title="'.SCVERSION2.'">'.SCNAME2.'</span>';
}

# エラーメッセージの表示1
function error($msg){
	global $MOBFLG;

	if($MOBFLG){
		m_error($msg);
		exit();
	}

	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'">'.
		$msg. '<br><br><a href="javascript:history.go(-1);">戻る</a>';
	put_footer();

	exit();
}

# エラーメッセージの表示2
/* ヘッダを出力するかしないかの違い */
/*function error($msg){
	if($MOBFLG){
		m_error($_[0]);
		exit;
	}

	print '<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=SHIFT_JIS"><meta http-equiv="Pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.$CSSFILE.'">';
	print $_[0];
	print '<br><br><a href="javascript:history.go(-1);">戻る</a>';
	&put_footer;
}*/

# #####################################################
# 主な関数2（サブルーチン） 画面表示関連
# put_index スレッドの一覧表示
# end_index 終了済みスレッドの一覧表示
# put_addform 新規スレッド作成画面の表示
# thread_view スレッドの表示
# end_view 終了済みスレッドの表示
# #####################################################

# スレッドの一覧表示
function put_index($lines){
	$num = 1;															# スレッド一覧の開始番号
	$tfile = DATDIR.'t';												# スレッドの一覧情報が記載されているtファイルのファイル名が代入される

	echo '<title>'.OMAK.BBSTITLE.'</title><body>';
	if(PCLINK)
		echo '<div class=mi>'.PCLINK.'</div>';
	echo '<div class=ti>'.BBSTITLE.'</div><br>';
	if(SUBTITLE)
		echo '<div class=box>'.SUBTITLE.'</div><br>';

	echo '<dl class=index>';
	if($in = @fopen($tfile, 'r')){
		while($tmpint = fread($in, 10)){
			echo '<dt><a href="./admin.php?cmd=select&obj='.$tmpint.'" id=num title="スレッド終了・除去">'.$num.'.'.fgets($in);
			if(++$num > $lines)
				break;
		}
		fclose($in);
	}
	echo '</dl>';
	if($num > $lines)
		echo '<a href=thebbs.php?all>[全て表示]</a>';
	echo '<br><br><a href="thebbs.php?e">[終了済みスレッド]</a><hr><a href="thebbs.php?add">新規スレッドの作成</a>';
}

# 終了済みスレッドの一覧表示
function end_index($lines){
	$num = 1;															# スレッド一覧の開始番号
	$tfile = DATDIR.'t';												# スレッドの一覧情報が記載されているtファイルのファイル名
	$efile = DATDIR.'e';												# 終了済みスレッドの一覧情報が記載されているeファイルのファイル名

	echo '<title>'.OMAK.BBSTITLE.'</title><body><div class=mi>'.PCLINK.PCLINK2.'<a href=thebbs.php>'.BBSTITLE.'</a></div><div class=ti>'.BBSTITLE.'</div><br>';
	if(ENDSUBTITLE)
		echo '<div class=endbox>'.ENDSUBTITLE.'</div><br>';

	echo '<dl class=index>';
	if($in = @fopen($efile, 'r')){
		while($tmpint = fread($in, 10)){
			echo '<dt><a href="./admin.php?cmd=jokyo2&obj=e'.$tmpint.'" id=num title="スレッド除去">'.$num.'.'.fgets($in);
			if(++$num > $lines)
				break;
		}
		fclose($in);
	}
	echo '</dl>';
	if($num > $lines)
		echo '<a href=thebbs.php?eall>[全て表示]</a>';
	echo '<hr><a href="thebbs.php">[現行スレッド]</a>';
}


# 新規スレッド作成画面の表示
function put_addform(){
	list($cname, $ccrkey) = return_cookie_array(0);												# クッキーに保存された値
	$OMAK = OMAK;
	$BBSTITLE = BBSTITLE;
	$PCLINK = PCLINK;
	$PCLINK2 = PCLINK2;

	echo <<<EOL
	<title>{$OMAK}スレッド作成</title><body>
	<div class=mi>
	{$PCLINK}{$PCLINK2}<a href="thebbs.php">{$OMAK}{$BBSTITLE}</a>
	</div>
	<div class=ti>新規スレッドの作成</div><br>
	<form action="thebbs.php?www" method=post accept-charset="utf-8">
	スレッドのタイトル：<input type=text name=title size=40 maxlength=80>
	<p class=sma>※タイトルはスレッドの趣旨がわかりやすい内容にした方が、人の目にとまります。悪い例：「教えてください」「聞いてください」</p>
	自分の名前（固定HN）：<input type=text name=name size=20 maxlength=40 value="{$cname}"><br>
	<p class=sma>
	※できるだけHNを固定して使用してください。<br>
	　記号の組み合わせや「とくめい」「通りすがり」「名無し」などのHNはわかりにくいのでなるべく避けてください。
	</p>
	crypt-key：<input type=password name=crypt-key size=20 maxlength=40 value="{$ccrkey}"><br>
	<p class=sma>
	※今、最新のクリプトキー。
	</p>
	本文：<textarea name=bun rows=10 cols=70></textarea>
	<input type=hidden name=X value="a"><br><br><input type=submit value="作成">
	</form>
EOL;
	put_footer();
}

# スレッドの表示
function thread_view(){
	if(($com = strpos($_SERVER['QUERY_STRING'], '.')) === false)
		$thread_num = $_SERVER['QUERY_STRING'];
	else
		list($thread_num, $com) = explode('.', $_SERVER['QUERY_STRING']);							# スレッド番号,コマンド
	$startline = 1;													# レス番号のスタート数
	$pflg = $gflg = false;															# 削除記事表示判定フラグ
	list($cname, $ccrkey) = return_cookie_array($thread_num);												# クッキーに保存された値
	$appname = 'Netscape';											# JavaScript用に用意した変数。プラウザによってJavaScriptのクッキーで使われる文字コードの違いから必要となった。

	if($thread_num{0} =='p'){
		$thread_num = substr($thread_num, 1);
		if($thread_num{0} =='g'){
			$thread_num = substr($thread_num,1);
			$gflg = true;
		}else
			$pflg = true;
	}


	$logfile = DATDIR.$thread_num.'.cgi';
	$logfile2 = DATDIR.'e'.$thread_num.'.cgi';

	$logrow = @file($logfile) or
		$logrow = @file($logfile2) or
			error('スレッドがないんですよ |;´Д`|');

	$title = $logrow[0];
	$lastnum = intval($logrow[count($logrow) - 1]);

	if($gflg)
		list($thread_num) = explode('_', $thread_num);
	else
		if(strpos($thread_num, '_') !== false)
			error('不正な処理なんですよ |;´Д`|<br><br>feedback from 侍刀');

	list($cname, $ccrkey) = return_cookie_array($thread_num);												# クッキーに保存された値

	# HTML表示の開始
	echo '<script>thnum='.$thread_num.';function P(a,b){if(a=="")a=thnum;window.open("thebbs.php?p"+a+"."+b,"Po","width=400,height=350,resizable=1,scrollbars=1,status=1");}</script>';
	if($gflg){
		echo '<title>'.OMAK.'元記事</title><style>body{margin:0;font-size:90%;}</style>';
		list($num, $name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $title);
		echo '<br><div class=ti2>（削除済み投稿記事）</div><dl class=thread><dt>['.$num.']</a><b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd></dl>';
		exit();
	}
	echo '<title>'.OMAK.$title.'</title>';
	if($pflg)
		echo '<style>body{margin:0;font-size:90%;}</style><body><br><div class=ti2>'.$title.'</div>';
	else{
		echo '<bod><div class=mi>'.PCLINK.PCLINK2.'<a href=thebbs.php>'.BBSTITLE.'</a></div><div class=ti><a href="./admin.php?cmd=select&obj='.$thread_num.'" title="Clickで終了・除去" id=ti>'.$title.'</div><a href=thebbs.php?'.$thread_num.'.all>全て表示</a>';
		if($lastnum > 40){
			echo ' <a href=thebbs.php?'.$thread_num.'.e40>最新40</a> <a href=thebbs.php?'.$thread_num.'.e10>最新10</a><br><br>';
			for($i = 1; $i < $lastnum; $i += 100)
				printf(' <a href=thebbs.php?%d.%d-%d>%d-</a>', $thread_num, $i, $i + 99, $i);
		}
	}

	# 表示開始位置や、表示終了行などを取得
	list($startline, $endline) = make_line($startline, $lastnum, $com);

	# スレッドの記事を表示
	if($startline > 1 && !$pflg){
		list($name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $logrow[1]);
		echo '<dl class=thread><dt><a href="./admin.php?cmd=sakujo3&obj='.$thread_num.'.1" id=num title="Clickで削除">[1]</a><b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd></dl><hr>';
	}
	echo '<dl class=thread>';
	for($i = $startline; $i <= $endline; $i++){
		list($name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $logrow[$i]);
		echo '<dt><a href="./admin.php?cmd=sakujo3&obj='.$thread_num.'.'.intval($i).'" id=num title="Clickで削除">['.intval($i).']</a><b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd>';
	}
	echo '</dl>';

	if($pflg)
		exit();

	if($endline < $lastnum)
		printf('<p align=center><a href=thebbs.php?%d.%d-%d>次の100件</a></p>', $thread_num, $endline + 1, $endline + 100);
	elseif($lastnum < MAXLINES)
		printf('<p align=center><a href=thebbs.php?%d.%d->最新</a></p>', $thread_num, $endline);


	# 入力欄の表示
	if($lastnum < MAXLINES)
		echo '<hr><form action="thebbs.php?www" method=post>名前：<input type=text name=name size=20 maxlength=40  value="'.$cname.'">&nbsp;&nbsp;crypt-key：<input type=password name=crypt-key size=20 maxlength=40  value="'.$ccrkey.'"><br><textarea name=bun rows=9 cols=70 wrap=off></textarea><br><input type=submit value="書き込み"><input type=checkbox name=age value=1 checked>インデックスを上げる<input type=hidden name=no value="'.$thread_num.'"><input type=hidden name=X value="w"></form>';
	else
		echo '<p align=center class=end>[THE終了]</p><hr><p class=end>ご利用有難う御座いました。<br>このスレッドは終了していますので、これ以上の投稿はできません。<br>それでは、失礼します。さようなら</p>';
}


# 終了済みスレッドの表示
function end_view(){
	if(($com = strpos($_SERVER['QUERY_STRING'], '.')) === false)
		$thread_num = $_SERVER['QUERY_STRING'];
	else
		list($thread_num, $com) = explode('.', $_SERVER['QUERY_STRING']);							# スレッド番号,コマンド
	$startline = 1;													# レス番号のスタート数
	$pflg = $gflg = false;															# 削除記事表示判定フラグ

	if($thread_num{0} =='p'){
		$thread_num = substr($thread_num, 1);
		if($thread_num{0} =='g'){
			$thread_num = substr($thread_num, 1);
			$gflg = true;
		}else
			$pflg = true;
	}

	if($gflg){
		$logrow = @file(DATDIR.$thread_num.'.cgi') or
			error('スレッドがないんですよ |;´Д`|');
		list($thread_num) = explode('_', $thread_num);
	}else{
		$logrow = @file(DATDIR.'e'.$thread_num.'.cgi') or
			error('スレッドがないんですよ |;´Д`|');
		if(strpos($thread_num, '_') !== false)
			error('不正な処理なんですよ |;´Д`|<br><br>feedback from 侍刀');
	}

	$title = $logrow[0];
	$lastnum = intval($logrow[count($logrow) - 1]);

	# HTML表示の開始
	echo '<script>thnum='.$thread_num.';function P(a,b){if(a=="")a=thnum;window.open("thebbs.php?ep"+a+"."+b,"Po","width=400,height=350,resizable=1,scrollbars=1,status=1");}</script>';
	if($gflg){
		echo '<title>'.OMAK.'元記事</title><style>body{margin:0;font-size:90%;}</style><body>';
		list($num, $name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $title);
		echo '<br><div class=ti2>（削除済み投稿記事）</div><dl class=thread><dt>['.$num.']</a><b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd></dl>';
		exit();
	}
	echo '<title>'.OMAK.$title.'</title>';
	if($pflg)
		echo '<style>body{margin:0;font-size:90%;}</style><body><br><div class=ti2>'.$title.'</div>';
	else{
		echo '<body><div class=mi>'.PCLINK.PCLINK2.'<a href=thebbs.php>'.BBSTITLE.'</a> &gt; <a href=thebbs.php?e>終了スレッド</a></div><div class=ti><a href="./admin.php?cmd=jokyo2&obj=e'.$thread_num.'" title="スレッド除去" id=ti>'.$title.'</div><a href=thebbs.php?e'.$thread_num.'.all>全て表示</a>';
		if($lastnum > 40){
			echo ' <a href=thebbs.php?e'.$thread_num.'.e40>最新40</a> <a href=thebbs.php?e'.$thread_num.'.e10>最新10</a><br><br>';
			for($i = 1; $i < $lastnum; $i += 100)
				printf(' <a href=thebbs.php?e%d.%d-%d>%d-</a>', $thread_num, $i, $i + 99, $i);
		}
	}

	# 表示開始位置や、表示終了行などを取得
	list($startline, $endline) = make_line($startline, $lastnum, $com);

	# スレッドの記事を表示
	if($startline > 1 && !$pflg){
		list($name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $logrow[1]);
		echo '<dl class=thread><dt>[1]<b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd></dl><hr>';
	}
	echo '<dl class=thread>';
	for($i = $startline; $i <= $endline; $i++){
		list($name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $logrow[$i]);
		echo '<dt>['.intval($i).']<b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <i class="IP">'.$ipcrypt.'</i><dd>'.$bun.'</dd>';
	}
	echo '</dl>';
	if($pflg)
		exit();

	if($endline < $lastnum)
		printf('<p align=center><a href=thebbs.php?e%d.%d-%d>次の100件</a></p>', $thread_num, $endline + 1, $endline + 100);
	elseif($lastnum < MAXLINES)
		printf('<p align=center><a href=thebbs.php?e%d.%d->最新</a></p>', $thread_num, $endline);

	echo '<p align=center class=end>[THE終了]</p><hr><p class=end>ご利用有難う御座いました。<br>このスレッドは終了していますので、これ以上の投稿はできません。<br>それでは、失礼します。さようなら</p>';
}

# #####################################################
# 主な関数3（サブルーチン）　ファイルの書き込み関連
#  form_decode クライアントからのPOSTデータを処理、及び入力内容のエラー判定等
# thread_write スレッドの書き込み
# thread_add スレッドの追加処理
# #####################################################

# クライアントからのPOSTデータを処理、及び入力内容のエラー判定等
function form_decode(){
	global $ADMINCRYPT, $USERCRYPT, $CRYPTKEYMATCHFLG;

	foreach($_POST as $key => $value){
		if(HTMLPRINT)
			$value = htmlspecialchars($value, ENT_NOQUOTES);
		else
			$value = str_replace('&amp;', '&', htmlspecialchars($value, ENT_QUOTES));
		$value = str_replace("\t", '    ', $value);
		$value = str_replace("\r", '', $value);
		$value = str_replace("\0", '', $value);
		$value = rtrim($value);
		if($key == 'bun'){
			$value = preg_replace('/&gt;&gt;([\d\-]+)/', '<a href="thebbs.php\?p'.(empty($_POST['no']) ? '' :$_POST['no']).'$1" OnClick="P(\'\',\'$1\')" target="Po">&gt;&gt;$1</a>', $value);
			$value = preg_replace("/\n{4,}/", "\n\n\n", $value);
			$value = str_replace("\n", '<br>', $value);
			if(strlen($value) > MAXBUNLENGTH * 2) error('エラー：すばらしいムスカ君、君は英雄だバンバン<br><br>（本文が長すぎますので、分割してください。）');
			if(preg_match_all('/<br>/', $value, $ttmp) > MAXKAIGYOU - 1) error('エラー：閣下が不用意に打たれた暗号を解読されたのです<br><br>（改行が規定量以上にあります、分割してください。）');
			if(preg_match('/^[\s|　]*$/', $value)) error('エラー：もうちょっと本文を書いてください。');
			$tmpname = preg_replace('/(\W)/', sprintf("%%%02X", ord('$1')), $value);
			if(substr($tmpname, strlen($tmpname) - 3) ==  '%09') error('すすす、すいません。本文に不正な文字列が含まれています。');
			if(HTMLPRINT) $value = html_decode($value);
			else $value = preg_replace('/(https?|ftp)\:([\w|\:\!\#\$\%\=\&\-\^\`\\\|\@\~\[\{\]\}\;\+\*\,\.\?\/]+)/i', '<a href="'.NUNNU.'$1:$2" target="_blank">$1:$2</a>', $value);
			$value = preg_replace('/&gt;&gt;([\d\-]+)/', '<a href="JavaScript:P(\'\',\'$1\')">&gt;&gt;$1</a>', $value);
		}elseif($key == 'name'){
			if(WANTNAME) if(strlen($value)) error('ごごごめんなさい、お名前を必ず入力してください。');
			$value = str_replace('&rlo;', '&amp;rlo;', $value);;
			$value = preg_replace('/\s{1,}/', ' ', $value);
			$value = str_replace("\n", ' ', $value);
			$tmpname = preg_replace('/(\W)/', sprintf('%%%02X', ord('$1')), $value);
			if(substr($tmpname, strlen($tmpname) - 3) ==  '%09') error('すすす、すいません。本文に不正な文字列が含まれています。');
		}elseif($key == 'crypt-key'){
			$_POST['crypted'] = false;
			if(WANTCRKEY) if(strlen($value)) error('ごごごめんなさい、crypt-keyを必ず入力してください。');
			$value = str_replace('&rlo;', '&amp;rlo;', $value);;
			$value = preg_replace('/\s{1,}/', ' ', $value);
			$value = str_replace("\n", ' ', $value);
			if(strlen($value) > 16) error('ごごごめんなさい、crypt-keyが長すぎるのです。短くしてください。');
			if(strlen($value) > 0){
				foreach($ADMINCRYPT as $t_val){
					$tmpcrypt = explode('#', $t_val);
					if($value == $tmpcrypt[0]){
						$_POST['crypted'] = '<i class="edt">'.$tmpcrypt[1].'</i>';
						$CRYPTKEYMATCHFLG = true;
						break;
					}
				}
				if(!$CRYPTKEYMATCHFLG){
					foreach($USERCRYPT as $t_val){
						$tmpcrypt = explode('#', $t_val);
						if($value == $tmpcrypt[0]){
							$_POST['crypted'] = '<i class="gst">'.$tmpcrypt[1].'</i>';
							$CRYPTKEYMATCHFLG = true;
							break;
						}
					}
				}
				if(!$CRYPTKEYMATCHFLG)
					$_POST['crypted'] = '<em>*'.substr(crypt($value, 'ID'), 2, 10).'*</em>';
			}
		}elseif($key == 'title'){
			$value = str_replace('&rlo;', '&amp;rlo;', $value);;
			$value = preg_replace('/\s{1,}/', ' ', $value);
			$value = str_replace("\n", ' ', $value);
			if(strlen($value) > 100) error('ごごごめんなさい、タイトルが長すぎるのです。短くしてください。');
			if(preg_match('/^[\s|　]*$/', $value)) error('タイトルがないんですよ！！');
			$tmpname = preg_replace('/(\W)/', sprintf("%%%02X", ord('$1')), $value);
			if(substr($tmpname, strlen($tmpname) - 2) == '09') error('すすす、すいません。タイトルに不正な文字列が含まれています。');
		}
		$_POST[$key] = $value;
	}
}

# スレッドの書き込み
function thread_write(){
	global $MOBFLG;

	$tfile = DATDIR.'t';												# スレッドの一覧情報が記載されているtファイルのファイル名
	$ttmpfile = DATDIR.'ttmp';										# ttmpファイル名
	list($host, $ipcrypt) = get_host_and_ipcrypt();							# ホスト情報,IPから生成される暗号化された文字列
	$nowday = date('y/m/d H:i');
	$thread_num = sprintf('%010d', $_POST['no']);
	$logfile = DATDIR.$thread_num.'.cgi';

	# 2重投稿チェック
	if(check_ck())
		error('にじゅうかきこみかも知れません！');

	$fp = @fopen($logfile, 'r+') or
		error('スレッドがないんですよ ･ﾟ･(ﾉД`)･ﾟ･');
	flock($fp, LOCK_EX);
	$title = rtrim(fgets($fp));
	$tmpstr = fgets($fp);
	list($onename, $dummy, $oneday) = explode("\t", $tmpstr);

	fseek($fp, -4, SEEK_END);
	$nextnum = intval(fread($fp, 4)) + 1;
	fseek($fp, -4, SEEK_END);

	if($nextnum > MAXLINES)
		error('投稿数が規定の'.MAXLINES.'になりました。これ以上は投稿できません。<br>ご利用ありがとうございました。<br><br>ごめんよララァ。僕には帰れるところがあるんだ。ララァにはいつでも会えるから。');

	if(preg_match('/^[\s|　]*$/', $_POST['name'])){
		$_POST['name'] = NANASI_BEFORE.$nextnum.NANASI_AFTER;
		$nameflg = false;
	}else
		$nameflg = true;

	if(KIRIBANSYSTEM){
		$returnstr = chek_kiriban($nextnum);
		if($returnstr)
			$ipcrypt = $returnstr;
	}

	fputs($fp, sprintf("%s\t%s\t%s\t%s\t%s\t%s\n%04d", $_POST['name'], $_POST['crypted'], $nowday, $_POST['bun'], $host, $ipcrypt, $nextnum));
	fclose($fp);

	# 全体データファイル処理
	for($i = 0; $i < 10; $i++){
		if(!file_exists($ttmpfile))
			break;
		sleep(2);
	}
	$out = @fopen($ttmpfile, 'w') or
		error('not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	$in = @fopen($tfile, 'r') or
		error('not open tfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($in, LOCK_SH);

	if($i == 10)
		error('なんだかスレッドに書き込めないんですよ2 ･ﾟ･(ﾉД`)･ﾟ･');

	if($nextnum > 40){
		if($nextnum == MAXLINES) $nowstr='<a href="thebbs.php?'.$thread_num.'.all">'.$title.'</a> <span class="end">大団円</span></dt><dd>[1]<b>'.$onename.'</b> '.$oneday.' → ['.intval($nextnum).']<b>'.$_POST['name'].sprintf("</b> %s</dd>\n", $nowday);
		else $nowstr = '<a href="thebbs.php?'.$thread_num.'.e40">'.$title.'</a> <a href="thebbs.php?'.$thread_num.'.all">(ALL)</a></dt><dd>[1]<b>'.$onename.'</b> '.$oneday.' → ['.intval($nextnum).']<b>'.$_POST['name'].sprintf("</b> %s</dd>\n", $nowday);
	}else $nowstr = '<a href="thebbs.php?'.$thread_num.'.e40">'.$title.'</a></dt><dd>[1]<b>'.$onename.'</b> '.$oneday.' → ['.intval($nextnum).']<b>'.$_POST['name'].sprintf("</b> %s</dd>\n", $nowday);
	if($ageflg = !empty($_POST['age']))
		fputs($out, sprintf('%010d', $thread_num).$nowstr);

	while($tmpnum = fread($in, 10)){
		$tmpstr = fgets($in);
		if($tmpnum === $thread_num){
			if($ageflg)
				continue;
			else
				fputs($out, sprintf('%010d', $tmpnum).$nowstr);
		}else
			fputs($out, sprintf('%010d', $tmpnum).$tmpstr);
	}
	fclose($in);
	fclose($out);
	unlink($tfile);
	rename($ttmpfile, $tfile);
	chmod($tfile, 0606);

	$tmpint = $nextnum - 5;
	if($tmpint < 0)
		$tmpint = 1;

	if($MOBFLG){
		printf('書き込完了<p><a href=thebbs.php?%s.%d->○</a>', $thread_num, $tmpint, $thread_num, $tmpint);
		exit();
	}

	# クッキーの保存
	$gmt = get_GMT();

	if($nameflg){
		setcookie('N0_name', $_POST['name'], $gmt);
		setcookie('N0_crypt', $_POST['crypt-key'], $gmt);
		setcookie('N'.$thread_num.'_name', $_POST['name'], $gmt);
		setcookie('N'.$thread_num.'_crypt', $_POST['crypt-key'], $gmt);
	}else{
		setcookie('N'.$thread_num.'_name', '', $gmt);
		setcookie('N'.$thread_num.'_crypt', '', $gmt);
	}
	
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'"><body><script>';
	printf('location.href="thebbs.php?%s.%d-";</script>書き込みが完了しました・・・<p><a href="thebbs.php?%s.%d-">○</a>', $thread_num, $tmpint, $thread_num, $tmpint);

	exit();
}


# スレッドの追加処理
function thread_add(){
	global $MOBFLG;

	$tfile = DATDIR.'t';												# tファイル名
	$ttmpfile = DATDIR.'ttmp';										# ttmpファイル名
	list($host, $ipcrypt) = get_host_and_ipcrypt();							# ホスト情報,IPから生成される暗号化された文字列
	$gmt = get_GMT();													# クッキー用日時

	$nowday = date('y/m/d H:i');

	if(check_ck())
		error('にじゅうかきこみかも知れません！');

	if(preg_match('/^[\s|　]*$/', $_POST['name'])){
		$_POST['name'] = NANASI_BEFORE.'1'.NANASI_AFTER;
		$nameflg = false;
	}else
		$nameflg = true;

	for($i = 0; $i < 10; $i++){
		$thread_num = time();
		$logfile = DATDIR.$thread_num.'.cgi';
		if(!file_exists($logfile))
			break;
		sleep(1);
	}

	if($i == 10)
		error('なんだかスレッドが作れないんですよ ･ﾟ･(ﾉД`)･ﾟ･');
	$fp = @fopen($logfile, 'w') or
		error('どうしてかスレッドが作れないんですよ ･ﾟ･(ﾉД`)･ﾟ･');
	flock($fp, LOCK_EX);


	fputs($fp, $_POST['title']."\n".
		sprintf("%s\t%s\t%s\t%s\t%s\t%s\n0001", $_POST['name'], $_POST['crypted'], $nowday, $_POST['bun'], $host, $ipcrypt));
	fclose($fp);
	chmod($logfile, 0606);

	# 全体データファイル処理
	for($i = 0; $i < 10; $i++){
		if(!file_exists($ttmpfile))
			break;
		sleep(2);
	}
	$out = @fopen($ttmpfile, 'w') or
		error('not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	$in = @fopen($tfile, 'r') or
		!file_exists($tfile) or
			error('not open tfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	if($in)
		flock($in, LOCK_SH);

	if($i == 10)
		error('なんだかスレッドが作れないんですよ2 ･ﾟ･(ﾉД`)･ﾟ･');

	fputs($out, sprintf('%010d', $thread_num).
		'<a href="thebbs.php?'.$thread_num.'">'.$_POST['title'].'</a></dt><dd>[1]<b>'.$_POST['name'].'</b> '.$nowday.'</dd>'."\n");
	$i = 1;
	while($in && $tmpnum = fread($in, 10)){
		$tmpstr = fgets($in);
		if($i++ < MAXTHREADS)
			fputs($out, sprintf('%010d', $tmpnum).$tmpstr);
		else
			unlink(DATDIR.$tmpnum.'.cgi');
	}
	if($in){
		fclose($in);
		unlink($tfile);
	}
	fclose($out);
	rename($ttmpfile, $tfile);
	chmod($tfile, 0606);

	# スレッド作成時間の記録
	if(ADDLIMITHOUR)
		write_addtime();

	if($MOBFLG){
		printf('新スレッドができました・・・<p><a href=thebbs.php?%s>○</a>', $thread_num, $thread_num);
		exit();
	}
	
	# クッキーの保存
	if($nameflg){
		setcookie('N0_name', $_POST['name'], $gmt);
		setcookie('N0_crypt', $_POST['crypt-key'], $gmt);
	}else{
		setcookie('N'.$thread_num.'_name', '', $gmt);
		setcookie('N'.$thread_num.'_crypt', '', $gmt);
	}

	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'"><body><script>';
	printf('location.href="thebbs.php?%s";</script>新スレッドができました・・・<p><a href="thebbs.php?%s">○</a>', $thread_num, $thread_num);

	exit();
}

# #####################################################
# その他関数1（サブルーチン）
# make_line スタート行や、最終行を定義
# check_ck 2重投稿のチェック
# get_host_and_ipcrypt HOST名の取得と「IPから生成される暗号化された文字列」を取得
# get_GMT cookie用に日時を整える
# make_cstr クッキーに保存する文字列を作成する
# return_cookie_array クッキーに保存された値を呼び出す
# #####################################################

# スタート行や、最終行を定義
function make_line($startline, $lastnum, $com){
	$endline = $lastnum;

	if(empty($com)){
		if($lastnum > 50)
			$startline = $lastnum - 39;
	}elseif($com != 'all'){
		if(preg_match('/^e(\d+)$/', $com, $tmp)){
			$startline = $lastnum - $tmp[1] + 1;
		}elseif(preg_match('/^(\d*)-(\d*)$/', $com, $tmp)){
			$startline = $tmp[1];
			$endline = $tmp[2];
			if($endline == '')
				$endline = $lastnum;
		}elseif(preg_match('/^(\d+)$/', $com, $tmp))
			$startline = $endline = $tmp[1];

		if($startline < 1)
			$startline = 1;
		if($startline > $lastnum)
			$startline = $lastnum;
		if($endline < $startline)
			$endline = $startline;
		if($endline > $lastnum)
			$endline = $lastnum;
	}

	return array($startline, $endline);
}

# 2重投稿のチェック
function check_ck(){
	$ckfile = DATDIR.'ck.cgi';
	$tmpstr = substr($_POST['bun'], 0, CHECKLENGTH)."\n";
	$nowtime = time();
	$ip = $_SERVER['REMOTE_ADDR'];

	$tmparray = @file($ckfile) or
		$tmparray = array();

	for($i = 0; $i < count($tmparray); $i++){
		list($tmpint, $tmpip, $temtxt) = explode("\t", $tmparray[$i]);
		if($tmpstr == $temtxt)
			if($nowtime - $tmpint < CHECKSECOND && $tmpip == $ip)
				return 1;
	}
	$fp = fopen($ckfile, 'w');
	flock($fp, LOCK_EX);
	fputs($fp, $nowtime."\t".$ip."\t".$tmpstr);
	for($i = 0; $i < count($tmparray); $i++){
		fputs($fp, $tmparray[$i]);
		if($i > 5)
			break;
	}
	fclose($fp);
	chmod($ckfile, 0606);
	return 0;
}

# HOST名の取得と「IPから生成される暗号化された文字列」を取得
function get_host_and_ipcrypt(){
	global $CRYPTKEYMATCHFLG;

	$dest[0] = empty($_SERVER['REMOTE_HOST']) ? gethostbyaddr($_SERVER['REMOTE_ADDR']) : $_SERVER['REMOTE_HOST'];

	$addr = $_SERVER['REMOTE_ADDR'];
	if($dest[0])
		$dest[0] = $addr;

	if(!$CRYPTKEYMATCHFLG){
		$tmparray = explode('.', $addr);
		$tmpstr = strrev(sprintf('%03d%03d%03d%03d', $tmparray[0], $tmparray[1], $tmparray[2], $tmparray[3]));
		$dest[1] = substr(crypt($tmpstr, substr($tmpstr, 8, 2)), 0, 10);
	}else
		$dest[1] = '';

	return $dest;
}

# cookie用に日時を整える
function get_GMT(){
	$life = 3650 * 24 * 60 * 60;
	return time() + $life;
}

# クッキーに保存する文字列を作成する
/* PHPでは不要 */
/*function make_cstr{
	my($cstr);

	$cstr=$FORM{'name'}."#".$FORM{'crypt-key'};
	$cstr=~ s/\"/&quot;/g;
	$cstr=~ s/(\W)/'%'.unpack("H2", $1)/ego;
	return $cstr;
}*/

# クッキーに保存された値を呼び出す
function return_cookie_array($tnum){
	if(empty($_COOKIE['N'.$tnum.'_name']) && empty($_COOKIE['N'.$tnum.'_crypt'])){
		$cname = empty($_COOKIE['N0_name']) ? '' : $_COOKIE['N0_name'];
		$ccrkey = empty($_COOKIE['N0_crypt']) ? '' : $_COOKIE['N0_crypt'];
	}else{
		$cname = $_COOKIE['N'.$tnum.'_name'];
		$ccrkey = $_COOKIE['N'.$tnum.'_crypt'];
	}

	return array($cname, $ccrkey);
}

# #####################################################
# その他関数2（サブルーチン） パスワード関連-オプション機能
# check_pwd パスワードの確認
# put_pwdpage パスワード入力画面
# keep_pwd パスワードを記憶 
# logout パスワードを消去
# #####################################################

# パスワードの確認
function check_pwd(){
	if($_COOKIE['thepwd'] == MEMBERPWD)
			return true;
	return false;
}

# パスワード入力画面
function put_pwdpage($flg){
	$mes = $flg ? '<font color="red">ログアウトしました</font>' : '';
	echo <<<EOL
	<title>::ザ☆掲示板風BBS::</title>
	<body>
	<div class=ti>パスワード認証</div><br>
	{$mes}
	<div class=box>この掲示板をご覧になるためにははパスワードの入力が必要です。<br>ブラウザのクッキーを有効にしてください。<br>尚、ほとんどの携帯電話ではクッキーをサポートしていません。</div><br>
	<form action="thebbs.php?keep" method=post accept-charset="utf-8">
	<p class=sma>※パスワードは管理者にお問い合わせください。</p>
	入室パスワード：<input type="password" name=thepwd>　<input type=submit value="login">
	</form>
EOL;
	put_footer(true);
}

# パスワードを記憶
function keep_pwd(){
	$gmt = get_GMT();
	if($_POST['thepwd'] == MEMBERPWD){
		setcookie('thepwd', MEMBERPWD, $gmt);
		echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'"><body><script>location.href="thebbs.php";</script>認証されました・・・WELLCOME!<p><a href="thebbs.php">';
		exit();
	}
	error('パスワードが誤っています。入力をお確かめください');
}

# パスワードを消去
function logout(){
	setcookie('thepwd', '', 0);
	print '<meta http-equiv="content-type" content="text/html; charset=utf-8"><meta http-equiv="pragma" content="no-cache"><link rel="stylesheet" type="text/css" href="'.CSSFILE.'"><body>';
	put_pwdpage(true);
}

# #####################################################
# その他関数3（サブルーチン）　スレッド作成の時間制限関連-オプション機能
# write_addtimeスレッド作成の時間を書き込む
# check_limit スレッド作成の時間をチェック
# #####################################################

# スレッド作成の時間を書き込む
function write_addtime(){
	$atfile = DATDIR.'addtime';
	$nowtime = time();

	$fp = fopen($atfile, 'w');
	flock($fp, LOCK_EX);
	fputs($fp, $nowtime);
	fclose($fp);
	chmod($atfile, 0606);
}

# スレッド作成の時間をチェック
function check_limit(){
	$nowtime = time();
	$atfile = DATDIR.'addtime';
	$add_time = 0;

	if($fp = fopen($atfile, 'r')){
		$add_time = fgets($fp);
		fclose($fp);
	}

	$time_lag = $nowtime - $add_time;
	if($time_lag < ADDLIMITHOUR * 60 * 60){
		$leave_hour = intval((ADDLIMITHOUR * 60 * 60 - $time_lag) / 60 / 60);
		$leave_minute = intval((ADDLIMITHOUR * 60 * 60 - $time_lag - ($leave_hour * 60 * 60)) / 60);
		error('も、もももーし訳ございません。|;´Д`|　（高嶋政伸）<BR>スレッド作成の時間制限をしており、'.ADDLIMITHOUR.'時間毎に一つのスレッドしか建立できません。<br>のこり約'.$leave_hour.'時間'.$leave_minute.'分ほどお待ち下さい。');
	}
}

function chek_kiriban($tmpstr){
	global $KIRIBAN;

	foreach($KIRIBAN as $value){
		$tmpcrypt = explode('#', $value);
		if($tmpstr == intval($tmpcrypt[0]))
			return $tmpcrypt[1];
	}
	return 0;
}

# #####################################################
# その他関数4（サブルーチン） html要素の変換-オプション機能
# #####################################################

# html要素の変換
function html_decode($tmpstr){
	global $HTMLPERMIT;

	# まず、配列変数に格納された、html要素を変換
	foreach($HTMLPERMIT as $value)
		$tmpstr = preg_replace('/&lt;'.$value.'&gt;((?:(?!&lt;\/?PaiN&gt;).)*?)&lt;\/'.$value.'&gt;/i', '<'.$value.'>$1</'.$value.'>', $tmpstr);

	# <a></a>タグをリンクに変換。但し、PaiNタグ内のhttp://は変換しないようにする。
	$tmpstr = preg_replace('/&lt;a href="((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)"&gt;((?:(?!&lt;\/?PaiN&gt;).)*?)&lt;\/a&gt;/i', '<a href="'.NUNNU.'$1" target="_blank">$2</a>', $tmpstr);
	while(preg_match('/&lt;PaiN&gt;((?:.*)?)<a href="'.NUNNU2.'((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">((?:.*)?)<\/a>((?:.*)?)&lt;\/PaiN&gt;/i', $tmpstr))
		$tmpstr = preg_replace('/&lt;PaiN&gt;((?:.*)?)<a href="'.NUNNU2.'((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">((?:.*)?)<\/a>((?:.*)?)&lt;\/PaiN&gt;/i', '&lt;PaiN&gt;$1&lt;a href="$2"&gt;$3&lt;/a&gt;$4&lt;/PaiN&gt;', $tmpstr);

	# font要素の変換 
	$tmpstr = preg_replace('/&lt;font color="#?([0-9A-Fa-f]{6})"&gt;((?:(?!&lt;\/?PaiN&gt;).)*?)&lt;\/font&gt;/i', '<font color="#$1">$2</font>', $tmpstr);

	# PaiNタグ内のダイナリを変換
	$tmpstr = preg_replace('/<br>/i', "\t", $tmpstr);	
	while(preg_match('/&lt;PaiN&gt;((?:(?!&lt;\/PaiN&gt;).)*)<((?:(?!&lt;\/PaiN&gt;).)*)&lt;\/PaiN&gt;/', $tmpstr))
		$tmpstr = preg_replace('/&lt;PaiN&gt;((?:(?!&lt;\/PaiN&gt;).)*)<((?:(?!&lt;\/PaiN&gt;).)*)&lt;\/PaiN&gt;/', '&lt;PaiN&gt;$1&lt;$2&lt;/PaiN&gt;', $tmpstr);
	while(preg_match('/&lt;PaiN&gt;((?:(?!&lt;\/PaiN&gt;).)*)>((?:(?!&lt;\/PaiN&gt;).)*)&lt;\/PaiN&gt;/', $tmpstr))
		$tmpstr = preg_replace('/&lt;PaiN&gt;((?:(?!&lt;\/PaiN&gt;).)*)>((?:(?!&lt;\/PaiN&gt;).)*)&lt;\/PaiN&gt;/', '&lt;PaiN&gt;$1&gt;$2&lt;/PaiN&gt;', $tmpstr);
	$tmpstr = str_replace("\t", '<br>', $tmpstr);

	# PaiNタグを<pre><code>で囲む
	$tmpstr = preg_replace('/&lt;PaiN&gt;(<br>)?((?:(?!&lt;\/?PaiN&gt;).)*)(<br>)?&lt;\/PaiN&gt;/i', '$1<pre class="PaiN"><code><!-- with respect -->$2</code></pre>$3', $tmpstr);
	$tmpstr = preg_replace('/(?!((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">)((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)/i', '<a href="'.NUNNU.'$2" target="_blank">$2</a>', $tmpstr);

	return $tmpstr;
}
# この正規表現はむちゃくちゃかもしれん。EOF


?>