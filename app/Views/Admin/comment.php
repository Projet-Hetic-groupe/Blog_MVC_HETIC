
<h1>Ajouter un commentaire</h1>
<div class="container__background">
    <div class="card">
        <div class="card__form">
            <form action="/admin/add/Comment" method="POST" id="formAddComment">
                Write your comments : <br>
                <textarea name="content" id="postContent" cols="40" rows="3"  required></textarea> <br/>
                <input type="text" name="author" id="authorId">
                <input type="text" name="title" id="postId" required/> <br/>
                <input type="submit" value="Comment"/>
            </form>
        </div>
    </div>
</div>