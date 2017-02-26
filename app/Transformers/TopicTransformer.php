<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
// use App\Transformers\UserTransformer;
use App\Topic;

class TopicTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user'];

	public function transform(Topic $topic)
	{
		return [
			'id'	=>	$topic->id,
			'title'	=>	$topic->title,
			'created_at_human'	=>	$topic->created_at->diffForHumans(),
		];		
	}

	public function includeUser(Topic $topic)
	{
		return $this->item($topic->user, new UserTransformer);
	}
}