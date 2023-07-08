function logout() {
    window.location.href = "logout.php";
}

function previewFile(event) {
    const file = event.target.files[0]; // Get the selected file
    const reader = new FileReader();
  
    reader.onload = function (e) {
      const previewImg = document.getElementById("previewImage");
      previewImg.src = e.target.result; // Set the source of the image element to the file's data URL
    };
  
    reader.readAsDataURL(file); // Read the file as a data URL
  }