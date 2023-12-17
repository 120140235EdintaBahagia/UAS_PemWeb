// Fungsi untuk memvalidasi data formulir
function validateForm() {
  // Validasi nama
  var name = document.getElementById("name").value;
  if (name === "") {
    alert("Nama harus diisi.");
    return false;
  }

  // Validasi usia
  var age = document.getElementById("age").value;
  if (age < 13 || age > 99) {
    alert("Usia harus antara 13 dan 99.");
    return false;
  }

  // Validasi jenis kelamin
  var gender = document.querySelector('input[name="gender"]:checked').value;
  if (gender === "") {
    alert("Jenis kelamin harus dipilih.");
    return false;
  }

  // Validasi jurusan
  var major = document.getElementById("major").value;
  if (major === "") {
    alert("Jurusan harus dipilih.");
    return false;
  }

  // Validasi kemampuan
  var skills = [];
  for (var i = 0; i < document.getElementsByTagName("input").length; i++) {
    if (document.getElementsByTagName("input")[i].name === "skills" && document.getElementsByTagName("input")[i].checked) {
      skills.push(document.getElementsByTagName("input")[i].value);
    }
  }
  if (skills.length === 0) {
    alert("Kemampuan harus dipilih.");
    return false;
  }

  // Semua data valid
  return true;
}

// Event listener untuk submit formulir
document.getElementById("studentForm").addEventListener("submit", function(event) {
  // Validasi data formulir
  if (!validateForm()) {
    event.preventDefault();
  }
});

// Validasi kemampuan
function validateSkills() {
  var skills = [];
  for (var i = 0; i < document.getElementsByTagName("input").length; i++) {
    if (document.getElementsByTagName("input")[i].name === "skills" && document.getElementsByTagName("input")[i].checked) {
      skills.push(document.getElementsByTagName("input")[i].value);
    }
  }
  if (skills.length === 0) {
    alert("Kemampuan harus dipilih.");
    return false;
  }
  return true;
}

// Event listener untuk perubahan nilai checkbox
document.getElementsByTagName("input").forEach(function(input) {
  input.addEventListener("change", function() {
    validateSkills();
  });
});