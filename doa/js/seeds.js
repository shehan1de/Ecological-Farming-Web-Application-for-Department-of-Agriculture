var searchInput = document.getElementById('searchInput');
var listItems = document.querySelectorAll('#list li');
var searchContent = document.getElementById('search-content');

searchInput.addEventListener('input', function() {
  var searchValue = searchInput.value.toLowerCase();

  if (searchValue === "") {
    searchContent.style.display = "none";
  } else {
    searchContent.style.display = "block";
  }

  listItems.forEach(function(item) {
    var text = item.textContent.toLowerCase();
    if (text.includes(searchValue)) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});
