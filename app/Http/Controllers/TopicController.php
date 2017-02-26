<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Transformers\TopicTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
    	$topics = Topic::latestFirst()->paginate(7);
    	$topicsCollection = $topics->getCollection();
    	
    	return fractal()
    		->collection($topicsCollection)
    		->parseIncludes(['user'])
    		->transformWith(new TopicTransformer)
    		->paginateWith(new IlluminatePaginatorAdapter($topics))
    		->toArray();
    }
}
