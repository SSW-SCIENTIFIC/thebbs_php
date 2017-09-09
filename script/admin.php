<?php


# #####################################################
# 	
# 	初期設定の説明
# 	
# 	define('DATDIR', 'dat/');
# 	↑ログファイルが置かれるディレクトリ
# 	
# 	define('CSSFILE', './css/sugoiyo260.css');
# 	↑cssファイルのディレクトリ
# 	
# 	define('ADMINPWD', 'okame');
# 	↑管理者用のパスワードです。必ず変更してください
# 	半角英数字8文字以内を推奨
# 	
# 	define('USERMODE', false);
# 	↑投稿者削除機能の設定をします。
# 	投稿者が削除できるようにするには:true
# 	投稿者が削除できないようにするには:false
# 	を指定してください
# 	
# #####################################################

# 初期設定

	define('DATDIR', 'dat/');
	define('CSSFILE', './css/sugoiyo260.css');
	define('ADMINPWD', 'okame');
	define('USERMODE', false);

	$HTMLPERMIT = array('big','small','em','b','u','h2','h3','h4','h5','h6','p','strong','s','strike','kbd','samp','var','tt','sup','sub');

# スクリプト名称表示部
	define('SCTOP', 'ザ☆掲示板風スクリプト');
	define('SCNAME', 'THEBBS.CGI（改）');				# このスクリプトの名称
	define('SCVERSION', 'Customized THEBBS.CGI 2X VERSION 2.6.2');				# リンクのtitle属性として使用
	define('SCNAME2', 'THEBBS.PHP From CGI');				# このスクリプトの名称
	define('SCVERSION2', 'Customized THEBBS.PHP VERSION 1.00');				# リンクのtitle属性として使用

#########---------プログラム開始---------############
	$ADMINFLG = false;
	define('MAXLINES', 1024);

main();


# メインメニュー
function main(){
	global $ADMINFLG;

	decode(false);
	if(check_cookie()){
		$ADMINFLG = true;
		if($_SERVER['QUERY_STRING'] == 'logout')
			put_logoutpg();
		else
			admin_menu();
	}elseif(($flg = !empty($_ENV['cmd'])) && $_ENV['cmd'] == 'sakujo3' && USERMODE)
		put_onpg();
	elseif($flg && $_ENV['cmd'] == 'sakujo3' && !USERMODE)
		put_offpg();
	elseif($flg && $_ENV['cmd'] == 'sakujo4'){
		put_header();
		decode(true);
		user_sakujo4();
	}elseif($flg && $_ENV['cmd'] == 'select')
		put_selectpg(false, false);
	elseif($flg && $_ENV['cmd'] == 'jokyo2')
		put_selectpg(false, true);
	else
		login_menu();
	put_footer();
}


# クッキーのチェック
function check_cookie(){
	if(!empty($_COOKIE['adpwd']) && $_COOKIE['adpwd'] == ADMINPWD)
		return true;
	return false;
}

# ログインルーチン
function login_menu(){
	if($_SERVER['QUERY_STRING'] == ''){
		put_header();
		put_loginpg();
	}elseif($_SERVER['QUERY_STRING'] == 'login'){
		decode(true);
		login();
	}else{
		put_header();
		put_loginpg();
	}
}
	
# 管理者用ルーチン
function admin_menu(){
	put_header();
	if(empty($_ENV['cmd']))
		menu();
	elseif($_ENV['cmd'] == 'sakujo')
		sakujo();
	elseif($_ENV['cmd'] == 'sakujo2')
		sakujo2();
	elseif($_ENV['cmd'] == 'sakujo3')
		sakujo3();
	elseif($_ENV['cmd'] == 'sakujo4'){
		form_decode();
		sakujo4();
	}elseif($_ENV['cmd'] == 'sakujo5')
		sakujo5();
	elseif($_ENV['cmd'] == 'jokyo')
		jokyo();
	elseif($_ENV['cmd'] == 'jokyo2')
		jokyo2();
	elseif($_ENV['cmd'] == 'jokyo3'){
		decode(true);
		jokyo3();
	}elseif($_ENV['cmd'] == 'end')
		fin();
	elseif($_ENV['cmd'] == 'end2')
		fin2();
	elseif($_ENV['cmd'] == 'end3'){
		decode(true);
		fin3();
	}elseif($_ENV['cmd'] == 'select')
		put_selectpg(true, false);
	else
		put_emptypg();
}

# ヘッダーの表示
function put_header(){
	$CSSFILE = CSSFILE;

	echo <<<EOL
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="{$CSSFILE}">
EOL;
}

# フッターの表示
function put_footer(){
	global $ADMINFLG;

	echo '<br><hr><a href="Javascript:history.go(-1)">戻る</a> <a href="thebbs.php">掲示板</a>';
	if($ADMINFLG)
		echo ' <a href=admin.php>トップ</a> <a href="admin.php?logout">ログアウト</a>';
	echo '<br><span class=cp><a>'.SCTOP.'</a><br><a href="http://thebbscgi.sugoiyo.com/" target="_blank" title="'.SCVERSION.'">'.SCNAME.'<br><a href="http://prog.s-sword.net/" target="_blank" title="'.SCVERSION2.'">'.SCNAME2.'</span>';
}

# エラーメッセージ
function error($flg, $msg){
	if($flg)
		put_header();
	echo <<<EOL
	<title>ERROR</title></head><body>
	<div class=ti>ERROR</div>
	<div class=box>{$msg}</div>
EOL;
	put_footer();
	exit();
}

# htmlを戻す
function put_body($title, $ti, $box, $index){
	$body =<<<EOL
	<title>{$title}</title></head><body>
	<div class=ti>{$ti}</div>
	<div class=box>{$box}</div>
	<div class=index>{$index}</div>
EOL;
	return $body;
}


# ログインページ
function put_loginpg(){
	$title = 'THEBBS.PHP 管理者入室画面';
	$box = '掲示板の管理者専用の画面です。<br>一般のユーザーは利用できません。';

	$body =<<<EOL
<dl><dd><form action="admin.php?login" method="post"><input type=password name=adpwd> <input type=submit value="login"></form></dd></dl> 
EOL;
	echo put_body($title, $title, $box, $body);
}

# ログアウトページ
function put_logoutpg(){
	global $ADMINFLG;

	$title = 'THEBBS.PHP 管理者入室画面';
	$box = 'ログアウトしました。';
	$ADMINFLG = false;

	setcookie('adpwd', '', 0);
	put_header();

	$body =<<<EOL
<dl><dd><form action="admin.php?login" method="post"><input type=password name=adpwd> <input type=submit value="login"></form></dd></dl> 
EOL;
	echo put_body($title, $title, $box, $body);
}

# ログイン用クッキーを保存
function login(){
	$title = 'THEBBS.PHP 管理者入室画面';
	$box = 'ログイン';
	$gmt = get_GMT();
	$tmpstr = '';

	if($_ENV['adpwd'] != ADMINPWD)
		error(true, 'パスワードが誤りです');

	if(!empty($_ENV['cmd']))
		$tmpstr = '?cmd='.$_ENV['cmd'].'&obj='.$_ENV['obj'];
	$body = '<script>location.href="admin.php'.$tmpstr.'";</script><a herf="admin.php'.$tmpstr.'">ログインしました。</a>';

	setcookie('adpwd', ADMINPWD, $gmt);
	put_header();
	echo put_body($title, $title, $box, $body);

}


# cookie用に日時を整える
function get_GMT(){
	$life = 3650 * 24 * 60 * 60;
	return time() + $life;
}

# 管理者トップページ
function menu(){
	$title = '管理者メニュー';
	$box = '掲示板の管理者専用の画面です。<br>一般のユーザーは利用できません。';
	
	$body =<<<EOL
	<dl>
	<dt>1. <a href="admin.php?cmd=sakujo">記事の削除</a></dt>
	<dt>2. <a href="admin.php?cmd=jokyo">スレッドの除去</a></dt>
	<dt>3. <a href="admin.php?cmd=end">スレッドの終了</a></dt>
	</dl>
EOL;

	$test = fopen('admin.php', 'r');
	if(flock($test, LOCK_SH))
		$body .= '<dl><dt>備考：</dt><dd>お使いのサーバではflock関数が使えそうです。<br>ログデータ破損の可能性は低いでしょう。</dd></dl>';
	else
		$body .= '<dl><dt>備考：</dt><dd>お使いのサーバではflock関数が使えないような気がします。。。<br>ガジガジ使うとログデータが破損することもあるかも。。</dd></dl>';

	echo put_body($title, $title, $box, $body);
}

# #################################################
# 記事の編集・削除
function sakujo(){
	$title = '記事の編集・削除';
	$title2 = 'スレッドを選択';
	$box = '編集・削除したい記事が投稿されたスレッドを選択してください。';
	$TFILE = DATDIR.'t';
	$body = '';

	if($in = @fopen($TFILE, 'r')){
		while($tmpint = fread($in, 10))
			$body .= '<dt><a href="admin.php?cmd=sakujo2&th='.$tmpint.'">[選択]</a> '.fgets($in).'</dt>';
		fclose($in);
	}
	echo put_body($title, $title2, $box, $body);
}

# 記事の編集・削除2
function sakujo2(){
	$title = '記事の編集・削除';
	$title2 = '記事の選択';
	$box = '編集・削除削除したい記事を選択してください';

	$rows = @file(DATDIR.$_ENV['th'].'.cgi') or
		error(true, '該当するスレッドが見つかりませんでした。');

	$body = '<dl class=thread>';
	for($i = 1; $i < count($rows) - 1; $i++){
		list($name, $crypted, $day, $bun, $host, $ipcrypt) = explode("\t", $rows[$i]); 
		$body .= '<dt><a href="admin.php?cmd=sakujo3&obj='.$_ENV['th'].'.'.$i.'">[選択]</a> '.$i.'. <b>'.$name.'</b> '.$day.' '.$crypted.' ['.$host.'] <a id=IP>'.$ipcrypt.'</a></dt><dd>'.$bun.'</dd>'; 
	}
	$body .= '</dl>';
	echo put_body($title, $title2, $box, $body);
}

# 記事の編集・削除3
function sakujo3(){
	$title = '記事の編集・削除';
	$title2 = '記事の編集・削除';
	$box = '記事を編集または削除できます';
	list($thread, $num) = explode('.', $_ENV['obj']);

	echo '<script>thnum='.$thread.';function P(a,b){if(a=="")a=thnum;window.open("thebbs.php?p"+a+"."+b,"Po","width=400,height=350,resizable=1,scrollbars=1,status=1");}</script>';

	$rows = @file(DATDIR.$thread.'.cgi') or
		error(true, '該当するスレッドが見つかりませんでした。');

	list($name, $crypted, $day, $bun, $host, $ipcrypt) = explode("\t", $rows[$num]);
	$ipcrypt = rtrim($ipcrypt);

	$body = <<<EOL
	<dl class=thread><dt>[{$num}] <b>{$name}</b> {$day} {$crypted} [{$host}] <a id=IP>{$ipcrypt}</a></dt><dd>{$bun}</dd></dl>
	<dl>
	<dt><font color=red>この記事を編集・削除します。</font></dt>
	<hr><dd>
	<form method=post action=admin.php?cmd=sakujo4>
	HN：<input type=text name=name value="<small>null</small>"><br>
	TIME：<input type=text name=day value=""><br>
	crypted：<input type=text name=crypted value=""><br>
	メッセージ：<br><textarea name=bun rows=5 cols=70 wrap=off><small>(管理者による削除)</small></textarea><br>
	<input type=radio name=gflg value='1'>元記事を残す&nbsp;&nbsp;&nbsp;&nbsp;
	<input type=radio name=gflg value='0' checked>元記事を残さない<br><br>
	<input type=hidden name=thread value='{$thread}'>
	<input type=hidden name=num value='{$num}'>
	<input type=button value=" 戻る " onclick="history.go(-1)"> <input type=submit value=" ＯＫ "></form>
	</dd>
	</dl>
	<div style="border:1px solid">
	<dl>
	<dt><b>利用可能\なHTML表\記</b>　（xxxは任意の文字列。定型の記号は半角、英字は半角小文字のみ。定型外は変換されません）</dt>
	<dt>&lt;small&gt;xxx&lt;/small&gt;：&lt;em&gt;xxx&lt;/em&gt;：&lt;i&gt;xxx&lt;/i&gt;</dt>
	<dt>&lt;i id=uc&gt;xxx&lt;/i&gt;：&lt;a href="http://xxx"&gt;xxx&lt;/a&gt;：&lt;font color="xxx"&gt;xxx&lt;/font&gt;</dt>
	<dd><br><font color=green>入力例 → 表示例</font><br>
	&lt;small&gt;（管理者による削除）&lt;/small&gt; → <small>（管理者による削除）</small><br>
	&lt;em&gt;*V1FVNqCpls*&lt;/em&gt; → <em>*V1FVNqCpls*</em><br>
	&lt;i&gt;*ADMIN*&lt;/i&gt; → <i>*ADMIN*</i><br>
	&lt;i id=uc&gt;土竜ゆう&lt;/i&gt; → <i id=uc>土竜ゆう</i><br>
	&lt;a href="http://sugoiyo.com/"&gt;スゴイよ一族の里&lt;/a&gt; → <a href="http://sugoiyo.com/" target="_blank">スゴイよ一族の里</a><br>
	&lt;font color="#33eeff"&gt;ファゲ&lt;/font&gt; → <font color="#33ee66">ファゲ</i><br>
	<br>
	<font color=red size=1>※カッコを閉じ忘れるとコンデンサが爆発します。（ﾋﾞﾌ氏談）</font>
	</dl>
	</div>
EOL;

	echo put_body($title, $title2, $box, $body);

}

# 記事の削除4
function sakujo4(){
	$nowtime = time();
	$TTMPFILE = DATDIR.'ttmp';
	$filename = DATDIR.$_ENV['thread'].'.cgi';

	$tmparray = @file($filename) or
		error(true, '該当するスレッドがなぜかみつかりまへん。。。'.$filename);

	for($i = 0; $i < 10; $i++){
		if(!file_exists($TTMPFILE))
			break;
		sleep(2);
	}
	$out = @fopen($TTMPFILE, 'w') or
		error(false, 'not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	if(!empty($_ENV['gflg'])){
		$gfile = $_ENV['thread'].'_'.$_ENV['num'];
		$gfilename = DATDIR.$gfile.'.cgi';
		$_ENV['bun'] .= ' → <a href="thebbs.php?pg'.$gfile.'" target="Po" OnClick="P(\'g'.$gfile.'\',\'\')">元記事</a>';
	}
	$motolog = $tmparray[$_ENV['num']];
	$tmparray[$_ENV['num']] = $_ENV['name']."\t".$_ENV['crypted']."\t".$_ENV['day']."\t".$_ENV['bun']."\t\t\n";
	foreach($tmparray as $value)
		fputs($out, $value);
	fclose($out);
	if(!empty($_ENV['gflg'])){
		$gout = @fopen($gfilename, 'w') or
			error(true, 'gpfileがひひ開けませんよう。。。');
		flock($gout, LOCK_EX);

		fputs($gout, $_ENV['num']."\t".$motolog);
		fclose($gout);
		chmod($gfilename, 0606);
	}

	unlink($filename);
	rename($TTMPFILE, $filename);
	chmod($filename, 0606);

	echo '<script>location.href="admin.php?cmd=sakujo5&obj='.$_ENV['thread'].'.'.$_ENV['num'].'";</script><body>編集・削除が完了しました・・<br><a href="admin.php?cmd=sakujo5&obj='.$_ENV['thread'].'.'.$_ENV['num'].'">○</a>';
}

# 記事の編集・削除5
function sakujo5(){
	$title = '記事の編集・削除';
	$title2 = '編集・削除の完了';
	$box = '記事の編集または削除が完了しました。';
	list($thread, $num) = explode('.', $_ENV['obj']);
	$filename = DATDIR.$thread.'.cgi';

	$rows = @file($filename) or
		error(true, 'このエラーがでたらちょっとやばめ');

	list($name, $crypted, $day, $bun, $host, $ipcrypt) = explode("\t", $rows[$num]);

	$body1 = '<dl><dt>記事は以下のように編集・削除されました</dt></dl>'."\n".'<dl class=thread><dt>['.$num.']<b>'.$name.'</b> '.$day.' '.$crypted.'</dt><dd>'.$bun.'</dd></dl><hr>';
	$body2 =<<<EOL
	<dl>
	<dt>0. <a href="admin.php?cmd=sakujo2&th={$thread}">同スレッドの記事を続けて削除</a></dt>
	<dt>1. <a href="admin.php?cmd=sakujo">記事の削除</a></dt>
	<dt>2. <a href="admin.php?cmd=jokyo">スレッドの除去</a></dt>
	<dt>3. <a href="admin.php?cmd=end">スレッドの終了</a></dt>
	</dl>
EOL;

	echo '<script>thnum='.$thread.';function P(a,b){if(a=="")a=thnum;window.open("thebbs.php?p"+a+"."+b,"Po","width=400,height=350,resizable=1,scrollbars=1,status=1");}</script>'.
		put_body($title, $title2, $box, $body1.$body2);
}

# #################################################
# スレッドの除去
function jokyo(){
	$title = 'スレッドの除去';
	$title2 = 'スレッドの選択';
	$box = '除去したいスレッドを選択してください。';
	$TFILE = DATDIR.'t';
	$EFILE = DATDIR.'e';

	$body = '[現行スレッド]<dl>';
	if($in = @fopen($TFILE, 'r')){
		while($thread = fread($in, 10))
			$body .= '<dt><a href="admin.php?cmd=jokyo2&obj='.$thread.'">[選択]</a> '.fgets($in).'<br>';
		fclose($in);
	}
	$body .= '</dl><hr>[終了済みスレッド]<dl>';
	if($in = @fopen($EFILE, 'r')){
		while($thread = fread($in, 10))
			$body=$body.'<dt><a href="admin.php?cmd=jokyo2&obj=e'.$thread.'">[選択]</a> '.str_replace('<a href="thebbs.php?', '<a href="thebbs.php?e', $fgets($in)).'<br>';
		fclose($in);
	}
	echo put_body($title, $title2, $box, $body);
}

# スレッドの除去2
function jokyo2(){
	$title = 'スレッドの除去';
	$title2 = 'スレッド除去の確認';
	$box = '以下のスレッドを除去します。宜しいですか？';
	$TFILE = DATDIR.'t';
	$filename = DATDIR.$_ENV['obj'].'.cgi';

	if($in = @fopen($filename, 'r'))
		$body= '[除去するスレッド]<dl><dt><a href=thebbs.php?'.$_ENV['obj'].'>'.fgets($in).'</a></dt></dl>';
	else
		$body = '<font color=red>対象のファイル '.$filename.' がOPENできません。</font><br>作業を続行することができますが正しく動作する保証はありません。';


	$body .= <<<EOL
	<form method=post action=admin.php?cmd=jokyo3>
	<input type=hidden name=obj value={$_ENV['obj']}>
	<input type=button value=" 戻る " onclick="history.go(-1)"> <input type=submit value=" ＯＫ "></form>
EOL;

	echo put_body($title, $title2, $box, $body);

}

# スレッドの除去3
function jokyo3(){
	$title = 'スレッドの除去';
	$title2 = 'スレッド除去の完了';
	$box = 'スレッドの除去が完了しました。';
	$TTMPFILE = DATDIR.'ttmp';

	if($_ENV['obj']{0} == 'e'){
		$TEFILE = DATDIR.'e';
		$filename = DATDIR.$_ENV['obj'].'.cgi';
		$_ENV['obj'] = substr($_ENV['obj'], 1, 10);
	}else{
		$filename = DATDIR.$_ENV['obj'].'.cgi';
		$TEFILE = DATDIR.'t';
	}

	for($i = 0; $i < 10; $i++){
		if(!file_exists($TTMPFILE))
			break;
		sleep(2);
	}
	$out = @fopen($TTMPFILE, 'w') or
		error(false, 'not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	$in = @fopen($TEFILE, 'r') or
		error(false, 'not open tfile or efile エラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($in, LOCK_SH);

	if($i == 10)
		error(false, 'なんだか作業を完了できないんですよ ･ﾟ･(ﾉД`)･ﾟ･');

	while($tmpnum = fread($in, 10)){
		$tmpstr = fgets($in);
		if($tmpnum != $_ENV['obj'])
			fputs($out, $tmpnum.$tmpstr);
	}
	fclose($in);
	fclose($out);
	unlink($TEFILE);
	rename($TTMPFILE, $TEFILE);
	chmod($TEFILE, 0606);

	if(!file_exists($filename))
		$message = '[注意]</font> 既に対象ファイル'.$filename.'が存在していませんでした。';
	elseif(!unlink($filename)){
		if(file_exists($filename))
			$message = '<font color=red>[異常終了]</font> 正常にファイルを削除できていません。<br>対象ファイル'.$filename.'をご確認ください。';
	}else
		$message = $filename;

	$body = '<dl><dt>以下のスレッドデータを除去しました。</dt><dd>'.$message.'</dd><dt>以下の元記事を除去しました。<dt><dd>';
	for($i = 0; $i < MAXLINES + 1; $i++){
		if(file_exists(DATDIR.$_ENV['obj'].'_'.$i.'.cgi')){
			unlink(DATDIR.$_ENV['obj'].'_'.$i.'.cgi');
			$tmpstr = DATDIR.$_ENV['obj'].'_'.$i.'.cgi<br>';
		}
	}
	if(empty($tmpstr))
		$body .= $tmpstr;
	else
		$body .= '元記事数0';

	$body .= <<<EOL
	</dd></dl><hr>
	<dl>
	<dt>1. <a href="admin.php?cmd=sakujo">記事の削除</a></dt>
	<dt>2. <a href="admin.php?cmd=jokyo">スレッドの除去</a></dt>
	<dt>3. <a href="admin.php?cmd=end">スレッドの終了</a></dt>
	</dl>
EOL;
	echo put_body($title, $title2, $box, $body);

}


# #################################################
# スレッドの終了
function fin(){
	$title = 'スレッドの終了';
	$title2 = 'スレッドの選択';
	$box = '終了したいスレッドを選択してください。';
	$TFILE = DATDIR.'t';

	$body = '[現行スレッド]<dl>';
	if($in = @fopen($TFILE, 'r')){
		while($thread = fread($in, 10))
			$body .= '<dt><a href="admin.php?cmd=end2&obj='.$thread.'">[選択]</a> '.fgets($in).'<br>';
		fclose($in);
	}
	$body .= '</dl>';
	echo put_body($title, $title2, $box, $body);
}

# スレッドの終了2
function fin2(){
	$title = 'スレッドの終了';
	$title2 = 'スレッド終了の確認';
	$box = '以下のスレッドを除去します。宜しいですか？';
	$filename = DATDIR.$_ENV['obj'].'.cgi';

	$in = @fopen($filename, 'r') or
		error(true, '対象のファイル '.$filename.' がひらけません');
	$body= '[終了するスレッド]<dl><dt><a href=thebbs.php?'.$_ENV['obj'].'>'.fgets($in).'</a></dt></dl>';

	$body .= <<<EOL
	<form method=post action=admin.php?cmd=end3>
	<input type=hidden name=obj value={$_ENV['obj']}>
	<input type=button value=" 戻る " onclick="history.go(-1)"> <input type=submit value=" ＯＫ "></form>
EOL;
	echo put_body($title, $title2, $box, $body);

}

# スレッドの終了
function fin3(){
	$title = 'スレッドの終了';
	$title2 = 'スレッド終了の完了';
	$box = 'スレッドの終了を完了しました。';
	$TFILE = DATDIR.'t';
	$EFILE = DATDIR.'e';
	$TTMPFILE = DATDIR.'ttmp';
	$ETMPFILE = DATDIR.'etmp';
	$filename = DATDIR.$_ENV['obj'].'.cgi';

	for($i = 0; $i < 10; $i++){
		if(!file_exists($TTMPFILE))
			break;
		sleep(2);
	}
	$out = @fopen($TTMPFILE, 'w') or
		error(false, 'not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	$in = @fopen($TFILE, 'r') or
		error(false, 'not open tfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($in, LOCK_SH);

	if($i == 10)
		error(false, 'なんだか作業を完了できないんですよ ･ﾟ･(ﾉД`)･ﾟ･');

	while($tmpnum = fread($in, 10)){
		if($tmpnum != $_ENV['obj'])
			fputs($out, $tmpnum.fgets($in));
		else
			$endstr = fgets($in);
	}

	$endout = @fopen($ETMPFILE, 'w') or
		error(false, 'not open etmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($endout, LOCK_EX);

	$endin = @fopen($EFILE, 'r') or
		!file_exists($EFILE) or
			error(false, 'not open efileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	if($endin)
		flock($endin, LOCK_SH);

	if(!empty($endstr))
		fputs($endout, $_ENV['obj'].$endstr);
	if($endin){
		while($tmpnum = fread($endin, 10))
			fputs($endout, $tmpnum.fgets($endin));
		fclose($endin);
		unlink($EFILE);
	}
	fclose($endout);
	rename($ETMPFILE, $EFILE);
	chmod($EFILE, 0606);
	rename(DATDIR.$_ENV['obj'].'.cgi', DATDIR.'e'.$_ENV['obj'].'.cgi');

	fclose($in);
	fclose($out);
	unlink($TFILE);
	rename($TTMPFILE, $TFILE);
	chmod($TFILE, 0606);

	$in = @fopen(DATDIR."e".$_ENV['obj'].'.cgi', 'r');
	$body = '<dl><dt>以下のように終了スレッドとなりました。</dt><dd><a href="thebbs.php?e'.$_ENV['obj'].'">'.fgets($in).'</a></dd></dl>';
	echo put_body($title, $title2, $box, $body);

}

# URLが不正
function put_emptypg(){
	echo put_body('管理者画面', 'URLの誤り', '無効なURLです。');
}

# #################################################
# 管理者スレッド終了・除去ページ

# (login,jokyo)
function put_selectpg($flg1, $flg2){
	$title = 'スレッドの終了・除去';
	$title2 = '管理者用 スレッド除去・終了画面';
	$box = '掲示板の管理者専用の画面です。<br>一般のユーザーは利用できません。';
	$filename = DATDIR.$_ENV['obj'].'.cgi';


	$in = @fopen($filename, 'r') or
		error(false, 'スレッドがみあたりません！・・のですが、hogehoge');
	$body = '<dl><dt>以下のスレッドを処理します。宜しいですか？</dt><dt><a href=thebbs.php?'.$_ENV['obj'].'>'.fgets($in).'</a></dt>';

	if($flg1){
		$tmpstr3 = '<form method=get action=admin.php>';
		$tmpstr = '<input type=submit value=" OK "><br>';
	}else{
		$tmpstr3 = '<small>※この操作はJavaScriptが有効でないと正常に動作しない場合があります。<br><br ></small><form name=select method=post action=admin.php?login>';
		$tmpstr = 'PASSWORD ： <input type=password name=adpwd> <input type=submit value="admin login"><br>';
	}

	if(!$flg2 && $flg1)
		$tmpstr2 = '<input type=radio name=cmd  value="end2" checked>スレッドを終了する<br><input type=radio name=cmd  value="jokyo2">スレッドを除去する<br>';
	elseif(!$flg2 && !$flg1)
		$tmpstr2 = '<input type=radio name=will OnClick="changehidden(\'end2\')" checked>スレッドを終了する<br><input type=radio name=will OnClick="changehidden(\'jokyo2\')">スレッドを除去する<br><input type=hidden name=cmd value="end2">';
	else
		$tmpstr2 = '<input type=radio name=cmd value=jokyo2 checked>スレッドを除去する<br>';

	$body .= <<<EOL
	<dd><br>
	{$tmpstr3}
	{$tmpstr2}<br>
	<input type=hidden name=obj value={$_ENV['obj']}>
	{$tmpstr}
	</dd>
	</dl>
EOL;

	if(!$flg1)
		put_header();
	echo '<script>var C;function changehidden(C){document.select.cmd.value=C;};</script>'.
		put_body($title, $title2, $box, $body);
}

# #################################################
# 投稿者モードONの場合のページ

function put_onpg(){
	$title = '投稿者記事削除モード';
	$title2 = '投稿者記事削除モード';
	$box = 'crypt-keyが入力されている記事は投稿者自身で削除できます。';
	$erflg = false;

	put_header();
	list($thread, $num) = explode('.', $_ENV['obj']);
	$filename = DATDIR.$thread.'.cgi';

	if($log = @file($filename)){
		list($name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $log[$num]);
		if($crypted)
			$body = '<dl><dt>以下の投稿を削除します。投稿時のcrypt-keyを入力してください。</dt></dl>';
		else{
			$body = '<dl><dt>crypt-keyが設定されていないようです。削除ができるのは管理者のみになります。</dt></dl>';
			$erflg = true;
		}

		$body .= '<dl class=thread><dt>['.$num.']<b>'.$name.'</b> '.$day.' </dt>'.$crypted.'<a id=IP>'.$ipcrypt.'</a><dd>'.$bun.'</dd></dt></dl>';
	}else
		$body = '該当するスレッドが見つかりませんでした。';

	if(!$erflg){
	$body .= <<<EOL
	<dl><dd>
	この記事を削除します。投稿した際のcrypt-keyを入力してください。<br>
	<noscript>JavaScriptが有効でないと機能しません。</noscript>
	<br>
	<form method=post action="admin.php?cmd=sakujo4" name=sakujo>
	<input type=hidden name=obj value="{$thread}.{$num}">
	crypt-key：<input type=password size=20 name=crypt-key>&nbsp;
	<input type=button OnClick="S()" value=" 削除 ">
	</form>
	</dd></dl>
EOL;
	}

	$body .= <<<EOL
	<br><span class=cp>
	<form method=post action=admin.php?login>
	<input type=hidden name=cmd value={$_ENV['cmd']}>
	<input type=hidden name=obj value="{$thread}.{$num}">
	PASSWORD：<input type=password size=10 name=adpwd value="">&nbsp;
	<input type=submit value=" admin login">
	</form>
	</span>
EOL;
	echo '<script>function S(){if(confirm("本当に削除しますか？")){sakujo.submit();}}</script>'.
		put_body($title, $title2, $box, $body);

}

# 投稿者記事削除
function user_sakujo4(){
	$nowtime = time();
	$tmpcrypted = '<em>*'.substr(crypt($_ENV['crypt-key'], 'ID'), 2, 10).'*</em>';
	list($thread, $num) = explode('.', $_ENV['obj']);
	$filename = DATDIR.$thread.'.cgi';
	$TTMPFILE = DATDIR.'ttmp';

	echo '<title>記事削除</title>';
	$tmparray = @file($filename) or
		error(0, '該当するスレッドが見つかりませんでした。');

	list($name, $crypted, $day, $bun, $IP, $ipcrypt) = explode("\t", $tmparray[$num]);
	if(strlen($_ENV['crypt-key']) < 1)
		error(0, 'crypt-keyを入力してください。');
	if($crypted != $tmpcrypted)
		error(0, 'crypt-keyが違います。入力をお確かめになさってネ。');

	for($i = 0; $i < 10; $i++){
		if(!file_exists($TTMPFILE))
			break;
		sleep(2);
	}
	$out = @fopen($TTMPFILE, 'w') or
		error(0, 'not open ttmpfileエラー ･ﾟ･(ﾉД`)･ﾟ･');
	flock($out, LOCK_EX);

	$ipcrypt = rtrim($ipcrypt);
	$tmparray[$num] = "$name\t$crypted\t$day\t<small>（投稿者自身により記事が削除されました）</small>\t$IP\t$ipcrypt\n";
	foreach($tmparray as $value) fputs($out, $value);
	fclose($out);

	unlink($filename);
	rename($TTMPFILE, $filename);
	chmod($filename, 0606);

	echo '<script>location.href="thebbs.php?'.$thread.'.'.$num.'";</script><body>削除が完了しました・・<br><a href="thebbs.php?'.$thread.'.'.$num.'">○</a>';
}


# #################################################
# 投稿者モードOFFの場合のページ
function put_offpg(){
	$title =  '投稿記事の削除';
	$title2 = '投稿記事の削除';
	$box = '投稿者削除モードはOFF設定になっています。<br>記事の削除が出来るのは管理者に限定されています。';
	put_header();

	$body = <<<EOL
	<br><span class=cp>
	<form method=post action=admin.php?login>
	<input type=hidden name=cmd value={$_ENV['cmd']}>
	<input type=hidden name=obj value={$_ENV['obj']}>
	PASSWORD：<input type=password size=10 name=adpwd value="">&nbsp;
	<input type=submit value=" admin login">
	</form>
	</span>
EOL;

	echo put_body($title, $title2, $box, $body);
}

# #################################################
# 単純デコード
function decode($flg){
	$_ENV = $flg ? $_POST : $_GET;
}

# POSTデータのデコード
function form_decode(){
	foreach($_POST as $key => $value){
		$value = str_replace('&amp;', '&', htmlspecialchars($value, ENT_NOQUOTES));
		$value = str_replace("\t", '    ', $value);
		$value = str_replace("\r", '', $value);
		$value = str_replace("\0", '', $value);
		if($key == 'bun'){
			if(strlen($value) > 3500) error(true, 'もうちょっと本文を短めにお願いいたしますですよ。');
			$value = str_replace("\n", '<br>', $value);
			$value = html_decode($value);
			$value = preg_replace('/&gt;&gt;([\d\-]+)/', '<a href="JavaScript:P(\'\',\'$1\')">&gt;&gt;$1</a>', $value);
		}elseif($key == 'name' || $key == 'day' || $key == 'crypted'){
			if(strlen($value) > 100) error(true, 'もうちょっと'.$key.'を短めにお願いいたしますですよ。');
			$value = str_replace("\n", ' ', $value);
			$value = html_decode($value);
		}
		$_ENV[$key] = rtrim($value);
	}
}

# html要素の変換
function html_decode($tmpstr){
	global $HTMLPERMIT;

	# まず、配列変数に格納された、html要素を変換
	foreach($HTMLPERMIT as $value)
		$tmpstr = preg_replace('/&lt;'.$value.'&gt;((?:(?!&lt;\/?PaiN&gt;).)*?)&lt;\/'.$value.'&gt;/i', '<'.$value.'>$1</'.$value.'>', $tmpstr);

	# <a></a>タグをリンクに変換。但し、PaiNタグ内のhttp://は変換しないようにする。
	$tmpstr = preg_replace('/&lt;a href="((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)"&gt;((?:(?!&lt;\/?PaiN&gt;).)*?)&lt;\/a&gt;/i', '<a href="$1" target="_blank">$2</a>', $tmpstr);
	while(preg_match('/&lt;PaiN&gt;((?:.*)?)<a href="((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">((?:.*)?)<\/a>((?:.*)?)&lt;\/PaiN&gt;/i', $tmpstr))
		$tmpstr = preg_replace('/&lt;PaiN&gt;((?:.*)?)<a href="((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">((?:.*)?)<\/a>((?:.*)?)&lt;\/PaiN&gt;/i', '&lt;PaiN&gt;$1&lt;a href="$2"&gt;$3&lt;/a&gt;$4&lt;/PaiN&gt;', $tmpstr);

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
	$tmpstr = preg_replace('/(?!((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)" target="_blank">)((?:https?|shttp|ftp):\/\/(?:(?:[-_.!~*\'()a-zA-Z0-9;:&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*@)?(?:(?:[a-zA-Z0-9](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.)*[a-zA-Z](?:[-a-zA-Z0-9]*[a-zA-Z0-9])?\.?|[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)(?::[0-9]*)?(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*(?:\/(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*(?:;(?:[-_.!~*\'()a-zA-Z0-9:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)*)*)?(?:\?(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?(?:#(?:[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,]|%[0-9A-Fa-f][0-9A-Fa-f])*)?)/i', '<a href="$2" target="_blank">$2</a>', $tmpstr);

	return $tmpstr;
}



?>