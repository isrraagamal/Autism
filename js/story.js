let cardsContainer = document.querySelector(".cardsContainer");

let stories = [
    {id: 1, storyName:"اذهب إلى الحلاق", storyImg:"اذهب إلى الحلاق",bgColor:"animal",storyFolder:"barber"},
    {id: 2, storyName:"احب السفر", storyImg:"أسافر بالطائرة",bgColor:"fish",storyFolder:"travel"},
    {id: 3, storyName:"ألعب مع الأصدقاء", storyImg:"ألعب_مع_الاصدقاء",bgColor:"fruit",storyFolder:"playing"},
    {id: 4, storyName:"اقلم الأظافر", storyImg:"أقلم_اظافري",bgColor:"vegetable",storyFolder:"nails"},
    {id: 5, storyName:" اركب حافلة المدرسة", storyImg:"حافلة_المدرسة",bgColor:"body",storyFolder:"bus"},
    {id: 6, storyName:"ملابسي نظيفة", storyImg:"ملابسي_نظيفة",bgColor:"food",storyFolder:"cleaning_clothes"},
    {id: 7, storyName:"اتحدث حين ازعل", storyImg:"أتحدث_حين_ازعل",bgColor:"color",storyFolder:"sad"},
    {id: 8, storyName:"احب أخي الصغير", storyImg:"احب_اخي_الصغير",bgColor:"square",storyFolder:"love_brother"},
    {id: 9, storyName:"اساعد امي", storyImg:"اساعد_امي",bgColor:"number",storyFolder:"helping_mother"},
    {id: 10, storyName:"أعبر عن غضبي", storyImg:"أعبر_عن_غضبي",bgColor:"transportation",storyFolder:"angery"},
    {id: 18, storyName:"احب العابي", storyImg:"احب ألعابي",bgColor:"job",storyFolder:"games"},
    {id: 12, storyName:"اذهب إلى النوم", storyImg:"اذهب إلى النوم",bgColor:"fish",storyFolder:"sleaping"},
    {id: 13, storyName:"اغسل يدي", storyImg:"أغسل اليدين",bgColor:"home",storyFolder:"washing_hands"},
    {id: 14, storyName:"نذهب إلى الفندق", storyImg:"في_الفندق",bgColor:"vegetable",storyFolder:"hotel"},
    {id: 15, storyName:"احب وقت الفسحة", storyImg:"أحب وقت الفسحة",bgColor:"food",storyFolder:"break_time"},
    {id: 16, storyName:"نتناول الطعام", storyImg:"نتناول الطعام",bgColor:"body",storyFolder:"eating"},
    {id: 17, storyName:"اذهب إلى الحمام", storyImg:"أدخل الحمام",bgColor:"number",storyFolder:"wc"},
    {id: 18, storyName:"اشكر الناس", storyImg:"شكرا",bgColor:"square",storyFolder:"thanks"},
];

let temp = "";

stories.forEach((e)=>{  
    
        temp += `
        <div class="col-md-6 justify-content-center grid-margin stretch-card">
        <a href="storyPage.php?src=${e.storyFolder}" style="text-decoration:none;">
        <div class="text-right d-flex exercise-div exercise-${e.bgColor} justify-content-around align-items-center">
         <div class="col-md-6 my-3"><h2>${e.storyName}</h2></div>
         <div class="col-md-6 my-3"><img class="exercise-img p-3" src="./images/storyImages/${e.storyImg}.png" alt=""/></div>
        </div>
        </a>
        </div>
                   
        `;
   
});
cardsContainer.innerHTML = temp;
