<?php
namespace Ksolves\News\Api;

interface AllnewsRepositoryInterface
{
	public function save(\Ksolves\News\Api\Data\AllnewsInterface $news);

    public function getById($newsId);

    public function delete(\Ksolves\News\Api\Data\AllnewsInterface $news);

    public function deleteById($newsId);
}
?>
