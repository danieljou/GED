function setUp() {
    document.getElementById('click').onclick = setMenu;
}

function setMenu() {
    var MenuBox = document.getElementById('main-menu');
    MenuBox.className = "main-menuV";
}
setUp();