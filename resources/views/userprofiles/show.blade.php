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
            <a class="author">@{{comment.user_id}}</a>
            <a class="timestamp"> at @{{comment.created_at}} </a>
            <br><a class="commenttext">@{{comment.text}}</a>
        </div>
        <div class="comment-box" style="background-color:white;">
            <div class ="add-comment">
                <input type="text" id="input" v-model="newCommentText">
                <button style="float:right;" @click="createComment">Comment</button>
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
                    commentable_id: {{$userprofile->id}},
                    commentable_type: "App\\Models\\UserProfile",
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