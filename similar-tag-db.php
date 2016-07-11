<?php

class similar_tag_db
{
	public function get_similar_tags($wordid, $cnt)
	{
		$sql = "SELECT wordid
FROM ^posttags
WHERE postid in (
SELECT postid FROM ^posttags WHERE wordid = #
)
AND wordid != #
GROUP BY wordid
ORDER BY count(wordid) DESC
LIMIT #";

		$result = qa_db_query_sub($sql, $wordid, $wordid, $cnt);
		return $result;
	}
}
