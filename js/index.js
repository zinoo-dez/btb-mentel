window.onscroll = () => {
    if (window.scrollY > 100) document.querySelector('.up').style.display = 'flex';
    else document.querySelector('.up').style.display = 'none';
}
document.querySelector('.up').onclick = () => window.scrollTo(0, 0)

function validation() {
    if (document.formfill.Username.value == "")
}