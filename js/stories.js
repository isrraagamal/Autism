let cardsContainer = document.querySelector(".cardsContainer");

let stories = [
    {id: 1, storyName:"اذهب إلى الحلاق", storyImg:"اذهب إلى الحلاق",bgColor:"story1"},
    {id: 2, storyName:"احب السفر", storyImg:"أسافر بالطائرة",bgColor:"story2"},
    {id: 3, storyName:"ألعب مع الأصدقاء", storyImg:"ألعب_مع_الاصدقاء",bgColor:"story3"},
    {id: 4, storyName:"اقلم الأظافر", storyImg:"أقلم_اظافري",bgColor:"story4"},
    {id: 5, storyName:" اركب حافلة المدرسة", storyImg:"حافلة_المدرسة",bgColor:"story5"},
    {id: 6, storyName:"ملابسي نظيفة", storyImg:"ملابسي_نظيفة",bgColor:"story6"},
    {id: 7, storyName:"اتحدث حين ازعل", storyImg:"أتحدث_حين_ازعل",bgColor:"story7"},
    {id: 8, storyName:"احب أخي الصغير", storyImg:"احب_اخي_الصغير",bgColor:"story8"},
    {id: 9, storyName:"اساعد امي", storyImg:"اساعد_امي",bgColor:"story9"},
    {id: 10, storyName:"أعبر عن غضبي", storyImg:"أعبر_عن_غضبي",bgColor:"story10"},
    {id: 11, storyName:"احب العابي", storyImg:"احب ألعابي",bgColor:"story11"},
    {id: 12, storyName:"اذهب إلى النوم", storyImg:"اذهب إلى النوم",bgColor:"story12"},
    {id: 13, storyName:"اغسل يدي", storyImg:"أغسل اليدين",bgColor:"story13"},
    {id: 14, storyName:"نذهب إلى الفندق", storyImg:"في_الفندق",bgColor:"story14"},
    {id: 15, storyName:"احب وقت الفسحة", storyImg:"أحب وقت الفسحة",bgColor:"story15"},
    {id: 16, storyName:"نتناول الطعام", storyImg:"نتناول الطعام",bgColor:"story16"},
    {id: 17, storyName:"اذهب إلى الحمام", storyImg:"أدخل الحمام",bgColor:"story17"},
    {id: 18, storyName:"اشكر الناس", storyImg:"شكرا",bgColor:"story18"},
];

let temp = "";

stories.forEach((e)=>{  
    
        temp += `
        <div class="col-md-6 justify-content-center grid-margin stretch-card">
        <div class="text-right d-flex exercise-div exercise-${e.bgColor} justify-content-around align-items-center">
         <div class="col-md-6 my-3"><h2>${e.storyName}</h2></div>
         <div class="col-md-6 my-3"><img class="exercise-img p-3" src="./images/storyImages/${e.storyImg}.png" alt=""/></div>
        </div>
        </div>
                   
        `;
   
});
cardsContainer.innerHTML = temp;
