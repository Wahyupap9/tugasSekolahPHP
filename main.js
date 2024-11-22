const absenHadir = document.querySelectorAll(".hadir");
const semuaHadir = document.querySelector(".semua_hadir");
// console.log(absenList);

semuaHadir.addEventListener("click", () => {
  absenHadir.forEach((e) => {
    e.checked = true;
  });
});
