@extends('layouts.app')
@section('title','Post')
@section('content')

    <div class="post-box" id="post"> 
        <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a>
        <br><a class="timestamp" href ="{{route('posts.show', ['id'=> $post->id])}}">Posted at {{$post->created_at}} </a>
        <br><a class="posttext">{{$post->text}}</a>
        @if($post->file_path)
            <br><img style="max-width:50%;margin-left:30px"src="/storage/{{$post->file_path}}"></img>
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
            <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">@{{comment.username}}</a>
            <a class="timestamp"> at @{{comment.time}} </a>
            <br><a class="commenttext">@{{comment.text}}</a>
            <template v-if="(comment.user_id=={{Auth::id() ?? '0'}} || {{Auth::user()->is_admin ?? 'false'}})">
                <div style="float:right;margin-right:8px">
                    <a v-bind:href="getEditLink(comment.id)"><button type="button"> Edit </button></a>
                </div>
            </template>
        </div>
        @if(Auth::check())
            <div class="comment-box" style="background-color:white;">
                <div class ="add-comment">
                    <input type="text" id="input" v-model="newCommentText">
                    <button style="float:right;" @click="createComment">Comment</button>
                </div>
            </div>
        @else
            <div class="comment-box" style="text-align:center">
                <a href="{{route('login')}}" style="font-family:'Calibri';text-align:center;">Login to Comment </a>
            </div>
        @endif
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
                    user_id: {{Auth::id() ?? 0}},
                    text: this.newCommentText,
                })
                .then(response => {
                    this.comments.push(response.data);
                    this.newCommentText = '';
                })
                .catch(response => {
                console.log(response);
                })
            },
            deleteComment: function(commentId){
                console.log("placeholder delete on id:");
                console.log(commentId);
            },
            editComment: function(commentId){
                console.log("placeholder edit on id:"); 
                console.log(commentId);
                axios.get("{{route('comments.edit','')}}"/commentId);
            },
            getEditLink: function(commentId){
                return "/comments/" + commentId + "/edit";
            }
        },
        mounted() {
            axios.get("{{route('api.comments.indexonpostid', ['id'=> $post->id])}}")
            .then( response => {
                this.comments = response.data;
                console.log(response.data[0]);
            })
            .catch(response => {
                console.log(response);
            })
        }
    });
</script>
@endsection