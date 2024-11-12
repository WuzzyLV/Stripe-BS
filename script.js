let modalBtns = document.querySelectorAll("[data-target]");
let closeModal = document.querySelectorAll(".close-modal");

modalBtns.forEach(function (btn) {
  btn.addEventListener("click", function () {
    document.querySelector(btn.dataset.target).classList.add("modal-active");
  });
});

closeModal.forEach(function (btn) {
  btn.addEventListener("click", function () {
    document.querySelector(btn.dataset.target).classList.remove("modal-active");
  });
});

function setLanguage(lang) {
  localStorage.setItem("lang", lang);

  const elements = document.querySelectorAll("[data-lv]");
  elements.forEach((el) => {
    el.innerHTML = el.getAttribute(`data-${lang}`);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const savedLanguage = localStorage.getItem("lang") || "lv";
  setLanguage(savedLanguage);
});
