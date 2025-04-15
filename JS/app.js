let sideBarBtn = document.querySelector(".optionSideOpener");
let closeSideBarBtn = document.querySelector(".closeSideBar");

let sidebar = document.querySelector(".sidebar");

sideBarBtn.addEventListener("click", () => {
  sidebar.style.display = "block";
})

closeSideBarBtn.addEventListener("click", () => {
  sidebar.style.display = "none";
})
