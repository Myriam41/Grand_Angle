const href = "http://192.168.0.11:8000/index.php?v=";
const size = 300;

new QRCode(document.querySelector("#qrcode"), {
text: href,
width: size,
height: size,

colorDark: "#000014",
colorLight: "#0099ff"
});