let search = document.querySelector("#search");
let formSearch = document.querySelector("#formSearch");
search.addEventListener("focus", (e) => {
  let searchCl = e.target.parentNode;
  if (searchCl.classList.contains('searchFocused')) {
    return false;
  } else {
    searchCl.classList.add("searchFocused")
  }
})
search.addEventListener("blur", (e) => {
  let searchCl = e.target.parentNode;
  if (e.target.value.trim() === "") {
    if (searchCl.classList.contains('searchFocused')) {
      searchCl.classList.remove("searchFocused")
    } else {
      searchCl.classList.remove("searchFocused")
    }
  }else{
    searchCl.classList.remove("searchFocused")
  }
})