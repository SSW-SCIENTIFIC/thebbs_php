<?php

# 初期設定

# 本スクリプトを直接読み込んでいる場合は、thebbs.phpを読み込む

if(empty($DIRECT)){
	$DIRECT = false;
	require('thebbs.php');
}

m_main();

function m_main(){
	m_put_header();
	if($_SERVER['QUERY_STRING'] == '')
		m_put_index(30);
	elseif($_SERVER['QUERY_STRING'] == 'all')
		m_put_index(MAXTHREADS);
	elseif($_SERVER['QUERY_STRING'] == 'add')
		m_put_addform();
	else{
		$tmp = !empty($_POST['X']);

		form_decode();
		if($tmp && $_POST['X'] == 'w')
			thread_write();
		elseif($tmp && $_POST['X'] == 'a')
			thread_add();
		else
			m_thread_view();
	}
	m_put_footer();
}



function m_put_index($lines){
	$num = 1;
	$tfile = DATDIR.'t';

	echo '<title>'.OMAK.MOBBBSTITLE.'</title><body>';
	if(MOBLINK)
		echo '<small>'.MOBLINK.'</small><br>';
	echo '<font color=red>'.MOBBBSTITLE.'</font><br>';
	if(SUBTITLE != '')
		echo '<font color="darkblue"><small>'.MOBSUBTITLE.'</small></font>';
	echo '<dl>';
	if($in = @fopen($tfile, 'r')){
		while($tmpint = fread($in, 10)){
			echo '<dt>'.$num.'.'.fgets($in);
			if(++$num > $lines)
				break;
		}
		fclose($in);
	}
	echo '</dl>';
	if($num > $lines)
		echo '<small><a href="thebbs.php?all">[全て表示]</a></small>';
	echo '<hr><small><a href="thebbs.php?add">新規スレッド作成</a></small>';
	exit;
}

function m_put_header(){
	echo '<meta http-equiv="content-type" content="text/html; charset=shift_jis"><meta http-equiv="pragma" content="no-cache"><html>';
}

function m_put_footer(){
	echo '<br><small><a href="http://sugoiyo.com/">'.MOBSCNAME.'</a><br><a href="http://prog.s-sword.net/">'.MOBSCNAME2.'</a></small>';
	exit;
}

function m_error($msg){
	print $msg.'<br><br>ブラウザの戻るで戻ってください';
	m_put_footer();
}

function m_put_addform(){
	$OMAK = OMAK;
	$MOBLINK = MOBLINK;
	$MOBLINK2 = MOBLINK2;
	$MOBBBSTITLE = MOBBBSTITLE;

	echo <<<EOL
	<title>{$OMAK}スレッド作成</title>
	<body>
	<small>{$MOBLINK}{$MOBLINK2}<a href="thebbs.php">{$MOBBBSTITLE}</a></small><br><br>
	<font color="red">新規スレッド作成</font><br>
	<form action="thebbs.php?www" method="post">タイトル：<br>
	<input type="text" name="title"><br>
	お名前：<br><input type="text" name="name"><br>
	crypt-key：<br><input type="password" name="crypt-key"><br><br>
	本文：<br>
	<textarea name="bun" rows="3"></textarea>
	<input type="hidden" name="X" value="a"><br><br>
	<input type="submit" value="作成"></form>
EOL;
	m_put_footer();
}


function m_thread_view(){
	if(($com = strpos($_SERVER['QUERY_STRING'], '.')) === false)
		$thread_num = $_SERVER['QUERY_STRING'];
	else
		list($thread_num, $com) = explode('.', $_SERVER['QUERY_STRING']);							# スレッド番号,コマンド
	$startline = 1;
	$gflg = $pflg = false;


	$logfile = DATDIR.$thread_num.'.cgi';
	if(!($logrow = @file($logfile)) && substr($thread_num, 0, 2) != 'pg')
		error('スレッドがないんですよ |;´Д`|');
	elseif(substr($thread_num, 0, 2) == 'pg')
		 put_gp();
	elseif(strpos($thread_num, '_') !== false)
		error('不正な処理なんですよ |;´Д`|<br><br>feedback from 侍刀');
	$title = $logrow[0];
	$lastnum = $logrow[count($logrow) - 1];
	echo '<title>'.OMAK.$title.'</title>';

	# ここからのif文で 1-100-200- とか表示の設定。

	echo '<body><small>';
	if(defined(HOGEHOGE) && HOGEHOGE)
		echo '<a href="'.HOGEHOGE.'">menu</a> ';

	echo MOBLINK.MOBLINK2.'<a href=thebbs.php>'.MOBBBSTITLE.'</a></small><br><big><b><u>'.$title.'</u></b></big><br>';
	if($lastnum > 10)
		for($i = 1; $i < $lastnum; $i += 100)
			printf(' <small><a href=thebbs.php?%d.%d-%d>%d-</a></small>', $thread_num, $i, $i + 9, $i);

	$endline = $lastnum;

	# 最初の表示件数をココデ調節

	if(empty($com)){
		if($lastnum > 11)
			$startline = $lastnum - 9;
	}elseif($com != 'all'){
		if(preg_match('/^e(\d+)$/', $com, $tmp))
			$startline = $lastnum - $tmp[1] + 1;
		elseif(preg_match('/^(\d*)-(\d*)$/', $com, $tmp)){
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

	if($startline > 1){
		list($name, $ID, $day, $bun) = explode("\t", $logrow[1]);
		echo '<dl><dt><small>[1]</small><b>'.$name.'</b> <small>'.$day.' </dt>'.$ID.'</small><dd>'.$bun.'</dd></dl><hr>';
	}
	echo '<dl>';
	for($i = $startline; $i <= $endline; $i++){
		list($name, $ID, $day, $bun) = explode("\t", $logrow[$i]);
		echo '<dt><small>['.intval($i).']</small><b>'.$name.'</b> <small>'.$day.' </dt>'.$ID.'</small><dd>'.$bun.'</dd>';
	}

	echo '</dl>';

	if($endline < $lastnum)
		printf('<p align=center><small><a href=thebbs.php?%d.%d-%d>前10</a></small>　<small><a href=thebbs.php?%d.%d-%d>次10</a></small></p>', $thread_num, $endline - 19, $endline - 10, $thread_num, $endline + 1, $endline + 10);
	elseif($lastnum < MAXLINES)
		printf('<p align=center><small><a href=thebbs.php?%d.%d-%d>前10</a></small>　<small><a href=thebbs.php?%d.%d->最新</a></small></p>', $thread_num, $endline - 19, $endline - 10, $thread_num, $endline);

	if($lastnum < MAXLINES)
		echo '<hr><form action="thebbs.php?www" method="post">名前：<br><input type="text" name="name"><br>crypt-key：<br><input type="password" name="crypt-key"><br>本文：<br><textarea name="bun" rows="3"></textarea><br><input type="submit" value="write">　age<input type="checkbox" name="age" value="1" checked><input type="hidden" name="no" value="'.$thread_num.'"><input type=hidden name="X" value="w"></form>';
	else
		echo '<p align=center>[THE終了]</p><hr><small><font color="red">このスレッドは終了しています<br>もはや書き込むこともママナラズ</small></font>';
}

function put_gp(){
	if(($com = strpos($_SERVER['QUERY_STRING'], '.')) === false)
		$thread_num = $_SERVER['QUERY_STRING'];
	else
		list($thread_num, $com) = explode('.', $_SERVER['QUERY_STRING']);							# スレッド番号,コマンド

	$logfile = DATDIR.substr($thread_num, 2).'.cgi';
	$fp = @fopen($logfile, 'r') or
		error('スレッドがないんですよ |;´Д`|');
	$log = fgets($fp);
	echo '<title>'.OMAK.'元記事</title><style>body{margin:0;font-size:90%;}</style>';
	list($num, $name, $crypted, $day, $bun, $dummy, $ipcrypt) = explode("\t", $log);
	echo '<body><font color="red">（削除済み投稿記事）</font><dl class=thread><dt>['.$num.']</a><b>'.$name.'</b> '.$day.' </dt>'.$crypted.' <a id=IP>'.$ipcrypt.'</a><dd>'.$bun.'</dd></dl>';

	fclose($fp);
	exit;
}
?>