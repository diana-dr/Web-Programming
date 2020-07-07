<?php
require_once 'db.php';

$html = '<tr>';
$html .= '<td class="small">authorString</td>';
$html .= '<td class="small">titleString</td>';
$html .= '<td class="small">commentString</td>';
$html .= '<td class="small">dateString</td>';
$html .= '</tr>';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $conn->real_escape_string($search_string);

if (strlen($search_string) >= 1 && $search_string !== ' ') {
	$time = "UPDATE query_data SET timestamp=now() WHERE author='" .$search_string. "'";
	$query_count = "UPDATE query_data SET querycount = querycount + 1 WHERE author='" .$search_string. "'";
	$query = 'SELECT * FROM guestbook WHERE CONCAT(title, author) LIKE "%'.$search_string.'%"';

	$time_entry = $conn->query($time);
	$query_count = $conn->query($query_count);
	$result = $conn->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}
	
	if (isset($result_array)) {
		foreach ($result_array as $result) {

		 $d_author = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['author']);
		 $d_title = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['title']);
		 $d_comm = $result['comment'];
		 $d_date = $result['date'];

		$o = str_replace('authorString', $d_author, $html);
		$o = str_replace('titleString', $d_title, $o);
		$o = str_replace('commentString', $d_comm, $o);
		$o = str_replace('dateString', $d_date, $o);

		echo($o);
			}
		}else{

		$o = str_replace('authorString', '<span class="label label-danger">No Names Found</span>', $html);
		$o = str_replace('titleString', '', $o);
		$o = str_replace('commentString', '', $o);
		$o = str_replace('dateString', '', $o);
		echo($o);
	}
}
?>
