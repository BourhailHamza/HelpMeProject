function logout() {
    window.location.href = "logout.php";
}

function openAdmin() {
  window.location.href = "admin.php";
}

function previewFile(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
  
    reader.onload = function (e) {
      const previewImg = document.getElementById("previewImage");
      previewImg.src = e.target.result;
    };
  
    reader.readAsDataURL(file);
}
