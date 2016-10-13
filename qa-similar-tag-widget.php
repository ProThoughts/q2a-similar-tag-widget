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
		$tagstring = $stdb->get_similar_tag_words($tag);
		if(!empty($tagstring)) {
			$tags = qa_tagstring_to_tags($tagstring);

			$tpl = new Template();
			$tpl->tags = $tags;
			$themeobject->output($tpl->show());
		}
	}
}

/**
 * my template engine
 */
class Template {
	function show() {
		$tpl = $this;
		include(QA_PLUGIN_DIR.'q2a-similar-tag-widget/template.html');
	}
}


/*
	Omit PHP closing tag to help avoid accidental output
*/
