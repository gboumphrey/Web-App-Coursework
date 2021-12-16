@extends('layouts.app')
@section('title', $userprofile->user->name)
@section('content')
    <div class="bigtitle">{{$userprofile->user->name}}</div>
    
    <p>Date of birth: {{$userprofile->dob ?? 'Unspecified'}}</p>
    <p>Favourite colour: {{$userprofile->favecolour ?? 'Unspecified'}}</p>
    <p>About Me: {{$userprofile->aboutme}}</p>
    <a class="subtitle">Comments</a><br>
    <div class="post-box" id="post">
        <div class="comment-box" v-for="comment in comments">
            <a class="author">@{{comment.username}}</a>
            <a class="timestamp"> at @{{comment.time}} </a>
            <br><a class="commenttext">@{{comment.text}}</a>
            <template v-if="(comment.user_id=={{Auth::id() ?? '0'}} || {{Auth::user()->is_admin ?? 'false'}})">
                <div style="float:right;">
                    <button style="float:right;margin-right:8px;" @click="editComment">Edit</button>
                    <button style="float:right;" @click="deleteComment(comment.id)">Delete</button>
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
                    commentable_id: {{$userprofile->id}},
                    commentable_type: "App\\Models\\UserProfile",
                    user_id: {{Auth::id() ?? '0'}},
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
                console.log("placeholder delete on id: ")
                console.log(commentId);
            },
            editComment: function(){
                console.log("placeholder edit") 
            }
        },
        mounted() {
            axios.get("{{route('api.comments.indexonprofileid', ['id'=> $userprofile->id])}}")
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