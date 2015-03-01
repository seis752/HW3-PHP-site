// search-ajax-1.js

var search = {

  searchResultsUrl: 'search-results.php',
  searchResultsListHtml: '',

  init: function () {
    this.bindEvents();
  },

  bindEvents: function () {
    // Add "click" event handler to the "Search" button.
    document.getElementById('search-button')
      .addEventListener('click', this.handleSearch);
  },

  handleSearch: function () {
    var name = document.getElementById('name').value;
    var url = search.searchResultsUrl + '?name=' + name;
    var request = new XMLHttpRequest();

    // Use "document" response type, so we can find elements in DOM later.
    request.responseType = 'document';

    request.onreadystatechange = function () {
      switch (request.readyState) {
        case 0:
          //console.log('0: UNSENT');
          break;
        case 1:
          //console.log('1: OPENED');
          break;
        case 2:
          //console.log('2: HEADERS_RECEIVED');
          break;
        case 3:
          //console.log('3: LOADING');
          break;
        case 4:
          //console.log('4: DONE');

          if (request.status == 200) {
            search.searchResultsListHtml =
              request.response.getElementById('search-results-list').outerHTML;

            search.updateUiSearchResults();
          } else {
            console.log('ERROR');
            console.log(request.response);
          }

          break;
      }
    };

    request.open('GET', url, true);
    request.send(null);
  },

  updateUiSearchResults: function () {
    var searchResultsContainer = document.getElementById('search-results');
    var searchResultsListContainer =
      document.getElementById('search-results-list-container');

    searchResultsListContainer.innerHTML = this.searchResultsListHtml;
    searchResultsContainer.style.display = 'block';
  }

};

search.init();
