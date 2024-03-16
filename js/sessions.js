var mainDiv=document.querySelector('.mainDiv');
var videoSec =document.querySelector(".videoSec");
let vedioSource = document.querySelector(".vedioSource");
var videos=[
    {id:1,vidSrc:"s1"},
    {id:2,vidSrc:"s2"},
    {id:3,vidSrc:"s3"},
    {id:4,vidSrc:"s4"},
    {id:5,vidSrc:"s5"},
    {id:6,vidSrc:"s6"},
    {id:7,vidSrc:"s7"},
    {id:8,vidSrc:"s8"},
    {id:9,vidSrc:"s9"},
    {id:10,vidSrc:"s10"}
];

let temp="";

videos.forEach((e) => {
    let position = "";
    (e.id % 2) != 0 ? position = "start" : position = "end";
    
    temp+=`<div class="row justify-content-${position} xs_center">
    <div class="col-lg-5 col-md-8 col-sm-12 video_box text-center pl-md-1 px-lg-3 my-lg-1 my-md-3 my-sm-5 my-xs-5 xs_width xss_width">
        <h3 class="pt-3 font-weight-bold">فيديو</h3>
        <h1>${e.id}</h1>
        <a href="./videoPage.php?src=${e.vidSrc}">
        <div class="video">
            <i class="fa-sharp fa-solid fa-play fa-icon"></i>
        </div>
        </a>
            </div>
    </div>`;
}
);
mainDiv.innerHTML+=temp;

