function openModalEdit(userInfo){
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

function openModalDelete($id){
    const url = document.getElementById('formDeleteUser');
    url.action = "/admin/delete/user/" + $id;
}