document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var urlcourante = document.location.href; 
    urlcourante.split("/")[0];
    location.href = urlcourante;
    

                    
    var searchValue = document.getElementById('searchInput').value; 
    var select_style = document.getElementById('select_style').value;
    var select_genre = document.getElementById('select_genre').value;

    var formAction = "search/placeholder/style_select/genre_select";
    
    formAction = formAction.replace('placeholder', searchValue);
    formAction = formAction.replace('style_select', select_style);
    formAction = formAction.replace('genre_select', select_genre);    

                
    document.getElementById('searchForm').setAttribute('action', formAction);
    
    this.submit();

});
