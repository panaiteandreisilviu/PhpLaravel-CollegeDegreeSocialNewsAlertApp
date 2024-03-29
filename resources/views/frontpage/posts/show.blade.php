@extends('layouts.top-nav.default')
@section('content')
    {{--<div class="callout callout-info">--}}
        {{--<h4>Tip!</h4>--}}

        {{--<p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a--}}
            {{--sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular--}}
            {{--links instead.</p>--}}
    {{--</div>--}}
    {{--<div class="callout callout-danger">--}}
        {{--<h4>Warning!</h4>--}}

        {{--<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar--}}
            {{--and the content will slightly differ than that of the normal layout.</p>--}}
    {{--</div>--}}


    <div class="col-sm-8 col-xs-12">
            <div class="box box-widget {{--collapsed-box--}}">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{$post->user()->picture_url}}" onerror="this.src='/storage/avatars/default'" alt="User Image">
                        <span class="username"><a href="/profile/{{$post->user()->id}}">{{$post->user()->name}}</a> <span class="hidden-xs hidden-sm" style="font-size:16px; color:#6e6e6e"> - {{$post->title}}</span></span>
                        <span class="description">{{$post->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        {{--<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">--}}
                            {{--<i class="fa fa-circle-o"></i></button>--}}
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <h4 class="hidden-md hidden-lg">{{$post->title}}</h4>
                    {!!$post->body !!}

                    <img src="/storage/post_images/{{$post->image_path}}" onerror="" class="img-responsive pad" alt="">

                    <!-- Attachment -->
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    {{--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>--}}
                </div>
                <!-- /.box-body -->
                {{--<div class="box-footer box-comments">--}}
                    {{--<div class="box-comment">--}}
                        {{--<!-- User image -->--}}
                        {{--<img class="img-circle img-sm" src="AdminLTE-2.3.11/dist/img/user3-128x128.jpg" alt="User Image">--}}

                        {{--<div class="comment-text">--}}
                      {{--<span class="username">--}}
                        {{--Maria Gonzales--}}
                        {{--<span class="text-muted pull-right">8:03 PM Today</span>--}}
                      {{--</span><!-- /.username -->--}}
                            {{--It is a long established fact that a reader will be distracted--}}
                            {{--by the readable content of a page when looking at its layout.--}}
                        {{--</div>--}}
                        {{--<!-- /.comment-text -->--}}
                    {{--</div>--}}
                    {{--<!-- /.box-comment -->--}}
                    {{--<div class="box-comment">--}}
                        {{--<!-- User image -->--}}
                        {{--<img class="img-circle img-sm" src="AdminLTE-2.3.11/dist/img/user5-128x128.jpg" alt="User Image">--}}

                        {{--<div class="comment-text">--}}
                      {{--<span class="username">--}}
                        {{--Nora Havisham--}}
                        {{--<span class="text-muted pull-right">8:03 PM Today</span>--}}
                      {{--</span><!-- /.username -->--}}
                            {{--The point of using Lorem Ipsum is that it has a more-or-less--}}
                            {{--normal distribution of letters, as opposed to using--}}
                            {{--'Content here, content here', making it look like readable English.--}}
                        {{--</div>--}}
                        {{--<!-- /.comment-text -->--}}
                    {{--</div>--}}
                    {{--<!-- /.box-comment -->--}}
                {{--</div>--}}

                <!-- /.box-footer -->
                @if(Auth::check())
                @endif


                {{--<div class="box-footer">--}}
                    {{--<form action="#" method="post">--}}
                        {{--<img class="img-responsive img-circle img-sm" src="/storage/avatars/{{Auth::user()->id}}" onerror="this.src='/storage/avatars/default'" alt="Alt Text">--}}
                        {{--<div class="img-push">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Press enter to post comment">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}


                <!-- /.box-footer -->
            </div>
    </div>

    <div class="col-sm-4 hidden-xs">
        @include('layouts.top-nav.post_sidebar')
    </div>

@endsection