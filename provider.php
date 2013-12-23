<?php
	define("HOSTNAME", "localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DBNAME", "distajax");

	define("UNSOLVED", 0);
	define("SOLVED", 1);
	define("INPROGRESS", 2);

	if($GLOBALS['link'] == null){
		$GLOBALS[ 'link' ] = mysql_connect(HOSTNAME, USERNAME, PASSWORD);
		mysql_select_db( DBNAME );
	}

	if( $GLOBALS['link'] ){
		$sql = "update sums set c=" . $_GET['result'] . ", status=" . SOLVED . " where id=" . $_GET['task_id'] . " and status=" . INPROGRESS . ";";
		$result = mysql_query($sql, $GLOBALS['link']);

		$sql = "insert into sums (id, status, a, b, c) values (0, " . UNSOLVED . ", " . rand()%100 . ", " . rand()%100 . ", 0);";
		$result = mysql_query($sql, $GLOBALS['link']);

		$sql = "select * from sums where status=" . UNSOLVED . " limit 1;";
		$result = mysql_query($sql, $GLOBALS['link']);

		if(result != false){
			$row = mysql_fetch_row( $result );
			echo( $row[0] );
			echo( " " ) ;
			echo( $row[2] );
			echo( " " ) ;
			echo( $row[3] );

			$sql = "update sums set status=" . INPROGRESS . " where id=" . $row[0] . ";";
			$result = mysql_query($sql, $GLOBALS['link']);
		}
	}
?>
