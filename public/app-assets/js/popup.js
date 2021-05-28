let chatBtn = document.querySelector("#chat")
let popupChat = document.querySelector("#popupChat")
let closePopup = document.querySelector("#closePopup")
let form = document.querySelector("#form")
if (scrollBottom) {
  scrollBottom.scrollTop = scrollBottom.scrollHeight;
}

if (chatBtn) {
  chatBtn.addEventListener('click', (e) => {
    popupChat.style.display = "block"
    setTimeout(() => {
      popupChat.style.opacity = 1
    }, 50);
  });
  closePopup.addEventListener('click', (e) => {
    popupChat.style.display = "none"
  });
}

class sendMessage {
  constructor(form) {
    this.form = form
    this.message = document.querySelector("#message")
    this.sendMessage = this.sendMessage.bind(this)
    this.form.addEventListener("submit", this.sendMessage)
  }
  sendMessage(e) {
    e.preventDefault()
    let formData = new FormData(e.target)
    let link = fetch(e.target.getAttribute("action"), {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': this.form[0].getAttribute("value"),
      },
    });
    if (this.message.value.trim() !== "") {
      this.message.value = "";
      this.message.style.border = "none";
      link.then((response) => {
        if (!response.redirected) {
          if (response.ok && response.status === 200) {
            response.json().then((data) => {
              if (data[0] === "success") {
                console.log(data);
              } else {
                console.log(data);
              }
            }).catch((error) => {
              console.log(error);
            })
          }
        } else {
          window.location.href = response.url
        }
      });
    } else {
      e.preventDefault()
      this.message.placeholder = "Veillez ecrire le message dabord"
      this.message.classList.add("error")
      this.message.addEventListener("keyup", function (e) {
        if (this.value.trim() !== "") {
          this.classList.remove("error")
        }
      })
    }
  }
}
new sendMessage(form)