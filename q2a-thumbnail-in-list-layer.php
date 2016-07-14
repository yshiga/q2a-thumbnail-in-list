<?php

class qa_html_theme_layer extends qa_html_theme_base
{
	public function head_css()
	{
		qa_html_theme_base::head_css();
		$css = "
/* 質問リストのサムネイル */
.qa-q-item-thmub {
  margin: 0 0 0 10px;
  width:120px;
  height:90px;
  overflow:hidden;
  position:relative;
  float: left;
}
.qa-q-item-thmub img {
  max-width:140%;
  min-width:100%;
  width:auto;
  min-height:100%;
  max-height:140%;
  height:auto;
  position:absolute;
  top:-40%;
  right:-40%;
  bottom:-40%;
  left:-40%;
  margin:auto;
}
";
		$this->output('<style>', $css, '</style>');
	}

	public function q_list_item($q_item)
	{
		$this->output('<div class="qa-q-list-item'.rtrim(' '.@$q_item['classes']).'" '.@$q_item['tags'].'>');

		$this->q_item_stats($q_item);
		$this->q_item_thumbnail($q_item);
		$this->q_item_main($q_item);
		$this->q_item_clear();

		$this->output('</div> <!-- END qa-q-list-item -->', '');
	}

	function q_item_thumbnail($q_item)
	{
		$thumbnail = $this->get_thumbnail($q_item['raw']['postid']);
		if (!empty($thumbnail)) {
			$this->output(
				'<div class="qa-q-item-thmub">',
				'<img '. $thumbnail. ' width="120" height="90" />',
				'</div>'
			);
		}
	}

	function get_thumbnail($postid)
	{
		$post = qa_db_single_select(qa_db_full_post_selectspec(null, $postid));
		preg_match("/<img(.+?)>/", $post['content'], $matches);
		return $matches[1];
	}
}
