function openNav() {
    document.getElementById("mySidenav").style.display = "block";
}

function openDropdown() {
    document.getElementById('dropdownMenu').style.display = 'block';
}

document.addEventListener('mouseup', function (e) {
    let sideMenu = document.getElementById('mySidenav');
    if (!sideMenu.contains(e.target)) {
        sideMenu.style.display = 'none';
    }
});

document.addEventListener('mouseup', function (e) {
    let dropdown = document.getElementById('dropdownMenu');
    if (!dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

function commentReply(e) {
    let replyBoxId = e.id + 'replyBox';
    if (e.value === "hidden") {
        document.getElementById(replyBoxId).style.display = 'block';
        e.value = "show";
    } else {
        document.getElementById(replyBoxId).style.display = 'none';
        e.value = "hidden";
    }
}

function editComment(e) {
    let cmtBox = e.id + 'cmtBox';
    let editBox = e.id + 'editBox';
    document.getElementById(cmtBox).style.display = 'none';
    document.getElementById(editBox).style.display = 'block';
}

function editCancel(e) {
    let cmtBox = e.id + 'cmtBox';
    let editBox = e.id + 'editBox';
    document.getElementById(cmtBox).style.display = 'block';
    document.getElementById(editBox).style.display = 'none';
}
