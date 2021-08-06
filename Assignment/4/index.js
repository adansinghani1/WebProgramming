function searchPosts( loadedResults ){  
      
    var query = document.getElementById( "search_input" ).value;  
      
    var resultsContainer = document.getElementById( "search_results" );  
      
    // clear results container if no previous results have been loaded  
    if( loadedResults === 0 ){  
        resultsContainer.innerHTML = "";  
    }  
      
    // create XMLHttpRequest object  
    var xmlhttp = new XMLHttpRequest();  
      
    // create function that is called when request is completed  
    xmlhttp.onreadystatechange = function() {  
        if ( xmlhttp.readyState === 4 && xmlhttp.status === 200 ) {  
            // fetch response text   
            var response=xmlhttp.responseText;  
            var outputPosts;   
               
            // parse response if it is valid JSON  
            try{  
                outputPosts = JSON.parse( response );  
            }  
            catch( e ){  
                return;  
            }  
              
            // iterate over results  
            for( var i = 0; i < outputPosts.length; i++ ){  
                // append result to result container, link to url of post  
                resultsContainer.innerHTML += "<div id='result_" + i + "'><a href='http://" + outputPosts[ i ].url + "'><h3>" + outputPosts[ i ].title + "</h3>" + outputPosts[ i ].description + "</a><div>";  
            }  
            // add button to load more results starting from the last loaded result (remove any existing button first if one exists)  
            try{  
                document.getElementById( "load_button" ).remove();  
            }  
            catch( e ){  
                return;  
            }  
            finally{  
                resultsContainer.innerHTML += "<br><button id='load_button' onclick='searchPosts( " + ( loadedResults + outputPosts.length ) + " )'>Load more</button>";  
            }  
        }  
    };  
      
    // send request to fetch searchDB.php  
    xmlhttp.open( "GET", "search.php?search=" + query + "&loaded=" + loadedResults, true );  
    xmlhttp.send();  
}
<html>
<head>
<input id="search_input" type="text" placeholder="Search...">   
<button onclick="searchPosts(0)">Search</button>   
   
<div id="search results"></div>   
</head>
<body>
</body>
</html>