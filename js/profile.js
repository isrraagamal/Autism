let editBtn = document.querySelectorAll(".box i");
let editForm = document.querySelector(".editForm");
let data = document.querySelector(".data");
let cancelBtn = document.querySelector("#cancelBtn");
let saveBtn = document.querySelector("#saveBtn");
let editInput = document.querySelectorAll(".edit");
let icons = document.querySelectorAll(".icon");
let editTitle = document.querySelector(".edit-title");
let dataArr = ["الاسم الأول", "اسم العائلة", "البريد الإلكتروني", "كلمة السر"];

icons.forEach((e, i) => {
    e.innerHTML = `
    <i class="fa-solid fa-pen-to-square edit-icon" data-edit="${i}"></i> `;
});

data.onclick = function (e) {

    if (e.target.classList.contains("edit-icon")) {

        editForm.style.display = "block";
        data.style.display = "none";
        editTitle.innerHTML = `:تعديل ${dataArr[e.target.dataset.edit]} `;

        editInput.forEach((j) => {
            if (j.dataset.name == dataArr[e.target.dataset.edit]) {
                j.style.display = "block";
                j.setAttribute("required", 'true');
            } else {
                j.style.display = "none";
                j.removeAttribute("required");
            }
        });
    }
}

editBtn.forEach((e) => {
    e.addEventListener("click", (e) => {
        editForm.style.display = "block";
        data.style.display = "none";
        console.log(e.target);

    });
});

cancelBtn.addEventListener("click", (e) => {
    editForm.style.display = "none";
    data.style.display = "block";

});