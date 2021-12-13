<!DOCTYPE html>
<html>
    <head><title>Comments</title></head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"
    integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ=="
    crossorigin="anonymous"></script>
    <h1> Comments</h1>
    <div id="root">
        <ul>
            <li v-for="comment in comments">@{{comment}}</li>
        </ul>
        <input type="text" id="input" v-model="newCommentText">
        <button @click="createComment">Comment</button>
    </div>
</body>

<script>
    var app = new Vue({
        el: "#root",
        data: {
            comments: [],
            newCommentText: '',
        },
        methods: {
            createComment: function(){
                axios.post("{{ route ('api.comments.store') }}",
                {
                    user_id: {{Auth::id()}},
                    text: this.newCommentText,
                    commentable_id: 1,
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
            axios.get("{{route('api.comments.index')}}")
            .then( response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        }
    });
</script>
</html>