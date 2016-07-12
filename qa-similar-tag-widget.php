<?php

/*
	Question2Answer Plugin: Similar Tag Widget
*/
require_once QA_PLUGIN_DIR.'q2a-similar-tag-widget/similar-tag-db.php';

class qa_similar_tag_widget {

	function allow_template($template)
	{
		return ($template === 'tag');
	}

	function allow_region($region)
	{
		return true;
	}

	function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		$requests = explode('/', $request);
		$tag = $requests[1];
		$stdb = new similar_tag_db();
		$tags = qa_tagstring_to_tags($stdb->get_similar_tag_words($tag));

		$themeobject->output('<div class="qa-q-item-tags"><h4>','関連タグ','</h4>');
		$themeobject->output('<ul class="qa-q-item-tag-list">');
		foreach ($tags as $tag) {
			$themeobject->output('<li class="qa-q-item-tag-item">', $this->add_link($tag), '</li>');
		}
		$themeobject->output('</ul>');
		$themeobject->output('</div>');
		$themeobject->output('<div class="qa-q-item-clear"></div>');
	}

	function add_link($tag) {
		return '<a href="' . qa_path_html('tag/'.$tag) .
				'" class="qa-tag-link">' .
				 qa_html($tag) . '</a>';
	}
}
/*
	Omit PHP closing tag to help avoid accidental output
*/
