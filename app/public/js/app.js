function closeModal(){
    document.getElementById('card__formEditPost').style.display ="none";
    document.getElementById('card__formEditComment').style.display ="none";
    document.getElementById("card__formDeletePost").style.display = "none";
    document.getElementById("card__formDeleteComment").style.display = "none";
    document.getElementById('card__formAddComment').style.display= "none";
    document.getElementById('card__formAddAnswer').style.display= "none";
    document.getElementById('container__background').style.display = "none";
}

function closeModalUser(){
    document.getElementById('formEditUser').style.display= "none";
    document.getElementById('container-deleteUser').style.display= "none";
}

function openModalEdit(userInfo){
    document.getElementById("container__background").style.display = "block";
    const lastname = document.getElementById('lastname');
    const firstname = document.getElementById('firstname');
    const login = document.getElementById('login');
    const url = document.getElementById('formEditUser');
    switch (userInfo[4]) {
        case "admin":
            document.getElementById('admin').checked = true;
            break;
        default:
            document.getElementById('user').checked = true;
            break;
    }

    lastname.value = userInfo[1]
    firstname.value = userInfo[2]
    login.value = userInfo[3]

    url.action = "/admin/edit/user/" + userInfo[0];

}

function openModalDelete(id){
    closeModalUser();
    document.getElementById('container-deleteUser').style.display = "flex";
    const url = document.getElementById('formDeleteUser');
    url.action = "/admin/delete/user/" + id;
}


function openModalEditPost(Postinfo){
    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formEditPost')
    modal.style.display = "flex";
    const titleInput = document.getElementById('titleInput');
    const contentInput = document.getElementById('contentInput');
    const url = document.getElementById('formEditPost');


    titleInput.value = Postinfo[1];
    contentInput.value = Postinfo[2].replace("<br />", '');
    url.action = "/edit/post/" + Postinfo[0] +"/" + Postinfo[3];
}

function openModalDeletePost (postInfo){
    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formDeletePost')
    modal.style.display = "flex";
    const url = document.getElementById('formDeletePost');
    url.action = "/delete/post/" + postInfo[0] + "/" + postInfo[1];
}

function openModalAddComment(id){
    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formAddComment')
    modal.style.display = "flex";
    const url = document.getElementById('formAddComment');
    url.action = "add/comment/" +id;
}

function openModalEditComment(infoComment){
    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formEditComment')
    modal.style.display = "flex";
    const url = document.getElementById('formEditComment');
    const contentInput = document.getElementById('contentInputComment');
    contentInput.value = infoComment[1].replace("<br />", '');
    url.action = "/edit/comment/" + infoComment[0] +"/"+infoComment[2];

}

function openModalDeleteComment (commentInfo){
    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formDeleteComment')
    modal.style.display = "flex";
    const url = document.getElementById('formDeleteComment');
    url.action = "/delete/comment/" + commentInfo[0] + "/" + commentInfo[1];
}


function openModalAddAnswer(answerInfo){

    closeModal();
    document.getElementById('container__background').style.display = "flex";
    const modal = document.getElementById('card__formAddAnswer');
    modal.style.display = "flex";
    const url = document.getElementById('formAddAnwser');
    url.action = "/add/answer/" +answerInfo[0] +'/'+answerInfo[1];
}