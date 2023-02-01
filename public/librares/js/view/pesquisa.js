let search = document.getElementById('search');


    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = '/personagens?search=' + search.value+'&pagina=1';
    }

    window.onload = function(){
        slideOne();
        slideTwo();
        slideThree();
        slideFour();
    }
    let sliderOne = document.getElementById("slider-1");
    let sliderTwo = document.getElementById("slider-2");
    let displayValOne = document.getElementById("range1");
    let displayValTwo = document.getElementById("range2");
    let minGap = 0;
    let sliderTrack = document.querySelector(".slider-track");
    let sliderMaxValue = document.getElementById("slider-1").max;
    function slideOne(){
        if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
            sliderOne.value = parseInt(sliderTwo.value) - minGap;
        }
        displayValOne.textContent = sliderOne.value;
        fillColor();
    }
    function slideTwo(){
        if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
            sliderTwo.value = parseInt(sliderOne.value) + minGap;
        }
        displayValTwo.textContent = sliderTwo.value;
        fillColor();
    }
    function fillColor(){
        percent1 = (sliderOne.value / sliderMaxValue) * 100;
        percent2 = (sliderTwo.value / sliderMaxValue) * 100;
        sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #2C2929 ${percent1}% , #2C2929 ${percent2}%, #dadae5 ${percent2}%)`;
    }



    
    let sliderThree = document.getElementById("slider-3");
    let sliderFour = document.getElementById("slider-4");
    let displayValThree = document.getElementById("range3");
    let displayValFour = document.getElementById("range4");
    let minGap2 = 0;
    let sliderTrack2 = document.querySelector(".slider-track2");
    let sliderMaxValue2 = document.getElementById("slider-3").max;
    function slideThree(){
        if(parseInt(sliderFour.value) - parseInt(sliderThree.value) <= minGap2){
            sliderThree.value = parseInt(sliderFour.value) - minGap2;
        }
        displayValThree.textContent = sliderThree.value;
        fillColor2();
    }
    function slideFour(){
        if(parseInt(sliderFour.value) - parseInt(sliderThree.value) <= minGap2){
            sliderFour.value = parseInt(sliderThree.value) + minGap2;
        }
        displayValFour.textContent = sliderFour.value;
        fillColor2();
    }
    function fillColor2(){
        percent3 = (sliderThree.value / sliderMaxValue2) * 300;
        percent4 = (sliderFour.value / sliderMaxValue2) * 300;
        sliderTrack2.style.background = `linear-gradient(to right, #dadae5 ${percent3}% , #4C4949 ${percent3}% , #4C4949 ${percent4}%, #dadae5 ${percent4}%)`;
    }



    
    
    
    

