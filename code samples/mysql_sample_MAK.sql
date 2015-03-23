SELECT a.id as "Post ID", REPLACE(a.post_title,'\\r\\n','') as "Title", category.IDs as "Nav Category", a.guid as "Post URL", wc.Character_count, CONCAT("http://****REDACTED****",images.meta_value) as "Image URL", post_count.Views, a.post_modified as "Last Updated"
FROM wp_posts AS a
LEFT JOIN (SELECT a.ID, a.post_status, CHAR_LENGTH(a.post_content) AS 'Character_count'
FROM wp_posts as a
GROUP BY a.ID
HAVING a.post_status = 'publish'
ORDER BY post_date DESC) as wc
ON wc.ID = a.id
LEFT JOIN (SELECT p1.ID, wm2.meta_value FROM wp_posts p1 LEFT JOIN
wp_postmeta wm1 ON (
wm1.post_id = p1.id
AND wm1.meta_value IS NOT NULL
AND wm1.meta_key = "_thumbnail_id")
LEFT JOIN wp_postmeta wm2 ON (wm1.meta_value = wm2.post_id AND wm2.meta_key = "_wp_attached_file"
AND wm2.meta_value IS NOT NULL)
WHERE p1.post_status="publish"
AND p1.post_type="post"
AND wm2.meta_value IS NOT NULL
ORDER BY p1.post_date DESC) as images
ON images.ID = a.id
LEFT JOIN (SELECT a.object_id, GROUP_CONCAT(b.name) as IDs
FROM wp_term_relationships as a
LEFT JOIN wp_terms as b
ON b.term_id = a.term_taxonomy_id
GROUP BY a.object_id) as category
ON category.object_id = a.ID
LEFT JOIN (SELECT b.post_id, SUM(b.count) as "Views"
FROM wp_poststats as b
GROUP BY b.post_id DESC) as post_count
ON post_count.post_id = a.id
WHERE a.post_status = 'publish'
AND a.post_type = 'post'
ORDER BY 1;}