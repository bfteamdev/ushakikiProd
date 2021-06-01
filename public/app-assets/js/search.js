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
  } else {
    searchCl.classList.remove("searchFocused")
  }
});
class autoSearch {
  constructor(searchInput) {
    this.searchInput = searchInput;
    this.searchRemove = this.searchRemove.bind(this)
    this.search = this.search.bind(this)
    this.debounce = this.debounce.bind(this)
    this.addInputText = this.addInputText.bind(this)
    this.searchInput.addEventListener("keyup", this.search)
    // this.searchInput.addEventListener("blur", this.searchRemove)
  }
  debounce(callback, delay) {
    let timer;
    return function () {
      let args = arguments;
      let context = this;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, delay)
    }
  }
  search(e) {
    let inputValue = e.target.value.trim().toLowerCase();
    let autoSearch = document.querySelector(".autosearch")
    if (e.target.value != '') {
      let formData = new FormData()
      formData.append("q", inputValue)
      //link to search
      let link = fetch(e.target.dataset.link, {
        method: "POST",
        body: formData,
        headers: {
          'X-CSRF-TOKEN': e.target.parentNode.parentNode.parentNode.firstElementChild.value,
        },
      });
      // e.target.addEventListener("blur", this.searchRemove)
      link.then(response => {
        if (response.ok && response.status === 200) {
          response.json().then((data) => {
            if (!autoSearch) {
              let ul = document.createElement("ul")
              ul.classList.add("autosearch")
              data.forEach((item) => {
                let li = document.createElement("li")
                li.innerHTML = item.title
                ul.appendChild(li)
                ul.style.display = null;
                ul.style.opacity = 1;
                // setTimeout(() => {
                //   ul.style.opacity = 1;
                // }, 100)
                e.target.parentNode.insertAdjacentElement("beforeend", ul)
                this.addInputText(ul)
              });
            } else {
              if (autoSearch.children.length > 0) {
                for (let i = 0; i < autoSearch.children.length; i++) {
                  let li = autoSearch.children[i];
                  li.remove()
                }
              }
              data.forEach((item) => {
                let li = document.createElement("li")
                li.innerHTML = item.title
                autoSearch.appendChild(li)
                autoSearch.style.display = null;
                autoSearch.style.opacity = 1;
                // setTimeout(() => {
                //   autoSearch.style.opacity = 1;
                // }, 100)
              });
              this.addInputText(autoSearch)
            }
          });
        } else {
          console.log(response.status);
        }
      }).catch((error) => {
        console.log(error);
      });
    }else{
      if(autoSearch){
        setTimeout(() => {
          autoSearch.style.opacity = 0;
        }, 300);
        autoSearch.remove()
      }
    }
  }

  addInputText(ul) {
    let searchInput = this.searchInput
    ul.addEventListener("click", (e) => {
      search.value = e.target.innerText
      let autoSearch = document.querySelector(".autosearch")
      if (autoSearch.children.length > 0) {
        autoSearch.style.display = "none";
        setTimeout(() => {
          autoSearch.style.opacity = 0;
        }, 100)
        for (let i = 0; i < autoSearch.children.length; i++) {
          let li = autoSearch.children[i];
          li.remove()
        }
      }
      formSearch.submit()
    })
  }
  searchRemove(e) {
    let autoSearch = document.querySelector(".autosearch")
    if (autoSearch.children.length > 0) {
      autoSearch.style.display = "none";
      setTimeout(() => {
        autoSearch.style.opacity = 0;
      }, 100)
      for (let i = 0; i < autoSearch.children.length; i++) {
        let li = autoSearch.children[i];
        li.remove()
      }
    }
  }
}
new autoSearch(search)