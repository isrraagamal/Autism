let categoryContainer = document.querySelector(".exercise-card");

let category = [
    { id: 1, categoryName: "حيوانات", categoryImage: "lion", backgrounColor: "animals", value: "animals" },
    {id: 2, categoryName:"طيور", categoryImage:"birds", backgrounColor:"birds", value:"birds"},
    { id: 3, categoryName: "خضراوات", categoryImage: "vegetable", backgrounColor: "vegetable", value: "vegetables" },
    { id: 4, categoryName: "فواكه", categoryImage: "fruit2", backgrounColor: "fruit", value: "fruits" },
    { id: 5, categoryName: "الوان", categoryImage: "colors", backgrounColor: "color", value: "colors" },
    { id: 6, categoryName: "طعام", categoryImage: "food", backgrounColor: "food", value: "food" },
    { id: 7, categoryName: "ارقام", categoryImage: "number", backgrounColor: "number", value: "numbers" },
    { id: 8, categoryName: "اشكال هندسية", categoryImage: "star", backgrounColor: "square", value: "shapes" },
    { id: 9, categoryName: "وظائف", categoryImage: "job", backgrounColor: "job", value: "jobs" },
    { id: 10, categoryName: "ملابس", categoryImage: "clothes", backgrounColor: "clothes", value: "clothes" },
    { id: 11, categoryName: "وسائل مواصلات", categoryImage: "transportation", backgrounColor: "transportation", value: "transport" },
    { id: 12, categoryName: "ادوات المنزل", categoryImage: "home", backgrounColor: "home", value: "homeTools" },
    { id: 13, categoryName: "ادوات شخصية", categoryImage: "personalTools", backgrounColor: "personalTools", value: "personalTools" },
    { id: 14, categoryName: "اجزاء الجسم", categoryImage: "body", backgrounColor: "body", value: "body" },
    { id: 15, categoryName: "حشرات", categoryImage: "insects", backgrounColor: "insects", value: "insects" },
    { id: 16, categoryName: "زواحف", categoryImage: "reptile", backgrounColor: "reptile", value: "reptile" },
    { id: 17, categoryName: "حيوانات بحرية", categoryImage: "sea-animals", backgrounColor: "sea-animals", value: "seaanimals" },
    { id: 18, categoryName: "ظواهر طبيعية", categoryImage: "naturalphenomena", backgrounColor: "naturalphenomena", value: "naturalphenomena" },
    { id: 19, categoryName: "افعال", categoryImage: "verbs", backgrounColor: "verbs", value: "verbs" },
];

let temp = "";

category.forEach((e) => {

    temp += `
        <div class="col-md-6 justify-content-center grid-margin stretch-card">
        <a href="exercise2.php?value=${e.value}">
        <div class="text-right d-flex exercise-div exercise-${e.backgrounColor} justify-content-around align-items-center">
         <div class="col-md-6 my-3"><h2>${e.categoryName}</h2></div>
         <div class="col-md-6 my-3"><img class="exercise-img p-3" src="./images/exercise/${e.categoryImage}.png" alt=""/></div>
        </div>
        </a>
        </div>
                   
        `;

});
categoryContainer.innerHTML = temp;
