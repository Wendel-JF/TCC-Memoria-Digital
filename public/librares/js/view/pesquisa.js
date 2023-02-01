let search = document.getElementById('search');

    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = '/pesquisa?search=' + search.value;
    }

 