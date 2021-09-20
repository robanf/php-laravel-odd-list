<template>
    <div class="container">
        <div class="row">
            
            <div class="col-sm-6 my-3 " v-for="post in posts" :key="post.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{post.title}}</h5>
                        <p class="card-text">{{post.content}}</p>
                        <a href="#" class="btn btn-primary ">Go somewhere</a>
                    </div>
                </div>
            </div>

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="{'disabled' : current_page===1}"><button class="page-link" href="#" @click="getPosts(current_page-1)">Previous</button></li>
                <li class="page-item" :class="{'disabled' : current_page===i}" v-for="i in last_page" :key="i"><button class="page-link" href="#" @click="getPosts(i)">{{i}}</button></li>
                <li class="page-item" :class="{'disabled' : current_page===last_page}"><button class="page-link" href="#" @click="getPosts(current_page+1)">Next</button></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Posts",
    data(){
        return{
            chiamataApi:'http://127.0.0.1:8000/api/posts' ,
            posts:[],
            current_page:1,
            last_page:null,
        }
    },
    created(){
        this.getPosts(1);
    },
    methods:{
        getPosts(pagePost){
            axios.get(this.chiamataApi,{
                params:{
                    page:pagePost,
                }
            })
                 .then(response =>{
                     console.log(response.data.results.data);
                     this.posts=response.data.results.data;
                     this.current_page=response.data.results.current_page;
                     this.last_page=response.data.results.last_page;
                     console.log(this.current_page);
                     console.log(this.last_page);
                 })
                 .catch();
        },
    }
}
</script>

<style lang="scss" scoped>

</style>