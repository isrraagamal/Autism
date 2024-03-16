let cardsContainer = document.querySelector(".categories-row");

let categories = [
    { id: 1, imgName: "lion", value: "حيوانات", engName: "animals" },
    { id: 2, imgName: "birds", value: "طيور", engName: "birds" },
    { id: 3, imgName: "vegetable1", value: "خضراوات", engName: "vegetables" },
    { id: 4, imgName: "fruit2", value: "فواكه", engName: "fruits" },
    { id: 5, imgName: "colors", value: "الوان", engName: "colors" },
    { id: 6, imgName: "food", value: "طعام", engName: "food" },
    { id: 7, imgName: "number", value: "ارقام", engName: "numbers" },
    { id: 8, imgName: "star", value: "اشكال الهندسية", engName: "shapes" },
    { id: 9, imgName: "job", value: "وظائف", engName: "jobs" },
    { id: 10, imgName: "clothes", value: "ملابس", engName: "clothes" },
    { id: 11, imgName: "transportation", value: "وسائل المواصلات", engName: "transport" },
    { id: 12, imgName: "home", value: "ادوات المنزل", engName: "homeTools" },
    { id: 13, imgName: "personalTools", value: "ادوات شخصية", engName: "personalTools" },
    { id: 14, imgName: "body", value: "اجزاء الجسم", engName: "body" },
    { id: 15, imgName: "insects", value: "حشرات ", engName: "insects" },
    { id: 16, imgName: "reptile", value: "زواحف", engName: "reptile" },
    { id: 17, imgName: "sea-animals", value: "حيوانات بحرية", engName: "seaanimals" },
    { id: 18, imgName: "naturalPhenomena", value: "ظواهر طبيعية", engName: "naturalPhenomena" },
    { id: 19, imgName: "verbs", value: "افعال", engName: "verbs" },

];


let temp = "";

categories.forEach((e) => {
    temp += `
    <div class="col-lg-3 col-md-4 col-sm-6 py-3 py-md-1 mb-3">
        <a href="category1.php?value=${e.engName}&catName=${e.value}" class="card-link">
            <div class="category">
                <div class="card">
                    <img src="./images/exercise/${e.imgName}.png" width="100%" height="270px" alt="...">
                    <div class="card-body">
                        <h1 class="card-title">${e.value}</h1>
                    </div>
                </div>
            </div>
        </a>
    </div>
    `;
});
cardsContainer.innerHTML = temp;