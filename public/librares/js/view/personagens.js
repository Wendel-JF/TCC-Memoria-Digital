let search = document.getElementById('search');


    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = '/personagens?search=' + search.value+'&pagina=1';
    }

    function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
        const [from, to] = getParsed(fromInput, toInput);
        fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
        if (from > to) {
            fromSlider.value = to;
            fromInput.value = to;
        } else {
            fromSlider.value = from;
        }
    }
        
    function controlToInput(toSlider, fromInput, toInput, controlSlider) {
        const [from, to] = getParsed(fromInput, toInput);
        fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
        setToggleAccessible(toInput);
        if (from <= to) {
            toSlider.value = to;
            toInput.value = to;
        } else {
            toInput.value = from;
        }
    }
    
    function controlFromSlider(fromSlider, toSlider, fromInput) {
      const [from, to] = getParsed(fromSlider, toSlider);
      fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
      if (from > to) {
        fromSlider.value = to;
        fromInput.value = to;
      } else {
        fromInput.value = from;
      }
    }
    
    function controlToSlider(fromSlider, toSlider, toInput) {
      const [from, to] = getParsed(fromSlider, toSlider);
      fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
      setToggleAccessible(toSlider);
      if (from <= to) {
        toSlider.value = to;
        toInput.value = to;
      } else {
        toInput.value = from;
        toSlider.value = from;
      }
    }
    
    function getParsed(currentFrom, currentTo) {
      const from = parseInt(currentFrom.value, 10);
      const to = parseInt(currentTo.value, 10);
      return [from, to];
    }
    
    function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
        const rangeDistance = to.max-to.min;
        const fromPosition = from.value - to.min;
        const toPosition = to.value - to.min;
        controlSlider.style.background = `linear-gradient(
          to right,
          ${sliderColor} 0%,
          ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
          ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
          ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
          ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
          ${sliderColor} 100%)`;
    }
    
    function setToggleAccessible(currentTarget) {
      const toSlider = document.querySelector('#toSlider');
      if (Number(currentTarget.value) <= 0 ) {
        toSlider.style.zIndex = 2;
      } else {
        toSlider.style.zIndex = 0;
      }
    }
    
    const fromSlider = document.querySelector('#fromSlider');
    const toSlider = document.querySelector('#toSlider');
    const fromInput = document.querySelector('#fromInput');
    const toInput = document.querySelector('#toInput');
    
    fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
    setToggleAccessible(toSlider);
    
    fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
    toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
    fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
    toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);



    function controlFromInput2(fromSlider, fromInput, toInput, controlSlider) {
        const [from, to] = getParsed2(fromInput, toInput);
        fillSlider2(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
        if (from > to) {
            fromSlider.value = to;
            fromInput.value = to;
        } else {
            fromSlider.value = from;
        }
    }
        
    function controlToInput2(toSlider2, fromInput2, toInput2, controlSlider2) {
        const [from, to] = getParsed2(fromInput2, toInput2);
        fillSlider2(fromInput2, toInput2, '#C6C6C6', '#25daa5', controlSlider2);
        setToggleAccessible2(toInput2);
        if (from <= to) {
            toSlider2.value = to;
            toInput2.value = to;
        } else {
            toInput2.value = from;
        }
    }
    
    function controlFromSlider2(fromSlider2, toSlider2, fromInput) {
      const [from, to] = getParsed2(fromSlider2, toSlider2);
      fillSlider2(fromSlider2, toSlider2, '#C6C6C6', '#25daa5', toSlider2);
      if (from > to) {
        fromSlider2.value = to;
        fromInput.value = to;
      } else {
        fromInput.value = from;
      }
    }
    
    function controlToSlider2(fromSlider2, toSlider2, toInput2) {
      const [from, to] = getParsed2(fromSlider2, toSlider2);
      fillSlider2(fromSlider2, toSlider2, '#C6C6C6', '#25daa5', toSlider2);
      setToggleAccessible2(toSlider2);
      if (from <= to) {
        toSlider2.value = to;
        toInput2.value = to;
      } else {
        toInput2.value = from;
        toSlider2.value = from;
      }
    }
    
    function getParsed2(currentFrom, currentTo) {
      const from = parseInt(currentFrom.value, 10);
      const to = parseInt(currentTo.value, 10);
      return [from, to];
    }
    
    function fillSlider2(from, to, sliderColor, rangeColor, controlSlider) {
        const rangeDistance = to.max-to.min;
        const fromPosition = from.value - to.min;
        const toPosition = to.value - to.min;
        controlSlider.style.background = `linear-gradient(
          to right,
          ${sliderColor} 0%,
          ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
          ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
          ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
          ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
          ${sliderColor} 100%)`;
    }
    
    function setToggleAccessible2(currentTarget) {
      const toSlider2 = document.querySelector('#toSlider2');
      if (Number(currentTarget.value) <= 0 ) {
        toSlider2.style.zIndex = 2;
      } else {
        toSlider2.style.zIndex = 0;
      }
    }
    
    const fromSlider2 = document.querySelector('#fromSlider2');
    const toSlider2 = document.querySelector('#toSlider2');
    const fromInput2 = document.querySelector('#fromInput2');
    const toInput2 = document.querySelector('#toInput2');
    
    fillSlider2(fromSlider2, toSlider2, '#C6C6C6', '#25daa5', toSlider2);
    setToggleAccessible2(toSlider2);
    
    fromSlider2.oninput = () => controlFromSlider2(fromSlider2, toSlider2, fromInput2);
    toSlider2.oninput = () => controlToSlider2(fromSlider2, toSlider2, toInput2);
    fromInput2.oninput = () => controlFromInput2(fromSlider2, fromInput2, toInput2, toSlider2);
    toInput2.oninput = () => controlToInput2(toSlider2, fromInput2, toInput2, toSlider2);
    
    
    
    

