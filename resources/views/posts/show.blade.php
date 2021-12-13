@extends('layouts.app')
@section('title','Post')
@section('content')

    <div class="post-box" id="post"> 
        <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a>
        <br><a class="timestamp" href ="{{route('posts.show', ['id'=> $post->id])}}">Posted at {{$post->created_at}} </a>
        <br><a class="posttext">{{$post->text}}</a>
        @if($post->file_path)
            <br><img style="max-width:50%;"src="/storage/{{$post->file_path}}"></img>
        @endif
        @if(Auth::check())
            @if(Auth::id()==$post->user->id || Auth::user()->is_admin)
                <form class="editbtn" method="GET" action="{{route('posts.edit', ['id'=>$post->id])}}"> 
                    @csrf
                    <input type ="submit" value="Edit">
                </form>
                <form class="delbtn" method="POST" action="{{route('posts.destroy', ['id' => $post->id])}}">
                    @csrf
                    @method('DELETE')
                    <input type ="submit" value="Delete">
                </form>
            @endif
        @endif
        <div class="comment-box" v-for="comment in comments">
            <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">@{{comment.user_id}}</a>
            <a class="timestamp"> at @{{comment.created_at}} </a>
            <br><a class="commenttext">@{{comment.text}}</a>
        </div>
        <div class="comment-box" style="background-color:white;">
            <div class ="add-comment">
                <input type="text" id="input" v-model="newCommentText">
                <button style="float:right;" @click="createComment">Comment</button>
            </div>
        </div>
    </div>

<script>
    var app = new Vue({
        el: "#post",
        data: {
            comments: [],
            newCommentText: '',
        },
        methods: {
            createComment: function(){
                axios.post("{{ route ('api.comments.store')}}",
                {
                    commentable_id: {{$post->id}},
                    commentable_type: "App\\Models\\Post",
                    user_id: {{Auth::id()}},
                    text: this.newCommentText,
                })
                .then(response => {
                    this.comments.push(response.data);
                    this.newCommentText = '';
                })
                .catch(response => {
                console.log(response);
                })
            }
        },
        mounted() {
            axios.get("{{route('api.comments.indexonpostid', ['id'=> $post->id])}}")
            .then( response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        }
    });
</script>
@endsection