<?php
	function filter($feed,$keywords) {
		global $db;

		if ($feed == "*")
		{
			$items = $db->get_results("
				SELECT fever_items.id, fever_items.feed_id, fever_feeds.title as feed_title, fever_items.title, fever_items.description, fever_items.added_on_time
				FROM fever_items
				LEFT OUTER JOIN fever_feeds ON fever_feeds.id = fever_items.feed_id
				WHERE fever_items.read_on_time = '0';
			");
		}
		else
		{
			$items = $db->get_results("
				SELECT fever_items.id, fever_items.feed_id, fever_feeds.title as feed_title, fever_items.title, fever_items.description, fever_items.added_on_time
				FROM fever_items
				LEFT OUTER JOIN fever_feeds ON fever_feeds.id = fever_items.feed_id
				WHERE fever_items.read_on_time = '0' AND fever_feeds.title = '$feed';
			");
		}

		if (count($items) > 0)
		{
			foreach ($items as $item)
			{
				foreach ($keywords as $keyword)
				{
					if (is_int(strpos(strtolower($item->title), strtolower($keyword))))
					{
						$itemID = $item->id;
						$itemTitle = $item->title;
						$result = $db->get_results("
							UPDATE fever_items
							SET fever_items.read_on_time = fever_items.added_on_time
							WHERE fever_items.id = '$itemID';
						");
					}
				}
			}
		}

	}

	function authormute($feed,$authors) {
		global $db;

		$items = $db->get_results("
			SELECT fever_items.id, fever_items.feed_id, fever_items.author, fever_items.added_on_time
			FROM fever_items
			LEFT OUTER JOIN fever_feeds ON fever_feeds.id = fever_items.feed_id
			WHERE fever_items.read_on_time = '0' AND fever_feeds.title = '$feed';
			");
			if (count($items) > 0)
			{
				foreach ($items as $item)
				{
					$itemID = $item->id;
					foreach ($authors as $author)
					{
						if (is_int(strpos(strtolower($item->author), strtolower($author))))
						{
    						$result = $db->get_results("
    							UPDATE fever_items
    							SET fever_items.read_on_time = fever_items.added_on_time
    							WHERE fever_items.id = '$itemID';
    						");
							break 1;
						}
					}
				}
			}
	}
?>