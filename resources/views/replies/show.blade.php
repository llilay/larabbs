@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Reply / Show #{{ $reply->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('replies.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('replies.edit', $reply->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Topic_id</label>
<p>
	{{ $reply->topic_id }}
</p> <label>User_id</label>
<p>
	{{ $reply->user_id }}
</p> <label>Content</label>
<p>
	{{ $reply->content }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
